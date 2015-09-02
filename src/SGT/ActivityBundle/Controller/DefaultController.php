<?php

namespace SGT\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SGTActivityBundle:Default:index.html.twig', array('name' => $name));
    }
}
