<?php
namespace Ufuturelabs\Ufuturedesk\SyncBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use Ufuturelabs\Ufuturedesk\SyncBundle\Entity\SyncToken;

class UserController extends FOSRestController
{
	/**
	 * Get user info
	 *
	 * @ApiDoc(
	 * 		resources = true,
	 * 		description = "Gets user info for a username and a password",
	 * 		output = "Ufuturelabs\Ufuturedesk\MainBundle\User",
	 * 		statusCodes = {
	 * 			200 = "Returned when all is successful",
	 * 			403 = "Returned when username or password are wrong"
	 * 		}
	 * )
	 */
	public function getUserAction()
	{
		$em = $this->container->get('doctrine.orm.entity_manager');
		$request = $this->container->get('request');
		$logger = $this->container->get('logger');

		$username = "admin";//trim($request->query->get('username'));
		$password = "admin";//trim($request->query->get('password'));

		//$logger->debug('username: '.$username.' - password: '.$password);

		$query = $em->createQuery('SELECT u FROM MainBundle:User u WHERE u.userName = :username');
		$query->setParameter('username', $username);
		$user = $query->getOneOrNullResult();

		if ($user)
		{
			$encoder = $this->container->get('security.encoder_factory')->getEncoder($user);

			$encodedPassword = $encoder->encodePassword($password, $user->getSalt());

			if ($user->getPassword() == $encodedPassword)
			{
				$view = View::create();
				$view->setStatusCode(Response::HTTP_OK);
				//$view->setData($user);
				// TEST para tokens
				$token = new SyncToken();
				$token->newToken($user);

				$em->persist($token);
				$em->flush();

				$data = array(
					"token" => $token->getTokenId(),
					"expiration_date" => $token->getExpirationDate(),
				);

				$view->setData($data);

				return $this->container->get('fos_rest.view_handler')->handle($view);
			}
			else
			{
				$view = View::create();
				$view->setStatusCode(Response::HTTP_FORBIDDEN);

				return $this->container->get('fos_rest.view_handler')->handle($view);
			}
		}
		else
		{
			$view = View::create();
			$view->setStatusCode(Response::HTTP_NOT_FOUND);

			return $this->container->get('fos_rest.view_handler')->handle($view);
		}
	}
} 