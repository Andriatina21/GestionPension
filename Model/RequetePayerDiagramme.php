<?php
// ../Model/RequetePayerDiagramme.php

class RequetePayerDiagramme {
    

    public function getChartData() {
        include('../Model/MySQL.php');
        // Données pour le diagramme par mois et diplôme
        $diplomesData = [];
        try {
            $sql = "SELECT 
                      MONTH(p.Date) as mois, 
                      t.Diplome, 
                      COUNT(*) as nombre, 
                      SUM(t.Montant) as montant_total
                    FROM payer p
                    JOIN tarif t ON p.num_tarif = t.num_tarif
                    WHERE YEAR(p.Date) = YEAR(CURRENT_DATE)
                    GROUP BY MONTH(p.Date), t.Diplome
                    ORDER BY MONTH(p.Date), t.Diplome";
            $stmt = $db->query($sql);
            $diplomesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur dans getChartData (diplômes): " . $e->getMessage());
        }
        
        // Données pour le diagramme par mois et personne
        $personnesData = [];
        try {
            $sql = "SELECT 
                      MONTH(p.Date) as mois, 
                      CONCAT(pe.Nom, ' ', pe.Prenom) as personne,
                      COUNT(*) as nombre,
                      SUM(t.Montant) as montant_total
                    FROM payer p
                    JOIN personnes pe ON p.IM = pe.IM
                    JOIN tarif t ON p.num_tarif = t.num_tarif
                    WHERE YEAR(p.Date) = YEAR(CURRENT_DATE)
                    GROUP BY MONTH(p.Date), pe.IM
                    ORDER BY MONTH(p.Date), personne";
            $stmt = $db->query($sql);
            $personnesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur dans getChartData (personnes): " . $e->getMessage());
        }
        
        // Formater les mois en noms au lieu de chiffres
        $moisNoms = [
            1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril',
            5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août',
            9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'
        ];
        
        foreach ($diplomesData as &$data) {
            $data['mois_nom'] = $moisNoms[$data['mois']];
        }
        
        foreach ($personnesData as &$data) {
            $data['mois_nom'] = $moisNoms[$data['mois']];
        }
        
        return [
            'diplomes' => $diplomesData,
            'personnes' => $personnesData
        ];
    }
    
    public function getDiplomesTotalData() {
        include('../Model/MySQL.php');
        $totalsData = [];
        try {
            $sql = "SELECT 
                      t.Diplome, 
                      SUM(t.Montant) as montant_total
                    FROM payer p
                    JOIN tarif t ON p.num_tarif = t.num_tarif
                    WHERE YEAR(p.Date) = YEAR(CURRENT_DATE)
                    GROUP BY t.Diplome
                    ORDER BY montant_total DESC";
            $stmt = $db->query($sql);
            $totalsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur dans getDiplomesTotalData: " . $e->getMessage());
        }
        
        return $totalsData;
    }
    
    public function getPersonnesTotalData() {
        include('../Model/MySQL.php');
        $totalsData = [];
        try {
            $sql = "SELECT 
                      CONCAT(pe.Nom, ' ', pe.Prenom) as personne,
                      SUM(t.Montant) as montant_total
                    FROM payer p
                    JOIN personnes pe ON p.IM = pe.IM
                    JOIN tarif t ON p.num_tarif = t.num_tarif
                    WHERE YEAR(p.Date) = YEAR(CURRENT_DATE)
                    GROUP BY pe.IM
                    ORDER BY montant_total DESC
                    LIMIT 10";
            $stmt = $db->query($sql);
            $totalsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur dans getPersonnesTotalData: " . $e->getMessage());
        }
        
        return $totalsData;
    }
}
?>
