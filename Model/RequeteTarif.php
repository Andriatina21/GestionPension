<?php

      class Tarif
      {
        private $num_Tarif ;
        private $Diplome;
        private $Categorie;
        private $Montant;


        public function __construct($num_Tarif, $Diplome, $Categorie, $Montant)
        {
            $this->num_Tarif = $num_Tarif; 
            $this->Diplome = $Diplome; 
            $this->Categorie = $Categorie; 
            $this->Montant = $Montant; 
        }

        public function AjoutTarif()
        {
          include('../Model/MySQL.php');
          
          $sql = "INSERT INTO tarif (num_Tarif,Diplome,Categorie,Montant) VALUE 
          (:num_Tarif, :Diplome, :Categorie, :Montant)";

          $sth = $db->prepare($sql);

          return $sth->execute(['num_Tarif' => $this->num_Tarif, 'Diplome' => $this->Diplome,
           'Categorie' => $this->Categorie, 'Montant' => $this->Montant]);

        }

        static public function showTarif()
        {
            include('../Model/MySQL.php');
            $ysql = "SELECT * FROM tarif";

            return $db->query($ysql);
        }

         static public function getTarif($num_tarif) {
          include('../Model/MySQL.php');
          $ysql = "SELECT * FROM tarif WHERE num_tarif=:num_tarif";
          $stmt = $db->prepare($ysql);
          $stmt->execute(['num_tarif' => $num_tarif]);

          return $stmt;
         } 

        static public function DeleteTarif($num_Tarif)
        { 
          include('../Model/MySQL.php');
          $tsql = "DELETE FROM tarif WHERE num_Tarif='$num_Tarif'";

          return $db->query($tsql);
        }

        // public  function EditTarif($num_Tarif)
        // {
        //   include('../Model/MySQL.php');
        //   $msql = "UPDATE tarif SET Diplome=?, Categorie=?, Montant=?  WHERE num_Tarif=?";
        //   $query = $db->prepare($msql, [$this->Diplome, $this->Categorie, $this->Montant, $num_Tarif]);
        //   $query->execute();

        //   return $query->fetchAll();
        // }

        public function updateTarif($data) {
          // Connexion à la base de données
          include('../Model/MySQL.php');
          
          // Préparer la requête de mise à jour
          $query = "UPDATE tarif SET Diplome=:Diplome, Categorie=:Categorie, Montant=:Montant WHERE num_Tarif=:num_Tarif";
          $stmt = $db->prepare($query);
          
          // Exécuter la requête
          $stmt->execute(["Diplome" => $this->Diplome, "Categorie" => $this->Categorie, "Montant" => $this->Montant, "num_Tarif" => $data]);
        }
      }
?>
