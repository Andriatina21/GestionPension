<?php
require_once('../Model/RequeteTarif.php');

if(isset ($_GET["num_Tarif"]))
{
    $res = Tarif::DeleteTarif($_GET["num_Tarif"]);
}

header("Location: ../Controller\TableTarifController.php");
require('../Views/TableTarif.php');
?>