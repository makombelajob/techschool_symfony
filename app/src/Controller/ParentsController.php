<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ParentsController extends AbstractController
{
    #[Route('/parents', name: 'app_parents')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PARENT');
        return $this->render('parents/index.html.twig', [
            'controller_name' => 'ParentsController',
        ]);
    }

    #[Route('/parents/facture', name: 'app_parents_show_facture')]
    public function showFacture(Security $security): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PARENT');
        $user = $security->getUser();
        $userId = $user->getId();
        
        $facturePath = $this->getParameter('kernel.project_dir') . '/public/uploads/factures/';
        $factures = [];

        // On scan tous les fichiers
        foreach(glob($facturePath . '/facture_' . $userId . '*.pdf') as $filePath){
            $fileName = basename($filePath);
            $factures[] = [
                'name' => $fileName,
                'url' => '/uploads/factures/' . $fileName
            ];
        }

       return $this->render('parents/facture.html.twig', compact('factures'));
    }
}
