<?php
/**
 * Created by PhpStorm.
 * User: davidgoubau
 * Date: 07/09/15
 * Time: 16:34
 */

namespace SGT\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    // La page d'accueil
    public function indexAction()
    {
        return $this->get('templating')->renderResponse('SGTAdminBundle:Admin:index.html.twig');
    }
}