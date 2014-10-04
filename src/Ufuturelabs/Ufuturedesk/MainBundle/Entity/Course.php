<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
	 * @ORM\Column(name="course_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", unique=true, length=255, nullable=false)
	 *
	 * @Assert\NotBlank()
	 */
	private $name;

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
