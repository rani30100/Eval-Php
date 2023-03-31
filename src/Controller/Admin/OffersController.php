<?php

namespace App\Controller\Admin;

use App\Entity\Offers;
use App\Entity\OffersApplication;
use App\Form\OffersType;
use App\Repository\OffersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

#[Route('/admin/offers')]
class OffersController extends AbstractController
{
    #[Route('/', name: 'app_admin_offers_index', methods: ['GET'])]
    public function index(OffersRepository $offersRepository): Response
    {
        return $this->render('admin/offers/index.html.twig', [
            'offers' => $offersRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_offers_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OffersRepository $offersRepository): Response
    {
        $offer = new Offers();
        $form = $this->createForm(OffersType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offersRepository->save($offer, true);

            return $this->redirectToRoute('app_admin_offers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/offers/new.html.twig', [
            'offer' => $offer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_application_show', methods: ['GET'])]
    public function show(OffersType $offers): Response
    {
        return $this->render('admin/application/show.html.twig', [
            'offers' => $offers
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_offers_edit', methods: ['GET', 'POST'])]
    #[ParamConverter("offer", class:"App\Entity\Offers")]
    public function edit(Request $request, Offers $offer, OffersRepository $offersRepository): Response
    {
 
        $form = $this->createForm(OffersType::class, $offer);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
            $offersRepository->save($offer, true);
    
            return $this->redirectToRoute('app_admin_offers_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('admin/offers/edit.html.twig', [
            'offer' => $offer,
            'form' => $form,
            
        ]);
    }
    

    #[Route('/{id}', name: 'app_admin_offers_delete', methods: ['POST'])]
    public function delete(Request $request, Offers $offer, OffersRepository $offersRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offer->getId(), $request->request->get('_token'))) {
            $offersRepository->remove($offer, true);
        }

        return $this->redirectToRoute('app_admin_offers_index', [], Response::HTTP_SEE_OTHER);
    }
}
