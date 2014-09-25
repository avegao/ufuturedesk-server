<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Ufuturelabs\Ufuturedesk\AdminBundle\Form\TeacherType;
use Ufuturelabs\Ufuturedesk\TeacherBundle\Entity\Teacher;

class TeacherController extends Controller
{


    public function viewAction($id)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['teacher']['view'])
        {
            throw new AccessDeniedException("No tienes permisos suficientes");
        }

        $em = $this->getDoctrine()->getManager();

        $teacher = $em->getRepository("TeacherBundle:Teacher")->find($id);

        return $this->render("AdminBundle:Admin:view.html.twig", array("teacher" => $teacher));
    }

    public function createAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['teacher']['create'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        $request = $this->container->get('request');

        $teacher = new Teacher();

        $form = $this->createForm(new TeacherType(), $teacher);
        $form->handleRequest($request);


        if ($form->isValid())
        {
            $teacher->setUserName($teacher->getEmail());

            $em = $this->getDoctrine()->getManager();
            $em->persist($teacher);

            $this->get('session')->getFlashBag()->add('info',
                'Los datos del profesor se han creado correctamente'
            );

            $school = $em->getRepository('MainBundle:School')->findSchool()[0];

            $txt = $this->render("MainBundle:User:activation_email.txt.twig", array(
                "school" => $school,
                "user" => $teacher,
                "user_type" => "teacher",
                "host" => $_SERVER['HTTP_HOST']."/web/".basename($_SERVER['SCRIPT_FILENAME'])
            ));

            $html = $this->render("MainBundle:User:activation_email.html.twig", array(
                "school" => $school,
                "user" => $teacher,
                "user_type" => "teacher",
                "host" => $_SERVER['HTTP_HOST']."/web/".basename($_SERVER['SCRIPT_FILENAME'])
            ));

            $activationMessage = \Swift_Message::newInstance()
                ->setSubject("Bienvenido a uFutureDesk (".$school->getName().")")
                ->setFrom(array($school->getEmail() => "uFutureDesk - ".$school->getName()))
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

    public function deleteAction($id)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['teacher']['delete'])
        {
            throw new AccessDeniedException("No tienes permisos suficientes");
        }
        $em = $this->getDoctrine()->getManager();

        $admin = $em->getRepository("TeacherBundle:Teacher")->findOneBy(array("id" => $id));

        $em->remove($admin);

        $em->flush();

        return $this->redirect($this->generateUrl('admin_teacher_index'));
    }
}