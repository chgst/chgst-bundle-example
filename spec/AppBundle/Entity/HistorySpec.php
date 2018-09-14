<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\History;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HistorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(History::class);
    }

    function it_has_a_date()
    {
        $this->getDate()->shouldReturn(null);
        $this->setDate(new \DateTime())->shouldReturn($this);
        $this->getDate()->shouldNotReturn(null);
    }

    function it_has_reference_to_building()
    {
        $this->getBuilding()->shouldReturn(null);
        $this->setBuilding('main')->shouldReturn($this);
        $this->getBuilding()->shouldNotReturn(null);
    }

    function it_has_a_current_number_of_people_in_the_building()
    {
        $this->getNumberOfPeople()->shouldReturn(0);
        $this->setNumberOfPeople(5)->shouldReturn($this);
        $this->getNumberOfPeople()->shouldNotReturn(0);
    }
}
