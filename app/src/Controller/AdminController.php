<?php

namespace App\Controller;

use App\Entity\Classes;
use App\Entity\Contacts;
use App\Entity\Users;
use App\Form\ClassesForm;
use App\Form\UsersForm;
use App\Repository\ClassesRepository;
use App\Repository\ContactsRepository;
use App\Repository\SubjectsRepository;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(UsersRepository $usersRepository, ClassesRepository $classesRepository, SubjectsRepository $subjectsRepository, ContactsRepository $contactsRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $users = $usersRepository->findAll();
        $classes = $classesRepository->findAll();
        $subjects = $subjectsRepository->findAll();
        $contacts = $contactsRepository->findAll();
        return $this->render('admin/index.html.twig', compact('users', 'classes', 'subjects', 'contacts'));
    }

    #[Route('/admin/gerer/{id}', name: 'app_admin_gerer')]
    public function roleEdit(Users $user, EntityManagerInterface $entityManager, Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(UsersForm::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/gerer.html.twig', compact('form'));
    }

    #[Route('/admin/horaires', name: 'app_admin_timer')]
    public function horaires(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/timer.html.twig');
    }

    #[Route('/admin/effacer-message/{id}', name: 'app_admin_delete_message')]
    public function deleteMessage(EntityManagerInterface $entityManager, Contacts $contact): Response
    {
        $entityManager->remove($contact);
        $entityManager->flush();
        return $this->redirectToRoute('app_admin');
    }
}
