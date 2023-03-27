<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobOfferController extends AbstractController
{
    #[Route('/admin/job/offer', name: 'app_admin_job_offer')]
    public function index(): Response
    {
        return $this->render('admin/job_offer/index.html.twig', [
            'controller_name' => 'JobOfferController',
        ]);
    }
}
