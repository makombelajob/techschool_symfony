<?php

namespace App\Controller;

use App\Entity\Classes;
use App\Entity\Users;
use App\Form\ClassesForm;
use App\Form\UsersForm;
use App\Repository\ClassesRepository;
use App\Repository\ContactsRepository;
use App\Repository\SubjectsRepository;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(UsersRepository $usersRepository, ClassesRepository $classesRepository, SubjectsRepository $subjectsRepository, ContactsRepository $contactsRepository): Response
    {
        $users = $usersRepository->findAll();
        $classes = $classesRepository->findAll();
        $subjects = $subjectsRepository->findAll();
        $contacts = $contactsRepository->findAll();
        return $this->render('admin/index.html.twig', compact('users', 'classes', 'subjects', 'contacts'));
    }

    #[Route('/admin/affectation/{id}', name: 'app_admin_affectation')]
    #[IsGranted('ROLE_ADMIN')]
    public function affectation(Classes $classe): Response
    {
        $form = $this->createForm(ClassesForm::class, $classe);
        return $this->render('admin/affectation.html.twig', compact('form'));
    }

    #[Route('/admin/roleedit/{id}', name: 'app_admin_role_edit')]
    #[IsGranted('ROLE_ADMIN')]
    public function roleEdit(Users $user, EntityManagerInterface $entityManager, Request $request): Response
    {
        $form = $this->createForm(UsersForm::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/role.html.twig', compact('form'));
    }

    #[Route('/admin/horaires', name: 'app_admin_timer')]
    public function horaires(): Response
    {
        return $this->render('admin/timer.html.twig');
    }
}
