<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les informations de l'étudiant à modifier
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$etudiant) {
        echo "Étudiant non trouvé";
        exit();
    }

    if (isset($_POST['submit'])) {
        // Récupérer les nouvelles données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];

        // Mise à jour des données
        $sql = "UPDATE users SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        header("Location: afficher_etudiants.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Étudiant</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
            color: #333;
            padding-top: 50px; /* Espace ajouté en haut */
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }

        h2 {
            text-align: center;
            color: #3f8f97;
            margin-bottom: 30px;
            font-size: 26px;
        }

        label {
            font-size: 16px;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #3f8f97;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #31908b;
        }

        .btn-back {
            display: inline-block;
            padding: 8px 15px;
            background-color: #f4f7fc;
            color: #333;
            text-decoration: none;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
        }

        .btn-back:hover {
            background-color: #3f8f97;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Modifier les Informations de l'Étudiant</h2>
    <form method="POST">
        <label>Nom :</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($etudiant['nom']) ?>" required><br><br>

        <label>Prénom :</label>
        <input type="text" name="prenom" value="<?= htmlspecialchars($etudiant['prenom']) ?>" required><br><br>

        <label>Email :</label>
        <input type="email" name="email" value="<?= htmlspecialchars($etudiant['email']) ?>" required><br><br>

        <input type="submit" name="submit" value="Sauvegarder">
    </form>

    <a href="afficher_etudiants.php" class="btn-back">Retour à la liste des étudiants</a>
</div>

</body>
</html>

