<?php

namespace SGT\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SGTAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
