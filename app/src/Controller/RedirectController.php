<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;


final class RedirectController extends AbstractController
{
    #[Route('/redirect-after-login', name: 'app_redirect')]
    public function redirectAfterLogin(AuthorizationCheckerInterface $authorizationChecker): Response
    {
        if($authorizationChecker->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_admin');
        }
        if($authorizationChecker->isGranted('ROLE_TEACHER')){
            return $this->redirectToRoute('app_teacher');
        }
        return $this->redirectToRoute('app_profile');
    }
}
