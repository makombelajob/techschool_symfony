<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\GenerateTokenForm;
use App\Form\ResetPasswordForm;
use App\Form\StudentsContactForm;
use App\Repository\UsersRepository;
use App\Service\EmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

final class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $contact = new Contacts();
        $studentMessage = $this->createForm(StudentsContactForm::class, $contact);
        return $this->render('profile/index.html.twig', compact('studentMessage'));
    }

    #[Route('/tous-les-cours', name: 'app_profile_courses')]
    public function courses(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('profile/courses.html.twig');
    }

}
