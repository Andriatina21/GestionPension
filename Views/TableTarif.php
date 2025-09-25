<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table des personnes</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
            display: flex;
            justify-content: center;
        }

        .table-container {
            width: 98%;
            max-width: 900px;
            margin-top: 100px;
            background-color: #fff;
            padding: 30px;
            padding-bottom: 100%;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

         /* Style de base pour le navbar */
         .navbar {
            background-color: #1e3a8a; /* Bleu foncé */
            overflow: hidden;
            position: fixed;
            top: 0;
            width: 100%;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Style des liens dans le navbar */
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 17px;
           
           
            transition: background-color 0.3s ease;
        }

        /* Changement de couleur au survol */
        .navbar a:hover {
            background-color: #3b82f6; /* Bleu plus clair */
            color: black;
        }

        /* Style pour l'option active (si nécessaire) */
        .navbar a.active {
            background-color: #1e40af; /* Bleu encore plus foncé */
            color: white;
        }

        /* Ajout d'un peu de noir pour le contraste */
        .navbar a.black-contrast {
            background-color: #111827; /* Noir */
            color: white;
        }

        .navbar a.black-contrast:hover {
            background-color: #374151; /* Gris foncé */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .placement {
            display: flex;
            justify-content: space-between;
        }

        .modifier {
            background-color: #ffc107;
            color: rgb(136, 136, 136);
        }

        .modifier:hover {
            background-color: #e0a800;
        }

        .supprimer {
            background-color: #dc3545;
            color: white;
            margin-left: 8px;
        }
        

        .supprimer:hover {
            background-color: #c82333;
        }

        .btn-btn-secondary {
            padding: 7px;
        }

        .barredeRecherche {
            width: 50%;
            max-width: 350px;
            min-width:350px;
            padding-bottom: 5%;
            margin-top: 8vh;
           
            
           
        }
        .contour-bouton{
            margin: 2vh;
            
            display: flex;
            
            justify-content: center;
        }

        .typebouton{
            margin: 2vh;
            
        }
        .typebouton2{
            margin: 2vh;
            padding-top: 0.5vh;
        }
        
        
        .barredeRecherche form {
            display: flex;
            border-radius: 50px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .barredeRecherche:hover form {
         
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .barredeRecherche input[type="search"] {
        
            padding: 5px 5px;
            border: none;
            outline: none;
            background: white;
            color: black;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        
        .barredeRecherche input[type="search"]::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .barredeRecherche input[type="submit"] {
            padding: 0 35px;
            background: #5e9eff;
            color: black;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        
        .barredeRecherche input[type="submit"]:hover {
            background: #3d7edb;
        }
        
        /* Animation lors de la saisie */
        .barredeRecherche input[type="search"]:focus {
            background: rgba(255, 255, 255, 0.05);
        }
        
        .barredeRecherche input[type="search"]:not(:placeholder-shown) + input[type="submit"] {
            background: #3d7edb;
        }
        
        /* Effet glow lors du focus */
        .barredeRecherche form:focus-within {
            box-shadow: 0 0 0 2px rgba(94, 158, 255, 0.5);
        }
        
        /* Responsive - maintient la disposition côte à côte même sur petit écran */
        @media (max-width: 600px) {
            .barredeRecherche {
                max-width: 90%;
            }
            
            .barredeRecherche input[type="search"] {
                padding: 12px 15px;
                font-size: 14px;
            }
            
            .barredeRecherche input[type="submit"] {
                padding: 0 15px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
 
    <div class="navbar">
        <a href="../Views/Home.php">Menu</a>
        <a href="../Controller/TablePersonneController.php" >Personne</a>
        <a href="../Controller/TableTarifController.php" class="black-contrast">Tarif</a>
        <a href="../Controller/TableConjointController.php">Conjoint</a>
        <a href="../Controller/TablePayerController.php">Payer</a>
    </div>


    <form class="d-flex" action="../Controller/TableTarifController.php">
        <input class="form-control me-2" type="search" name="key" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
        </div>
        <div class="table-container">
            <h1> Table des tarif</h1>
            <table class="tableau">
                <thead>
                    <tr>
                        <th>num_Tarif</th>
                        <th>Diplome</th>
                        <th>Categorie</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       
                        //Boucler sur le variable
                         while ( $row = $resultatTarif->fetch((PDO::FETCH_ASSOC))){


                    ?>
                        <tr>
                            <td><?=$row['num_Tarif'] ?></td>
                            <td><?=$row['Diplome'] ?></td>
                            <td><?=$row['Categorie'] ?></td>
                            <td><?=$row['Montant'] ?></td>
                            <td>
                                <a href="../Controller/TarifEditController.php?num_Tarif=<?=$row['num_Tarif']?>" class="btn btn-primary btn-sm"><img src="../Views/icon/editer.png" alt=""></a>
                                <a href="../Controller/TarifDeleleController.php?num_Tarif=<?=$row['num_Tarif']?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette personne ?');"><img src="../Views/icon/supprimer (1).png" alt=""></a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <div class="contour-bouton">
                <a href="../Controller/TarifController.php" class="btn btn-secondary"><img src="../Views/icon/ajouter.png" alt=""></a>
            </div>
        </div>
</body>
</html>
