<?php
    // Vérifier que $payerData est défini et non nul
    if (!isset($payerData) || $payerData === null) {
        header("Location: ../Controller/TablePayerController.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }

    .form-container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        padding: 30px;
    }

    .form-header {
        margin-bottom: 30px;
        text-align: center;
    }

    .form-header h1 {
        color: #333;
        font-size: 28px;
        margin-bottom: 10px;
    }

    .form-header p {
        color: #666;
        font-size: 16px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
    }

    .form-control, .form-select {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 16px;
        transition: border-color 0.3s, box-shadow 0.3s;
        background-color: #fff;
        color: #333;
    }

    .form-control:focus, .form-select:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 2px rgba(74, 144, 226, 0.2);
        outline: none;
    }

    .form-control::placeholder {
        color: #aaa;
    }

    .form-select {
        appearance: none; /* Supprime l'apparence par défaut du select */
        background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23333' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 12px;
    }

    .radio-group {
        display: flex;
        gap: 15px;
    }

    .radio-option {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .radio-option input {
        margin-right: 8px;
        cursor: pointer;
    }

    .checkbox-option {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .checkbox-option input {
        margin-right: 8px;
        cursor: pointer;
    }

    .btn {
        display: inline-block;
        padding: 12px 24px;
        background-color: #4a90e2;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
    }

    .btn:hover {
        background-color: #3a7bc8;
    }

    .btn:active {
        background-color: #2d62a3;
    }

    .form-footer {
        margin-top: 15px;
        text-align: center;
        font-size: 14px;
        color: #666;
    }

    /* Style pour le séparateur <hr> */
    hr {
        border: 0;
        height: 1px;
        background-color: #ddd;
        margin: 20px 0;
    }

    /* Style pour les messages d'erreur/succès */
    .alert {
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 14px;
        text-align: center;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* Style pour les boutons "SAUVEGARDER" et "ANNULER" */
    .boutonbou {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .bt {
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s;
        text-align: center;
        text-decoration: none;
    }

    .bt[type="submit"] {
        background-color: #4a90e2;
        color: white;
    }

    .bt[type="submit"]:hover {
        background-color: #3a7bc8;
    }

    .bt[type="submit"]:active {
        background-color: #2d62a3;
    }

    .bt[href] {
        background-color: #6c757d;
        color: white;
    }

    .bt[href]:hover {
        background-color: #5a6268;
    }

    .bt[href]:active {
        background-color: #4a5056;
    }

    /* Style pour le texte d'information sous les champs */
    .form-text {
        color: #666;
        font-size: 14px;
        margin-top: 5px;
    }
</style>

    <title>Modifier un paiement</title>
</head>
<body>
<div class="form-container">
        <div class="form-header">
            <h1>Formulaire de Personne</h1>

        </div>
    
                   
                    <div class="card-body">
                        <!-- Affichage des messages d'erreur/succès -->
                        <?php if (!empty($message)): ?>
                            <div class="alert alert-<?= $messageType ?> alert-dismissible fade show" role="alert">
                                <?= $message ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                        <form method="post" action="../Controller/PayerEditController.php">
                            <!-- Champ caché pour l'ID -->
                            <input type="hidden" name="idPayer" value="<?= htmlspecialchars($payerData['idPayer']) ?>">
                        </div>
                            <div class="form-group">
                                <label for="Nom" class="form-label">Nom et Prénom</label>
                                <select class="form-select" name="Nom" id="Nom" required>
                                    <option value="">Choisir...</option>
                                    <?php foreach($personnes as $personne): ?>
                                        <option value="<?= htmlspecialchars($personne['IM']) ?>" 
                                            <?= ($payerData['IM'] == $personne['IM']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($personne['Nom'] . ' ' . $personne['Prenom']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-text">Sélectionnez la personne concernée par ce paiement.</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="Diplome" class="form-label">Diplôme</label>
                                <select class="form-select" name="Diplome" id="Diplome" required>
                                    <option value="">Choisir...</option>
                                    <?php foreach($tarifs as $tarif): ?>
                                        <option value="<?= htmlspecialchars($tarif['num_tarif']) ?>" 
                                            <?= ($payerData['num_tarif'] == $tarif['num_tarif']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($tarif['Diplome']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-text">Sélectionnez le diplôme correspondant.</div>
                            </div>

                            <div class="form-group">
                                <label for="Date" class="form-label">Date de paiement</label>
                                <input type="date" class="form-control" id="Date" name="Date" 
                                    value="<?= htmlspecialchars($payerData['Date']) ?>" required>
                                <div class="form-text">Date à laquelle le paiement a été effectué.</div>
                            </div>
                    
                            <div class="boutonbou">
                                <button class="bt" type="submit">SAUVEGARDER</button>
                                <!-- <a href="../Controller/TablePayerController.php" class="btn btn-outline-primary">ANNULER</a> -->
                            </div>
                        </form>
                    
                
        
                    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="../Views/Bootstrap/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
