<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Event;
use App\Repository\EventRepository;
use App\Form\EventType;
use Symfony\Component\HttpFoundation\Request;
//use Doctrine\Persistence\ObjectManager ;
use Doctrine\ORM\EntityManagerInterface;








class AdminPropertyController extends AbstractController
{
    /**
     * @var EventRepository
     */

     private $repository;

         /**
          * @var EntityManagerInterface
          */

          private $em;



       public function __construct(EventRepository $repository , EntityManagerInterface  $em  )
           {
              $this->repository = $repository ;
              $this->em = $em ;


           }
/**
 * @Route("/admin" , name="admin.property.index")
 * @return \Symfony\Component\HttpFoundation\Response
 */
    public function index (){
    $events = $this->repository->findAll();
    return $this->render('admin/index.html.twig' , compact('events'));

    }
      /**
       * @Route("/admin/event/create" , name="admin.property.new")
       */
    public function new(Request $request){
    $event = new Event();
      $form = $this->createForm(EventType::class , $event);
          $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
          $this->em->persist($event);
          $this->em->flush();
              $this->addFlash('success' , 'Evenement créer avec succés');
          return $this->redirectToRoute('admin.property.index');
          }
            return $this->render('admin/new.html.twig' ,[
              'event'=>$event,
              'form'=> $form->CreateView()

              ]);

    }


  /**
   * @Route("/admin/{id}" , name="admin.property.edit")
   * @param Event $event
   * @param Request $request
   * return Symfony\Component\HttpFoundation\Request
   */
    public function edit (Event $event , Request $request){
    $form = $this->createForm(EventType::class , $event);
    $form->handleRequest($request);

  if($form->isSubmitted() && $form->isValid()){
    $this->em->flush();
    $this->addFlash('success' , 'Evenement modifié avec succés');
    return $this->redirectToRoute('admin.property.index');
    }

    return $this->render('admin/edit.html.twig' ,[
    'event'=>$event,
    'form'=> $form->CreateView()

    ]);

    }
     /**
       * @Route("/admin/ev/{id}" , name="admin.property.delete")
       */
       public function delete (Event $event){
       $this->em->remove($event);
       $this->em->flush();
       $this->addFlash('success' , 'Evenement supprimer avec succés');
       return $this->redirectToRoute('admin.property.index');
       }

}