<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Building;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BuildingSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Building::class);
    }

    function it_has_an_id()
    {
        $this->getId()->shouldReturn(null);
        $this->setId('main')->shouldReturn($this);
        $this->getId()->shouldNotReturn(null);
    }

    function it_know_the_name_of_every_person_in_the_building()
    {
        $this->getPersons()->shouldHaveCount(0);
        $this->addPerson('bob')->shouldReturn($this);
        $this->getPersons()->shouldHaveCount(1);

        $this->removePerson('bob')->shouldReturn($this);
        $this->getPersons()->shouldHaveCount(0);
    }
}
