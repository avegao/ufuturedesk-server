<?php

namespace Ufuturelabs\Ufuturedesk\StudentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Ufuturelabs\Ufuturedesk\MainBundle\Entity\User;

/**
 * Class Student
 *
 * @package Ufuturelabs\Ufuturedesk\StudentBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="students")
 */
class Student extends User {

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=30, nullable=false)
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="surname", type="string", length=30, nullable=false)
	 */
	private $surname;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", unique=true, length=30, nullable=false)
	 */
	private $email;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Telephone
	 *
	 * @ORM\OneToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Telephone")
	 * @ORM\JoinColumn(name="telephone", referencedColumnName="telephone_id")
	 */
	private $telephone;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="address", type="string", length=150, nullable=false)
	 */
	private $address;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="photo", type="string", length=255, nullable=true)
	 */
	private $photo;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Grade
	 *
	 * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Grade")
	 * @ORM\JoinColumn(name="grade", referencedColumnName="grade_id")
	 */
	private $grade;

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
	 * @param \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Grade $grade
	 */
	public function setGrade(\Ufuturelabs\Ufuturedesk\MainBundle\Entity\Grade $grade)
	{
		$this->grade = $grade;
	}

	/**
	 * @return \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Grade
	 */
	public function getGrade()
	{
		return $this->grade;
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
		return array("ROLE_USER", "ROLE_STUDENT");
	}

} 