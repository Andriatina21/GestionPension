<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des pensions payées</title>
    <!-- Bootstrap CSS -->
    <link href="../Views/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

   


    <div class="container mt-4">
        <h1 class="mb-4">Liste des pensions payées entre deux dates</h1>
        
        <!-- Formulaire de recherche -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="dateDebut" class="form-label">Date de début</label>
                                <input type="date" class="form-control" id="dateDebut" name="dateDebut" value="<?php echo $dateDebut; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="dateFin" class="form-label">Date de fin</label>
                                <input type="date" class="form-control" id="dateFin" name="dateFin" value="<?php echo $dateFin; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100" name="recherche" value="true">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Tableau des résultats -->
        <?php if ($recherche): ?>
            <div class="card">
                <div class="card-header">
                    <h5>Résultats du <?php echo date('d/m/Y', strtotime($dateDebut)); ?> au <?php echo date('d/m/Y', strtotime($dateFin)); ?></h5>
                </div>
                <div class="card-body">
                    <?php if ($paiements && $paiements->rowCount() > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Diplôme</th>
                                        <th>Montant</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $total = 0;
                                    while ($row = $paiements->fetch(PDO::FETCH_ASSOC)): 
                                        $total += $row['Montant'];
                                    ?>
                                        <tr>
                                            <td><?php echo $row['idPayer']; ?></td>
                                            <td><?php echo htmlspecialchars($row['Nom']); ?></td>
                                            <td><?php echo htmlspecialchars($row['Diplome']); ?></td>
                                            <td><?php echo number_format($row['Montant'], 0, ',', ' '); ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($row['Date'])); ?></td>
                                            
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end">Total:</th>
                                        <th><?php echo number_format($total, 0, ',', ' '); ?></th>
                                        <th colspan="2"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <p class="mt-3">Nombre de paiements: <?php echo $paiements->rowCount(); ?></p>
                    <?php else: ?>
                        <div class="alert alert-info">
                            Aucun paiement trouvé pour cette période.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Bouton pour imprimer -->
            <div class="mt-3">
                <!-- <button onclick="window.print();" class="btn btn-secondary">Imprimer</button> -->
                <a href="../Controller/TablePayerController.php" class="btn btn-outline-primary">Retour</a>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
