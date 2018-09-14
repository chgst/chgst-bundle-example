<?php

namespace AppBundle\Entity;

class History
{
    /** @var int */
    private $id;

    /** @var \DateTimeInterface */
    private $date;

    /** @var string */
    private $building;

    /** @var int */
    private $numberOfPeople = 0;

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function getBuilding()
    {
        return $this->building;
    }

    public function setBuilding($building)
    {
        $this->building = $building;

        return $this;
    }

    public function getNumberOfPeople()
    {
        return $this->numberOfPeople;
    }

    public function setNumberOfPeople($numberOfPeople)
    {
        $this->numberOfPeople = $numberOfPeople;

        return $this;
    }
}
