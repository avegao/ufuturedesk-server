<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ufuturelabs\Ufuturedesk\TeacherBundle\Entity\Teacher;

/**
 * Class Course
 *
 * @package Ufuturelabs\Ufuturedesk\MainBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="courses")
 */
class Course {

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

    /**
     * @var School
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\School")
     * @ORM\JoinColumn(name="school", referencedColumnName="id")
     */
    private $school;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", unique=true, length=255, nullable=false)
	 *
	 * @Assert\NotBlank()
	 */
	private $name;

    /**
     * @var Teacher
     *
     * @ORM\OneToOne(targetEntity="Ufuturelabs\Ufuturedesk\TeacherBundle\Entity\Teacher")
     * @ORM\JoinColumn(name="tutor", referencedColumnName="id")
     */
    private $tutor;

    /**
     * @return string Course's name
     */
    function __toString()
    {
        return $this->name;
    }

    /**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

    /**
     * @return School
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * @param School $school
     */
    public function setSchool($school)
    {
        $this->school = $school;
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
