<?php

namespace Ufuturelabs\Ufuturedesk\SyncBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ufuturelabs\Ufuturedesk\MainBundle\Entity\User;

/**
 * Class SyncToken
 * @package Ufuturelabs\Ufuturedesk\SyncBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="sync_tokens")
 */
class SyncToken
{
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="sync_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="token_id", type="string", unique=true, length=255, nullable=false)
	 */
	private $tokenId;

	/**
	 * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\User
	 *
	 * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\User")
	 * @ORM\JoinColumn(name="user", referencedColumnName="user_id")
	 */
	private $user;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="creation_date", type="datetime", nullable=false)
	 */
	private $creationDate;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="expiration_date", type="datetime", nullable=false)
	 */
	private $expirationDate;

	/**
	 * @return \DateTime
	 */
	public function getCreationDate()
	{
		return $this->creationDate;
	}

	public function setCreationDate()
	{
		$this->creationDate = new \DateTime();
	}

	/**
	 * @return \DateTime
	 */
	public function getExpirationDate()
	{
		return $this->expirationDate;
	}


	public function setExpirationDate()
	{
		$this->expirationDate = new \DateTime('+3 hours');
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getTokenId()
	{
		return $this->tokenId;
	}


	public function setTokenId()
	{
		$this->tokenId = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
	}

	/**
	 * @return User
	 */
	public function getUser()
	{
		return $this->user;
	}

	/**
	 * @param User $user
	 */
	public function setUser(User $user)
	{
		$this->user = $user;
	}

	public function newToken(User $user)
	{
		$this->user = $user;
		$this->setTokenId();
		$this->setCreationDate();
		$this->setExpirationDate();
	}
} 