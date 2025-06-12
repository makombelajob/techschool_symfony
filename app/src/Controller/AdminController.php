<?php

namespace App\Controller;

use App\Entity\Classes;
use App\Form\ClassesForm;
use App\Repository\ClassesRepository;
use App\Repository\ContactsRepository;
use App\Repository\SubjectsRepository;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    #[Route('/admin/affectation', name: 'app_admin_affectation')]
    #[IsGranted('ROLE_ADMIN')]
    public function addContent(): Response
    {
        $affectation = new Classes();
        $form = $this->createForm(ClassesForm::class, $affectation);
        return $this->render('admin/affectation.html.twig', compact('form'));
    }
}
