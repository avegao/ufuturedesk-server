<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Telephone
 *
 * @package Ufuturelabs\Ufuturedesk\MainBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="telephones")
 */
class Telephone {

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="telephone_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="telephone", type="string", length=15, nullable=false)
	 */
	private $telephone;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="string", length=50, nullable=true)
	 */
	private $description;

	/**
	 * @param string $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
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