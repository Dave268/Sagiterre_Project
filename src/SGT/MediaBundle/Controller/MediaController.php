<?php
//src/SGT/MediaBundle/Controller/MediaController.php

namespace SGT\MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SGT\MediaBundle\Entity\Media;
use SGT\MediaBundle\Form\MediaType;

class MediaController extends Controller
{
    // La page d'accueil
    public function indexAction(Request $request)
    {
	    $media = new Media();
	    $form = $this->createForm(new MediaType(), $media);

	    if ($form->handleRequest($request)->isValid())
	    {
		    $media->upload();
		    $em = $this->getDoctrine()->getManager();
		    $em->persist($media);
		    $em->flush();
		}
        return $this->get('templating')->renderResponse('SGTMediaBundle:Media:index.html.twig', array(
            'form'  => $form->createView()
        ));
    }
}