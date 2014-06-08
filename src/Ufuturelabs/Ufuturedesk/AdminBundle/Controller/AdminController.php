<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin;
use Ufuturelabs\Ufuturedesk\AdminBundle\Form\AdminType;
use Ufuturelabs\Ufuturedesk\AdminBundle\Form\AdminEditType;

class AdminController extends Controller
{
	public function indexAction()
	{
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['admin']['view'])
        {
            throw new AccessDeniedException("No tienes permisos suficientes");
        }

		$em = $this->getDoctrine()->getManager();

		$admins = $em->getRepository("AdminBundle:Admin")->findAll();

		return $this->render("AdminBundle:Admin:index.html.twig", array("admins" => $admins));
	}

    public function viewAction($id)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['admin']['view'])
        {
            throw new AccessDeniedException("No tienes permisos suficientes");
        }

        $em = $this->getDoctrine()->getManager();

        $admin = $em->getRepository("AdminBundle:Admin")->find($id);

        return $this->render("AdminBundle:Admin:view.html.twig", array("admin" => $admin));
    }

	public function createAction()
	{
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['admin']['create'])
            throw new AccessDeniedException("No tienes permisos suficientes");

		$request = $this->container->get('request');

		$admin = new Admin();

		$form = $this->createForm(new AdminType(), $admin);
		$form->handleRequest($request);

		if ($form->isValid())
		{
			$admin->uploadPhoto();
            $admin->setSalt();

            if ($admin->isPermissionsAdminCreate())
                $admin->setPermissionsAdminView(true);

            if ($admin->isPermissionsAdminEdit())
                $admin->setPermissionsAdminCreate(true);

            if ($admin->isPermissionsAdminDelete())
                $admin->setPermissionsAdminEdit(true);

            if ($admin->isPermissionsTeacherCreate())
                $admin->setPermissionsTeacherView(true);

            if ($admin->isPermissionsTeacherEdit())
                $admin->setPermissionsTeacherCreate(true);

            if ($admin->isPermissionsTeacherDelete())
                $admin->setPermissionsTeacherEdit(true);

            if ($admin->isPermissionsStudentCreate())
                $admin->setPermissionsStudentView(true);

            if ($admin->isPermissionsStudentEdit())
                $admin->setPermissionsStudentCreate(true);

            if ($admin->isPermissionsStudentDelete())
                $admin->setPermissionsStudentEdit(true);

            if ($admin->isPermissionsCourseCreate())
                $admin->setPermissionsCourseView(true);

            if ($admin->isPermissionsCourseEdit())
                $admin->setPermissionsCourseCreate(true);

            if ($admin->isPermissionsCourseDelete())
                $admin->setPermissionsCourseEdit(true);

            if ($admin->isPermissionsModalityCreate())
                $admin->setPermissionsModalityView(true);

            if ($admin->isPermissionsModalityEdit())
                $admin->setPermissionsModalityCreate(true);

            if ($admin->isPermissionsModalityDelete())
                $admin->setPermissionsModalityEdit(true);

            if ($admin->isPermissionsAdminCreate())
                $admin->setPermissionsAdminView(true);

            if ($admin->isPermissionsAdminEdit())
                $admin->setPermissionsAdminCreate(true);

            if ($admin->isPermissionsAdminDelete())
                $admin->setPermissionsAdminEdit(true);

            if ($admin->isPermissionsSuperuser())
            {
                $admin->setPermissions(array(
                    "superuser" => true,
                    "school" => array( "edit" => true),
                    "admin" => array(
                        "view" => true,
                        "create" => true,
                        "edit" => true,
                        "delete" => true
                    ),
                    "teacher" => array(
                        "view" => true,
                        "create" => true,
                        "edit" => true,
                        "delete" => true
                    ),
                    "student" => array(
                        "view" => true,
                        "create" => true,
                        "edit" => true,
                        "delete" => true
                    ),
                    "courses" => array(
                        "view" => true,
                        "create" => true,
                        "edit" => true,
                        "delete" => true
                    ),
                    "modalities" => array(
                        "view" => true,
                        "create" => true,
                        "edit" => true,
                        "delete" => true
                    ),
                    "subjects" => array(
                        "view" => true,
                        "create" => true,
                        "edit" => true,
                        "delete" => true
                    ),
                ));
            }

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
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['admin']['edit'])
        {
            throw new AccessDeniedException("No tienes permisos suficientes");
        }

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

    public function deleteAction($id)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['admin']['delete'])
        {
            throw new AccessDeniedException("No tienes permisos suficientes");
        }
        $em = $this->getDoctrine()->getManager();

        $admin = $em->getRepository("AdminBundle:Admin")->findOneBy(array("id" => $id));

        $em->remove($admin);

        $em->flush();

        return $this->redirect($this->generateUrl('admin_admin_index'));
    }
} 