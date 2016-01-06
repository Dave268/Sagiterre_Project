<?php
//src/SGT/NewsBundle/Controller/NewsController.php

namespace SGT\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SGT\NewsBundle\Entity\News;
use SGT\NewsBundle\Form\NewsType;
use SGT\UserBundl\Entity\User;

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
	    $session = $request->getSession();
	    if ($page > $nbPages) {
	      $session->getFlashBag()->add('info', 'La page de media ' . $page . ' n\'existe pas.');
	    }


   		//pour l'insertion d'un nouveau média
	    $news = new News();
	    $form = $this->createForm(new NewsType(), $news);

	    if ($form->handleRequest($request)->isValid())
	    {
	    	$news->setAuthor($this->get('security.token_storage')->getToken()->getUser());
		    $em = $this->getDoctrine()->getManager();
		    $em->persist($news);
		    $em->flush();
		}
        return $this->get('templating')->renderResponse('SGTNewsBundle:News:index.html.twig', array(
            'form'  		=> $form->createView(),
            'listNews' 		=> $listNews,
     	 	'nbPages'   	=> $nbPages,
      		'page'        	=> $page
        ));
    }
}