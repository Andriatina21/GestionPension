<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/Bootstrap/css/bootstrap.min.css">
    <title>Liste des personnes par statut</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <h1>Liste des personnes par statut</h1>
                <p class="lead">Total des personnes: <span class="badge bg-primary"><?= $totalPersonnes ?></span></p>
            </div>
        </div>
        
        <!-- Affichage des statuts avec leur effectif -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Résumé par statut</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Statut</th>
                                    <th>Effectif</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($statuts && $statuts instanceof PDOStatement) {
                                    while ($row = $statuts->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['Statut']) ?></td>
                                    <td>
                                        <span class="badge bg-secondary"><?= $row['Effectif'] ?></span>
                                    </td>
                                    <td>
                                        <a href="?statut=<?= urlencode($row['Statut']) ?>" class="btn btn-sm btn-info">Détails</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>Aucune donnée disponible</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
        
        <!-- Liste détaillée si un statut est sélectionné -->
        <?php if ($statutFiltre && $personnesDetail): ?>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h4 class="mb-0">Personnes avec le statut: <?= htmlspecialchars($statutFiltre) ?></h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>IM</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date de naissance</th>
                                    <th>Contact</th>
                                    <th>Situation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($person = $personnesDetail->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?= htmlspecialchars($person['IM']) ?></td>
                                    <td><?= htmlspecialchars($person['Nom']) ?></td>
                                    <td><?= htmlspecialchars($person['Prenom']) ?></td>
                                    <td><?= htmlspecialchars($person['Datenais']) ?></td>
                                    <td><?= htmlspecialchars($person['Contact']) ?></td>
                                    <td><?= htmlspecialchars($person['Situation']) ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="row mt-3">
            <div class="col">
                <a href="../Controller/TablePersonneController.php" class="btn btn-secondary">Retour à la liste</a>
            </div>
        </div>
    </div>
    
    <script src="../Views/Bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Pour ajouter un graphique, vous pourriez utiliser Chart.js ou une autre bibliothèque -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script> -->
    <!-- <script>
        // Code pour créer le graphique
    </script> -->
</body>
</html>
