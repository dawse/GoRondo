<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Event;
use Faker\Factory ;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {   $faker = Factory::create('fr_FR') ;
        for ($i = 0; $i<100; $i++) {
        $event = new Event ();
        $event
            ->setNomEvent($faker->words(2,true))
            ->setLieuxEvent($faker->city)
            ->setCategorieEvent($faker->words(2,true))
            ->setPrixEvent($faker->numberBetween(100,300))
            ->setNbrAddr($faker->numberBetween(50,200));
          // ->setImage($faker->words(1,true));

        $manager->persist($event);

         }

       $manager->flush();
    }
}
