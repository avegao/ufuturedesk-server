<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Listener;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpKernel\Log\LoggerInterface;
use Symfony\Component\Routing\Router;

class LoginListener
{

	private $logger;
	private $router;

	/**
	 * @var string
	 */
	private $userType;

	public function __construct(LoggerInterface $logger, Router $router)
	{
		$this->logger = $logger;
		$this->router = $router;
	}

	public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
	{

		$user = $event->getAuthenticationToken()->getUser();

		$this->userType = $user->getUserType();

		$this->logger->debug("User Type: ".$this->userType);

	}

	public function onKernelResponse(FilterResponseEvent $event)
	{

		switch ($this->userType)
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