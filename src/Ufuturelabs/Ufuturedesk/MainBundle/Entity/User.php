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
	 * @ORM\Column(name="user_name", type="string", unique=true, length=30)
	 */
	protected $userName;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="password", type="string", length=255, nullable=false)
	 */
	protected $password = "no_password_yet";

	/**
	 * @var string
	 *
	 * @ORM\Column(name="salt", type="string", length=255, nullable=false)
	 */
	protected $salt = "no_salt_yet";

	/**
	 * @var string
	 *
	 * @ORM\Column(name="photo", type="string", length=255, nullable=true)
	 */
	protected $photoPath;

//	/**
//	 * @var UploadedImage
//	 *
//	 * @Assert\Image()
//	 */
//	protected $photo;

    /**
     * @var boolean Account state
     *
     * If the value is true, the account is active, but if the value is false the account
     * may is inactive, with lost password, etc.
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    protected $active = true;

    /**
     * @var string URL sent to user's email
     *
     * URL sent to user's email to activate the account or recover the password.
     * It's NULL if the account is active.
     *
     * @ORM\Column(name="activation_route", type="string", nullable=true, length=255)
     */
    protected $activationRoute;

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

//	/**
//	 * @return UploadedImage
//	 */
//	public function getPhoto()
//	{
//		return $this->photo;
//	}
//
//	/**
//	 * @param UploadedImage $photo
//	 */
//	public function setPhoto(UploadedImage $photo = null)
//	{
//		$this->photo = $photo;
//	}
//
	/**
	 * @param string $photoPath
	 */
	public function setPhotoPath($photoPath)
	{
		$this->photoPath = $photoPath;
	}

    /**
     * @param string $activationRoute
     */
    public function setActivationRoute($activationRoute)
    {
        $this->activationRoute = $activationRoute;
    }

    /**
     * @return string
     */
    public function getActivationRoute()
    {
        return $this->activationRoute;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->userName;
	}

    /**
     * Upload the user's photo
     */
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

    /**
     * Generate the URL to active the user account
     *
     * @return string Activation URL
     */
    public static function generateActivationRoute()
    {
        return base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

    /**
     * Disable user
     *
     * Set to false $active and call $this->resetPassword.
     * This should not be used to recover the password.
     */
    public function disableUser()
    {
        $this->active = false;
        $this->resetPassword();
    }

    /**
     * Reset password and salt
     *
     * If it will be used to recover password, after  you should call to User::generateActivationRoute
     * and send an email with the instructions.
     */
    public function resetPassword()
    {
        $this->password = "no_password_yet";
        $this->salt = "no_salt_yet";
    }
} 