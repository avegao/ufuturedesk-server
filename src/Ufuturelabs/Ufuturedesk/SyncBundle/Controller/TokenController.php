<?php

namespace Ufuturelabs\Ufuturedesk\SyncBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ufuturelabs\Ufuturedesk\SyncBundle\Entity\SyncToken;

class TokenController extends FOSRestController
{
	/**
	 * Get session token. This token expires at 3 hours
	 *
	 * @ApiDoc(
	 * 		resources = true,
	 * 		description = "Get session token. This token expires at 3 hours",
	 * 		output = "Ufuturelabs\Ufuturedesk\SyncBundle\SyncToken",
	 * 		requeriments = {
	 * 			{
	 * 				"name": "username",
	 * 				"dataType": "string",
	 * 				"description": "Username to get the token"
	 * 			}
	 * 		},
	 * 		statusCodes = {
	 * 			200 = "Returned when all is successful",
	 * 			403 = "Returned when username or password are wrong",
	 * 			404 = "Returned when the user not exists"
	 * 		}
	 * )
	 */
	public function getTokenAction(Request $request)
	{
		$em = $this->container->get('doctrine.orm.entity_manager');

		$username = $request->query->get('username');
		$password = $request->query->get('password');

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

				$token = new SyncToken();
				$token->newToken($user);

				$em->persist($token);
				$em->flush();

				$view->setData(array(
					"token" => $token->getTokenId(),
					"expiration_date" => $token->getExpirationDate()
				));

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