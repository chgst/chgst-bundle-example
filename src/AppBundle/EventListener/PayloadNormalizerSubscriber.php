<?php

namespace AppBundle\EventListener;

use Changeset\Common\HasPayloadInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class PayloadNormalizerSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [ 'changeset.command.handled' => [ 'normalizePayload' ]];
    }

    public function normalizePayload(GenericEvent $event)
    {
        $subject = $event->getSubject();

        if ($subject instanceof HasPayloadInterface && is_array($subject->getPayload()))
        {
            $subject->setPayload(json_encode($subject->getPayload()));
        }
    }
}