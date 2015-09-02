<?php

namespace SGT\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SGTNewsBundle:Default:index.html.twig', array('name' => $name));
    }
}
