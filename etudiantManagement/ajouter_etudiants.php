<?php
// Inclure la connexion à la base de données
include('db_connection.php');
include('barre.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les valeurs envoyées par le formulaire
    $nom_etudiant = $_POST['nom_etudiant'];
    $prenom_etudiant = $_POST['prenom_etudiant'];  // Nouveau champ prénom
    $email_etudiant = $_POST['email_etudiant'];
    $id_etablissement = $_POST['id_etablissement'];  // ID de l'établissement choisi

    // Préparer la requête d'insertion pour ajouter l'étudiant dans la table users
    $sql = "INSERT INTO users (nom, prenom, email, id_etablissement) VALUES (:nom_etudiant, :prenom_etudiant, :email_etudiant, :id_etablissement)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nom_etudiant', $nom_etudiant);
    $stmt->bindParam(':prenom_etudiant', $prenom_etudiant); // Lier le prénom
    $stmt->bindParam(':email_etudiant', $email_etudiant);
    $stmt->bindParam(':id_etablissement', $id_etablissement);

    try {
        // Exécuter la requête
        $stmt->execute();
        echo "<p>Étudiant ajouté avec succès !</p>";
    } catch (PDOException $e) {
        echo "<p>Erreur : " . $e->getMessage() . "</p>";
    }
}

// Récupérer les établissements pour la liste déroulante
$sql_etablissements = "SELECT * FROM etablissements";
$stmt_etablissements = $conn->prepare($sql_etablissements);
$stmt_etablissements->execute();
$etablissements = $stmt_etablissements->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
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
        input, select, button {
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
    <h2>Ajouter un étudiant</h2>
    <form action="ajouter_etudiants.php" method="POST">
        <!-- Nouveau champ pour le prénom -->
        <input type="text" name="prenom_etudiant" placeholder="Prénom de l'étudiant" required><br>
        <input type="text" name="nom_etudiant" placeholder="Nom de l'étudiant" required><br>
        <input type="email" name="email_etudiant" placeholder="Email de l'étudiant" required><br>

        <!-- Liste déroulante pour les établissements -->
        <select name="id_etablissement" required>
            <option value="">Sélectionnez un établissement</option>
            <?php
            // Afficher les établissements dans la liste déroulante
            foreach ($etablissements as $etablissement) {
                echo "<option value='" . $etablissement['id'] . "'>" . htmlspecialchars($etablissement['nom_etablissement']) . "</option>";
            }
            ?>
        </select><br>

        <button type="submit">Ajouter l'étudiant</button>
    </form>
</div>

</body>
</html>

