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
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255, nullable=false)
	 *
	 * @Assert\NotBlank()
	 */
	private $name;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course
	 *
	 * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course")
	 * @ORM\JoinColumn(name="course", referencedColumnName="id")
	 *
	 * @Assert\NotBlank()
	 */
	private $course;

    /**
     * @return string Modality's name
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
	 * @param \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course $course
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