<?php

namespace Ufuturelabs\Ufuturedesk\ExamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UfuturedeskExamBundle:Default:index.html.twig', array('name' => $name));
    }
}
