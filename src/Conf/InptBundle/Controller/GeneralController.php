<?php

namespace Conf\InptBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GeneralController extends Controller
{
    public function indexAction($page)
    {	
    	$page='ConfInptBundle:General:'.$page.".html.twig";
        return $this->render($page);
    }
    
}