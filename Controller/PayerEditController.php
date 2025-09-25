<?php

// Inclure le modèle
require_once('../Model/RequetePayer.php');
session_start();

// Initialiser les variables
$payerData = null;
$personnes = PAYER::getPersonnes();
$tarifs = PAYER::getTarifs();
$message = '';
$messageType = '';

// Traitement de la soumission du formulaire (action UPDATE)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idPayer'])) {
    if (isset($_POST['Nom']) && isset($_POST['Diplome']) && isset($_POST['Date'])) {
        // Créer un objet PAYER avec les données du formulaire
        $payer = new PAYER($_POST['Nom'], $_POST['Diplome'], $_POST['Date']);
        
        // Mettre à jour le paiement
        if ($payer->updatePayer($_POST['idPayer'])) {
            // Rediriger vers la liste des paiements avec un message de succès
            $_SESSION['success'] = 'Le paiement a été mis à jour avec succès.';
            header("Location: ../Controller/TablePayerController.php");
            exit();
        } else {
            // Échec de la mise à jour
            $message = 'Une erreur est survenue lors de la mise à jour du paiement.';
            $messageType = 'danger';
            
            // Récupérer à nouveau les données du paiement
            $payerData = PAYER::getPayer($_POST['idPayer']);
        }
    } else {
        $message = 'Tous les champs sont obligatoires.';
        $messageType = 'danger';
        
        // Récupérer à nouveau les données du paiement
        $payerData = PAYER::getPayer($_POST['idPayer']);
    }
}
// Traitement de l'affichage du formulaire (action EDIT)
else if (isset($_GET['idPayer'])) {
    $idPayer = $_GET['idPayer'];
    $payerData = PAYER::getPayer($idPayer);
    
    if (!$payerData) {
        $_SESSION['error'] = 'Paiement non trouvé.';
        header("Location: ../Controller/TablePayerController.php");
        exit();
    }
} 
// Si aucune action n'est spécifiée, rediriger vers la liste
else {
    header("Location: ../Controller/TablePayerController.php");
    exit();
}

// Inclure la vue
require_once('../Views/PayerUpdate.php');
?>
