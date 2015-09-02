<?php
/**
 * Created by PhpStorm.
 * User: davidgoubau
 * Date: 02/09/15
 * Time: 17:01
 */

namespace SGT\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoreController extends Controller
{
    // La page d'accueil
    public function indexAction()
    {
        return $this->get('templating')->renderResponse('SGTCoreBundle:Core:index.html.twig');
    }
}