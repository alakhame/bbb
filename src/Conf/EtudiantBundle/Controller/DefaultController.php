<?php

namespace Conf\EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ConfEtudiantBundle:Default:index.html.twig', array('name' => $name));
    }
}
