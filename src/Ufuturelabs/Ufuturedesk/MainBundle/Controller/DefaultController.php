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
	}

	public function renderHeaderAction($title = "uFutureDesk")
	{
		$user = $this->get('security.context')->getToken()->getUser();

		return $this->render("::header.html.twig", array(
				"user" => $user,
				"title" => $title,
		));
	}
}
