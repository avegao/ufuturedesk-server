<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Task
 *
 * @package Ufuturelabs\Ufuturedesk\MainBundle\Entity
 *
 *
 * @ORM\Entity
 * @ORM\Table(name="tasks")
 */
class Task
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
	 * @ORM\Column(name="name", type="string", length=20, nullable=false)
	 *
	 * @Assert\NotBlank()
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
	 * @ORM\Column(name="creation_date", type="datetime", nullable=false)
	 *
	 * @Assert\DateTime()
	 */
	private $creationDate;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="delivery_date", type="datetime", nullable=false)
	 *
	 * @Assert\DateTime()
	 */
	private $deliveryDate;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="completion_date", type="datetime", nullable=true)
	 *
	 * @Assert\DateTime()
	 */
	private $completionDate;

	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="done", type="boolean", nullable=true)
	 */
	private $done = false;

	/**
	 * @var double
	 *
	 * @ORM\Column(name="calification", type="decimal", precision=2, scale=2, nullable=true)
	 *
	 * @Assert\Length(min=0.00, max=10.00)
	 */
	private $calification;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject
	 *
	 * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject")
	 * @ORM\JoinColumn(name="subject", referencedColumnName="id")
	 *
	 * @Assert\NotBlank()
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
	 * @param \DateTime $completionDate
	 */
	public function setCompletionDate($completionDate)
	{
		$this->completionDate = $completionDate;
	}

	/**
	 * @return \DateTime
	 */
	public function getCompletionDate()
	{
		return $this->completionDate;
	}

	/**
	 * @param \DateTime $creationDate
	 */
	public function setCreationDate($creationDate)
	{
		$this->creationDate = $creationDate;
	}

	/**
	 * @return \DateTime
	 */
	public function getCreationDate()
	{
		return $this->creationDate;
	}

	/**
	 * @param \DateTime $deliveryDate
	 */
	public function setDeliveryDate($deliveryDate)
	{
		$this->deliveryDate = $deliveryDate;
	}

	/**
	 * @return \DateTime
	 */
	public function getDeliveryDate()
	{
		return $this->deliveryDate;
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
	 * @param boolean $done
	 */
	public function setDone($done)
	{
		$this->done = $done;
	}

	/**
	 * @return boolean
	 */
	public function getDone()
	{
		return $this->done;
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

} 