<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ufuturelabs\Ufuturedesk\MainBundle\Entity\User;

/**
 * Class Admin
 *
 * @package Ufuturelabs\Ufuturedesk\AdminBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="administrators")
 */
class Admin extends User
{
	public function getRoles()
	{
		return array("ROLE_ADMIN");
	}

	public function getType()
	{
		return "admin";
	}

}