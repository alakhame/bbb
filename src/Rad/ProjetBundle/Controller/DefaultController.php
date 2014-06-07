<?php


namespace Rad\ProjetBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
         return $this->render('RadProjetBundle:Default:configadmin.html.twig');
    }  
	
	public function validFormAction()
    {	$nom="hamid";
	   $req=$this->get("request");
	   if($req->getMethod()=='POST');
	   { $nom=$_POST['login'];}
	   
        return $this->render('RadProjetBundle:Default:test.html.twig',array('nom'=>$nom));
    }
	
	
	
}
