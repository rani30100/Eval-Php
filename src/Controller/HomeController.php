<?php

namespace App\Controller;

use App\Repository\OffersRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(OffersRepository $offersRepository,  Request $request): Response
    {
        $offers = $offersRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'offers' => $offers,
        ]);
    }

}
// $pagination = $paginator->paginate(

        // $request->query->getInt('page', 1), /*page number*/
            // 3 /*limit per page*/
        // );