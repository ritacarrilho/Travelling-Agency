<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    /**
     * @Route("/about", name="app_about", methods={"GET"})
     * @return Response
     */
    public function about() 
    { 
        return $this->render('front/about.html.twig', []);
    }
}