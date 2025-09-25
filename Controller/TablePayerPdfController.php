<?php
// ../Controller/TablePayerPdfController.php
require_once('../Model/RequetePayer.php');
require_once('../Views/PayerPdf.php');

class TablePayerPdfController {
    public function generatePDF() {
        // Vérifier si l'ID du paiement est fourni
        if (!isset($_GET['idPayer']) || empty($_GET['idPayer'])) {
            echo "Erreur: ID de paiement non spécifié";
            exit;
        }
        
        $idPayer = $_GET['idPayer'];
        
        // Récupérer les données du paiement depuis le modèle
        $paiementData = PAYER::getPayerForPDF($idPayer);
        
        if (!$paiementData) {
            echo "Erreur: Paiement non trouvé";
            exit;
        }
        
        // Créer la vue et générer le PDF
        $pdfView = new PayerPdfView($paiementData);
        $pdfInfo = $pdfView->generatePDF();
        
        // Vérifier si le fichier existe
        if (file_exists($pdfInfo['filepath'])) {
            // Forcer le téléchargement du fichier
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $pdfInfo['filename'] . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($pdfInfo['filepath']));
            readfile($pdfInfo['filepath']);
            
            // Supprimer le fichier temporaire
            unlink($pdfInfo['filepath']);
            exit;
        } else {
            echo "Erreur: Le fichier PDF n'a pas été généré correctement.";
        }
    }
}

// Instancier et exécuter le contrôleur
$controller = new TablePayerPdfController();
$controller->generatePDF();
?>
