<?php

namespace App\Controller;

use App\Entity\Offers;
use App\Entity\OffersApplication;
use App\Form\OffersType;
use App\Form\OffersApplicationType;
use App\Repository\OffersRepository;
use App\Repository\JobApplicationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\OffersApplicationRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class JobOfferController extends AbstractController
{
    #[Route('/offer/{id}', name: 'app_job_offer')]
    public function index(Request $request,OffersApplicationRepository $offersApplicationRepository,OffersRepository $offersRepository): Response
    {       
            $offers = new OffersType();
            $form1 = $this->createForm(OffersType::class,$offers, [
                'data_class' => null,
            ]);
            $form1->handleRequest($request);
            
            if ($form1->isSubmitted() && $form1->isValid()) {
                $offersRepository->save($offers, true);
                return $this->redirectToRoute('app_offer_index', [], Response::HTTP_SEE_OTHER);
            }  

            $offerApplication = new OffersApplication();
            $form = $this->createForm(OffersApplicationType::class,$offerApplication);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $offersApplicationRepository->save($offerApplication, true);
                return $this->redirectToRoute('app_offer_index', [], Response::HTTP_SEE_OTHER);
            }    

            //cree une route pour la redirection
            $path_home = $this->generateUrl('app_home');
        
            return $this->render('offer/index.html.twig', [
                //j'initie les variable crée
                'offerApplication' => $offerApplication,
                'path_home' => $path_home,
                'form' => $form->createView(),
                'form1' => $form1
            ]);
        }
    }



