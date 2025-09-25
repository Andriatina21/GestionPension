<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Pension - Accueil</title>
    <style>
        /* Reset CSS de base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f1f5f9; /* Fond gris très clair */
            color: #1e293b;
            padding-top: 60px; /* Espace pour le navbar */
        }
        
        /* Style de base pour le navbar */
        .navbar {
            background-color: #1e3a8a; /* Bleu foncé */
            overflow: hidden;
            position: fixed;
            top: 0;
            left:0;
            width: 100%;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            z-index: 1000;
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
        
        /* Conteneur principal */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Bannière d'accueil */
        .hero {
            background-color: #1e3a8a;
            color: white;
            border-radius: 8px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        .hero p {
            font-size: 1.1rem;
            max-width: 70%;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .hero::after {
            content: "";
            position: absolute;
            right: -100px;
            top: -50px;
            width: 300px;
            height: 300px;
            background-color: rgba(59, 130, 246, 0.3);
            border-radius: 50%;
            z-index: 0;
        }
        
        /* Carte de fonctionnalité */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .feature-card {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .feature-card h2 {
            color: #1e3a8a;
            margin-bottom: 15px;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .feature-card p {
            color: #64748b;
            line-height: 1.6;
        }
        
        .feature-icon {
            background-color: #dbeafe;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #1e3a8a;
            font-size: 1.5rem;
        }
        
        /* Statistiques */
        .stats {
            background-color: #1e40af;
            border-radius: 8px;
            padding: 30px;
            color: white;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .stat-item h3 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .stat-item p {
            font-size: 1rem;
            opacity: 0.9;
        }
        
        /* Section d'information */
        .info-section {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .info-section h2 {
            color: #1e3a8a;
            margin-bottom: 20px;
            font-size: 1.8rem;
            border-bottom: 2px solid #dbeafe;
            padding-bottom: 10px;
        }
        
        .info-section p {
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        
        /* Pied de page */
        footer {
            background-color: #111827;
            color: white;
            padding: 30px 0;
            text-align: center;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        
        .footer-section {
            flex: 1;
            min-width: 250px;
            padding: 20px;
        }
        
        .footer-section h3 {
            margin-bottom: 15px;
            color: #3b82f6;
        }
        
        .footer-section p {
            color: #cbd5e1;
            line-height: 1.6;
        }
        
        .copyright {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #1e293b;
            width: 100%;
            text-align: center;
            color: #94a3b8;
        }
        
        /* Bouton */
        .btn {
            display: inline-block;
            background-color: #3b82f6;
            color: white;
            padding: 12px 25px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .btn:hover {
            background-color: #1e40af;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="../Views/Home.php" class="black-contrast active">Menu</a>
        <a href="../Controller/TablePersonneController.php">Personne</a>
        <a href="../Controller/TableTarifController.php">Tarif</a>
        <a href="../Controller/TableConjointController.php">Conjoint</a>
        <a href="../Controller/TablePayerController.php">Payer</a>
    </div>

    <!-- Contenu principal -->
    <div class="container">
        <!-- Bannière d'accueil -->
        <div class="hero">
            <h1>Bienvenue sur le système de gestion de pension</h1>
            <p>Une solution complète pour gérer efficacement vos pensionnaires, tarifs et paiements en toute simplicité.</p>
            <a href="../Controller/TablePersonneController.php" class="btn">Commencer la gestion</a>
        </div>
        
        <!-- Cartes de fonctionnalités -->
        <div class="features">
            <div class="feature-card">
                <h2><div class="feature-icon">👤</div> Gestion des personnes</h2>
                <p>Gérez facilement l'ensemble des pensionnaires et leurs informations personnelles. Ajoutez, modifiez ou consultez les données en quelques clics.</p>
            </div>
            <div class="feature-card">
                <h2><div class="feature-icon">💶</div> Gestion des tarifs</h2>
                <p>Définissez et personnalisez les différentes grilles tarifaires selon les catégories de pensionnaires et les services proposés.</p>
            </div>
            <div class="feature-card">
                <h2><div class="feature-icon">💑</div> Gestion des conjoints</h2>
                <p>Associez les conjoints aux pensionnaires pour une meilleure organisation familiale et des tarifs adaptés aux couples.</p>
            </div>
            <div class="feature-card">
                <h2><div class="feature-icon">💳</div> Suivi des paiements</h2>
                <p>Suivez l'état des paiements, générez des factures et gardez une trace complète de l'historique financier de chaque pensionnaire.</p>
            </div>
        </div>
        
        <!-- Statistiques -->
        <div class="stats">
            <div class="stat-item">
                <h3>120+</h3>
                <p>Pensionnaires</p>
            </div>
            <div class="stat-item">
                <h3>15</h3>
                <p>Types de tarifs</p>
            </div>
            <div class="stat-item">
                <h3>98%</h3>
                <p>Taux de satisfaction</p>
            </div>
            <div class="stat-item">
                <h3>24/7</h3>
                <p>Support disponible</p>
            </div>
        </div>
        
        <!-- Section d'information -->
        <div class="info-section">
            <h2>À propos du système de gestion</h2>
            <p>Notre système de gestion de pension a été conçu pour simplifier le travail administratif lié à la gestion quotidienne des pensionnaires. Grâce à une interface intuitive et des fonctionnalités complètes, vous pouvez désormais consacrer plus de temps à l'accompagnement humain et moins aux tâches administratives.</p>
            <p>Le système centralise toutes les informations essentielles : coordonnées des pensionnaires, situation familiale, tarifs appliqués, historique des paiements, et bien plus encore. Tout est accessible depuis un tableau de bord unique et sécurisé.</p>
        </div>
        
        <!-- Tableau récapitulatif des actions rapides -->
        <div class="info-section">
            <h2>Actions rapides</h2>
            <p>Retrouvez ci-dessous les actions les plus fréquemment utilisées dans le système :</p>
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr style="background-color: #dbeafe; color: #1e3a8a;">
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #3b82f6;">Module</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #3b82f6;">Description</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #3b82f6;">Accès rapide</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 12px; font-weight: bold;">Personnes</td>
                        <td style="padding: 12px;">Gestion des pensionnaires et leurs informations</td>
                        <td style="padding: 12px;"><a href="../Controller/TablePersonneController.php" style="color: #3b82f6; text-decoration: none;">Accéder →</a></td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 12px; font-weight: bold;">Tarifs</td>
                        <td style="padding: 12px;">Configuration des différentes grilles tarifaires</td>
                        <td style="padding: 12px;"><a href="../Controller/TableTarifController.php" style="color: #3b82f6; text-decoration: none;">Accéder →</a></td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 12px; font-weight: bold;">Conjoints</td>
                        <td style="padding: 12px;">Association des couples et gestion familiale</td>
                        <td style="padding: 12px;"><a href="../Controller/TableConjointController.php" style="color: #3b82f6; text-decoration: none;">Accéder →</a></td>
                    </tr>
                    <tr>
                        <td style="padding: 12px; font-weight: bold;">Paiements</td>
                        <td style="padding: 12px;">Suivi des factures et historique financier</td>
                        <td style="padding: 12px;"><a href="../Controller/TablePayerController.php" style="color: #3b82f6; text-decoration: none;">Accéder →</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pied de page -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Système de Gestion</h3>
                <p>Une solution complète pour la gestion efficace de vos pensionnaires et de vos services.</p>
            </div>
            <div class="footer-section">
                <h3>Liens utiles</h3>
                <p><a href="../Views/Home.php" style="color: #cbd5e1; text-decoration: none;">Accueil</a></p>
                <p><a href="../Controller/TablePersonneController.php" style="color: #cbd5e1; text-decoration: none;">Gestion des personnes</a></p>
                <p><a href="../Controller/TableTarifController.php" style="color: #cbd5e1; text-decoration: none;">Gestion des tarifs</a></p>
            </div>
            <div class="footer-section">
                <h3>Contact support</h3>
                <p>Email: support@gestion-pension.fr</p>
                <p>Téléphone: 01 23 45 67 89</p>
            </div>
            <div class="copyright">
                <p>&copy; 2025 Système de Gestion de Pension. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

</body>
</html>
