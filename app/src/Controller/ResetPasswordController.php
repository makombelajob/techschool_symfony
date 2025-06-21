<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Form\GenerateTokenForm;
use App\Form\ResetPasswordForm;
use App\Repository\UsersRepository;
use App\Service\EmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
final class ResetPasswordController extends AbstractController
{
    #[Route('/reset/password', name: 'app_reset_password')]
    public function index(): Response
    {
        return $this->render('reset_password/index.html.twig', [
            'controller_name' => 'ResetPasswordController',
        ]);
    }

    #[Route('/reset-password', name: 'app_reset_password')]
    public function generateToken(Request $request, EntityManagerInterface $entityManager, UsersRepository $usersRepository, EmailService $emailService): Response
    {

        $formResetPass = $this->createForm(GenerateTokenForm::class);
        $formResetPass->handleRequest($request);
        if ($formResetPass->isSubmitted() && $formResetPass->isValid()) {
            $email = $formResetPass->get('email')->getData();
            $user = $usersRepository->findOneBy(['email' => $email]);
            if (!$user) {
                $this->addFlash('error', 'Si votre compte existe, nous venons d\'envoyer un message dans votre boite mail');
                return $this->redirectToRoute('app_login');
            }
            // Générer le token
            $token = bin2hex(random_bytes(16));
            $user->setResetToken($token);

            // Persistance dans la base
            $entityManager->persist($user);
            $entityManager->flush();

            $emailService->send(
                'admin@tech-school.fr',
                $email,
                'Demande de reinitialisation de mots de passe',
                'reset-pass',
                [
                    'token' => $token,
                ]
            );
            // Ici mérite un addFlash à revoir
            $this->addFlash('success', 'Si votre compte existe, nous venons d\'envoyer un message dans votre boite mail');
            return $this->redirectToRoute('app_login');
        }
        return $this->render('reset_password/generate-token.html.twig', compact('formResetPass'));
    }

    #[Route('/reinitialiser-mots-de-passe/{token}', name: 'app_reset_pass_user')]
    public function resetPasswordLink(string $token, UsersRepository $usersRepository, Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = $usersRepository->findOneBy([
            'resetToken' => $token
        ]);
        if (!$user) {
            $this->addFlash('error', 'Lien invalide ou exipirée');
            return $this->redirectToRoute('app_reset_password');
        }
        // Création un formulaire simple pour le nouveau mot de passe
        $form = $this->createForm(ResetPasswordForm::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newPassword = $form->get('plainPassword')->getData();

            $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
            $user->setPassword($hashedPassword);
            $user->setResetToken(null); // Supprime le token après usage

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Mot de passe réinitialisé avec succès.');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('reset_password/passwd-reset.html.twig', compact('form'));
    }
}
