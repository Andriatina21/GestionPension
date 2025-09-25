<?php
// ../Controller/PayerDiagrammeController.php
require_once '../Model/MySQL.php';

class PayerDiagrammeController {
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function showDiagram() {
        // Query to get data grouped by Diplome
        $query = "
            SELECT 
                t.Diplome,
                COUNT(DISTINCT p.IM) as nombre_personnes,
                SUM(t.Montant) as montant_total
            FROM tarif t
            JOIN payer py ON py.num_tarif = t.num_tarif
            JOIN personnes p ON p.IM = py.IM
            GROUP BY t.Diplome
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $diplomesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Format data for amCharts
        $data = [
            'diplomesTotal' => array_map(function($row) {
                return [
                    'Diplome' => $row['Diplome'],
                    'nombre_personnes' => (int)$row['nombre_personnes'],
                    'montant_total' => (int)$row['montant_total']
                ];
            }, $diplomesData)
        ];

        // Include the view
        require_once '../Views/PayerDiagramme.php';
    }
}

// Instantiate and show diagram
$controller = new PayerDiagrammeController();
$controller->showDiagram();