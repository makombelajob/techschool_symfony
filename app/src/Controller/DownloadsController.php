<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Routing\Attribute\Route;

final class DownloadsController extends AbstractController
{
    #[Route('/uploads/factures/{filename}', name: 'default_facture_download')]
    public function downloadFacture(string $filename): BinaryFileResponse
    {
        $filePath = $this->getParameter('kernel.project_dir') . '/public/uploads/factures/' . $filename;

        if (!file_exists($filePath)) {
            throw $this->createNotFoundException('Facture introuvable.');
        }

        return new BinaryFileResponse($filePath);
    }
}
