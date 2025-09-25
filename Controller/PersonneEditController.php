<?php
    require_once('../Model/requete.php');

    if (isset($_GET['IM'])) {
        // Récupérer les données du tarif correspondant
        $IM = $_GET['IM'];
        $Data = Personne::getPersonnes($_GET['IM'])->fetchAll()[0];
        
        // Vérifier si les données existent et les envoyer à la vue
        if ($Data) {
            require_once('../Views/PersonneUpdate.php');
        } else {
            // Si les données ne sont pas trouvées, rediriger ou afficher un message d'erreur
            echo "Personne non trouvé.";
        }
    }

        // Vérifier si une modification ou une insertion est demandée
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['IM'])
            && (isset($_POST['Nom']))
            && (isset($_POST['Prenom']))
            && (isset($_POST['Datenais']))
            && (isset($_POST['Telephone']))
            && (isset($_POST['Statut']))
            && (isset($_POST['Situation'])))
            {

                $Personne = new Personne($_POST['IM'], $_POST['Nom'], $_POST['Prenom'], $_POST['Datenais'], $_POST['Telephone'], $_POST['Statut'], $_POST['Situation']);
                $Personne-> updatePersonnes($_POST['IM']);
                header("Location: ../Controller\TablePersonneController.php");
                exit();
            }else {
                $_SESSION['erreur'] = 'Le formulaire est incomplet';
            }
        }
        include_once('../Views/PersonneUpdate.php');

        

    
?>