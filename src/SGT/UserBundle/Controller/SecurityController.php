<?php
// src/SGT/UserBundle/Controller/SecurityController.php;

namespace SGT\UserBundle\Controller;

use SGT\UserBundle\Entity\User;
use SGT\UserBundle\Form\UserType;
use SGT\UserBundle\Form\AdminUserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        // Si le visiteur est déjà identifié, on le redirige vers la zone admin
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
          return $this->redirectToRoute('sgt_core_home');
        }
        
        // Le service authentication_utils permet de récupérer le nom d'utilisateur
        // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
        // (mauvais mot de passe par exemple)
        $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render('SGTUserBundle:Security:login.html.twig', array(
          'last_username' => $authenticationUtils->getLastUsername(),
          'error'         => $authenticationUtils->getLastAuthenticationError(),
        ));
    }

    public function registerAction(Request $request)
    {
        $user = new User();
            $form = $this->get('form.factory')->create(new UserType(), $user);

            if ($form->handleRequest($request)->isValid()) 
            {
                $pwd= $this->get('security.encoder_factory')->getEncoder($user)->encodePassword($user->getName(), $user->getSalt());
                
                $user->defineRest($pwd);
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Un nouveau membre à bien été rajouté');

                return $this->redirect($this->generateUrl('register'));
            }
        

        return $this->render('SGTUserBundle:User:add.html.twig', array(
          'form' => $form->createView(),
        ));
    }

    public function modifyAction($id, Request $request)
    {
        $user = $this->getDoctrine()->getManager()->getRepository('SGTUserBundle:User')->findOneBy(array('id' => $id));

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
        {
            $form = $this->get('form.factory')->create(new UserType(), $user);
        }

        if ($form->handleRequest($request)->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($user);
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Un nouveau membre à bien été rajouté');

          return $this->redirect($this->generateUrl('register'));
        }

        return $this->render('SGTUserBundle:User:add.html.twig', array(
          'form' => $form->createView(),
        ));
    }
}