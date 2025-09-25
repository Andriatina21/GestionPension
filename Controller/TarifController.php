<?php
    require_once('../Model/RequeteTarif.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $num_Tarif = ($_POST['num_Tarif']);
        $Diplome = ($_POST['Diplome']);
        $Categorie = ($_POST['Categorie']);
        $Montant = ($_POST['Montant']);

        $Tarif = new Tarif($num_Tarif, $Diplome, $Categorie, $Montant);
        $Tarif->AjoutTarif();
        header("Location: ../Controller/TableTarifController.php"); 
    } else{
        $_SESSION['erreur'] = 'Le formulaire est incomplet';
    }
    include('../Views/tarif.php');



?>