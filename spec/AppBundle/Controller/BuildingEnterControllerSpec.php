<?php

namespace spec\AppBundle\Controller;

use AppBundle\Controller\BuildingEnterController;
use AppBundle\Entity\Building;
use Changeset\Communication\CommandBusInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;

class BuildingEnterControllerSpec extends ObjectBehavior
{
    function let(FormInterface $form, RouterInterface $router, CommandBusInterface $commandBus)
    {
        $this->beConstructedWith($form, $router, $commandBus);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(BuildingEnterController::class);
    }

    function it_has_a_defaultAction_which_adds_current_user_to_people_array(
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
