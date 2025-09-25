<!DOCTYPE html>
<html lang="en">
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

    /* Style pour les messages d'erreur */
    .invalid-feedback {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }

    /* Style pour le bouton "SAUVEGARDER" */
    .btn-primary {
        background-color: #4a90e2;
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #3a7bc8;
    }

    .btn-primary:active {
        background-color: #2d62a3;
    }

    /* Style pour le texte d'information sous les champs */
    .form-text {
        color: #666;
        font-size: 14px;
        margin-top: 5px;
    }
</style>

    <title>Personal Modification</title>
</head>
<body>
<div class="form-container"> 
        <div class="form-header">
            <h1>Formulaire de Personne</h1>
            <p>Veuillez remplir le formulaire ci-dessous modifier les information necessaire</p>
        </div> 
    <form id="contact-form" method="post" action="../Controller/PersonneEditController.php">
    <div class="col-md-7 col-lg-9 " >
        
        <form class="needs-validation" novalidate>
            <!--div class="row g-3"-->
                <div class="form-group">
                    <label for="IM" class="form-label">IM</label>
                    <input type="text" id="IM" class="form-control"  name="IM" placeholder="" value="<?= isset($Data) ? $Data['IM'] : '' ?>" required>
                  
                </div>

                <div class="form-group">
                    <label for="Nom" class="form-label">Nom</label>
                    <input type="text" id="telephone" class="form-control" name="Nom" placeholder="" value="<?= isset($Data) ? $Data['Nom'] : '' ?>" required>
                     
                </div>

                <div class="form-group">
                    <label for="Prenom" class="form-label">Prénom</label>
                    <input type="text" id="telephone" class="form-control" name="Prenom" value="<?= isset($Data) ? $Data['Prenom'] : '' ?>" required>
                    
                </div>
            <!--/div-->
            <div class="form-group">
                <div class="col-3">
                        <label for="Datenais" class="form-label">Date de Naissance </label>
                        <input type="date" class="form-control" id="Datenais" name="Datenais" value="<?= isset($Data) ? $Data['Datenais'] : '' ?>">
                        
                </div>

                <div class="form-group">
                <label for="Télephone" class="form-label">Télephone</label>
                <input type="number" class="form-control" id="Telephone" name="Telephone" placeholder="+261" value="<?= isset($Data) ? $Data['Contact'] : '' ?>">
               
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-3">
                    <label for="Statut" class="form-label">Statut</label>
                    <select class="form-select" id="Statut" name="Statut" required>
                        <option value="">...</option>
                        <option value="Vivant" <?= isset($Data) && $Data['Statut'] == 'Vivant' ? 'selected' : '' ?>>Vivant</option>
                        <option value="Decedé" <?= isset($Data) && $Data['Statut'] == 'Decedé' ? 'selected' : '' ?>>Decedé</option>
                    </select>    
                    </div>

                    <div class="form-group">
                    <label for="Situation" class="form-label">Situation</label>
                    <select class="form-select" id="Situation" name="Situation" required>
                        <option value="">...</option>
                        <option value="Marié(e)" <?= isset($Data) && $Data['Situation'] == 'Marié(e)' ? 'selected' : '' ?>>Marié(e)</option>
                        <option value="Divorcé(e)" <?= isset($Data) && $Data['Situation'] == 'Divorcé(e)' ? 'selected' : '' ?>>Divorcé(e)</option>
                        <option value="Veuf(ve)" <?= isset($Data) && $Data['Situation'] == 'Veuf(ve)' ? 'selected' : '' ?>>Veuf(ve)</option>
                    </select>
                    </div>
            </div>
        
            <hr class="my-4 col-md-3">
                <button class="w-100 btn btn-primary btn-lg" type="submit">SAUVEGARDER</button>
            </hr>
        </form>    
    </div>
    </form>
</div>
</body>
</html>