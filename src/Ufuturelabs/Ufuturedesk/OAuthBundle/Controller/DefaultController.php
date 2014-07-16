<?php

namespace Ufuturelabs\Ufuturedesk\OAuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR))
        {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR))
        {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        else
        {
            $error = "";
        }

        if ($error)
        {
            $error = $error->getMessage();
        }

        $lastUsername = (null === $session) ? "" : $session->get(SecurityContext::LAST_USERNAME);

        return $this->render('OAuthBundle:Default:login.html.twig', array(
            'error' => $error,
            'last_username' => $lastUsername,
        ));
    }
}
