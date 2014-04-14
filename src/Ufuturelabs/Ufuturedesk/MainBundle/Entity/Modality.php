<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Modality
 *
 * @package Ufuturelabs\Ufuturedesk\MainBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="modalities")
 */
class Modality
{

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
	 *
	 * @Assert\NotBlank()
	 */
	private $name;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course
	 *
	 * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course")
	 * @ORM\JoinColumn(name="course", referencedColumnName="course_id")
	 *
	 * @Assert\NotBlank()
	 */
	private $course;

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
	public function setCourse(\Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course $course)
	{
		$this->course = $course;
	}

	/**
	 * @return \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course
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

} 