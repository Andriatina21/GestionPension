<?php



require_once('../Model/RequeteTarif.php');

if (isset($_GET['num_Tarif'])) {
    // Récupérer les données du tarif correspondant
    $num_Tarif = $_GET['num_Tarif'];
    $data = Tarif::getTarif($_GET['num_Tarif'])->fetchAll()[0];
    
    // Vérifier si les données existent et les envoyer à la vue
    if ($data) {
        require_once('../Views/TarifUpdate.php');
    } else {
        // Si les données ne sont pas trouvées, rediriger ou afficher un message d'erreur
        echo "Tarif non trouvé.";
    }
}

    // Vérifier si une modification ou une insertion est demandée
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['num_Tarif'])
        && (isset($_POST['Diplome']))
        && (isset($_POST['Categorie']))
        && (isset($_POST['Montant']))) {

            $Tarif = new Tarif($_POST['num_Tarif'], $_POST['Diplome'], $_POST['Categorie'], $_POST['Montant']);
            $Tarif-> updateTarif($_POST['num_Tarif']);
            header("Location: ../Controller\TableTarifController.php");
            exit();
        }else {
            $_SESSION['erreur'] = 'Le formulaire est incomplet';
        }
    }
    include_once('../Views/TarifUpdate.php');

    

    
?>