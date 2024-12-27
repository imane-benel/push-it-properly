<?php
// Inclure la connexion à la base de données
include('db_connection.php');
include('barre.php');

// Requête pour récupérer les établissements
$sql = "SELECT * FROM etablissements";
$stmt = $conn->prepare($sql);
$stmt->execute();
$etablissements = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les établissements</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
            color: #333;
            padding-top: 50px;
        }
        .container {
            text-align: center;
            width: 50%;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Liste des établissements</h2>

    <table>
        <tr>
            <th>Nom de l'établissement</th>
        </tr>

        <?php
        // Affichage des établissements
        foreach ($etablissements as $etablissement) {
            echo "<tr><td>" . htmlspecialchars($etablissement['nom_etablissement']) . "</td></tr>";
        }
        ?>

    </table>
</div>

</body>
</html>

