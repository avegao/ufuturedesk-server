<?php

namespace Ufuturelabs\Ufuturedesk\OAuthBundle\Entity;

use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AuthCode for FOSOAuthServerBundle
 * @package Ufuturelabs\Ufuturedesk\OAuthBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="oauth_auth_code")
 */
class AuthCode extends BaseAuthCode
{
    /**
     * @var integer
     *
     * @ORM\Column(name="refresh_token_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \Ufuturelabs\Ufuturedesk\OAuthBundle\Entity\Client
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\OAuthBundle\Entity\Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="client_id")
     */
    protected $client;

    /**
     * @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\MainBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    protected $user;
} 