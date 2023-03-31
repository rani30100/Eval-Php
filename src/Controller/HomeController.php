<?php

namespace App\Controller;

use App\Form\TriFormType;
use App\Form\OffersTriType;
use App\Form\OffersSearchType;
use App\Repository\OffersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(OffersRepository $offersRepository, PaginatorInterface $paginator, Request $request): Response
    {
       //methode get
        $offerId = $request->query->get('offerId');
        
        if ($offerId !== null) {
            return $this->redirect('/offres/' . $offerId);
        }
        //-------------------------------------------------
        
        //mes form
        $form = $this->createForm(OffersSearchType::class);
   
        //--------------------------------------------------
       
        // if ( $tri->handleRequest($request)->isSubmitted() && $tri->isValid()) {
        //         $data = $tri->getData();
            
        // }
            if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
                $criteria = $form->getData();
                
        }

        $pagination = $paginator->paginate(
            $offersRepository->findByExampleField($criteria ?? []),
            $request->query->getInt('page', 1), /*page number*/
            15 /*limit per page*/
        );

      return $this->render('home/index.html.twig', [
        'controller_name' => 'HomeController',
        'offers' => $pagination,
        'pagination' => $pagination,
        'search_form' => $form,
    
]);

    }
}
