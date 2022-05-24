<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home", methods={"GET", "PUT"})
     * @return Response
     */
    public function home() 
    {
        return $this->render('front/home.html.twig', []);
    }


    //  /**
    //  * @Route("/voyages", name="app_voyages", methods={"GET"})
    //  * @return Response
    //  */
    // public function voyages() 
    // {
    //     $voyages = [
    //         ['title' => 'Voyage 1', 'country' =>'Country 1', 'description' => 'This is the description of voyage 1'],
    //         ['title' => 'Voyage 2', 'country' =>'Country 2', 'description' => 'This is the description of voyage 2'],
    //         ['title' => 'Voyage 3', 'country' =>'Country 3', 'description' => 'This is the description of voyage 3'],
    //         ['title' => 'Voyage 4', 'country' =>'Country 4', 'description' => 'This is the description of voyage 4'],
    //         ['title' => 'Voyage 5', 'country' =>'Country 5', 'description' => 'This is the description of voyage 5'],
    //     ];

    //     return $this->render('front/voyages.html.twig', ['voyages' => $voyages]);
    // }
    

    // /**
    //  * @Route("/team", name="app_team", methods={"GET"})
    //  * @return Response
    //  */
    // public function team() 
    // {
    //     $secretaires = [
    //         ['name' => 'Name 1', 'age' =>'Age 1', 'job' => 'This is the description of the secretaire 1 tasks'],
    //         ['name' => 'Name 2', 'age' =>'Age 2', 'job' => 'This is the description of the secretaire 2 tasks'],
    //         ['name' => 'Name 3', 'age' =>'Age 3', 'job' => 'This is the description of the secretaire 3 tasks'],
    //         ['name' => 'Name 4', 'age' =>'Age 4', 'job' => 'This is the description of the secretaire 4 tasks'],
    //     ];

    //     $commercials = [
    //         ['name' => 'Name 5', 'age' =>'Age 5', 'job' => 'This is the description of the commercial 1 tasks'],
    //         ['name' => 'Name 6', 'age' =>'Age 6', 'job' => 'This is the description of the commercial 2 tasks'],
    //         ['name' => 'Name 7', 'age' =>'Age 7', 'job' => 'This is the description of the commercial 3 tasks'],
    //         ['name' => 'Name 8', 'age' =>'Age 8', 'job' => 'This is the description of the commercial 4 tasks'],
    //     ];
        
    //     return $this->render('front/team.html.twig', ['secretaires' => $secretaires, 'commercials' => $commercials]);
    // }

    // /**
    //  * @Route("/about", name="app_about", methods={"GET"})
    //  * @return Response
    //  */
    // public function about() 
    // { 
    //     return $this->render('front/about.html.twig', []);
    // }
}