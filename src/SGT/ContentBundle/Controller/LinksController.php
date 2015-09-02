<?php
/**
 * Created by PhpStorm.
 * User: davidgoubau
 * Date: 02/09/15
 * Time: 17:51
 */

namespace SGT\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LinksController extends Controller
{
    // La page d'accueil
    public function indexAction()
    {
        return $this->get('templating')->renderResponse('SGTContentBundle:Links:index.html.twig');
    }
}