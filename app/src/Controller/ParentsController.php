<?php

namespace App\Controller;

// Import du contrôleur de base Symfony
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// Service de sécurité pour récupérer l'utilisateur connecté
use Symfony\Bundle\SecurityBundle\Security;
// Réponse pour retourner un fichier binaire (non utilisé ici, mais importé)
//use Symfony\Component\HttpFoundation\BinaryFileResponse; 
use Symfony\Component\HttpFoundation\Response;
// Import de l'attribut pour définir les routes
use Symfony\Component\Routing\Attribute\Route;

final class ParentsController extends AbstractController
{
    // Route accessible via /parents, nommée 'app_parents'
    #[Route('/parents', name: 'app_parents')]
    public function index(): Response
    {
        // Sécurise l'accès, uniquement les utilisateurs avec le rôle 'ROLE_PARENT'
        $this->denyAccessUnlessGranted('ROLE_PARENT');

        // Retourne la vue 'parents/index.html.twig' avec une variable pour le contrôleur
        return $this->render('parents/index.html.twig', [
            'controller_name' => 'ParentsController',
        ]);
    }

    // Route pour afficher les factures du parent connecté
    #[Route('/parents/facture', name: 'app_parents_show_facture')]
    public function showFacture(Security $security): Response
    {
        // Sécurise l'accès, uniquement les parents
        $this->denyAccessUnlessGranted('ROLE_PARENT');

        // Récupère l'utilisateur connecté
        $user = $security->getUser();
        $userId = $user->getId();

        // Chemin absolu vers le dossier contenant les factures
        $facturePath = $this->getParameter('kernel.project_dir') . '/public/uploads/factures/';
        $factures = [];

        // Recherche tous les fichiers PDF de factures correspondant à l'utilisateur
        foreach (glob($facturePath . '/facture_' . $userId . '*.pdf') as $filePath) {
            // Récupère uniquement le nom du fichier
            $fileName = basename($filePath);
            // Ajoute le nom et l'URL relative du fichier dans un tableau
            $factures[] = [
                'name' => $fileName,
                'url' => '/uploads/factures/' . $fileName
            ];
        }

        // Rend la vue avec la liste des factures disponibles pour le parent
        return $this->render('parents/facture.html.twig', compact('factures'));
    }
}
