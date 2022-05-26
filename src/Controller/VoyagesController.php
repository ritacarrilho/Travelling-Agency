<?php 

namespace App\Controller;

use App\Entity\Voyages;
use App\Repository\VoyagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoyagesController extends AbstractController
{
    /**
     * @var VoyagesRepository
     */
    private $voyagesRepo; // tema repository accessible everywhere

    public function __construct(VoyagesRepository $voyagesRepository) // injection
    { 
        $this->voyagesRepo = $voyagesRepository;
    }
     /**
     * @Route("/voyages", name="app_voyages", methods={"GET"})
     * @return Response
     */
    public function voyagesList() 
    {
        // $voyages = [
        //     ['title' => 'Voyage 1', 'country' =>'Country 1', 'description' => 'This is the description of voyage 1'],
        //     ['title' => 'Voyage 2', 'country' =>'Country 2', 'description' => 'This is the description of voyage 2'],
        //     ['title' => 'Voyage 3', 'country' =>'Country 3', 'description' => 'This is the description of voyage 3'],
        //     ['title' => 'Voyage 4', 'country' =>'Country 4', 'description' => 'This is the description of voyage 4'],
        //     ['title' => 'Voyage 5', 'country' =>'Country 5', 'description' => 'This is the description of voyage 5'],
        // ];

        $voyages = $this->voyagesRepo->findAll();

        return $this->render('front/voyages.html.twig', [
            'voyages' => $voyages
        ]);
    }
}