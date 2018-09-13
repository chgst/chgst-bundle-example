<?php

namespace AppBundle\Changeset\Projector;

use AppBundle\Entity\Building;
use Changeset\Event\EventInterface;
use Changeset\Event\ProjectorInterface;
use Doctrine\ORM\EntityManagerInterface;

class BuildingExitProjector implements ProjectorInterface
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
        return $event->getName() == 'exit_building_completed';
    }

    public function process(EventInterface $event)
    {
        $building = $this->em->getRepository(Building::class)->find($event->getAggregateId());

        if ( ! $building) return;

        $payload = json_decode($event->getPayload(), true);

        if(in_array($payload['username'], $building->getPersons()))
        {
            $building->removePerson($payload['username']);
        }

        $this->em->persist($building);
        $this->em->flush();
    }
}