<?php

namespace App\Controller;

use DateTime;
use App\Entity\Vole;
use App\Entity\Avion;
use App\Entity\Users;
use App\Entity\Comment;
use App\Entity\Compagnie;
use App\Form\CommentType;
use App\Entity\Reservation;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class DefaultController extends AbstractController
{
   
    /**
     * @Route("/", name="accueil")
     */
    public function accueil(Request $request, ObjectManager $manager)
    {   
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $comment->setCreatedAt(new \DateTime());
            $manager->persist($comment);
            $manager->flush();

          //  return $this->redirectToRoute('plane/accueil.html.twig');

        } 

        $repositorys = $this->getDoctrine()
                            ->getManager()
                            ->getRepository(Comment::class);
        $comments = $repositorys->findAll();


        if(null==$comments)
        {
            //throw new NotFoundHttpException("pas de Commentaire");
        }

        return $this->render('plane/accueil.html.twig',['commentForm' => $form->createView(), 'comments' => $comments]
        );
    }

    /**
     * @Route("/voirall", name="voirall")
     */
    public function voirall()
    {


        $repository = $this->getDoctrine()
                            ->getManager()
                            ->getConnection();
                            $sql='select * from vole ';

        $vole = $repository->prepare($sql);
        $vole->execute();
        $dt = new DateTime();
        $dtt = $dt->format('Y-m-d H:i:s');
        if(null==$vole){
            throw new NotFoundHttpException("Pas de vole.");
        }
        return $this->render('dashbord/acceuil.html.twig',array(
            'vole' => $vole, 'date'=>$dtt
        ));
    }
    /**
     * @Route("/agence", name="agence")
     */
    public function agence()
    {


        $repository = $this->getDoctrine()
                            ->getManager()
                            ->getConnection();
                            $sql='select * from compagnie ';
        $compagnie = $repository->prepare($sql);
        $compagnie->execute();
        if(null==$compagnie){
            throw new NotFoundHttpException("pas de compagnie");
        }
        return $this->render('dashbord/compagnie.html.twig',array(
            'compagnie' => $compagnie,
        ));
    }
    /**
     * @Route("/showcompagnie/{id}", name="showcompagnie")
     */
    public function showcompagnie($id)
    {


        $repository = $this->getDoctrine()
                            ->getManager()
                            ->getRepository(Compagnie::class);
        $compagnie = $repository->find($id);
       
        return $this->render('dashbord/showcompagnie.html.twig',array(
            'compagnie' => $compagnie,
        ));
    }

    
      /**
     * @Route("/detailsAvion/{id}", name="detailsAvion")
     */
    public function DetailsAvion($id)
    {


        $repository = $this->getDoctrine()
                            ->getManager()
                            ->getRepository(Avion::class);
        $avion = $repository->find($id);
       
        return $this->render('plane/DetailsAvion.html.twig',array(
            'avion' => $avion,
        ));
    }

    

  /**
     * @Route("/reserve/{id}/{idd}", name="reserve")
     */
    /*
    public function reserve($id,$idd)
    {

            $reservation = new Reservation();
            

            $repositorys = $this->getDoctrine()
            ->getManager()
            ->getRepository(Users::class);
            $user = $repositorys->find($id);

            $rep = $this->getDoctrine()
            ->getManager()
            ->getRepository(Vole::class);
            $vole = $rep->find($idd);

            $reservation->setUsers($user);
            $reservation->setVole($vole);

            $dt = new DateTime();


            $reservation->setDate($dt);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();

            
            $repositorysss = $this->getDoctrine()
                            ->getManager()
                            ->getConnection();
                            $sql='select * from vole ';

        $volee = $repositorysss->prepare($sql);
        $volee->execute();
        $dttt = new DateTime();
        $dtttt = $dttt->format('Y-m-d H:i:s');
        if(null==$volee){
            throw new NotFoundHttpException("vole vide.");
        }
        return $this->render('dashbord/acceuil.html.twig',array(
            'vole' => $volee,'date'=>$dtttt
        ));   
    }*/
}
