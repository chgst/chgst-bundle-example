<?php

namespace spec\AppBundle\Controller;

use AppBundle\Controller\BuildingController;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BuildingControllerSpec extends ObjectBehavior
{
    function let(EntityManagerInterface $em)
    {
        $this->beConstructedWith($em);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(BuildingController::class);
    }

    function it_can_list_data(EntityManagerInterface $em, EntityRepository $repository)
    {
        $em->getRepository(Argument::any())->willReturn($repository);

        $repository->findAll()->shouldBeCalled();

        $this->defaultAction()->shouldHaveCount(1);
    }
}
