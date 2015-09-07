<?php
/**
 * Created by PhpStorm.
 * User: davidgoubau
 * Date: 07/09/15
 * Time: 16:40
 */

namespace SGT\ContentBundle\Controller;

use SGT\ContentBundle\Entity\Content;
use SGT\ContentBundle\Entity\ContentRole;
use SGT\ContentBundle\Form\ContentType;
use SGT\ContentBundle\Form\ContentRoleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContentController extends Controller
{
    // La page d'accueil
    public function indexAction(Request $request)
    {
        $content = new Content();
        $form = $this->get('form.factory')->create(new ContentType(), $content);

        if($form->handlerequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($content);
            $em->flush();
        }
        return $this->get('templating')->renderResponse('SGTContentBundle:Content:index.html.twig', array(
            'form'  => $form->createView()
        ));
    }

    public function roleAction(Request $request)
    {
        $role = new ContentRole();
        $form = $this->get('form.factory')->create(new ContentRoleType(), $role);

        if($form->handlerequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($role);
            $em->flush();
        }
        return $this->get('templating')->renderResponse('SGTContentBundle:Content:role.html.twig', array(
            'form'  => $form->createView()
        ));
    }
}