<?php

namespace App\Controller;

use App\Entity\UserEleve;
use App\Entity\Stage;
use App\Entity\UserProf;
use App\Entity\Tuteur;
use App\Entity\Entreprise;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ProfesseurController extends Controller
{
    /**
     * @Route("/professeur", name="professeur")
     */
    public function index()
    {
        return $this->render('professeur/accueilProf.html.twig', [
            'controller_name' => 'ProfesseurController',
        ]);
    }
    /**
     * @Route("/professeur/listes", name="professeur_listes")
     */
    public function listes()
    {
        $listes = $this->getDoctrine()->getRepository(Stage::class)->findAll();
        return $this->render('professeur/listes.html.twig',compact('listes'));
    }

    /**
     * @Route("/professeur/listesEleves", name="professeur_listesEleves")
     */
    public function listeEleve()
    {
        $listeEleves = $this->getDoctrine()->getRepository(UserEleve::class)->findAll();
        return $this->render('professeur/listesEleves.html.twig',compact('listeEleves'));
    }

    /**
     * @Route("/professeur/ajoutEleve", name="ajoutEleve")
     */
    public function ajoutEleve(Request $request)
    {
        $item = new UserEleve();

        $item->getNomEleve();
        $item->getPrenomEleve();
        $item->getClasseEleve();
        $item->getAnneeScolaire();
        $item->getLogin();
        $item->getPassword();
        $item->getRole();
        $item->getPresent();

        $form = $this->createFormBuilder($item)
            ->add('nomEleve', TextType::class)
            ->add('prenomEleve', TextType::class)
            ->add('classeEleve', IntegerType::class)
            ->add('AnneeScolaire',TextType::class)
            ->add('login',TextType::class)
            ->add('password', TextType::class)
            ->add('role', HiddenType::class, array('data'=> "eleve"))
            ->add('Present',HiddenType::class, array('data' =>true, ))
            ->getForm();

        if ($request->isMethod('POST')){
            $form->submit($request->request->get($form->getName()));
            if ($form->isSubmitted() && $form->isValid()) {
                $item = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($item);
                $em->flush();

                return $this->redirectToRoute('professeur_listesEleves');
            }
        }
            return $this->render('professeur/formulaires/ajoutEleve.html.twig', array('form' => $form->createView(),
            ));
    }

    /**
     * @Route("/professeur/aide", name="professeur_aide")
     */
    public function aideProfesseur()
    {
        return $this->render('professeur/aide.html.twig');
    }


}
