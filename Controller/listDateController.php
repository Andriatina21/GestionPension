<?php
include('../Model/RequetePayer.php');

// Initialiser les variables
$dateDebut = isset($_POST['dateDebut']) ? $_POST['dateDebut'] : date('Y-m-01'); // Premier jour du mois en cours
$dateFin = isset($_POST['dateFin']) ? $_POST['dateFin'] : date('Y-m-d'); // Date actuelle

// Récupérer la liste des paiements entre les deux dates si une recherche a été effectuée
$paiements = null;
$recherche = isset($_POST['recherche']) && $_POST['recherche'] == 'true';

if ($recherche) {
    $paiements = PAYER::listDate($dateDebut, $dateFin);
}

// Afficher la vue
include('../Views/listDate.php');
?>
