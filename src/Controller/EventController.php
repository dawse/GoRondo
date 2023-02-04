<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Event;
use App\Repository\EventRepository;
use Cocur\Slugify\Slugify;
use  Knp\Component\Pager\PaginatorInterface ;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\Query;
use App\Entity\EventSearch;
use App\Form\EventSearchType ;
use Symfony\Component\Form\FormInterface ;
use App\Entity\Contact ;
use App\Form\ContactType ;
use Symfony\Component\Form\FormView ;
use App\Notification\ContactNotification ; 


class EventController extends AbstractController
{
/**
 * @var EventRepository
 */
    private $repository;


   public function __construct(EventRepository $repository )
       {
          $this->repository = $repository ;

       }
    public function index(PaginatorInterface $paginator , Request $request): Response
    {
      $search = new EventSearch();
      $form = $this->createForm(EventSearchType::class,$search);
      $form->handleRequest($request);
      $event = $paginator->paginate(
      $this->repository->findAllVisibleQuery($search),
      $request->query->getInt('page',1),
      12
      );
      dump($event);


        return $this->render('pages/event.html.twig', [
            'controller_name' => 'EventController',
            'event'=>$event  ,          /////////////////////////////////////////////////////////////////////////////////////////
            'form' =>$form->CreateView()
        ]);
    }
    ////////////


    /**
    * @Route("/eventshow/{slug}-{id}" , name="property.show", requirements={"slug" : "[a-z0-9\-]*"})
    * @return Response
    */
    public function show(Event $property , string $slug , Request $request ): Response {
    $contact= new Contact();
    $contact->setEvent($property);
    $form= $this->createForm(ContactType::class, $contact);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()){
        $this->addFlash('success' , 'Votre email a bien été envoyé');
        // return $this->redirectToRoute();
    }

    return $this->render('show.html.twig' ,[
    'property' =>$property,
    'form' => $form->createView()
   // 'current_menu' => 'events'

    ]);

    }




}
