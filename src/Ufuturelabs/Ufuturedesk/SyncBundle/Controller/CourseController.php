<?php

namespace Ufuturelabs\Ufuturedesk\SyncBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CourseController extends Controller
{
    public function getCourseAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
