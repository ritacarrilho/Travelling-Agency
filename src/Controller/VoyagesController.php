<?php 

namespace App\Controller;

use App\Entity\Voyages;
use App\Form\VoyagesType;
use App\Repository\VoyagesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/addVoyage/{id}", name="add_voyages", methods={"GET", "POST"}, requirements = {"id": "\d+"})
     * @return void
     */
    public function addVoyage(int $id = -1, Request $request, ManagerRegistry $manager) { // objectManager allows to make persist() nad flush() -> save data into DB
        $voyage = ($id > 0 ) ? ($this->voyagesRepo->find($id)) : new Voyages();// instanciate of empty object

        $form = $this->createForm(VoyagesType::class, $voyage); // form creation and association of empty object

        $form->handleRequest($request); // method get or post to recover data from form
        
        if ($form->isSubmitted() && $form->isValid()) { // verify if the form was submited by get or post and if the fields where correctly filled
            $em = $manager->getManager();
            
            $em->persist($voyage); // hydrate form data into the object
            $em->flush(); // flush data into DB

            return $this->redirectToRoute("app_voyages"); // redirection towards the voyages list
        }

        return $this->render('front/voyages/editVoyages.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/delVoyage/{id}", name="app_deleteVoyage", methods={"POST"}, requirements = {"id": "\d+"})
     * @param int $id
     * @return void
     */
    public function deleteVoyage(int $id, Request $request,  ManagerRegistry $manager) 
    {
        if($this->isCsrfTokenValid('delete'.$id, $request->get('_token'))) {
            $em = $manager->getManager();
            
            $voyage = $this->voyagesRepo->find($id);
            $em->remove($voyage); // delete voyage according to his id
            $em->flush(); // flush data into DB

            $this->addFlash('success', 'The item was deleted with success!');

            return $this->redirectToRoute("app_voyages"); 

        } else {
            return new Response('<h1>Bad Request');
        }
        return false;
    }
}
