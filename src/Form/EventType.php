<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile ;
//use Symfony\Component\HttpFoundation\File\File;


class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom_Event')
            ->add('Lieux_Event')
            ->add('Categorie_Event')
            ->add('Prix_Event')
            ->add('nbr_addr')
           // ->add('image')
         //  ->add('imageFile',FileType::class,[
         //  'required' => false
         //  ])
        ->add('imageFile',FileType::class)
       // ->add('updated_at')


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
