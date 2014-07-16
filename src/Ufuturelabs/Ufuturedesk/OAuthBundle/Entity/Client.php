<?php

namespace Ufuturelabs\Ufuturedesk\OAuthBundle\Entity;

use FOS\OAuthServerBundle\Entity\Client as BaseClient;
use Doctrine\ORM\Mapping as ORM;

use Ufuturelabs\Ufuturedesk\MainBundle\Entity\User;


/**
 * Class Client for FOSOAuthServerBundle
 * @package Ufuturelabs\Ufuturedesk\OAuthBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="oauth_client")
 */
class Client extends BaseClient
{
    /**
     * @var integer
     *
     * @ORM\Column(name="client_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }
} 