<?php

namespace Conf\InptBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ConfInptBundle:Default:conx.html.twig');
    }
}
