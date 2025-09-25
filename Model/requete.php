<?php

    class Personne
    {
        private $IM;
        private $Nom;
        private $Prenom;
        private $Datenais;
        private $Telephone;
        private $Statut;
        private $Situation;

        public function __construct($IM, $Nom, $Prenom, $Datenais, $Telephone, $Statut, $Situation)
        {
            $this->IM = $IM;
            $this->Nom = $Nom;
            $this->Prenom = $Prenom;
            $this->Datenais = $Datenais;
            $this->Telephone = $Telephone;
            $this->Statut = $Statut;
            $this->Situation = $Situation;
        }

        public function AjoutPersonnes()
        {
            include('../Model/MySQL.php');

            //Preparer les requetes
            $sql = "INSERT INTO personnes (IM,Nom,Prenom,Datenais,Contact,Statut,Situation) VALUE (:IM, :Nom,:Prenom, :Datenais, :Telephone, :Statut, :Situation)";
            $sth = $db->prepare($sql);
            return $sth->execute(['IM' => $this->IM, 'Nom' => $this->Nom, 'Prenom' => $this->Prenom, 'Datenais' => $this->Datenais, 'Telephone' => $this->Telephone, 'Statut' => $this->Statut, 'Situation' => $this->Situation]);
    }

        static public function show()
        {
            include('../Model/MySQL.php');
            $mysql = "SELECT * FROM personnes";

            return $db->query($mysql);
        }

        static public function DeletePersonnes($IM)
        {
            include('../Model/MySQL.php');
          $bsql = "DELETE FROM personnes WHERE IM='$IM'";

          return $db->query($bsql);
        }

        static public function getPersonnes($IM)
        {
            include('../Model/MySQL.php');
            $asql = "SELECT * FROM personnes WHERE IM=:IM";
            $stmt = $db->prepare($asql);
            $stmt->execute(['IM' => $IM]);
  
            return $stmt;
        }

        public function updatePersonnes($Data)
        {
            // Connexion à la base de données
            include('../Model/MySQL.php');
            
            // Préparer la requête de mise à jour
            $query1 = "UPDATE personnes SET IM=:IM, Nom=:Nom, Prenom=:Prenom, Datenais=:Datenais, Contact=:Telephone, Statut=:Statut, Situation=:Situation WHERE IM=:IM";
            $stmt = $db->prepare($query1);
            
            // Exécuter la requête
            $stmt->execute(["Nom" => $this->Nom, "Prenom" => $this->Prenom, "Datenais"  => $this->Datenais, "Telephone" => $this->Telephone, "Statut" => $this->Statut, "Situation" => $this->Situation,"IM" => $Data]); 
        }

        static public function listStatut()
        {
            include('../Model/MySQL.php');
            
            try {
                // Requête SQL pour récupérer les personnes groupées par statut avec leur effectif
                $sql = "SELECT Statut, COUNT(*) as Effectif, 
                        GROUP_CONCAT(CONCAT(Nom, ' ', Prenom) SEPARATOR ', ') as Personnes 
                        FROM personnes 
                        GROUP BY Statut 
                        ORDER BY Statut";
                
                $stmt = $db->query($sql);
                return $stmt; // Retourne directement le PDOStatement
            } catch (PDOException $boot) {
                echo "Erreur : " . $boot->getMessage();
                return false;
            }
        }

        static public function getTotalPersonnes()
        {
            include('../Model/MySQL.php');
            
            try {
                $sql = "SELECT COUNT(*) as Total FROM personnes";
                $stmt = $db->query($sql);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['Total'];
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                return 0;
            }
        }
        static public function getPersonnesByStatut($statut)
        {
            include('../Model/MySQL.php');
            
            try {
                $sql = "SELECT IM, Nom, Prenom, Datenais, Contact, Statut, Situation 
                        FROM personnes 
                        WHERE Statut = :statut 
                        ORDER BY Nom, Prenom";
                
                $stmt = $db->prepare($sql);
                $stmt->execute(['statut' => $statut]);
                return $stmt;
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                return false;
            }
        }
        


}

       
     
    
?>