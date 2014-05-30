<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin;
use Ufuturelabs\Ufuturedesk\AdminBundle\Form\AdminType;

class AdminController extends Controller
{
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$admins = $em->getRepository("AdminBundle:Admin")->findAll();

		return $this->render("AdminBundle:Admin:index.html.twig", array("admins" => $admins));
	}

	public function createAction()
	{
		$request = $this->container->get('request');

		$admin = new Admin();

		$form = $this->createForm(new AdminType(), $admin);
		$form->handleRequest($request);

		if ($form->isValid())
		{
			$admin->uploadPhoto();

            $admin->setSalt();

            $encoder = $this->get("security.encoder_factory")->getEncoder($admin);
            $encryptedPassword = $encoder->encodePassword($admin->getPassword(), $admin->getSalt());

            $admin->setPassword($encryptedPassword);

            $em = $this->getDoctrine()->getManager();
			$em->persist($admin);
			$em->flush();

			$this->get('session')->getFlashBag()->add('info',
				'Los datos del administrador se han creado correctamente'
			);

			return $this->redirect($this->generateUrl('admin_admin_view', array(
				'id' => $admin->getId()
			)));
		}

		return $this->render("AdminBundle:Admin:create.html.twig", array(
			"adminForm" => $form->createView()
		));
	}
} 