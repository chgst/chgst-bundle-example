<?php

namespace spec\AppBundle\Changeset\Projector;

use AppBundle\Changeset\Projector\OnEnterOrExitAddToHistory;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OnEnterOrExitAddToHistorySpec extends ObjectBehavior
{
    function let(EntityManagerInterface $em)
    {
        $this->beConstructedWith($em);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(OnEnterOrExitAddToHistory::class);
    }
}
