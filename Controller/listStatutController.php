<?php
// Inclure le modèle
require_once('../Model/requete.php');
session_start();


// Récupérer la liste des statuts avec leur effectif
$statuts = Personne::listStatut();

// Récupérer le total des personnes
$totalPersonnes = Personne::getTotalPersonnes();

// Récupérer le détail des personnes par statut spécifique si demandé
$personnesDetail = null;
$statutFiltre = null;

if (isset($_GET['statut'])) {
    $statutFiltre = $_GET['statut'];
    $personnesDetail = Personne::getPersonnesByStatut($statutFiltre);
}

// Inclure la vue
require_once('../Views/listStatut.php');
?>
