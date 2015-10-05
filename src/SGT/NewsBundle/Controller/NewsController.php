<?php
//src/SGT/NewsBundle/Controller/NewsController.php

namespace SGT\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SGT\MediaBundle\Entity\News;
use SGT\MediaBundle\Form\NewsType;

class NewsController extends Controller
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
	    $listNews = $this->getDoctrine()
	      ->getManager()
	      ->getRepository('SGTNewsBundle:News')
	      ->getNews($page, $nbPerPage)
	    ;

	    $nbPages = ceil(count($listNews)/$nbPerPage);

	    // Si la page n'existe pas, on retourne une 404
	    if ($page > $nbPages) {
	      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
	    }


   		//pour l'insertion d'un nouveau média
	    $news = new News();
	    $form = $this->createForm(new NewsType(), $media);

	    if ($form->handleRequest($request)->isValid())
	    {
		    $em = $this->getDoctrine()->getManager();
		    $em->persist($news);
		    $em->flush();
		}
        return $this->get('templating')->renderResponse('SGTNewsBundle:News:index.html.twig', array(
            'form'  => $form->createView(),
            'listNews' => $listNews,
     	 	'nbPages'     => $nbPages,
      		'page'        => $page
        ));
    }
}