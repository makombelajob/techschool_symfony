<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Entity\Users;
use App\Form\AddParentForm;
use App\Form\StudentsContactForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

    #[Route('/ajouter-responsable', name: 'app_add_parent')]
    public function addParent(EntityManagerInterface $entityManager, Request $request): Response
    {
        $parent = new Users();
        $form = $this->createForm(AddParentForm::class, $parent);
        return $this->render('profile/add-parent.html.twig', compact('form'));
    }

}
