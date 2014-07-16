<?php

namespace Ufuturelabs\Ufuturedesk\OAuthBundle\Entity;

use FOS\OAuthServerBundle\Entity\AccessToken as BaseAccessToken;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AccessToken for FOSOAuthServerBundle
 * @package Ufuturelabs\Ufuturedesk\OAuthBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="oauth_access_token")
 */
class AccessToken extends BaseAccessToken
{
    /**
     * @var integer
     *
     * @ORM\Column(name="access_token_id", type="integer", nullable=false)
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