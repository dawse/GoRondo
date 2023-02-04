<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventRepository;

class HomeController extends AbstractController
{

    public function index(EventRepository $repository): Response
    {
        $event = $repository->findlatest();
        return $this->render('pages/home.html.twig', [
            'controller_name' => 'HomeController',
            'event'=>$event
        ]);
    }
}
