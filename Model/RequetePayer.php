<?php
    class PAYER
    {
        private $idPayer;
        private $Nom;
        private $Diplome;
        private $Date;
        
        public function __construct($Nom, $Diplome, $Date)
        {
            $this->Nom = $Nom;
            $this->Diplome = $Diplome;
            $this->Date = $Date;
        }
        
        public function AjoutPayer()
        {
            include('../Model/MySQL.php');
            // Utiliser la connexion PDO existante ($db)
            
            try {
                $sql = "INSERT INTO payer (IM, num_tarif, Date) VALUES (?, ?, ?)";
                $stmt = $db->prepare($sql);
                $stmt->execute([$this->Nom, $this->Diplome, $this->Date]);
                return true;
            } catch (PDOException $boot) {
                echo "Erreur : " . $boot->getMessage();
                return false;
            }
        }
        
        static public function showPayer()
        {
            include('../Model/MySQL.php');
            
            try {
                // Modifier la requête pour inclure les noms et prénoms en une seule colonne
                $sql = "SELECT p.idPayer, 
                            CONCAT(pe.Nom, ' ', pe.Prenom) AS 'Nom', 
                            t.Diplome, 
                            p.Date 
                        FROM payer p 
                        JOIN personnes pe ON p.IM = pe.IM 
                        JOIN tarif t ON p.num_tarif = t.num_tarif
                        ORDER BY p.Date DESC";
                        
                $stmt = $db->query($sql);
                return $stmt; // Renvoyer directement le PDOStatement pour utilisation avec fetch()
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                return false;
            }
        }

        
        
        static public function getPersonnes()
        {
            include('../Model/MySQL.php');
            // Utiliser la connexion PDO existante ($db)
            
            try {
                $sql = "SELECT IM, Nom, Prenom FROM personnes ORDER BY Nom, Prenom";
                $stmt = $db->query($sql);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                return [];
            }
        }
        
        static public function getTarifs()
        {
            include('../Model/MySQL.php');
            // Utiliser la connexion PDO existante ($db)
            
            try {
                $sql = "SELECT num_tarif, Diplome FROM tarif ORDER BY Diplome";
                $stmt = $db->query($sql);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Erreur : " . $boot->getMessage();
                return [];
            }
        }

        static public function DeletePayer($idPayer)
        { 
          include('../Model/MySQL.php');
          $esql = "DELETE FROM payer WHERE idPayer='$idPayer'";

          return $db->query($esql);
        }

       
          // Getters et Setters
         public function setIdPayer($idPayer) {
            $this->idPayer = $idPayer;
        }
        
        public function getIdPayer() {
            return $this->idPayer;
        }
        
        public function setNom($Nom) {
            $this->Nom = $Nom;
        }
        
        public function getNom() {
            return $this->Nom;
        }
        
        public function setDiplome($Diplome) {
            $this->Diplome = $Diplome;
        }
        
        public function getDiplome() {
            return $this->Diplome;
        }
        
        public function setDate($Date) {
            $this->Date = $Date;
        }
        
        public function getDate() {
            return $this->Date;
        }


        public static function getPayer($idPayer) 
        {
            include('../Model/MySQL.php');
    
            try {
                $sql = "SELECT p.idPayer, p.IM, p.num_tarif, p.Date
                        FROM payer p
                        WHERE p.idPayer = :idPayer";
                $stmt = $db->prepare($sql);
                $stmt->execute(['idPayer' => $idPayer]);
                
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $boot) {
                error_log("Erreur dans getPayer: " . $boot->getMessage());
                return false;
            }
        }

        

        
        

        static public function getPayerWithDetails($idPayer) 
        {
            include('../Model/MySQL.php');
            try {
                $sql = "SELECT p.idPayer, p.IM, p.num_tarif, p.Date,
                            CONCAT(pe.Nom, ' ', pe.Prenom) AS 'NomComplet',
                            t.Diplome AS 'DiplomeNom'
                        FROM payer p
                        JOIN personnes pe ON p.IM = pe.IM
                        JOIN tarif t ON p.num_tarif = t.num_tarif
                        WHERE p.idPayer = :idPayer";
                $stmt = $db->prepare($sql);
                $stmt->execute(['idPayer' => $idPayer]);
                
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $boot) {
                error_log("Erreur dans getPayerWithDetails: " . $boot->getMessage());
                return false;
            }
        }
        

         public function updatePayer($idPayer) 
        {
            include('../Model/MySQL.php');
            
            try {
                $man = "UPDATE payer 
                          SET IM = :IM, 
                              num_tarif = :num_tarif, 
                              Date = :Date 
                          WHERE idPayer = :idPayer";
                $stmt = $db->prepare($man);
                
                $result = $stmt->execute([
                    "IM" => $this->Nom, // IM est stocké dans Nom
                    "num_tarif" => $this->Diplome, // num_tarif est stocké dans Diplome
                    "Date" => $this->Date,
                    "idPayer" => $idPayer
                ]);
                
                return $result;
            } catch (PDOException $boot) {
                error_log("Erreur dans updatePayer: " . $boot->getMessage());
                return false;
            }
        }

        public static function listDate($dateDebut, $dateFin)
        {
            include('../Model/MySQL.php');
            
            try {
                $sql = "SELECT p.idPayer, 
                            CONCAT(pe.Nom, ' ', pe.Prenom) AS 'Nom', 
                            t.Diplome,
                            t.Montant,
                            p.Date 
                        FROM payer p 
                        JOIN personnes pe ON p.IM = pe.IM 
                        JOIN tarif t ON p.num_tarif = t.num_tarif
                        WHERE p.Date BETWEEN :dateDebut AND :dateFin
                        ORDER BY p.Date DESC";
                        
                $stmt = $db->prepare($sql);
                $stmt->execute(['dateDebut' => $dateDebut, 'dateFin' => $dateFin]);
                return $stmt; // Renvoyer directement le PDOStatement pour utilisation avec fetch()
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                return false;
            }
        }
        
        public static function getPayerForPDF($idPayer) {
            include('../Model/MySQL.php');
            
            try {
                $sql = "SELECT p.idPayer, pe.IM, pe.Nom, pe.Prenom, t.Diplome, t.Montant, p.Date 
                        FROM payer p 
                        JOIN personnes pe ON p.IM = pe.IM 
                        JOIN tarif t ON p.num_tarif = t.num_tarif
                        WHERE p.idPayer = :idPayer";
                $stmt = $db->prepare($sql);
                $stmt->execute(['idPayer' => $idPayer]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Erreur dans getPayerForPDF: " . $e->getMessage());
                return false;
            }
        }

        public static function handleDeceasedPensioner($IM) {
            include('../Model/MySQL.php');
            
            try {
                // Démarrer une transaction pour assurer la cohérence des données
                $db->beginTransaction();
    
                // Récupérer les informations de la personne décédée
                $sqlPerson = "SELECT p.*, t.Montant 
                FROM personnes p 
                JOIN payer py ON p.IM = py.IM 
                JOIN tarif t ON py.num_tarif = t.num_tarif 
                WHERE p.IM = :IM AND p.Statut = 'Decedé'";
                $stmtPerson = $db->prepare($sqlPerson);
                $stmtPerson->execute(['IM' => $IM]);
                $person = $stmtPerson->fetch(PDO::FETCH_ASSOC);

    
                if ($person) {
                    // Récupérer les informations du conjoint
                    $sqlConjoint = "SELECT * FROM conjoint WHERE num_Pension = :IM";
                    $stmtConjoint = $db->prepare($sqlConjoint);
                    $stmtConjoint->execute(['IM' => $IM]);
                    $conjoint = $stmtConjoint->fetch(PDO::FETCH_ASSOC);
    
                    if ($conjoint) {
                        // Calculer 40 % du montant original
                        $newMontant = $person['Montant'] * 0.4;
    
                        // Générer un nouvel IM unique pour le conjoint (ex. "CJ" + num_Pension)
                        $newIM = "CJ" . $conjoint['num_Pension'] . time();
    
                        // Insérer le conjoint comme nouveau pensionné dans la table personnes
                        $sqlNewPerson = "INSERT INTO personnes (IM, Nom, Prenom, Datenais, Contact, Statut, Situation)
                        VALUES (:IM, :Nom, :Prenom, :Datenais, '0321599555', 'Vivant', 'Conjoint')";
                        $stmtNewPerson = $db->prepare($sqlNewPerson);
                        $stmtNewPerson->execute([
                        'IM' => $newIM,
                        'Nom' => $conjoint['NomConjoint'],
                        'Prenom' => $conjoint['PrenomConjoint'],
                        'Datenais' => $conjoint['DatenaisConjoint'] // Utilisation de la date réelle
                        ]);

    
                        // Créer une nouvelle entrée dans la table tarif avec 40 % du montant
                        $newNumTarif = "TAR" . time(); // Générer un num_tarif unique
                        $sqlNewTarif = "INSERT INTO tarif (num_tarif, Diplome, Categorie, Montant)
                                      VALUES (:num_tarif, :Diplome, :Categorie, :Montant)";
                        $stmtNewTarif = $db->prepare($sqlNewTarif);
                        $stmtNewTarif->execute([
                            'num_tarif' => $newNumTarif,
                            'Diplome' => 'Conjoint Pension', // Peut être ajusté selon vos besoins
                            'Categorie' => 'Conjoint',
                            'Montant' => $newMontant
                        ]);
    
                        // Insérer une nouvelle entrée dans la table payer pour le conjoint
                        $sqlNewPayer = "INSERT INTO payer (IM, num_tarif, Date)
                                      VALUES (:IM, :num_tarif, NOW())";
                        $stmtNewPayer = $db->prepare($sqlNewPayer);
                        $stmtNewPayer->execute([
                            'IM' => $newIM,
                            'num_tarif' => $newNumTarif
                        ]);
    
                        // Valider la transaction
                        $db->commit();
                        return true;
                    }
                }
                $db->rollBack(); // Annuler si aucune donnée n'est trouvée
                return false;
            } catch (PDOException $e) {
                $db->rollBack(); // Annuler en cas d'erreur
                echo "Erreur : " . $e->getMessage();
                return false;
            }
        }
    
    
    }

?>
