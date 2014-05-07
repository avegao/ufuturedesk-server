<?php
namespace Ufuturelabs\Ufuturedesk\SyncBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;

class UserController extends FOSRestController
{
	/**
	 * Get user info
	 *
	 * @ApiDoc(
	 * 		description = "Gets user info for a username and a password",
	 * 		statusCodes = {
	 * 			200 = "Returned when all is successful",
	 * 			401 = "Returned when the token is wrong"
	 * 		}
	 * )
	 *
	 * @param $token String Session token neccesary for do anything
	 */
	public function getUserAction($token)
	{
		$em = $this->container->get('doctrine.orm.entity_manager');

		$query = $em->createQuery('SELECT u FROM SyncBundle:SyncToken u WHERE u.tokenId = :token');
		$query->setParameter('token', $token);
		$tokenObject = $query->getOneOrNullResult();

		if ($tokenObject != null && $tokenObject->getExpirationDate() > new \DateTime("now"))
		{
			$user = $tokenObject->getUser();

			$view = View::create();
			$view->setStatusCode(Response::HTTP_OK);

			if ($user->getRoles()[0] == "ROLE_ADMIN")
			{
				$data = array(
					"id" => $user->getId(),
					"username" => $user->getUserName(),
					"type" => "admin",
					"photo" => (($user->getPhotoPath()) == null ? "" : $user->getPhotoPath()),
					"permissions" => array(
						"superuser" => true,
						//TODO: Finish admin permissions
					),
				);
			}
			elseif ($user->getRoles()[0] == "ROLE_STUDENT")
			{
				$data = array(
					"id" => $user->getId(),
					"username" => $user->getUserName(),
					"type" => "student",
					"name" => $user->getName(),
					"surname" => $user->getSurname(),
					"email" => $user->getEmail(),
					"telephone" => $user->getTelephone(),
					"address" => $user->getAddress(),
					"course_id" => $user->getCourse()->getId()
				);
			}
			elseif ($user->getRoles()[0] == "ROLE_TEACHER")
			{
				$data = array(
					"id" => $user->getId(),
					"username" => $user->getUserName(),
					"type" => "student",
					"name" => $user->getName(),
					"surname" => $user->getSurname(),
					"email" => $user->getEmail(),
					"telephone" => $user->getTelephone(),
					"address" => $user->getAddress()
				);
			}
			else
			{
				$view->setStatusCode(Response::HTTP_BAD_REQUEST);
				$data = array(
					"error" => array(
						"code" => Response::HTTP_BAD_REQUEST,
						"message" => "User type not found or not supported. Update your application"
					)
				);
			}

			$view->setData($data);

			return $this->container->get('fos_rest.view_handler')->handle($view);
		}
		else
		{
			$view = View::create();
			$view->setStatusCode(Response::HTTP_UNAUTHORIZED);

			return $this->container->get('fos_rest.view_handler')->handle($view);
		}
	}
} 