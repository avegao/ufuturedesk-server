<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Exam
 *
 * @package Ufuturelabs\Ufuturedesk\MainBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="exams")
 */
class Exam {

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="exam_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=30, nullable=false)
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="string", length=255, nullable=true)
	 */
	private $description;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date", type="datetime", nullable=false)
	 */
	private $date;

	/**
	 * @var double
	 *
	 * @ORM\Column(name="calification", type="decimal", precision=2, scale=2, nullable=true)
	 */
	private $calification;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Percentage
	 *
	 * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Percentage")
	 * @ORM\JoinColumn(name="percentage", referencedColumnName="percentage_id")
	 */
	private $percentage;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject
	 *
	 * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject")
	 * @ORM\JoinColumn(name="subject", referencedColumnName="subject_id")
	 */
	private $subject;

	/**
	 * @param float $calification
	 */
	public function setCalification($calification)
	{
		$this->calification = $calification;
	}

	/**
	 * @return float
	 */
	public function getCalification()
	{
		return $this->calification;
	}

	/**
	 * @param \DateTime $date
	 */
	public function setDate($date)
	{
		$this->date = $date;
	}

	/**
	 * @return \DateTime
	 */
	public function getDate()
	{
		return $this->date;
	}

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
	 * @param \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Percentage $percentage
	 */
	public function setPercentage(\Ufuturelabs\Ufuturedesk\MainBundle\Entity\Percentage $percentage)
	{
		$this->percentage = $percentage;
	}

	/**
	 * @return \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Percentage
	 */
	public function getPercentage()
	{
		return $this->percentage;
	}

	/**
	 * @param \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject $subject
	 */
	public function setSubject(\Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject $subject)
	{
		$this->subject = $subject;
	}

	/**
	 * @return \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject
	 */
	public function getSubject()
	{
		return $this->subject;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

} 