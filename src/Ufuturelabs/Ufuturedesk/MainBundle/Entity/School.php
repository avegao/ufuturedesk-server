<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class School
 *
 * @package Ufuturelabs\Ufuturedesk\MainBundle\Entity
 *
 * @ORM\Entity(repositoryClass="Ufuturelabs\Ufuturedesk\MainBundle\Entity\SchoolRepository")
 * @ORM\Table(name="school")
 */
class School
{

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=30, nullable=false)
	 * @ORM\Id
	 *
	 * @Assert\NotBlank()
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="address", type="string", length=150, nullable=false)
	 *
	 * @Assert\NotBlank()
	 */
	private $address;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="telephone", type="string", length=15, nullable=false)
	 *
	 * @Assert\NotBlank()
	 */
	private $telephone;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="fax", type="string", length=15, nullable=true)
	 */
	private $fax;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", length=50, nullable=false)
	 *
	 * @Assert\NotBlank()
	 * @Assert\Email(checkMX=true)
	 */
	private $email;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="logo", type="string", length=255, nullable=true)
	 *
	 * @Assert\Image()
	 */
	private $logo;

	/**
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

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
	 * @param string $fax
	 */
	public function setFax($fax)
	{
		$this->fax = $fax;
	}

	/**
	 * @return string
	 */
	public function getFax()
	{
		return $this->fax;
	}

	/**
	 * @param string $logo
	 */
	public function setLogo($logo)
	{
		$this->logo = $logo;
	}

	/**
	 * @return string
	 */
	public function getLogo()
	{
		return $this->logo;
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

} 