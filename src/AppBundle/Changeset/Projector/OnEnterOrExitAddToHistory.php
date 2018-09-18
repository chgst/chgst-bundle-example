<?php

namespace AppBundle\Changeset\Projector;

use AppBundle\Entity\Building;
use AppBundle\Entity\History;
use Changeset\Common\TimestampableInterface;
use Changeset\Event\EventInterface;
use Changeset\Event\ProjectorInterface;
use Doctrine\ORM\EntityManagerInterface;

class OnEnterOrExitAddToHistory implements ProjectorInterface
{
    /** @var EntityManagerInterface */
    private $em;

    /**
     * BuildingEnterProjector constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function supports(EventInterface $event): bool
    {
        return in_array($event->getName(), ['enter_building_completed', 'exit_building_completed']);
    }

    public function process(EventInterface $event)
    {
        $building = $this->em->getRepository(Building::class)->find($event->getAggregateId());

        if ( ! $building) return;

        $history = new History();
        $history->setBuilding($event->getAggregateId());

        $history->setNumberOfPeople(count($building->getPersons()));

        if($event instanceof TimestampableInterface)
        {
            $history->setDate($event->getCreatedAt());
        }

        $this->em->detach($event);
        $this->em->persist($history);
        $this->em->flush();
    }
}
