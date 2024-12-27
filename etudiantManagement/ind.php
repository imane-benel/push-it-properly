<?php
// Inclure le fichier de connexion PDO
include('db_connection.php');


// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs envoyées par le formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe']; // Récupérer le mot de passe

    // Préparer la requête d'insertion avec PDO pour la table 'fonctionnaires'
    $sql = "INSERT INTO fonctionnaires (nom, email, mot_de_passe) VALUES (:nom, :email, :mot_de_passe)";

    // Préparer la requête et l'exécuter avec les paramètres liés
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe);

    try {
        // Exécuter la requête
        $stmt->execute();

        // Redirection vers menu.php après soumission du formulaire
        header("Location: menu.php");
        exit();
    } catch (PDOException $e) {
        // Affichage d'un message d'erreur
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
    <title>Formulaire de Fonctionnaire</title>
    <style>
        /* Style global */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
            color: #333;
        }

        .container {
            width: 60%;
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
            margin-bottom: 20px;
            font-size: 26px;
        }

        /* Style du formulaire */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            font-size: 16px;
            color: #555;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            padding: 12px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 8px;
            width: 100%;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            border-color: #3f8f97;
            outline: none;
            box-shadow: 0 0 5px rgba(63, 143, 151, 0.6);
        }

        input[type="submit"] {
            padding: 14px 20px;
            font-size: 18px;
            background-color: #3f8f97;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #31908b;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            h2 {
                font-size: 22px;
            }

            input[type="submit"] {
                font-size: 16px;
                padding: 12px 18px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Formulaire de Fonctionnaire</h2>

    <!-- Formulaire pour saisir les données -->
    <form action="ind.php" method="POST">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

        <input type="submit" value="Enregistrer">
    </form>

    <!-- Affichage du message de succès ou d'erreur -->
    <?php if (isset($_GET['status'])): ?>
        <p style="color: <?= ($_GET['status'] == 'success') ? 'green' : 'red'; ?>;">
            <?= ($_GET['status'] == 'success') ? 'Données enregistrées avec succès !' : 'Erreur lors de l\'enregistrement des données.'; ?>
        </p>
    <?php endif; ?>
</div>

</body>
</html>


