<?php
/**
 * Created by PhpStorm.
 * User: davidgoubau
 * Date: 07/09/15
 * Time: 16:40
 */

namespace SGT\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContentController extends Controller
{
    // La page d'accueil
    public function indexAction()
    {
        return $this->get('templating')->renderResponse('SGTContentBundle:Content:index.html.twig');
    }
}