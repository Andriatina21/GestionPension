<?php
require_once('../Model/requete.php');

if(isset ($_GET["IM"]))
{
    $resultatPers = Personne::DeletePersonnes($_GET["IM"]);
}

header("Location: ../Controller/TablePersonneController.php");
require('../Views/TabelPersonnes.php');
?>