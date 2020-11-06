<?php
declare(strict_types=1);
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
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
     * @Route("/about-me", name="about me")
     */
    public function aboutMe(): Response
    {
       return $this->render('learning/aboutMe.html.twig', ['name' => 'BeCode']);
    }

    public function showMyName()
    {
        
    }

    public function changeMyName()
    {
        
    }

}
