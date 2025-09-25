<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/Bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
        }
        
        .form-header {
            margin-bottom: 30px;
            text-align: center;
        }
        
        .form-header h4 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }
        
        .form-col {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 0 15px;
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }
        
        .btn-submit {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
        
        .btn-submit:hover {
            background-color: #3a7bc8;
        }
        
        hr.separator {
            margin: 25px 0;
            border: 0;
            border-top: 1px solid #eee;
        }
    </style>
    <title>Formulaire Conjoint</title>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h4>Informations Personnelles des Conjoints</h4>
        </div>
        
        <form method="post" action="../Controller/ConjointController.php" class="needs-validation" novalidate>
            <div class="form-row">
                <div class="form-col">
                    <label for="num_Pension" class="form-label">Numéro Pension</label>
                    <input type="text" class="form-control" id="num_Pension" name="num_Pension" required>
                </div>
                
                <div class="form-col">
                    <label for="NomConjoint" class="form-label">Nom du Conjoint</label>
                    <input type="text" class="form-control" id="NomConjoint" name="NomConjoint" required>
                </div>
                
                <div class="form-col">
                    <label for="PrenomConjoint" class="form-label">Prénom du Conjoint</label>
                    <input type="text" class="form-control" id="PrenomConjoint" name="PrenomConjoint" required>
                </div>
                
                <div class="form-col">
                    <label for="DatenaisConjoint" class="form-label">Date de naissance du conjoint</label>
                    <input type="date" class="form-control" id="DatenaisConjoint" name="DatenaisConjoint" required>
                </div>
            </div>
            
            <hr class="separator">
            <button class="btn-submit" type="submit">AJOUTER</button>
        </form>
    </div>
</body>
</html>
