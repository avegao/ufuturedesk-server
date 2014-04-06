<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Listener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class LoginListener implements AuthenticationSuccessHandlerInterface
{
	private $router;
	private $security;

	public function __construct(Router $router, SecurityContext $security)
	{
		$this->router = $router;
		$this->security = $security;
	}

	public function onAuthenticationSuccess(Request $request, TokenInterface $token)
	{
		if ($this->security->isGranted('ROLE_ADMIN'))
		{
			$redirect = $this->router->generate("admin_index");
		}
		elseif ($this->security->isGranted('ROLE_TEACHER'))
		{
			$redirect = $this->router->generate("teacher_index");
		}
		elseif ($this->security->isGranted('ROLE_STUDENT'))
		{
			$redirect = $this->router->generate("student_index");
		}
		else
		{
			$redirect = $this->router->generate("user_login");
		}

		return new RedirectResponse($redirect);
	}
} 
