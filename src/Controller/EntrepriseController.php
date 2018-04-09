<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EntrepriseController extends Controller
{
    /**
     * @Route("/entreprise", name="entreprise")
     */
    public function index()
    {
        return $this->render('entreprise/accueilProf.html.twig', [
            'controller_name' => 'EntrepriseController',
        ]);
    }
}
