<?php
/**
 * Created by PhpStorm.
 * User: davidgoubau
 * Date: 02/09/15
 * Time: 17:38
 */

namespace SGT\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActivityController extends Controller
{
    // La page d'accueil
    public function overviewAction()
    {
        return $this->get('templating')->renderResponse('SGTActivityBundle:Activity:overview.html.twig');
    }
}