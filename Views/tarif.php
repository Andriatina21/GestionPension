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

    /* Style pour le bouton "AJOUTER" */
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

    /* Style pour le titre de la table */
    h4 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
        font-size: 24px;
    }
</style>

  <title>TARIF</title>
</head>

<body>
<div class="form-container">
            <div class="form-header">
                <h1>Formulaire de Personne</h1>

            </div>
  <form class="contact-form" method="post" action="../Controller/TarifController.php">

    <div class="col-md-7 col-lg-8">
      <h4 class="mb-4 text-center"> TABLE TARIF</h4>

      <div class="row g-3">
        <div class="col-sm-6">
          <label for="num_Tarif" class="form-label">NUM_TARIF</label>
          <input type="text" class="form-control" id="num_Tarif" name="num_Tarif"  placeholder="" required>
          
        </div>

        <div class="col-md-12">
          <label for="Diplome" class="form-label">Diplome</label>
          <select class="form-select" id="Diplome" name="Diplome" required>
            <option value="" `>...</option>
            <option value="Pas de Categorie" >Pas de Categorie</option>
            <option value="Brevet des College" >Brevet des College</option>
            <option value="CAP,BEP" >CAP,BEP</option>
            <option value="BACC" >BACC</option>
            <option value="BTS" >BTS</option>
            <option value="License" >License</option>
            <option value="Master" >Master</option>
            <option value="Doctorat" >Doctorat</option>
          </select>
          
        </div>

        <div class="col-md-12">
          <label for="Categorie" class="form-label">Categorie</label>
          <select class="form-select" id="Categorie" name="Categorie" required>
            <option value="">...</option>
            <option value="Niveau 1"> Niveau 1</option>
            <option value="Niveau 2"> Niveau 2</option>
            <option value="Niveau 3"> Niveau 3</option>
            <option value="Niveau 4"> Niveau 4</option>
            <option value="Niveau 5"> Niveau 5</option>
            <option value="Niveau 6"> Niveau 6</option>
            <option value="Niveau 7"> Niveau 7</option>
            <option value="Niveau 8"> Niveau 8</option>
          </select>
         
        </div>

        <div class="col-12">
          <label for="Montant" class="form-label">MONTANT </label>
          <input type="number" class="form-control" id="Montant" name="Montant"  placeholder="En Ariary" required>
          
        </div>

        <hr class="my-4 col-md-3">
        <button class="w-100 btn btn-primary btn-lg" type="submit">AJOUTER</button            >

      </div>
    </div>
  </form>
</body>

</html>