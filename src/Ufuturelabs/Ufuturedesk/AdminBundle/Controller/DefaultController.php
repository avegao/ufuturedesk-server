<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();

    	$adminsNumber = $em->getRepository("MainBundle:User")->findAdminsNumber();
    	
		return $this->render("AdminBundle:Default:index.html.twig", array("adminsNumber" => $adminsNumber));
    }
    
    public function renderNavAction()
    {	
    	return $this->render("AdminBundle:Default:nav.html.twig");
    }
}
