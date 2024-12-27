<?php
// Déplacer session_start() tout en haut du fichier pour éviter l'erreur
session_start();

// Le reste du code PHP ici
@$prenom = $_POST["prenom"];
@$valider = $_POST["valider"];
@$email = $_POST["email"];
@$pass = $_POST['pass'];

$bonLogin = "imane";
$bonpass = "12";

if (isset($valider)) {
    if ($prenom == $bonLogin && $pass == $bonpass) {
        $_SESSION['autoriser'] = "oui";
        header('location:session.php');
        exit();
    } else {
        $erreur = "<p class='error'>Mot de passe incorrect!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('i.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            font-size: 16px;
            font-weight: 700;
            color: black;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            width: 450px; /* Augmenté la largeur pour faire de la place pour l'image */
            border-radius: 15px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: row; /* Utiliser flex en ligne */
            gap: 20px; /* Espacement entre le formulaire et l'image */
            align-items: center; /* Aligner les éléments au centre verticalement */
        }

        form .left {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 60%; /* 60% de la largeur pour le formulaire */
        }

        h1 {
            text-align: center;
            color: cadetblue;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: cadetblue;
            display: block;
            margin-bottom: 5px;
            margin-left: 10px;
        }

        .input-container {
            position: relative;
            width: 100%;
        }

        .input-container input {
            width: 100%;
            padding: 12px 15px 12px 35px; /* Ajoute de l'espace à gauche pour les icônes */
            margin-top: 5px;
            border: 2px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom:20px;
        }

        .icon {
            position: absolute;
            left: 10px; /* Décale l'icône plus à gauche */
            top: 50%;
            transform: translateY(-50%); /* Alignement vertical centré */
            color: cadetblue;
            font-size: 20px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: cadetblue;
            color: white;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #007b83;
            transform: scale(1.05);
        }

        .error {
            text-align: center;
            color: red;
            font-weight: bold;
        }

        /* Style pour l'image */
        .right img {
            width: 150px; /* Largeur de l'image */
            height: auto;
            object-fit: contain; /* Assure que l'image conserve ses proportions */
        }
    </style>
</head>
<body>
<form method="post" action="">
    <div class="left">
        <h1>Sign In</h1>

        <div class="input-container">
            <label for="prenom">Name:</label>
            <i class="fa fa-user icon"></i>
            <input type="text" id="prenom" name="prenom" placeholder="Enter your name" required />
        </div>

        <div class="input-container">
            <label for="email">Email:</label>
            <i class="fa fa-envelope icon"></i>
            <input type="text" id="email" name="email" placeholder="Enter your email" required />
        </div>

        <div class="input-container">
            <label for="pass">Password:</label>
            <i class="fa fa-lock icon"></i>
            <input type="password" id="pass" name="pass" placeholder="Enter your password" required />
        </div>

        <input type="submit" name="valider" value="Login" />

        <?php
        // Affichage de l'erreur s'il y en a
        if (isset($erreur)) {
            echo $erreur;
        }
        ?>
    </div>

    <!-- Image à droite -->
    <div class="right">
        <img src="removed.png" alt="Image description">
    </div>

</form>
</body>
</html>



