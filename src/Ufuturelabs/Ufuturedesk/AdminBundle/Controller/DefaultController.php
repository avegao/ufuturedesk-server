<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ufuturelabs\Ufuturedesk\MainBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager */
    	$em = $this->getDoctrine()->getManager();

        /** @var \Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin[] $admins */
        $admins = $em->getRepository("AdminBundle:Admin")->findAll();

        /** @var \Ufuturelabs\Ufuturedesk\TeacherBundle\Entity\Teacher[] $teachers */
        $teachers = $em->getRepository("TeacherBundle:Teacher")->findAll();

        /** @var \Ufuturelabs\Ufuturedesk\StudentBundle\Entity\Student[] $students */
        $students = $em->getRepository("StudentBundle:Student")->findAll();

        /** @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\School $school */
		$school = $em->getRepository("MainBundle:School")->findAll()[0];

		return $this->render("AdminBundle:Default:index.html.twig", array(
			"adminsNumber" => count($admins),
			"teachersNumber" => count($teachers),
			"studentsNumber" => count($students),
			"documentRoot" => str_replace("/web/".basename($_SERVER['SCRIPT_FILENAME']), "", $_SERVER['SCRIPT_FILENAME']),
			"school" => $school,
		));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function disableUserAction($id)
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var User $user */
        $user = $em->getRepository("MainBundle:User")->find($id);
        $user->disableUser();

        $em->persist($user);
        $em->flush();

        return $this->redirect($this->container->get('request')->headers->get('referer'));
    }

    public function renderNavAction()
    {
    	return $this->render("AdminBundle:Default:nav.html.twig");
    }
}
