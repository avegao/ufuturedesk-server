<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
	public function loginAction()
	{
		$request = $this->container->get('request_stack')->getCurrentRequest();
		$session = $request->getSession();

		$error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR, $session->get(SecurityContext::AUTHENTICATION_ERROR));

		return $this->render('MainBundle:Default:login.html.twig', array(
			"last_username" => $session->get(SecurityContext::LAST_USERNAME),
			"error" => $error
		));

		//return $this->render('MainBundle:Default:login.html.twig');
	}
}
