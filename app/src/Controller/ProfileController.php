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
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
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

    #[Route('/reset-password', name: 'app_reset_password')]
    public function generateToken(Request $request, EntityManagerInterface $entityManager, UsersRepository $usersRepository, EmailService $emailService): Response
    {
        
        $formResetPass = $this->createForm(GenerateTokenForm::class);
        $formResetPass->handleRequest($request);
        if($formResetPass->isSubmitted() && $formResetPass->isValid()){
            $email = $formResetPass->get('email')->getData();
            $user = $usersRepository->findOneBy(['email' => $email]);
            if(!$user){
                $this->addFlash('error', 'Message envoyer, veuillez verifier votre mail');
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
            $this->addFlash('success', 'Un message vient d\'être envoyer dans votre boite mail');
            return $this->redirectToRoute('app_reset_password');
        }
        return $this->render('profile/generate-token.html.twig', compact('formResetPass'));
    }

    #[Route('/reinitialiser-mots-de-passe/{token}', name: 'app_reset_pass_user')]
    public function resetPasswordLink(string $token, UsersRepository $usersRepository, Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager):Response
    {
        $user = $usersRepository->findOneBy([
            'resetToken' => $token
        ]);
        if(!$user) {
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

        return $this->render('profile/passwd-reset.html.twig', compact('form'));
    }
}
