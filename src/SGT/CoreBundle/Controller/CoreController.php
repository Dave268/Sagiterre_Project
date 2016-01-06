<?php
/**
 * Created by PhpStorm.
 * User: davidgoubau
 * Date: 02/09/15
 * Time: 17:01
 */

namespace SGT\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SGT\ContentBundle\Entity\Content;

class CoreController extends Controller
{
    // La page d'accueil
    public function indexAction()
    {

    	$messageAccueil = $this->getDoctrine()
	      ->getManager()
	      ->getRepository('SGTContentBundle:Content')
	      ->getAccueil();
	      
    		if($messageAccueil == NULL)
    		{
    			$messageAccueil = "Il n'y a pas de message d'accueil d'enregistré";
    		}

    		return $this->get('templating')->renderResponse('SGTCoreBundle:Core:index.html.twig', array(
    			'messageAccueil' => $messageAccueil));
        
    }
}