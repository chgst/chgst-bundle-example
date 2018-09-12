<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Building;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\RouterInterface;

class BuildingExitController
{
    /** @var FormInterface */
    private $form;

    /** @var RouterInterface */
    private $router;

    /** @var EntityManagerInterface */
    private $em;

    /**
     * BuildingEnterController constructor.
     *
     * @param FormInterface $form
     * @param RouterInterface $router
     * @param EntityManagerInterface $em
     */
    public function __construct(FormInterface $form, RouterInterface $router, EntityManagerInterface $em)
    {
        $this->form = $form;
        $this->router = $router;
        $this->em = $em;
    }

    public function defaultAction(Request $request)
    {
        $this->form->handleRequest($request);

        if($this->form->isValid())
        {
            $id = $this->form->get('id')->getData();

            $building = $this->em->getRepository(Building::class)->find($id);

            if ( ! $building)
            {
                throw new NotFoundHttpException();
            }

            $building->removePerson($this->form->get('username')->getData());

            $this->em->persist($building);
            $this->em->flush();

            return new RedirectResponse($this->router->generate('homepage'));
        }

        return [ 'form' => $this->form->createView() ];
    }
}
