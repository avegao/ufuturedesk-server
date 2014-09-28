<?php

namespace Ufuturelabs\Ufuturedesk\TeacherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ufuturelabs\Ufuturedesk\MainBundle\Entity\User;

/**
 * Class Teacher
 *
 * @package Ufuturelabs\Ufuturedesk\TeacherBundle
 *
 * @ORM\Entity
 * @ORM\Table(name="teachers")
 */
class Teacher extends User
{

	/**
	 * @var string Teacher's name
	 *
	 * @ORM\Column(name="name", type="string", length=30, nullable=false)
	 *
	 * @Assert\NotBlank()
	 */
	private $name;

	/**
	 * @var string Teacher's surname
	 *
	 * @ORM\Column(name="surname", type="string", length=30, nullable=false)
	 *
	 * @Assert\NotBlank()
	 */
	private $surname;

	/**
	 * @var string Teacher's email
	 *
	 * @ORM\Column(name="email", type="string", length=50, nullable=false)
	 *
	 * @Assert\NotBlank()
	 * @Assert\Email(checkMX=true)
	 */
	private $email;

	/**
	 * @var string Teacher's email
	 *
	 * @ORM\Column(name="address", type="string", length=150, nullable=false)
	 *
	 * @Assert\NotBlank()
	 */
	private $address;

	/**
	 * @var string Teacher's telephone number
	 *
     * @ORM\Column(name="telephone", type="string", length=20, nullable=false)
     *
	 * @Assert\NotBlank()
	 */
	private $telephone;

    /**
     * Setter username for Teacher entity
     *
     * In the Teacher entity the username is the teacher's email
     *
     * @param \string $email Teacher's email
     *
     * @return void
     */
    public function setUserName($email)
    {
        $this->userName = $email;
    }

    /**
     * Getter username for Teacher entity
     *
     * In the Teacher entity the username is the teacher's email
     *
     * @return string Teacher's email
     */
    public function getUserName()
    {
        return $this->getEmail();
    }

	/**
     * Setter for teacher's address
     *
	 * @param string $address
	 */
	public function setAddress($address)
	{
		$this->address = $address;
	}

	/**
	 * @return string
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
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
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $surname
	 */
	public function setSurname($surname)
	{
		$this->surname = $surname;
	}

	/**
	 * @return string
	 */
	public function getSurname()
	{
		return $this->surname;
	}

    /**
     * @param string $telephone
     */
	public function setTelephone($telephone)
	{
		$this->telephone = $telephone;
	}

	/**
	 * @return string
	 */
	public function getTelephone()
	{
		return $this->telephone;
	}

    /**
     * @return array
     */
    public function getRoles()
	{
		return array("ROLE_USER", "ROLE_TEACHER");
	}

    /**
     * @return string
     */
    public function __toString()
	{
		return $this->getName()." ".$this->getSurname();
	}
}