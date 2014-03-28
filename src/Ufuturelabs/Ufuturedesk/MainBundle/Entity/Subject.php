<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Subject
 *
 * @package Ufuturelabs\Ufuturedesk\MainBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="subjects")
 */
class Subject {

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="subject_id", type="integer", nullable=false)
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
	 * @var \Ufuturelabs\Ufuturedesk\TeacherBundle\Entity\Teacher
	 *
	 * @ORM\OneToOne(targetEntity="Ufuturelabs\Ufuturedesk\TeacherBundle\Entity\Teacher")
	 * @ORM\JoinColumn(name="teacher", referencedColumnName="user_id")
	 */
	private $teacher;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Modality
	 *
	 * @ORM\OneToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Modality")
	 * @ORM\JoinColumn(name="modality", referencedColumnName="modality_id")
	 */
	private $modality;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
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
	 * @param \Ufuturelabs\Ufuturedesk\TeacherBundle\Entity\Teacher $teacher
	 */
	public function setTeacher(\Ufuturelabs\Ufuturedesk\TeacherBundle\Entity\Teacher $teacher)
	{
		$this->teacher = $teacher;
	}

	/**
	 * @return \Ufuturelabs\Ufuturedesk\TeacherBundle\Entity\Teacher
	 */
	public function getTeacher()
	{
		return $this->teacher;
	}

	/**
	 * @param \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Modality $modality
	 */
	public function setModality(\Ufuturelabs\Ufuturedesk\MainBundle\Entity\Modality $modality)
	{
		$this->modality = $modality;
	}

	/**
	 * @return \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Modality
	 */
	public function getModality()
	{
		return $this->modality;
	}

} 