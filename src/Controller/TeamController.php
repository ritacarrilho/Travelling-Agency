<?php 

namespace App\Controller;

// use App\Entity\Team;
use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{
    /**
     * @var TeamRepository
     */
    private $teamRepo; // tema repository accessible everywhere

    public function __construct(TeamRepository $teamRepository) // injection, allows to have access to repository all over the file
    { 
        $this->teamRepo = $teamRepository;
    }

    /**
     * @Route("/team", name="app_team", methods={"GET"})
     * @return Response
     */
    public function teamList() 
    {
        // $secretaires = [
        //     ['name' => 'Name 1', 'age' =>'Age 1', 'job' => 'This is the description of the secretaire 1 tasks'],
        //     ['name' => 'Name 2', 'age' =>'Age 2', 'job' => 'This is the description of the secretaire 2 tasks'],
        //     ['name' => 'Name 3', 'age' =>'Age 3', 'job' => 'This is the description of the secretaire 3 tasks'],
        //     ['name' => 'Name 4', 'age' =>'Age 4', 'job' => 'This is the description of the secretaire 4 tasks'],
        // ];

        // $commercials = [
        //     ['name' => 'Name 5', 'age' =>'Age 5', 'job' => 'This is the description of the commercial 1 tasks'],
        //     ['name' => 'Name 6', 'age' =>'Age 6', 'job' => 'This is the description of the commercial 2 tasks'],
        //     ['name' => 'Name 7', 'age' =>'Age 7', 'job' => 'This is the description of the commercial 3 tasks'],
        //     ['name' => 'Name 8', 'age' =>'Age 8', 'job' => 'This is the description of the commercial 4 tasks'],
        //     ['name' => 'Name 9', 'age' =>'Age 9', 'job' => 'This is the description of the commercial 5 tasks'],
        // ];
        
        // search  Team Repository
        // $employees = $this->getDoctrine()->getRepository(Team::class)->findAll();

        $employees = $this->teamRepo->findAll();

        return $this->render('front/team.html.twig', [
            'employees' => $employees
        ]);
    }
}