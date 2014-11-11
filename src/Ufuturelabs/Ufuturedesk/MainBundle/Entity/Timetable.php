<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Timetable
 *
 * @package Ufuturelabs\Ufuturedesk\MainBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="subjects_timetables")
 */
class Timetable
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
	 * @var integer
	 *
	 * @ORM\Column(name="day", type="integer", nullable=false)
	 *
	 * @Assert\Length(min=1, max=7)
	 */
	private $day;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="start_time", type="string", nullable=false)
	 *
	 * @Assert\Time()
	 */
	private $startTime;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="end_time", type="string", nullable=false)
	 *
	 * @Assert\Time()
	 */
	private $endTime;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="classroom", type="string", length=30, nullable=true)
	 */
	private $classroom;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject
	 *
	 * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject")
	 * @ORM\JoinColumn(name="subject", referencedColumnName="id")
	 */
	private $subject;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

	/**
	 * @param string $classroom
	 */
	public function setClassroom($classroom)
	{
		$this->classroom = $classroom;
	}

	/**
	 * @return string
	 */
	public function getClassroom()
	{
		return $this->classroom;
	}

	/**
	 * @param int $day
	 */
	public function setDay($day)
	{
		$this->day = $day;
	}

	/**
	 * @return int
	 */
	public function getDay()
	{
		return $this->day;
	}

	/**
	 * @param \DateTime $endTime
	 */
	public function setEndTime($endTime)
	{
		$this->endTime = $endTime;
	}

	/**
	 * @return \DateTime
	 */
	public function getEndTime()
	{
		return $this->endTime;
	}

	/**
	 * @param \DateTime $startTime
	 */
	public function setStartTime($startTime)
	{
		$this->startTime = $startTime;
	}

	/**
	 * @return \DateTime
	 */
	public function getStartTime()
	{
		return $this->startTime;
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