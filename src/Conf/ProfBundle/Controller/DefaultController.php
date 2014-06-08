<?php

namespace Conf\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ConfProfBundle:Default:index.html.twig', array('name' => $name));
    }
}
