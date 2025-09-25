<?php
require_once('../Model/RequetePayer.php');

if(isset ($_GET["idPayer"]))
{
    $res = Payer::DeletePayer($_GET["idPayer"]);
}

header("Location: ../Controller\TablePayerController.php");
require('../Views/TablePayer.php');
?>