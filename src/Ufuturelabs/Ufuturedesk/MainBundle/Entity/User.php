<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 *
 * @package Ufuturelabs\Ufuturedesk\MainBundle\Entity
 *
 * @ORM\Entity(repositoryClass="Ufuturelabs\Ufuturedesk\MainBundle\Entity\UserRepository")
 * @ORM\Table(name="users")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "admin"   = "Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin",
 *      "teacher" = "Ufuturelabs\Ufuturedesk\TeacherBundle\Entity\Teacher",
 * 		"student" = "Ufuturelabs\Ufuturedesk\StudentBundle\Entity\Student"
 * })
 *
 */
class User implements UserInterface
{
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
	 *
	 * @Assert\NotBlank()
	 */
	protected $userName;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="password", type="string", length=255, nullable=false)
	 */
	protected $password;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="salt", type="string", length=255, nullable=false)
	 */
	protected $salt;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="photo", type="string", length=255, nullable=true)
	 */
	protected $photoPath;

	/**
	 * @var UploadedImage
	 *
	 * @Assert\Image()
	 */
	protected $photo;

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
	 * @param string $type
	 */
	public function setType($type)
	{
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
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
	 * @return string
	 */
	public function getPhotoPath()
	{
		return $this->photoPath;
	}

	/**
	 * @return UploadedImage
	 */
	public function getPhoto()
	{
		return $this->photo;
	}

	/**
	 * @param UploadedImage $photo
	 */
	public function setPhoto(UploadedImage $photo = null)
	{
		$this->photo = $photo;
	}

	/**
	 * @param string $photoPath
	 */
	public function setPhotoPath($photoPath)
	{
		$this->photoPath = $photoPath;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->userName;
	}

	public function uploadPhoto()
	{
		if ($this->photo == null)
		{
			return;
		}

		$path = __DIR__.'/../../../../../web/uploads/users/img';
		$name = uniqid().".".$this->photo->getClientOriginalExtension();

		$this->photo->move($path, $name);
		$this->setPhotoPath($name);
	}
} 