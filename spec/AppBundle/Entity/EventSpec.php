<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Event;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Event::class);
    }
}
