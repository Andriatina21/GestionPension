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
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 2px rgba(74, 144, 226, 0.2);
            outline: none;
        }
        
        .form-control::placeholder {
            color: #aaa;
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

        hr.my-4 {
            margin: 25px 0;
            border: 0;
            border-top: 1px solid #eee;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .col-md-3 {
            flex: 0 0 100%;
            max-width: 100%;
            padding: 0 10px;
        }
    </style>
    <title>Ajout Personne</title>
</head>
<body>
<div class="form-container">
    <div class="form-header">
        <h1>Formulaire de Personne</h1>
    </div>
    <form class="needs-validation" method="post" action="../Controller/PersonneController.php" novalidate>
        <div class="form-group">
            <label for="IM" class="form-label">IM</label>
            <input type="text" class="form-control" id="IM" name="IM" placeholder="" value="" required>
        </div>

        <div class="form-group">
            <label for="Nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="Nom" name="Nom" placeholder="" value="" required>
        </div>

        <div class="form-group">
            <label for="Prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="Prenom" name="Prenom" value="" required>
        </div>

        <div class="form-group">
            <label for="Datenais" class="form-label">Date de Naissance</label>
            <input type="date" class="form-control" id="Datenais" name="Datenais">
        </div>

        <div class="form-group">
            <label for="Telephone" class="form-label">Télephone</label>
            <input type="number" class="form-control" id="Telephone" name="Telephone" placeholder="+261" required>
        </div>

        <div class="form-group">
            <label for="Statut" class="form-label">Statut</label>
            <select class="form-select" id="Statut" name="Statut" required>
                <option value="">...</option>
                <option value="Vivant">Vivant</option>
                <option value="Decedé">Decedé</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Situation" class="form-label">Situation</label>
            <select class="form-select" id="Situation" name="Situation" required>
                <option value="">...</option>
                <option value="Marié(e)">Marié(e)</option>
                <option value="Divorcé(e)">Divorcé(e)</option>
                <option value="Veuf(ve)">Veuf(ve)</option>
            </select>
        </div>

        <hr class="my-4">
        <button class="btn btn-primary" type="submit">AJOUTER</button>
    </form>
</div>
</body>
</html>
