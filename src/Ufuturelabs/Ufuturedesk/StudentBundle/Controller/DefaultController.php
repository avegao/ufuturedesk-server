<?php

namespace Ufuturelabs\Ufuturedesk\StudentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('StudentBundle:Default:index.html.twig', array('name' => $name));
    }
}
