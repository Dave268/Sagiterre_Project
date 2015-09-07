<?php
/**
 * Created by PhpStorm.
 * User: davidgoubau
 * Date: 07/09/15
 * Time: 10:38
 */

namespace SGT\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InfosController extends Controller
{
    // La page d'accueil
    public function indexAction()
    {
        return $this->get('templating')->renderResponse('SGTContentBundle:Infos:index.html.twig');
    }
}