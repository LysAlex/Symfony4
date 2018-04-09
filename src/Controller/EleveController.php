<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Tuteur;
use App\Entity\Stage;
use App\Entity\UserEleve;
use App\Entity\UserProf;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EleveController extends Controller
{
    /**
     * @Route("/eleve",name="eleve")
     */
    public function index()
    {
        return $this->render('eleve/index.html.twig');
    }

    /**
     * @Route("/eleve/listeEntreprise",name="eleve_listeEntreprise")
     */
    public function listeEntreprise()
    {
        $entreprises = $this->getDoctrine()->getRepository(Entreprise::class)->findAll();
        return $this->render('eleve/listEntreprise.html.twig',compact('entreprises'));
    }

    /**
     * @Route("/eleve/listeTuteur",name="eleve_listeTuteur")
     */
    public function listeTuteur()
    {
        $tuteurs = $this->getDoctrine()->getRepository(Tuteur::class)->findAll();
        return $this->render('eleve/listTuteur.html.twig',compact('tuteurs'));
    }

    /**
     * @Route("/eleve/ajoutEntreprise", name="ajout_entreprise")
     */

    public  function ajoutEntreprise(Request $request)
    {
        $item = new Entreprise();

        $item->getNomEntreprise();
        $item->getVilleEntreprise();
        $item->getCpEntreprise();
        $item->getMailEntreprise();
        $item->getTelEntreprise();
        $item->getActiviteEntreprise();
        $item->getActive();
        $item->getAdresseEntreprise();

        $form = $this->createFormBuilder($item)
            ->add('nomEntreprise', TextType::class)
            ->add('villeEntreprise', TextType::class)
            ->add('cpEntreprise', IntegerType::class)
            ->add('mailEntreprise', EmailType::class)
            ->add('telEntreprise', TextType::class)
            ->add('activiteEntreprise', TextType::class)
            ->add('active',HiddenType::class, array('data' =>true, ))
            ->add('adresseEntreprise', TextType::class)
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));
            if ($form->isSubmitted() && $form->isValid()) {
                $item = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($item);
                $em->flush();

                return $this->redirectToRoute('eleve');

            }

        }
        return $this->render('eleve/formulaires/formulaireEnt.html.twig', array(
            'form' => $form->createView(),));

    }

    /**
     * @Route("/eleve/ajoutStage", name="ajout_stage")
     */

    public function ajoutStage(Request $request){

        $item = new Stage();

        $item->getDateStage();
        $item->getUserEleve();
        $item->getUserProf();
        $item->getTuteur();

        $form = $this->createFormBuilder($item)
            ->add('dateStage',HiddenType::class, array('data' => date("Y-m-d")))
            ->add('Tuteur', EntityType::class, array(
                'class' => Tuteur::class,
                'choice_label' => 'nomTuteur',
            ))
            ->add('UserEleve', EntityType::class, array(
                'class' => UserEleve::class,
                'choice_label' => 'nomEleve',
            ))
            ->add('UserProf', EntityType::class, array(
                'class' => UserProf::class,
                'choice_label' => 'nomProf',
            ))
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));
            if ($form->isSubmitted() && $form->isValid()) {
                $item = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($item);
                $em->flush();

                return $this->redirectToRoute('eleve');

            }
        }
        return $this->render('eleve/formulaires/formulaireStage.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    /**
     * @Route("/eleve/ajoutTuteur", name="ajout_tuteur")
     */

    public  function ajoutTuteur(Request $request)
    {
        $item = new Tuteur();

        $item->getNomTuteur();
        $item->getPrenomTuteur();
        $item->getMailTuteur();
        $item->getTelTuteur();
        $item->getEntreprise();

        $form = $this->createFormBuilder($item)
            ->add('nomTuteur', TextType::class)
            ->add('prenomTuteur', TextType::class)
            ->add('mailTuteur', EmailType::class)
            ->add('telTuteur', TextType::class)
            ->add('Entreprise', EntityType::class, array(
                'class' => Entreprise::class,
                'choice_label' => 'nomEntreprise',
            ))
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));
            if ($form->isSubmitted() && $form->isValid()) {
                $item = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($item);
                $em->flush();

                return $this->redirectToRoute('eleve');

            }

        }
        return $this->render('eleve/formulaires/formulaireTuteur.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/eleve/aide", name="eleve_aide")
     */
    public function aideEleve()
    {

        return $this->render('eleve/aide.html.twig');
    }

}
