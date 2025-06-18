<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Entity\Courses;
use App\Entity\Subjects;
use App\Entity\Users;
use App\Form\UsersForm;
use App\Form\SubjectsForm;
use App\Repository\ClassesRepository;
use App\Repository\ContactsRepository;
use App\Repository\CoursesRepository;
use App\Repository\SubjectsRepository;
use App\Repository\UsersRepository;
use App\Service\EmailService;
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
    public function horaires(CoursesRepository $coursesRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $programs = $coursesRepository->findAll();
        $events = [];
        foreach($programs as $program){
            $events[] = [
                'id' => $program->getId(),
                'title' => $program->getName(),
                'start' => $program->getStartedAt()->format('Y-m-d\TH:i:s'),
                'end' => $program->getEndAt()->format('Y-m-d\TH:i:s'),
                'extendedProps' => [
                    'coefficient' => $program->getCoefficient(),
                    'day' => $program->getDay(),
                    'room' => $program->getRoom(),
                ]
            ];
        };
        $horaire = json_encode($events);
        return $this->render('admin/calendar.html.twig', compact('horaire'));
    }

    #[Route('/admin/effacer-message/{id}', name: 'app_admin_delete_message')]
    public function deleteMessage(EntityManagerInterface $entityManager, Contacts $contact): Response
    {
        $entityManager->remove($contact);
        $entityManager->flush();
        return $this->redirectToRoute('app_admin');
    }

    #[Route('/admin/subject', name: 'app_admin_add_subject')]
    public function addSubject(Request $request, EntityManagerInterface $entityManager, EmailService $emailService, UsersRepository $usersRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $subject = new Subjects();
        $form = $this->createForm(SubjectsForm::class, $subject);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($subject);
            $entityManager->flush();

            // Envoie des mails de notifications aux enseignants
            $users = $usersRepository->findAll();
            $teacher = null;
            foreach($users as $user){
                if(in_array('ROLE_TEACHER', $user->getRoles())){
                    $teacher = $user;
                    break;
                }
            }
            $emailService->send(
                'admin@tech-school.fr',
                $teacher->getEmail(),
                'Ajout d\'une nouvelle matiere',
                'teacher-notification',
                [
                    'nomDeLaMatière' => $form->get('name')->getData(),
                    'nomDuTeacher' => $teacher->getLastname(),
                    'prénomDuTeacher' => $teacher->getFirstname()
                ]
            );
            return $this->redirectToRoute('app_teacher');
        }
        return $this->render('admin/subject.html.twig', compact('form'));
    }
}
