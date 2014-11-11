<?php

namespace Ufuturelabs\Ufuturedesk\StudentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Absence
 *
 * @package Ufuturelabs\Ufuturedesk\StudentBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="absences")
 */
class Absence
{

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date", type="datetime", nullable=false)
	 *
	 * @Assert\DateTime()
	 */
	private $date;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject
	 *
	 * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject")
	 * @ORM\JoinColumn(name="subject", referencedColumnName="id")
	 */
	private $subject;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\StudentBundle\Entity\Student
	 *
	 * @ORM\ManyToOne(targetEntity="\Ufuturelabs\Ufuturedesk\StudentBundle\Entity\Student")
	 * @ORM\JoinColumn(name="student", referencedColumnName="id")
	 */
	private $student;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
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
	 * @param \Ufuturelabs\Ufuturedesk\StudentBundle\Entity\Student $student
	 */
	public function setStudent(\Ufuturelabs\Ufuturedesk\StudentBundle\Entity\Student $student)
	{
		$this->student = $student;
	}

	/**
	 * @return \Ufuturelabs\Ufuturedesk\StudentBundle\Entity\Student
	 */
	public function getStudent()
	{
		return $this->student;
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

} 