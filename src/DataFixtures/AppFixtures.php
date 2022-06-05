<?php

namespace App\DataFixtures;

use App\Entity\Articles;
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

        $images = ['adventure.jpg', 'dolomites.jpg', 'explore.jpg', 'montenegro.jpg', 'mountain.jpg', 'people.jpg'];

        $pictures = ['attractive.jpg', 'fashion.jpg', 'man.jpg', 'portrait-gf.jpg', 'woman-g1.jpg', 'woman-g8.jpg', 'woman-g87.jpg', 'woman-ga.jpg', 'woman.jpg'];
        
        // generate 9 employees
        for($i=0; $i < 9; $i++) {
            $employee = new Team();
            $employee->setName($faker->name)
                    ->setAge(rand(18, 65))
                    ->setJob($jobs[rand(0, count($jobs) -1)])
                    ->setPicture($pictures[$i]);

            $manager->persist($employee); // each time it generates an object, keep it in memory in a generic array
        }

        // generate 15 voyages
        for($i=0; $i < 15; $i++) {
            $voyage = new Voyages();
            $voyage->setName($faker->state)
                    ->setPrice($faker->randomNumber(3))
                    ->setDestiny($faker->city)
                    ->setDescription($faker->paragraph(3, true))
                    ->setImage($images[rand(0, count($images) - 1)]);

            $manager->persist($voyage); // each time it generates an object, keep it in memory in a generic array
        }  
        
        // generate articles
        for($i=0; $i < 5; $i++) {
            $article = new Articles();

            $article->setLabel($faker->sentence(5, true))
                    ->setAuthor($faker->name)
                    ->setPublishDate($faker->dateTime('2022-01-01'))
                    ->setDescription($faker->paragraph(3, true));

            $manager->persist($article);
        }
        
        
        //goes thru the array and save the data into the DB
        $manager->flush();
    }
}
