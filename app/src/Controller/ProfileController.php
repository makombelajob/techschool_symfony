<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\StudentsContactForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    #[IsGranted('ROLE_USER')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contacts();
        $studentMessage = $this->createForm(StudentsContactForm::class, $contact);
        return $this->render('profile/index.html.twig', compact('studentMessage'));
    }
}
