<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
		$logger = $this->container->get("logger");

    	$adminsNumber = count($em->getRepository("MainBundle:User")->findAdminsNumber());
		$teachersNumber = count($em->getRepository("MainBundle:User")->findTeachersNumber());
		$studentsNumber = count($em->getRepository("MainBundle:User")->findStudentsNumber());

		$school = $em->getRepository("MainBundle:School")->findSchool();

		return $this->render("AdminBundle:Default:index.html.twig", array(
			"adminsNumber" => $adminsNumber,
			"teachersNumber" => $teachersNumber,
			"studentsNumber" => $studentsNumber,
			"documentRoot" => str_replace("/web/".basename($_SERVER['SCRIPT_FILENAME']), "", $_SERVER['SCRIPT_FILENAME']),
			"school" => $school[0],
		));
    }
    
    public function renderNavAction()
    {
    	return $this->render("AdminBundle:Default:nav.html.twig");
    }
}
