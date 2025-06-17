<?php

namespace App\Controller;

use App\Entity\Courses;
use App\Entity\Results;
use App\Form\CoursesForm;
use App\Form\ResultsForm;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class TeacherController extends AbstractController
{
    #[Route('/teacher', name: 'app_teacher')]
    public function index(UsersRepository $usersRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_TEACHER');
        $students = $usersRepository->findAll();
        return $this->render('teacher/index.html.twig', ['students' => $students]);
    }


    #[Route('/teacher/ajouter-cours', name: 'app_teacher_add_course')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_TEACHER');
        $cours = new Courses();
        $form = $this->createForm(CoursesForm::class, $cours);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cours);
            $entityManager->flush();
            return $this->redirectToRoute('app_teacher');
        }
        return $this->render('teacher/affectation.html.twig', compact('form'));
    }

    #[Route('/teacher/notes', name: 'app_teacher_notes')]
    public function notes(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_TEACHER');
        $note = new Results();
        $form = $this->createForm(ResultsForm::class, $note);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($note);
            $entityManager->flush();
            return $this->redirectToRoute('app_teacher_notes');
        }
        return $this->render('teacher/notes.html.twig', compact('form'));
    }
}
