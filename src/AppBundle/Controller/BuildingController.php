<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Building;
use AppBundle\Entity\History;
use Doctrine\ORM\EntityManagerInterface;

class BuildingController
{
    /** @var EntityManagerInterface */
    private $em;

    /**
     * BuildingController constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function defaultAction()
    {
        return [ 'buildings' => $this->em->getRepository(Building::class)->findAll() ];
    }

    public function historyAction()
    {
        return $this->em->getRepository(History::class)->findAll();
    }
}
