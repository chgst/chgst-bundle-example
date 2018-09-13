<?php

namespace spec\AppBundle\EventListener;

use AppBundle\EventListener\PayloadNormalizerSubscriber;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PayloadNormalizerSubscriberSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PayloadNormalizerSubscriber::class);
    }
}
