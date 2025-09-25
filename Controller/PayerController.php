<?php
    require_once('../Model/RequetePayer.php');
    session_start();

    // Récupérer les données pour les listes déroulantes
    $personnes = PAYER::getPersonnes();
    $tarifs = PAYER::getTarifs();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Vérifier si tous les champs requis sont fournis
        if(isset($_POST['Nom']) && isset($_POST['Diplome']) && isset($_POST['Date'])) {
            $Nom = $_POST['Nom'];  // Contient maintenant la valeur IM
            $Diplome = $_POST['Diplome'];  // Contient maintenant la valeur num_tarif
            $Date = $_POST['Date'];

            $Payer = new PAYER($Nom, $Diplome, $Date);
            $result = $Payer->AjoutPayer();
            
            if($result) {
                header("Location: ../Controller/TablePayerController.php"); 
                exit();
            } else {
                $_SESSION['erreur'];
                header("Location: ../Controller/PayerController.php");
                exit();
            }
        } else {
            $_SESSION['erreur'] ;
            header("Location: ../Controller/PayerController.php");
            exit();
        }
    }
    
    // Si ce n'est pas une requête POST ou après une erreur, afficher le formulaire
    include('../Views/Payer.php');
?>
