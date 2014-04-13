<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ufuturelabs\Ufuturedesk\AdminBundle\Form\SchoolType;
use Ufuturelabs\Ufuturedesk\MainBundle\Entity\School;

class SchoolController extends Controller
{
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$school = $em->getRepository("MainBundle:School")->findSchool();

		return $this->render("AdminBundle:School:index.html.twig", array("school" => $school[0]));
	}

	public function editAction()
	{
		$em = $this->getDoctrine()->getManager();

		// $school = $em->getRepository("MainBundle:School")->findSchool();
		$school = new School();

		$schoolForm = $this->createForm(new SchoolType(), $school);

		return $this->render("AdminBundle:School:edit.html.twig", array("schoolForm" => $schoolForm->createView()));

	}
} 