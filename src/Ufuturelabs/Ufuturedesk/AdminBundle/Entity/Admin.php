<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Ufuturelabs\Ufuturedesk\MainBundle\Entity\User;

/**
 * Class Admin
 *
 * @package Ufuturelabs\Ufuturedesk\AdminBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="administrators")
 */
class Admin extends User {

	/**
	 * @var string
	 *
	 * @ORM\Column(name="permissions", type="string", length=255, nullable=true)
	 */
	private $permissions;

	/**
	 * @param string $permissions
	 */
	public function setPermissions($permissions)
	{
		$this->permissions = $permissions;
	}

	/**
	 * @return string
	 */
	public function getPermissions()
	{
		return $this->permissions;
	}

	public function getRoles()
	{
		return array("ROLE_ADMIN");
	}

	public function getType()
	{
		return "admin";
	}

}