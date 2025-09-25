<!-- ../Views/PayerDiagramme.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/Bootstrap/css/bootstrap.min.css">
    <script src="../Views/amcharts5/index.js"></script>
    <script src="../Views/amcharts5/xy.js"></script>
    <script src="../Views/amcharts5/themes/Animated.js"></script>
    <title>Diagramme des Paiements</title>
</head>
<body>
    <div class="container">
        <h1>Diagramme par Diplôme</h1>
        <div id="chartdiv" style="width: 100%; height: 500px;"></div>
        <a href="../Controller/TablePayerController.php" class="btn btn-secondary mt-3">Retour</a>
    </div>

    <script>
        // Pass PHP data to JavaScript
        var diplomesData = <?php echo json_encode($data['diplomesTotal']); ?>;
    </script>
    <script src="../Views/Diagramme.js"></script>
</body>
</html>