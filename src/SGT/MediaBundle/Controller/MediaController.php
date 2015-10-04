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
    public function indexAction($page, Request $request)
    {
    	if ($page < 1) 
    	{
      	throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
   		}

   		$nbPerPage = 10;

	    // On récupère notre objet Paginator
	    $listMedias = $this->getDoctrine()
	      ->getManager()
	      ->getRepository('SGTMediaBundle:Media')
	      ->getMedias($page, $nbPerPage)
	    ;

	    $nbPages = ceil(count($listMedias)/$nbPerPage);

	    // Si la page n'existe pas, on retourne une 404
	    if ($page > $nbPages) {
	      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
	    }


   		//pour l'insertion d'un nouveau média
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
            'form'  => $form->createView(),
            'listMedias' => $listMedias,
     	 	'nbPages'     => $nbPages,
      		'page'        => $page
        ));
    }
}