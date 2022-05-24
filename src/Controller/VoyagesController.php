<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoyagesController extends AbstractController
{
     /**
     * @Route("/voyages", name="app_voyages", methods={"GET"})
     * @return Response
     */
    public function voyagesList() 
    {
        $voyages = [
            ['title' => 'Voyage 1', 'country' =>'Country 1', 'description' => 'This is the description of voyage 1'],
            ['title' => 'Voyage 2', 'country' =>'Country 2', 'description' => 'This is the description of voyage 2'],
            ['title' => 'Voyage 3', 'country' =>'Country 3', 'description' => 'This is the description of voyage 3'],
            ['title' => 'Voyage 4', 'country' =>'Country 4', 'description' => 'This is the description of voyage 4'],
            ['title' => 'Voyage 5', 'country' =>'Country 5', 'description' => 'This is the description of voyage 5'],
        ];

        return $this->render('front/voyages.html.twig', ['voyages' => $voyages]);
    }
}