<?php

namespace App\Controller;

use App\Entity\Avion;
use App\Form\AvionType;
use App\Repository\AvionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/avion")
 */
class AvionController extends AbstractController
{
    /**
     * @Route("/", name="avion_index", methods={"GET"})
     */
    public function index(AvionRepository $avionRepository): Response
    {
        return $this->render('avion/index.html.twig', ['avions' => $avionRepository->findAll()]);
    }

    /**
     * @Route("/new", name="avion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $avion = new Avion();
        $form = $this->createForm(AvionType::class, $avion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($avion);
            $entityManager->flush();

            return $this->redirectToRoute('avion_index');
        }

        return $this->render('avion/new.html.twig', [
            'avion' => $avion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="avion_show", methods={"GET"})
     */
    public function show(Avion $avion): Response
    {
        return $this->render('avion/show.html.twig', ['avion' => $avion]);
    }

    /**
     * @Route("/{id}/edit", name="avion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Avion $avion): Response
    {
        $form = $this->createForm(AvionType::class, $avion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('avion_index', ['id' => $avion->getId()]);
        }

        return $this->render('avion/edit.html.twig', [
            'avion' => $avion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="avion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Avion $avion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($avion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('avion_index');
    }
}
