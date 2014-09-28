<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin;
use Ufuturelabs\Ufuturedesk\AdminBundle\Form\TeacherType;
use Ufuturelabs\Ufuturedesk\TeacherBundle\Entity\Teacher;

class TeacherController extends Controller
{
<<<<<<< HEAD
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws AccessDeniedException
     */
    public function indexAction()
    {
        /** @var Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['teacher']['view'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Teacher[] $teachers */
        $teachers = $em->getRepository("TeacherBundle:Teacher")->findAll();

        if (count($teachers) > 0)
        {
            return $this->render("AdminBundle:Teacher:index.html.twig", array("teachers" => $teachers));
        }
        else
        {
            return $this->render("AdminBundle:Teacher:teachers_no.html.twig");
        }
    }
=======

>>>>>>> 266b76b5b7e1b6e64e488ed1ae2199c6566ce2e4

    /**
     * @param int $id Teacher's ID
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws AccessDeniedException|\Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function viewAction($id)
    {
        /** @var Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['teacher']['view'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager */
        $em = $this->getDoctrine()->getManager();

        /** @var Teacher $teacher */
        $teacher = $em->getRepository("TeacherBundle:Teacher")->find($id);

        if (!is_null($teacher))
        {
            return $this->render("AdminBundle:Teacher:view.html.twig", array("teacher" => $teacher));
        }
        else
        {
            throw $this->createNotFoundException('Profesor no encontrado');
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws AccessDeniedException
     */
    public function createAction()
    {
        /** @var Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['teacher']['create'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        $teacher = new Teacher();

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new TeacherType(), $teacher);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $teacher->setUserName($teacher->getEmail());

            /** @var string $activationRoute */
            $activationRoute = Teacher::generateActivationRoute();
            $teacher->setActivationRoute($activationRoute);
            $teacher->setActive(false);

            /** @var \Doctrine\Common\Persistence\ObjectManager $em */
            $em = $this->getDoctrine()->getManager();
            $em->persist($teacher);

            $this->get('session')->getFlashBag()->add('info',
                'Los datos del profesor se han creado correctamente'
            );

            /** @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\School $school */
            $school = $em->getRepository('MainBundle:School')->findSchool()[0];

            $txt = $this->render("TeacherBundle:Email:activation.txt.twig", array(
                "school" => $school,
                "teacher" => $teacher,
                "host" => "http://".$_SERVER['HTTP_HOST']
            ));

            $html = $this->render("TeacherBundle:Email:activation.html.twig", array(
                "school" => $school,
                "teacher" => $teacher,
                "host" => "http://".$_SERVER['HTTP_HOST']
            ));

            $activationMessage = \Swift_Message::newInstance()
                ->setSubject("Bienvenido a uFutureDesk (".$school->getName().")")
                ->setFrom(array($school->getEmail() => $school->getName()." - uFutureDesk"))
                ->setTo($teacher->getEmail())
                ->setBody($txt)
                ->addPart($html, 'text/html');

            $em->flush();

            $this->container->get('mailer')->send($activationMessage);

            return $this->redirect($this->generateUrl('admin_teacher_view', array(
                'id' => $teacher->getId()
            )));
        }

        return $this->render("AdminBundle:Teacher:create.html.twig", array(
            "teacherForm" => $form->createView()
        ));
    }

    /**
     * @param int $id Teacher's ID
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws AccessDeniedException
     */
    public function deleteAction($id)
    {
        /** @var Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['teacher']['delete'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Teacher $teacher */
        $teacher = $em->getRepository("TeacherBundle:Teacher")->find($id);

        $em->remove($teacher);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_teacher_index'));
    }
}