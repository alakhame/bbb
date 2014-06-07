<?php

namespace Conf\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function regAction()
    {
        return $this->render('ConfUserBundle:Security:register.html.twig');
    }
}
