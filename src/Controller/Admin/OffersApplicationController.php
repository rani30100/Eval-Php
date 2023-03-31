<?php

namespace App\Controller\Admin;

use App\Entity\OffersApplication;
use App\Form\OffersApplicationType;
use App\Form\OffersApplication1Type;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\OffersApplicationRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/admin/application')]
class OffersApplicationController extends AbstractController
{
    #[Route('/', name: 'app_admin_application_index', methods: ['GET', 'POST'])]
    public function index(OffersApplicationRepository $offersApplicationRepository,Request $request): Response
    {

        $offersApplication = new OffersApplication();
        $formApplication = $this->createForm(OffersApplicationType::class, $offersApplication);
        $formApplication->handleRequest($request);

        if ($formApplication->isSubmitted() && $formApplication->isValid()) {
            $offersApplicationRepository->save($offersApplication, true);

            return $this->redirectToRoute('app_admin_offers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/offers_application/index.html.twig', [
            'offers_applications' => $offersApplicationRepository->findAll(),
            'formApplication' => $formApplication

        ]);
    }

    #[Route('/new', name: 'app_admin_offers_application_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OffersApplicationRepository $offersApplicationRepository): Response
    {
        $offersApplication = new OffersApplication();
        $form = $this->createForm(OffersApplication1Type::class, $offersApplication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offersApplicationRepository->save($offersApplication, true);

            return $this->redirectToRoute('app_admin_offers_application_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/offers_application/new.html.twig', [
            'offers_application' => $offersApplication,
            'form' => $form,
        ]);
    }

    // #[Route('/{id}', name: 'app_admin_offers_application_show', methods: ['GET'])]
    // public function show(OffersApplication $offersApplication): Response
    // {
    //     return $this->render('admin/offers_application/show.html.twig', [
    //         'offers_application' => $offersApplication,
    //     ]);
    // }

    #[Route('/{id}/edit', name: 'app_admin_offers_application_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OffersApplication $offersApplication, OffersApplicationRepository $offersApplicationRepository): Response
    {
        $form = $this->createForm(OffersApplication1Type::class, $offersApplication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offersApplicationRepository->save($offersApplication, true);

            return $this->redirectToRoute('app_admin_offers_application_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/offers_application/edit.html.twig', [
            'offers_application' => $offersApplication,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_offers_application_delete', methods: ['POST'])]
    public function delete(Request $request, OffersApplication $offersApplication, OffersApplicationRepository $offersApplicationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offersApplication->getId(), $request->request->get('_token'))) {
            $offersApplicationRepository->remove($offersApplication, true);
        }

        return $this->redirectToRoute('app_admin_offers_application_index', [], Response::HTTP_SEE_OTHER);
    }
}
