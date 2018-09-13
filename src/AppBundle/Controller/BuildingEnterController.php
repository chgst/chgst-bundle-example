<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Building;
use Changeset\Command\Command;
use Changeset\Communication\CommandBusInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class BuildingEnterController
{
    /** @var FormInterface */
    private $form;

    /** @var RouterInterface */
    private $router;

    /** @var CommandBusInterface */
    private $commandBus;

    /**
     * BuildingEnterController constructor.
     *
     * @param FormInterface $form
     * @param RouterInterface $router
     * @param CommandBusInterface $commandBus
     */
    public function __construct(FormInterface $form, RouterInterface $router, CommandBusInterface $commandBus)
    {
        $this->form = $form;
        $this->router = $router;
        $this->commandBus = $commandBus;
    }

    public function defaultAction(Request $request)
    {
        $this->form->handleRequest($request);

        if($this->form->isValid())
        {
            $id = $this->form->get('id')->getData();

            $this->commandBus->dispatch(
                new Command(
                    'enter_building',
                    Building::class,
                    $id,
                    ['username' => $this->form->get('username')->getData()]
                )
            );

            return new RedirectResponse($this->router->generate('homepage'));
        }

        return [ 'form' => $this->form->createView() ];
    }
}
