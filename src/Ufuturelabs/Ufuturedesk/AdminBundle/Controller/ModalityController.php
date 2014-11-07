<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Ufuturelabs\Ufuturedesk\MainBundle\Entity\Modality;
use Ufuturelabs\Ufuturedesk\MainBundle\Form\ModalityType;

class ModalityController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws AccessDeniedException
     */
    public function indexAction()
    {
        /** @var \Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['modality']['view'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Modality[] $modalities */
        $modalities = $em->getRepository("MainBundle:Modality")->findAll();

        if (count($modalities) > 0)
        {
            return $this->render("AdminBundle:Modality:index.html.twig", array("modalities" => $modalities));
        }
        else
        {
            return $this->render("AdminBundle:Modality:modalities_no.html.twig");
        }
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws AccessDeniedException
     */
    public function viewAction($id)
    {
        /** @var \Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['modality']['view'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Modality $modality */
        $modality = $em->getRepository("MainBundle:Modality")->find($id);

        return $this->render(
            'AdminBundle:Modality:view.html.twig',
            array(
                "modality" => $modality,
            )
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @throws AccessDeniedException
     */
    public function createAction()
    {
        /** @var \Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['modality']['create'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        $modality = new Modality();

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new ModalityType(), $modality);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            /** @var \Doctrine\Common\Persistence\ObjectManager $em */
            $em = $this->getDoctrine()->getManager();
            $em->persist($modality);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_modality_view', array(
                        'id' => $modality->getId()
                    ))
            );
        }

        return $this->render('AdminBundle:Modality:create.html.twig', array(
                "form" => $form->createView(),
            )
        );
    }

    public function editAction($id)
    {
        /** @var \Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['modality']['edit'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Modality $modality */
        $modality = $em->getRepository("MainBundle:Modality")->find($id);

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new ModalityType(), $modality);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em->persist($modality);
            $em->flush();

            return $this->redirect(
                $this->generateUrl(
                    'admin_modality_view',
                    array(
                        'id' => $modality->getId()
                    )
                )
            );
        }

        return $this->render(
            'AdminBundle:Modality:edit.html.twig',
            array(
                "form" => $form->createView(),
            )
        );
    }

    public function deleteAction($id)
    {
        /** @var \Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin $user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!$user->getPermissions()['modality']['delete'])
            throw new AccessDeniedException("No tienes permisos suficientes");

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Modality $modality */
        $modality = $em->getRepository("MainBundle:Modality")->find($id);

        $em->remove($modality);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_modality_index'));
    }

    /**
     * @param $id int
     * @return Response
     */
    public function ajaxGetModalitiesByCourseIdAction($id)
    {
        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        if ($request->isXmlHttpRequest())
        {
            /** @var \Doctrine\Common\Persistence\ObjectManager $em */
            $em = $this->getDoctrine()->getManager();

            /** @var Modality[] $modalities */
            $modalities = $em->getRepository("MainBundle:Modality")->findBy(
                array(
                    "course" => $id,
                )
            );

            $serializer = $this->container->get('jms_serializer');

            /** @var Array $json */
            $json = array(
                "code" => Response::HTTP_OK,
                "success" => true,
                "message" => $modalities,
            );

            /** @var Response $response */
            $response = new Response($serializer->serialize($json, "json"));
            $response->headers->set('Content-Type', 'application/json');
            $response->setStatusCode(Response::HTTP_OK);
        }
        else
        {
            /** @var Array $json */
            $json = array(
                "code" => Response::HTTP_BAD_REQUEST,
                "success" => false,
                "message" => "",
            );

            /** @var Response $response */
            $response = new Response($json);
            $response->headers->set('Content-Type', 'application/json');
            $response->setStatusCode(Response::HTTP_BAD_REQUEST);
        }

        return $response;
    }
}
