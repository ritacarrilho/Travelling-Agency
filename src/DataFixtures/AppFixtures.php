<?php

namespace App\DataFixtures;

use App\Entity\Team;
use App\Entity\Voyages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Faker\Factory::create('en_EN'); // call package Faker, object Factory
        
        $jobs = ['secretaire', 'commercial'];

        // generate 9 employees
        for($i=0; $i < 9; $i++) {
            $employee = new Team();
            $employee->setName($faker->name)
                    ->setAge(rand(18, 65))
                    ->setJob($jobs[rand(0, count($jobs) -1)]);

            $manager->persist($employee); // each time it generates an object, keep it in memory in a generic array
        }

        // generate 15 voyages
        for($i=0; $i < 15; $i++) {
            $voyage = new Voyages();
            $voyage->setName($faker->name)
                    ->setPrice($faker->randomNumber(3))
                    ->setDestiny($faker->city)
                    ->setDescription($faker->paragraph(3, true));

            $manager->persist($voyage); // each time it generates an object, keep it in memory in a generic array
        }  

        //goes thru the array and save the data into the DB
        $manager->flush();
    }
}
