<?php

namespace AppBundle\Entity;

use Changeset\Event\Event as BaseEvent;

class Event extends BaseEvent
{
    private $id;

    public function getId()
    {
        return $this->id;
    }
}
