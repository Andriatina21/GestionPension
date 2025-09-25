<?php
    require_once('../Model/RequeteConjoint.php');
    session_start();

    if (
        (isset($_POST['num_Pension']))
       && (isset($_POST['NomConjoint']))
       && (isset($_POST['PrenomConjoint']))
    ) {
           // on nettoye les donnees du tables
           $num_Pension = ($_POST['num_Pension']);
           $NomConjoint = ($_POST['NomConjoint']);
           $PrenomConjoint = ($_POST['PrenomConjoint']);
           
           $Conjoint = new Conjoint($num_Pension, $NomConjoint, $PrenomConjoint);
           if ($Conjoint->AjoutConjoint()) {
               header("Location: ../Controller/TableConjointController.php");
           }
       }
       else{
           $_SESSION['erreur'] = 'Le formulaire est incomplet';
       }

    
                        

    $resultat1 = Conjoint::showConjoint();
    include('../Views/TableConjoint.php');

?>