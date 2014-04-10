<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SchoolController extends Controller
{
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$school = $em->getRepository("MainBundle:School")->findSchool();

		return $this->render("AdminBundle:School:index.html.twig", array("school" => $school[0]));
	}
} 