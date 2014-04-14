<?php

namespace Ufuturelabs\Ufuturedesk\StudentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ufuturelabs\Ufuturedesk\MainBundle\Entity\User;

/**
 * Class Student
 *
 * @package Ufuturelabs\Ufuturedesk\StudentBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="students")
 */
class Student extends User
{

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=30, nullable=false)
	 *
	 * @Assert\NotBlank()
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="surname", type="string", length=30, nullable=false)
	 *
	 * @Assert\NotBlank()
	 */
	private $surname;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", unique=true, length=30, nullable=false)
	 *
	 * @Assert\NotBlank()
	 * @Assert\Email(checkMX=true)
	 */
	private $email;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Telephone
	 *
	 * @ORM\OneToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Telephone")
	 * @ORM\JoinColumn(name="telephone", referencedColumnName="telephone_id")
	 *
	 * @Assert\NotBlank()
	 */
	private $telephone;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="address", type="string", length=150, nullable=false)
	 *
	 * @Assert\NotBlank()
	 */
	private $address;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course
	 *
	 * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course")
	 * @ORM\JoinColumn(name="course", referencedColumnName="course_id")
	 */
	private $course;

	/**
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
	 * @param \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course $course
	 */
	public function setGrade(\Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course $course)
	{
		$this->course = $course;
	}

	/**
	 * @return \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Grade
	 */
	public function getCourse()
	{
		return $this->course;
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
	 * @param \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Telephone $telephone
	 */
	public function setTelephone(\Ufuturelabs\Ufuturedesk\MainBundle\Entity\Telephone $telephone)
	{
		$this->telephone = $telephone;
	}

	/**
	 * @return \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Telephone
	 */
	public function getTelephone()
	{
		return $this->telephone;
	}

	public function getRoles()
	{
		return array("ROLE_STUDENT");
	}

	public function __toString()
	{
		return $this->getName()." ".$this->getSurname();
	}

} 