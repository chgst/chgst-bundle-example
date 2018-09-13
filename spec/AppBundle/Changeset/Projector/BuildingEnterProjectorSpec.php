<?php

namespace spec\AppBundle\Changeset\Projector;

use AppBundle\Changeset\Projector\BuildingEnterProjector;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BuildingEnterProjectorSpec extends ObjectBehavior
{
    function let(EntityManagerInterface $em)
    {
        $this->beConstructedWith($em);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(BuildingEnterProjector::class);
    }
}
