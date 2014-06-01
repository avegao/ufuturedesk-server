<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin;
use Ufuturelabs\Ufuturedesk\AdminBundle\Form\AdminType;
use Ufuturelabs\Ufuturedesk\AdminBundle\Form\AdminEditType;

class AdminController extends Controller
{
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$admins = $em->getRepository("AdminBundle:Admin")->findAll();

		return $this->render("AdminBundle:Admin:index.html.twig", array("admins" => $admins));
	}

    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $admin = $em->getRepository("AdminBundle:Admin")->find($id);

        return $this->render("AdminBundle:Admin:view.html.twig", array("admin" => $admin));
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

    public function editAction($id)
    {
        $request = $this->container->get('request');
        $em = $this->getDoctrine()->getManager();

        $admin = $em->getRepository("AdminBundle:Admin")->findOneBy(array("id" => $id));

        $form = $this->createForm(new AdminEditType(), $admin);

        $originalPassword = $admin->getPassword();
        $originalPhoto = $admin->getPhotoPath();

        $form->handleRequest($request);

        if ($form->isValid())
        {
            if ($form->getData()->getPassword() == null)
            {
                $admin->setPassword($originalPassword);
            }
            else
            {
                $admin->setSalt();

                $encoder = $this->get("security.encoder_factory")->getEncoder($admin);
                $encryptedPassword = $encoder->encodePassword($admin->getPassword(), $admin->getSalt());

                $admin->setPassword($encryptedPassword);
            }

            if ($form->getData()->getPhoto() != null)
            {
                $admin->uploadPhoto();
            }

            $em->persist($admin);
            $em->flush();

            $this->get('session')->getFlashBag()->add('info',
                'Los datos del administrador se han editado correctamente'
            );

            return $this->redirect($this->generateUrl('admin_admin_view', array(
                'id' => $admin->getId()
            )));
        }

        return $this->render("AdminBundle:Admin:edit.html.twig", array(
            "admin" => $admin,
            "adminForm" => $form->createView()
        ));
    }
} 