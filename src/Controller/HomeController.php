<?php

namespace App\Controller;

use App\Repository\OffersRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(OffersRepository $offersRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $pagination = $paginator->paginate(
            $offers = $offersRepository->findAll(),
            $request->query->getInt('page', 1), /*page number*/
            2 /*limit per page*/
        );
   
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'offers' => $pagination,
            'pagination' =>$pagination
            
        ]);
    }
}
