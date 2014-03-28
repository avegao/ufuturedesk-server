<?php

namespace Ufuturelabs\Ufuturedesk\StudentBundle\Entity;


class Delay {

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="delay_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date", type="datetime", nullable=false)
	 */
	private $date;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject
	 *
	 * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject")
	 * @ORM\JoinColumn(name="subject_id", referencedColumnName="subject_id")
	 */
	private $subject;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\StudentBundle\Student
	 *
	 * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\StudentBundle\Entity\Student")
	 * @ORM\JoinColumn(name="student", referencedColumnName="user_id")
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