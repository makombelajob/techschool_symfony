<?php

namespace App\Controller;

use App\Entity\Courses;
use App\Form\CoursesForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class TeacherController extends AbstractController
{
    #[Route('/teacher', name: 'app_teacher')]
    #[IsGranted('ROLE_TEACHER')]
    public function index(): Response
    {
        return $this->render('teacher/index.html.twig', []);
    }


    #[Route('/teacher/addCourse', name: 'app_teacher_add_course')]
    #[IsGranted('ROLE_TEACHER')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cours = new Courses();
        $form = $this->createForm(CoursesForm::class, $cours);
        return $this->render('teacher/affectation.html.twig', compact('form'));
    }
}
