<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactsForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contacts();
        $formContact = $this->createForm(ContactsForm::class, $contact);
        $formContact->handleRequest($request);
        if($formContact->isSubmitted() && $formContact->isValid()){
            $entityManager->persist($contact);
            $entityManager->flush();
            return $this->redirectToRoute('app_main');
        }
        return $this->render('main/index.html.twig', compact('formContact'));
    }
}
