<?php

namespace App\Controller;

// Import du contrôleur de base Symfony
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// Import pour retourner une réponse de fichier binaire (téléchargement)
use Symfony\Component\HttpFoundation\BinaryFileResponse;
// Import de l'attribut de routage
use Symfony\Component\Routing\Attribute\Route;

final class DownloadsController extends AbstractController
{
    // Route pour télécharger une facture via son nom de fichier
    #[Route('/uploads/factures/{filename}', name: 'default_facture_download')]
    public function downloadFacture(string $filename): BinaryFileResponse
    {
        // Construction du chemin absolu vers le fichier dans le dossier public/uploads/factures
        $filePath = $this->getParameter('kernel.project_dir') . '/public/uploads/factures/' . $filename;

        // Vérifie si le fichier existe, sinon déclenche une erreur 404
        if (!file_exists($filePath)) {
            throw $this->createNotFoundException('Facture introuvable.');
        }

        // Retourne le fichier à télécharger en réponse binaire
        return new BinaryFileResponse($filePath);
    }
}
