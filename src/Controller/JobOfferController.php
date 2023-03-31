<?php

namespace App\Controller;

use App\Entity\Offers;
use App\Entity\OffersApplication;
use App\Form\OffersType;
use App\Form\OffersApplicationType;
use App\Repository\OffersRepository;
use App\Repository\JobApplicationRepository;
use App\Repository\OffersApplicationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JobOfferController extends AbstractController
{
    #[Route('/offer/{id}', name: 'app_job_offer')]
    public function index(Offers $offer, Request $request, OffersApplicationRepository $offersApplicationRepository): Response
    {
        $application = new OffersApplication();

        // Crée une route pour la redirection
        $path_home = $this->generateUrl('app_home');
        $form2 = $this->createForm(OffersApplicationType::class, $application);
        $form2->handleRequest($request);
        
        if ($form2->isSubmitted() && $form2->isValid()) {
            //d'abord on relie la candidature à l'offre
            $application->setOffers($offer);
            //ensuite on sauvegrade le form et on redirige
            $offersApplicationRepository->save($application, true);
            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('offer/index.html.twig', [
            // Initialise les variables créées
            'offer' => $offer,
            'path_home' => $path_home,
            'form2' => $form2->createView()
        ]);
    }
}