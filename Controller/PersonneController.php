<?php
    require_once("../Model/requete.php");
    session_start();

    if (
         (isset($_POST['IM']))
        && (isset($_POST['Nom']))
        && (isset($_POST['Prenom']))
        && (isset($_POST['Datenais']))
        && (isset($_POST['Telephone']))
        && (isset($_POST['Statut']))
        && (isset($_POST['Situation']))
     ) {
            // on nettoye les donnees du tables
            $IM = ($_POST['IM']);
            $Nom = ($_POST['Nom']);
            $Prenom = ($_POST['Prenom']);
            $Datenais = ($_POST['Datenais']);
            $Telephone = ($_POST['Telephone']);
            $Statut = ($_POST['Statut']);
            $Situation = ($_POST['Situation']);
            
            $Personne = new Personne($IM, $Nom, $Prenom, $Datenais, $Telephone, $Statut, $Situation);
            if ($Personne->AjoutPersonnes()) {
                header("Location: ../Controller/TablePersonneController.php");
            }
        }
        else{
            $_SESSION['erreur'] = 'Le formulaire est incomplet';
        }
        include('../Views/Personne.php');
    
?>
