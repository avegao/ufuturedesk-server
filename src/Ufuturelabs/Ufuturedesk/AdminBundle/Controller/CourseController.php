<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin;
use Ufuturelabs\Ufuturedesk\MainBundle\Entity\Course;
use Ufuturelabs\Ufuturedesk\MainBundle\Form\CourseType;

class CourseController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throw \Symfony\Component\Security\Core\Exception\AccessDeniedException
     */
    public function indexAction()
    {
        /** @var Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['course']['view'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Course[] $courses */
        $courses = $em->getRepository("MainBundle:Course")->findAll();

        if (count($courses) > 0 )
        {
            return $this->render("AdminBundle:Course:index.html.twig", array("courses" => $courses));
        }
        else
        {
            return $this->render("AdminBundle:Course:no_courses.html.twig");
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throw \Symfony\Component\Security\Core\Exception\AccessDeniedException
     */
    public function createAction()
    {
        /** @var Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['course']['create'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        $course = new Course();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new CourseType(), $course);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            /** @var \Doctrine\Common\Persistence\ObjectManager $em */
            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();

            $this->get('session')->getFlashBag()->add('info',
                'El curso se ha creado correctamente'
            );

            return $this->redirect($this->generateUrl('admin_course_index'));
        }

        return $this->render("AdminBundle:Course:create.html.twig", array(
                "form" => $form->createView()
            ));
    }

    /**
     * @param $id int Course ID
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throw \Symfony\Component\Security\Core\Exception\AccessDeniedException
     */
    public function editAction($id)
    {
        /** @var Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['course']['edit'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Course $course */
        $course = $em->getRepository("MainBundle:Course")->find($id);

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new CourseType(), $course);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em->persist($course);
            $em->flush();

            $this->get('session')->getFlashBag()->add('info',
                'El curso se ha modificado correctamente'
            );

            return $this->redirect($this->generateUrl('admin_course_index'));
        }

        return $this->render("AdminBundle:Course:edit.html.twig", array(
                "form" => $form->createView(),
                "course" => $course
            ));
    }

    /**
     * @param $id int Course ID
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throw \Symfony\Component\Security\Core\Exception\AccessDeniedException
     */
    public function deleteAction($id)
    {
        /** @var Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['course']['delete'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Course $course */
        $course = $em->getRepository("MainBundle:Course")->find($id);

        $em->remove($course);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_course_index'));
    }
}
