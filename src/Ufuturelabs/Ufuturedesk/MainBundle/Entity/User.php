<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User
 *
 * @package Ufuturelabs\Ufuturedesk\MainBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="user_type", type="string")
 * @ORM\DiscriminatorMap({
 *      "admin"   = "Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin",
 *      "teacher" = "Ufuturelabs\Ufuturedesk\TeacherBundle\Entity\Teacher",
 * 		"student" = "Ufuturelabs\Ufuturedesk\StudentBundle\Entity\Student"
 * })
 *
 */
class User implements UserInterface {

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="user_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="user_name", type="string", unique=true, length=30, nullable=false)
	 */
	private $userName;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="password", type="string", length=255, nullable=false)
	 */
	private $password;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="salt", type="string", length=255, nullable=false)
	 */
	private $salt;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="photo", type="string", length=255, nullable=true)
	 */
	private $photo;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->password = $password;
	}

	/**
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param string $salt
	 */
	public function setSalt()
	{
		$this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
	}

	/**
	 * @return string
	 */
	public function getSalt()
	{
		return $this->salt;
	}

	/**
	 * @param string $userName
	 */
	public function setUserName($userName)
	{
		$this->userName = $userName;
	}

	/**
	 * @return string
	 */
	public function getUserName()
	{
		return $this->userName;
	}

	/**
	 * @param string $userType
	 */
	public function setUserType($userType)
	{
		$this->userType = $userType;
	}

	/**
	 * @return string
	 */
	public function getUserType()
	{
		return $this->userType;
	}

	public function eraseCredentials()
	{
	}

	public function getRoles()
	{
		return array("ROLE_USER");
	}

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @param string $photo
	 */
	public function setPhoto($photo)
	{
		$this->photo = $photo;
	}

	/**
	 * @return string
	 */
	public function getPhoto()
	{
		return $this->photo;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->userName;
	}

} 