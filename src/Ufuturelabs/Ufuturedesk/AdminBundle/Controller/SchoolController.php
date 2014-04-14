<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ufuturelabs\Ufuturedesk\AdminBundle\Form\SchoolType;

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
		$request = $this->container->get('request');
		$em = $this->getDoctrine()->getManager();

		$school = $em->getRepository("MainBundle:School")->findSchool();

		$schoolForm = $this->createForm(new SchoolType(), $school[0]);

		$schoolForm->handleRequest($request);

		if ($schoolForm->isValid())
		{
			$school[0]->uploadLogo();

			$em->persist($school[0]);
			$em->flush();

			$this->get('session')->getFlashBag()->add('info',
				'Los datos del centro se han actualizado correctamente'
			);

			return $this->redirect($this->generateUrl('admin_school_index'));
		}

		return $this->render("AdminBundle:School:edit.html.twig", array(
			"schoolForm" => $schoolForm->createView()
		));
	}
} 