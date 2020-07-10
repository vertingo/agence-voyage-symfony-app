<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {   $users = new Users();
        $form = $this->createForm(RegistrationType::class, $users);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $hash=$encoder->encodePassword($users, $users->getPassword());
            $users->setPassword($hash);
            $manager->persist($users);
            $manager->flush();

            return $this->redirectToRoute('login');
        }

        return $this->render('security/inscription.html.twig',['form' => $form->createView()]);
        
    }
    /**
     * @Route("/login", name="login")
     */
    public function login(){

        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/logout", name="logout")
     */

     public function logout(){}
}
