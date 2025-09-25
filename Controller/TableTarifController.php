<?php
    require_once('../Model/RequeteTarif.php');
    session_start();

    if(
        (isset($_POST['num_Tarif']))
        && (isset($_POST['Diplome']))
        && (isset($_POST['Categorie']))
        && (isset($_POST['Montant']))
    ){


        $num_Tarif = ($_POST['num_Tarif']);
        $Diplome = ($_POST['Diplome']);
        $Categorie = ($_POST['Categorie']);
        $Montant = ($_POST['Montant']);

        $Tarif = new Tarif($num_Tarif, $Diplome, $Categorie, $Montant);
        if ($Tarif->AjoutTarif()) {
            
        } 
    }

    else{
        $_SESSION['erreur'] = 'Le formulaire est incomplet';
    }
    
                        

    $resultatTarif = Tarif::showTarif();
    include('../Views/TableTarif.php');

?>