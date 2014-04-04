<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Listener;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpKernel\Log\LoggerInterface;
use Symfony\Component\Routing\Router;

class LoginListener
{
	private $router;
	private $user;

	/**
	 * @var string
	 */
	private $userType;

	public function __construct(Router $router)
	{
		$this->router = $router;
	}

	public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
	{

		$this->user = $event->getAuthenticationToken()->getUser();

	}

	public function onKernelResponse(FilterResponseEvent $event)
	{

		switch ($this->user->userType)
		{
			case "admin":

				$this->logger->debug("redirect to admin_index");

				$redirect = $this->router->generate("admin_index");
				$event->setResponse(new RedirectResponse($redirect));

				break;

			case "teacher":

				$redirect = $this->router->generate("teacher_index");
				$event->setResponse(new RedirectResponse($redirect));

				break;

			case "student":

				$redirect = $this->router->generate("student_index");
				$event->setResponse(new RedirectResponse($redirect));

				break;
		}

	}
} 
