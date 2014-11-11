<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin;
use Ufuturelabs\Ufuturedesk\ExamBundle\Entity\Exam;

/**
 * Class ExamController
 * @package Ufuturelabs\Ufuturedesk\AdminBundle\Controller
 */
class ExamController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws AccessDeniedException
     */
    public function indexAction()
    {
        return $this->render("AdminBundle:Exam:index.html.twig");
    }

    public function createAction()
    {
    }

    public function viewAction($id)
    {
    }

    public function editAction($id)
    {
    }

    public function deleteAction($ID)
    {
    }

}
