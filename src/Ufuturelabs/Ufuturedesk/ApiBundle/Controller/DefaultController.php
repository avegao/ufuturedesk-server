<?php

namespace Ufuturelabs\Ufuturedesk\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function userAction()
    {
        $sessionUser = $this->container->get('security.context')->getToken()->getUser();

        if ($sessionUser)
        {
            $em = $this->getDoctrine()->getManager();

            $userType = $em->getRepository('MainBundle:User')->findUserType($sessionUser->getId());

            switch ($userType)
            {
                case 'admin':

                    $admin = $em->getRepository('AdminBundle:Admin')->findById($sessionUser->getId());

                    return new JsonResponse(array(
                        'id' => $admin->getId(),
                        'username' => $admin->getUsername(),
                        'photo_path' => $admin->getPhotoPath(),
                        'active' => $admin->isActive(),
                        'permissions' => array($admin->getPermissions()),
                    ));

                case 'teacher';

                    $teacher = $em->getRepository('TeacherBundle:Teacher')->findById($sessionUser->getId());

                    return new JsonResponse(array(
                        'id' => $teacher->getId(),
                        'username' => $teacher->getUsername(),
                    ));

                case 'student':

                    $student = $em->getRepository('AdminBundle:Admin')->findById($sessionUser->getId());

                    return new JsonResponse(array(
                        'id' => $student->getId(),
                        'username' => $student->getUsername(),
                    ));
            }



            if (isset($admin))
            {

            }
        }

        return new JsonResponse(array(
            'message' => 'User is not identified',
        ));
    }
}
