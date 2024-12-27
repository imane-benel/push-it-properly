<?php
// Inclure le fichier de connexion PDO

include('barre.php');
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu</title>
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
                text-align: center;
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
                margin-bottom: 20px;
                font-size: 26px;
            }

            button {
                width: 100%;
                padding: 10px 20px;
                font-size: 16px;
                margin: 10px;
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
        <h2>Menu Principal</h2>
        <form action="ajouter_etablissement.php" method="GET">
            <button type="submit">Ajouter des établissements</button>
        </form>
        <form action="afficher_etablissements.php" method="GET">
            <button type="submit">Afficher les établissements</button>
        </form>
        <form action="ajouter_etudiants.php" method="GET">
            <button type="submit">Ajouter les étudiants</button>
        </form>
        <form action="afficher_etudiants.php" method="GET">
            <button type="submit">Afficher les étudiants</button>
        </form>
    </div>

    </body>
    </html>
<?php
