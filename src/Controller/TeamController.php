<?php 

namespace App\Controller;

// use App\Entity\Team;
use App\Repository\TeamRepository;
use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
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

        /**
     * @Route("/addVoyage", name="add_team", methods={"GET", "POST"})
     * @return void
     */
    public function addVoyage(Request $request, ManagerRegistry $manager) { // objectManager allows to make persist() nad flush() -> save data into DB
        $employee = new Team();// instanciate of empty object

        $form = $this->createForm(TeamType::class, $employee); // form creation and association of empty object

        $form->handleRequest($request); // method get or post to recover data from form
        
        if ($form->isSubmitted() && $form->isValid()) { // verify if the form was submited by get or post and if the fields where correctly filled
            $em = $manager->getManager();
            
            $em->persist($employee); // hydrate form data into the object
            $em->flush(); // flush data into DB

            return $this->redirectToRoute("app_team"); // redirection towards the voyages list
        }

        return $this->render('front/team/editTeam.html.twig', [
            "form" => $form->createView()
        ]);
    }
}