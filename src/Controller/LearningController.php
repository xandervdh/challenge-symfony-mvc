<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class LearningController extends AbstractController
{
    private string $name = "unknown";
    private Session $session;

    /**
     * LearningController constructor.
     */
    public function __construct()
    {
        $this->session = new Session();
        //$this->session();
    }


    /**
     * @Route("/learning", name="learning")
     */
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }

    /**
     * @Route("/about-Becode", name="aboutMe")
     */
    public function aboutMe(): Response
    {
        if ($this->name == 'Unknown'){
            return $this->redirectToRoute('showname');
        }
        $this->session();
        return $this->render('learning/aboutMe.html.twig', [
            'name' => $this->name,
        ]);
    }

    /**
     * @Route("/", name="showname")
     */
    public function showMyName(): response
    {
        $this->session();
        return $this->render('learning/showName.html.twig', ['name' => $this->name]);
    }

    /**
     * @Route("/change-name", name="changename",  methods={"POST"})
     */
    public function changeMyName()
    {
        $_SESSION['name'] = $_POST['name'];
        return $this->redirectToRoute('showname');
    }

    public function session()
    {
        $this->session->start();
        if (isset($_SESSION['name'])) {
            $this->name = $_SESSION['name'];
        } else {
            $this->name = 'Unknown';
        }
    }

}
