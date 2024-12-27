<?php
// Inclure le fichier de connexion PDO
include('db_connection.php');
include('barre.php');

// Vérifier si une action de modification ou de suppression a été demandée
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    try {
        // Préparer la requête pour supprimer l'étudiant
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $delete_id);
        $stmt->execute();

        // Redirection après suppression
        header("Location: afficher_etudiants.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage();
        exit();
    }
}

if (isset($_POST['edit_id'])) {
    // Si la modification est envoyée
    $edit_id = $_POST['edit_id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    try {
        // Préparer la requête de mise à jour des données
        $sql = "UPDATE users SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $edit_id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Redirection après mise à jour
        header("Location: afficher_etudiants.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la modification : " . $e->getMessage();
        exit();
    }
}

try {
    // Préparer la requête pour récupérer les utilisateurs et les établissements
    $sql = "SELECT users.id, users.nom, users.prenom, users.email, etablissements.nom_etablissement 
            FROM users 
            INNER JOIN etablissements ON users.id_etablissement = etablissements.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Récupérer les résultats
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des données : " . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les Étudiants</title>
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
            width: 80%;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3f8f97;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 6px 12px;
            border-radius: 5px;
            background-color: #3f8f97;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #31908b;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Informations des étudiants</h2>
    <?php if (count($result) > 0): ?>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Établissement</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['prenom']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['nom_etablissement']; ?></td>
                    <td class="actions">
                        <!-- Formulaire pour modifier -->
                        <a href="modifier_etudiant.php?id=<?php echo $row['id']; ?>" class="btn">Modifier</a>

                        <!-- Lien pour supprimer -->
                        <a href="?delete_id=<?php echo $row['id']; ?>" class="btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune donnée disponible</p>
    <?php endif; ?>
</div>

</body>
</html>

