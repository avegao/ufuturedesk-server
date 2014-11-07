<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Ufuturelabs\Ufuturedesk\MainBundle\Entity\Subject;
use Ufuturelabs\Ufuturedesk\MainBundle\Entity\Timetable;
use Ufuturelabs\Ufuturedesk\MainBundle\Form\SubjectType;

class SubjectController extends Controller
{
    public function indexAction()
    {
        /** @var \Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['subject']['view'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Subject[] $subjects */
        $subjects = $em->getRepository("MainBundle:Subject")->findAll();

        if (count($subjects) > 0)
        {
            return $this->render("AdminBundle:Subject:index.html.twig", array("subjects" => $subjects));
        }
        else
        {
            return $this->render("AdminBundle:Subject:subjects_no.html.twig");
        }
    }

    public function viewAction($id)
    {
        // TODO Add exams
        // TODO Add tasks
        // TODO Add studets

        /** @var \Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['subject']['view'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Subject $subjects */
        $subject = $em->getRepository("MainBundle:Subject")->find($id);

        /** @var Timetable[] $timetables */
        $timetables = $em->getRepository("MainBundle:Timetable")->findBy(array("subject" => $subject));

        return $this->render('AdminBundle:Subject:view.html.twig', array(
                "subject" => $subject,
                "timetables" => $timetables
            ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws AccessDeniedException
     */
    public function createAction()
    {
        /** @var \Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['subject']['create'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        $subject = new Subject();

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new SubjectType(), $subject);
        $form->handleRequest($request);

        if (!is_null($request->get("ufuturelabs_ufuturedesk_mainbundle_subject")['_token'])
            || $request->get("ufuturelabs_ufuturedesk_mainbundle_subject")['_token'] != "")
        {
            // TODO When Symfony 2.6 will released this may change

            $modality = $em->getRepository("MainBundle:Modality")->find(
                $request->get("ufuturelabs_ufuturedesk_mainbundle_subject")['modality']
            );

            $subject->setModality($modality);

            $em->persist($subject);
            $em->flush();

            /** @var Array[] $timetables */
            $timetablesArray = $request->get('ufuturelabs_ufuturedesk_mainbundle_subject')['timetable'];

            foreach ($timetablesArray as $timetableArray)
            {
                // TODO Validate timetables
                $timetable = new Timetable();
                $timetable->setSubject($subject);
                $timetable->setDay($timetableArray['day']);
                $timetable->setClassroom($timetableArray['classroom']);
                $timetable->setStartTime($timetableArray['start_time']);
                $timetable->setEndTime($timetableArray['end_time']);

                $em->persist($timetable);
            }

            $em->flush();

            return $this->redirect($this->generateUrl('admin_subject_view', array(
                        'id' => $subject->getId()
                    ))
            );
        }

        /** @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course[] $courses */
        $courses = $em->getRepository('MainBundle:Course')->findAll();

        return $this->render('AdminBundle:Subject:create.html.twig', array(
                "form" => $form->createView(),
                "courses" => $courses,
            )
        );
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws AccessDeniedException
     */
    public function editAction($id)
    {
        /** @var \Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['subject']['create'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var Subject $subject */
        $subject = $em->getRepository("MainBundle:Subject")->find($id);

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new SubjectType(), $subject);
        $form->handleRequest($request);

        if (!is_null($request->get("ufuturelabs_ufuturedesk_mainbundle_subject")['_token'])
            || $request->get("ufuturelabs_ufuturedesk_mainbundle_subject")['_token'] != "")
        {
            // TODO When Symfony 2.6 will released this may change

            $modality = $em->getRepository("MainBundle:Modality")->find(
                $request->get("ufuturelabs_ufuturedesk_mainbundle_subject")['modality']
            );

            $subject->setModality($modality);

            $em->persist($subject);
            $em->flush();

            /** @var Array[] $timetables */
            $timetablesArray = $request->get('ufuturelabs_ufuturedesk_mainbundle_subject')['timetable'];

            foreach ($timetablesArray as $timetableArray)
            {
                // TODO Validate timetables
                $timetable = new Timetable();
                $timetable->setSubject($subject);
                $timetable->setDay($timetableArray['day']);
                $timetable->setClassroom($timetableArray['classroom']);
                $timetable->setStartTime($timetableArray['start_time']);
                $timetable->setEndTime($timetableArray['end_time']);

                $em->persist($timetable);
            }

            $em->flush();

            return $this->redirect($this->generateUrl('admin_subject_view', array(
                        'id' => $subject->getId()
                    ))
            );
        }

        /** @var \Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course[] $courses */
        $courses = $em->getRepository('MainBundle:Course')->findAll();

        /** @var Timetable[] $timetables */
        $timetables = $em->getRepository("MainBundle:Timetable")->findBy(array("subject" => $subject));

        return $this->render('AdminBundle:Subject:edit.html.twig', array(
                "form" => $form->createView(),
                "subject" => $subject,
                "courses" => $courses,
                "timetables" => $timetables,
            )
        );
    }

    public function deleteAction($id)
    {
        /** @var \Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['subject']['delete'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Subject $subjects */
        $subject = $em->getRepository("MainBundle:Subject")->find($id);

        $em->remove($subject);
        $em->flush();

        return $this->render($this->redirect('admin_subject_index'));
    }

}
