<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class TeacherController extends Controller
{
    public function viewAction()
    {
        $user = $this->container->get('request')->getUser();

        if (!$user->getPermissions()['teacher']['view'])
        {
            throw new AccessDeniedException();
        }
    }
}