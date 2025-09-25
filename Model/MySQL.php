<?php
try{
    //connexion a la db
   $db = new PDO('mysql:host=localhost;dbname=pension','root','');
   $db->exec('SET NAMES "UTF8"');
   
} catch (PDOException $boot){
    echo 'Erreur : '.$boot->getMessage();
    die();
}
?>