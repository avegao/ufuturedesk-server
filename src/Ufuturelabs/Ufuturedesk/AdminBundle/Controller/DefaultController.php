<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
		return $this->render("AdminBundle:Default:index.html.twig");
    }
    
    public function renderNavAction()
    {	
    	return $this->render("AdminBundle:Default:nav.html.twig");
    }
}
