<?php
// ../Views/PayerPdf.php

// Inclure la bibliothèque DOMPDF
// Si installé via Composer
// require_once('../vendor/autoload.php');

// Si installé manuellement
require_once('../Views/dompdf/autoload.inc.php');

// Référence à l'espace de noms Dompdf
use Dompdf\Dompdf;
use Dompdf\Options;

class PayerPdfView {
    private $paiement;
    
    public function __construct($paiement) {
        $this->paiement = $paiement;
    }
    
    public function generatePDF() {
        // Date du paiement
        $date = new DateTime($this->paiement['Date']);
        $mois = $date->format('F'); // Nom du mois
        $annee = $date->format('Y'); // Année
        
        // Créer le contenu HTML du reçu
        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <title>Reçu de Paiement</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                    padding: 20px;
                }
                .header {
                    text-align: center;
                    margin-bottom: 30px;
                }
                .title {
                    font-size: 20px;
                    font-weight: bold;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 30px;
                }
                table td {
                    padding: 8px;
                }
                .footer {
                    text-align: right;
                    margin-top: 40px;
                }
                .signature {
                    margin-top: 60px;
                }
            </style>
        </head>
        <body>
            <div class="header">
                <div class="title">REÇU DE PAIEMENT</div>
            </div>
            
            <table>
                <tr>
                    <td style="width: 30%;"><strong>IM :</strong></td>
                    <td>' . htmlspecialchars($this->paiement['IM']) . '</td>
                </tr>
                <tr>
                    <td><strong>Nom :</strong></td>
                    <td>' . htmlspecialchars($this->paiement['Nom']) . '</td>
                </tr>
                <tr>
                    <td><strong>Prénom :</strong></td>
                    <td>' . htmlspecialchars($this->paiement['Prenom']) . '</td>
                </tr>
                <tr>
                    <td><strong>Mois :</strong></td>
                    <td>' . htmlspecialchars($mois) . '</td>
                </tr>
                <tr>
                    <td><strong>Année :</strong></td>
                    <td>' . htmlspecialchars($annee) . '</td>
                </tr>
                <tr>
                    <td><strong>Diplôme :</strong></td>
                    <td>' . htmlspecialchars($this->paiement['Diplome']) . '</td>
                </tr>
                <tr>
                    <td><strong>Montant :</strong></td>
                    <td>' . htmlspecialchars($this->paiement['Montant']) . ' Ar</td>
                </tr>
            </table>
            
            <div class="footer">
                <div>Fait le ' . date('d/m/Y') . '</div>
                <div class="signature">Signature :</div>
            </div>
        </body>
        </html>';
        
        // Configuration de DOMPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        
        // Créer une nouvelle instance de DOMPDF
        $dompdf = new Dompdf($options);
        
        // Charger le HTML
        $dompdf->loadHtml($html);
        
        // Configurer le format de papier et l'orientation
        $dompdf->setPaper('A4', 'portrait');
        
        // Rendre le HTML en PDF
        $dompdf->render();
        
        // Dossier pour stocker les PDF temporaires
        $tmpDir = '../tmp/';
        if (!is_dir($tmpDir)) {
            mkdir($tmpDir, 0777, true);
        }
        
        // Nom du fichier PDF
        $filename = 'recu_paiement_' . $this->paiement['idPayer'] . '.pdf';
        $filepath = $tmpDir . $filename;
        
        // Enregistrer le PDF sur le serveur
        file_put_contents($filepath, $dompdf->output());
        
        return [
            'filename' => $filename,
            'filepath' => $filepath
        ];
    }
}
?>
