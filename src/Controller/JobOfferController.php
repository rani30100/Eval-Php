<?php

namespace App\Controller;

use App\Entity\Offers;
use App\Form\OffersType;
use App\Repository\OffersRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class JobOfferController extends AbstractController
{
    #[Route('/offer/{id}', name: 'app_job_offer')]
    public function index(Request $request, Offers $offer, OffersRepository $offersRepository): Response
    {
        $offers = $offersRepository->find();
        $form = $this->createForm(OffersType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offersRepository->save($offer, true);
            return $this->redirectToRoute('app_offer_index', [], Response::HTTP_SEE_OTHER);
        }    

        return $this->render('offer/index.html.twig', [
            
            'offers' => $offers,
            'form' => $form,
        ]);

    }
}




