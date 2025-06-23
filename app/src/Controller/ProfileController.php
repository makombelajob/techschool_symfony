<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Entity\Users;
use App\Form\AddParentForm;
use App\Form\StudentsContactForm;
use App\Service\EmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class ProfileController extends AbstractController
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {}

    #[Route('/profile', name: 'app_profile')]
    public function index(Request $request, EntityManagerInterface $entityManager, Security $security): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $contact = new Contacts();
        $user = $security->getUser();
        $classes = $user->getClasses();
        $parents = $user->getParents();
        $studentMessage = $this->createForm(StudentsContactForm::class, $contact);
        return $this->render('profile/index.html.twig', compact('studentMessage', 'classes', 'parents'));
    }

    #[Route('/tous-les-cours', name: 'app_profile_courses')]
    public function courses(Security $security): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $user = $security->getUser();
        $courses = $user->getCourses();
        return $this->render('profile/courses.html.twig', compact('courses'));
    }

    #[Route('/ajouter-responsable', name: 'app_add_parent')]
    public function addParent(EntityManagerInterface $entityManager, Request $request, EmailService $emailService, string $name, int $amount): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $parent = new Users();
        $form = $this->createForm(AddParentForm::class, $parent);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $student = $this->getUser();
            $parent->setRoles(['ROLE_PARENT']);
            $parent->setEnfant($student);
            // $student->addParent($parent);
            $plainPassword = bin2hex(random_bytes(8));
            $hashPassword = $this->passwordHasher->hashPassword($parent, $plainPassword);
            $parent->setPassword($hashPassword);
            $entityManager->persist($parent);
            $entityManager->flush();

            $emailService->send(
                'admin@tech-school.fr',
                $parent->getEmail(),
                'Responble ajouter',
                'responsable',
                [
                    'nom' => $parent->getLastname(),
                    'prénom' => $parent->getFirstname(),
                    'password' => $plainPassword,
                    'parent_email' => $parent->getEmail(),
                    'nom_eleve' =>  $student->getLastname(),
                    'prenom_eleve' =>  $student->getFirstname(),
                ]
            );

            $this->addFlash('success', "Responsable ajoutér avec success");
            return $this->redirectToRoute('app_profile');

        }
        return $this->render('profile/add-parent.html.twig', compact('form'));
    }

}
