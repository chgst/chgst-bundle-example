<?php

namespace spec\AppBundle\Controller;

use AppBundle\Controller\BuildingExitController;
use AppBundle\Entity\Building;
use Changeset\Communication\CommandBusInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class BuildingExitControllerSpec extends ObjectBehavior
{
    function let(FormInterface $form, RouterInterface $router, CommandBusInterface $commandBus)
    {
        $this->beConstructedWith($form, $router, $commandBus);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(BuildingExitController::class);
    }

    function it_can_register_exit_event(
        Request $request,
        FormInterface $form,
        RouterInterface $router,
        CommandBusInterface $commandBus
    )
    {
        $form->handleRequest($request)->shouldBeCalled();
        $form->isValid()->willReturn(false);
        $form->createView()->shouldBeCalled();

        $this->defaultAction($request)->shouldHaveCount(1);

        $form->isValid()->willReturn(true);

        $form->get(Argument::any())->shouldBeCalled()->willReturn($form);
        $form->getData()->shouldBeCalled()->willReturn('some value');

        $commandBus->dispatch(Argument::any())->shouldBeCalled();

        $router->generate(Argument::any())->shouldBeCalled()->willReturn('/');

        $this->defaultAction($request);
    }
}
