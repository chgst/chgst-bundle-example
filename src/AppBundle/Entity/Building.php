<?php

namespace AppBundle\Entity;

class Building
{
    /** @var string */
    private $id;

    /** @var array */
    private $persons = [];

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getPersons()
    {
        return $this->persons;
    }

    public function addPerson($person)
    {
        if( ! in_array($person, $this->persons))
        {
            $this->persons[] = $person;
        }

        return $this;
    }

    public function removePerson($person)
    {
        if (($key = array_search($person, $this->persons)) !== false)
        {
            unset($this->persons[$key]);
        }

        return $this;
    }
}
