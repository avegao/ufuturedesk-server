<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Modality
 *
 * @package Ufuturelabs\Ufuturedesk\MainBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="modalities")
 */
class Modality {

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="modality_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=20, nullable=false)
	 */
	private $name;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Grade
	 *
	 * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Grade")
	 * @ORM\JoinColumn(name="grade", referencedColumnName="grade_id")
	 */
	private $grade;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
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

} 