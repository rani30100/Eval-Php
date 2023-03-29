<?php

namespace App\Controller;

use App\Entity\Offers;
use App\Form\OffersType;
use App\Repository\OffersRepository;
use App\Repository\JobApplicationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class JobOfferController extends AbstractController
{
    #[Route('/offer/{id}', name: 'app_job_offer')]
    public function index(Request $request, Offers $offer, OffersRepository $offerRepository): Response
    {
            //cree une route pour la redirection
            $path_home = $this->generateUrl('app_home');
            $form = $this->createForm(OffersType::class, $offer);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $offerRepository->save($offer, true);
                return $this->redirectToRoute('app_offer_index', [], Response::HTTP_SEE_OTHER);
            }    
    
            return $this->render('offer/index.html.twig', [
                //j'initie les variable crée
                'offer' => $offer,
                'path_home' => $path_home,
                'form' => $form->createView()
            ]);
        }
    }



