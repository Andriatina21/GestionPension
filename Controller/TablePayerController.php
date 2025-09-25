<?php
    include('../Model/RequetePayer.php');
    include('../Model/MySQL.php');
    
    session_start();

        // Vérifier les pensionnés décédés et traiter leurs conjoints
    $sql = "SELECT IM FROM personnes WHERE Statut = 'Decedé'";
    $stmt = $db->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        PAYER::handleDeceasedPensioner($row['IM']);
    }


    
    // Obtenir les résultats de paiement pour affichage dans le tableau
    $resultatPayer = PAYER::showPayer();
    
    // Inclure la vue
    include('../Views/TablePayer.php');
?>
