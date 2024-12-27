<?php
// Inclure le fichier de connexion PDO
include('db_connection.php');
include('barre.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer le nom de l'établissement depuis le formulaire
    $nom_etablissement = $_POST['nom_etablissement'];

    // Préparer la requête d'insertion avec PDO
    $sql = "INSERT INTO etablissements (nom_etablissement) VALUES (:nom_etablissement)";

    // Préparer la requête et l'exécuter avec les paramètres liés
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nom_etablissement', $nom_etablissement);

    try {
        // Exécuter la requête
        $stmt->execute();

        // Redirection vers une autre page après soumission (par exemple, menu.php)
        header("Location: menu.php?status=success");
        exit();
    } catch (PDOException $e) {
        // Afficher l'erreur si l'insertion échoue
        echo "Erreur SQL : " . $e->getMessage();
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un établissement</title>
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
        input, button {
            width: 80%;
            padding: 10px;
            margin: 10px;
            font-size: 16px;
        }
        button {
            background-color: #3f8f97;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover {
            background-color: #31908b;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Ajouter un établissement</h2>
    <form action="ajouter_etablissement.php" method="POST">
        <input type="text" name="nom_etablissement" placeholder="Nom de l'établissement" required>

        <button type="submit">Ajouter</button>
    </form>
</div>

<!-- Affichage du message de succès -->
<?php
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo "<p style='color: green; text-align: center;'>Etablissement ajouté avec succès !</p>";
}
?>

</body>
</html>


