<?php

namespace App\Controller;

use App\Entity\UserEleve;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig');
    }
    //------- PAGE AIDE-----//
    /**
     * @Route("/admin/listeEleve",name="admin_listeEleve")
     */

    public function listeEleve()
    {
        $eleves = $this->getDoctrine()->getRepository(UserInfo::class)->findAll();
        return $this->render('admin/listEleve.html.twig',compact('eleves'));
    }

    /**
    * @Route("/admin/listeProf",name="admin_listeProf")
    */

    public function listeProf()
    {
        $professeurs = $this->getDoctrine()->getRepository(UserProf::class)->findAll();
        return $this->render('admin/listProf.html.twig',compact('professeurs'));
    }

    /**
     * @Route("/admin/listeEntreprise",name="admin_listeEntreprise")
     */

    public function listeEntreprise()
    {
        $entreprises = $this->getDoctrine()->getRepository(Entreprise::class)->findAll();
        return $this->render('eleve/listEntreprise.html.twig',compact('entreprises'));
    }

    /**
     * @Route("/admin/listeTuteur",name="admin_listeTuteur")
     */

    public function listeTuteur()
    {
        $tuteurs = $this->getDoctrine()->getRepository(Tuteur::class)->findAll();
        return $this->render('eleve/listTuteur.html.twig',compact('tuteurs'));
    }

    /**
     * @Route("/admin/aide", name="admin_aide")
     */

    public function aideAdmin()
    {
        return $this->render('admin/aide.html.twig');
    }

    //---------PAGE LISTE ELEVES ET PROFS-------------//
    /**
     * @Route("/admin/listeEleveProfesseur", name="admin_listeEP")
     */

    public function listeEleveProf()
    {
        return $this->render('admin/listeEP.html.twig');
    }

    //-----------PAGE LISTE ENTREPRISE ET TUTEURS----------------//

    /**
     * @Route("/admin/listeEntrepriseTuteur", name="admin_listeET")
     */

    public function listeEntrepriseTuteur()
    {
        return $this->render('admin/listeET.html.twig');
    }

    //-----------LISTE DES STAGES ----------//

    /**
     * @Route("/admin/listeStages", name="admin_listeStages")
     */

    public function listeStages()
    {
        return $this->render('admin/listeStages.html.twig');
    }

    //-----LISTE DES ELEVES-----//
    /**
     * @Route("/admin/listeEleves", name="admin_listeEleves")
     */

    public function listeEleves()
    {
        $listEleveActu = $this->getDoctrine()
            ->getRepository(UserEleve::class)
            ->findAll();


        return $this->render('admin/listes/listeEleves.html.twig',[
            'eleveActu' => $listEleveActu]);
    }

    //-------------FORMULAIRE AJOUT ELEVE--------------//

    /**
     * @Route("/admin/ajoutEleve", name="ajoutEleve")
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
        $item->getPresent();

        $form = $this->createFormBuilder($item)
            ->add('nomEleve', TextType::class)
            ->add('prenomEleve', TextType::class)
            ->add('classeEleve', IntegerType::class)
            ->add('AnneeScolaire',TextType::class)
            ->add('login',TextType::class)
            ->add('password', TextType::class)
            ->add('Present',HiddenType::class, array('data' =>true, ))
            ->getForm();

        if ($request->isMethod('POST')){
            $form->submit($request->request->get($form->getName()));
            if ($form->isSubmitted() && $form->isValid()) {
                $item = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($item);
                $em->flush();

                return $this->redirectToRoute('admin_listeEleves');
            }
            return $this->render('admin/ajoutEleve.html.twig', array('form' => $form->createView(),
                ));
        }
        return $this->render('admin/formulaires/ajoutEleve.html.twig');
    }
    //-------------LISTE DES ENTREPRISES----------//

    /**
     * @Route("/admin/listeEntreprises", name="admin_listeEntreprises")
     */

    public function listeEntreprises()
    {
        return $this->render('admin/listes/listeEntreprises.html.twig');
    }

    //---------------------LISTE DES PROFS----------------//

    /**
     * @Route("/admin/listeProfesseurs", name="admin_listeProfs")
     */
    public function listeProfs()
    {
        return $this->render('admin/listes/listeProfesseur.html.twig');
    }

    //---------------------LISTE DES TUTEURS---------------------//

    /**
     * @Route("/admin/listeTuteurs", name="admin_listeTuteurs")
     */

    public function listeTuteurs()
    {
        return $this->render('admin/listes/listeTuteurs.html.twig');
    }

}
