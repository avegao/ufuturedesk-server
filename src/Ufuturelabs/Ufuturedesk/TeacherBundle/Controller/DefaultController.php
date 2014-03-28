<?php

namespace Ufuturelabs\Ufuturedesk\TeacherBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TeacherBundle:Default:index.html.twig', array('name' => $name));
    }
}
