<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ArticlesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    /**
     * @var ArticlesRepository
     */
    private $articlesRepo;

    public function __construct(ArticlesRepository $articlesRepo) 
    { 
        $this->articlesRepo = $articlesRepo; // the BookRepository is available in all method of this class
    }

    /**
     * @Route("/about", name="app_about", methods={"GET"})
     * @return Response
     */
    public function about() 
    {  
        $articles = $this->articlesRepo->findAll();
        
        return $this->render('front/about.html.twig', [
            "articles" => $articles 
        ]);
    }
}