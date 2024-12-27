
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau</title>
    <style>
        body{
            background-color: blanchedalmond;
        }
        table {
            width: 50%;
            border:0;
            border-collapse: collapse;

            margin: 20px 0;
            font-family: Arial, sans-serif;
            color: darkolivegreen;
            font-size: 16px;
            border-radius: 15px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);


        }
        table, th, td {
            border: 1px solid #000;

        }
        table{
            border-radius: 15px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        td:hover {
            background-color: bisque;
            color: darkgoldenrod;
        }
        th {

            background-color: sandybrown;
        }

        *{
            box-sizing: border-box;
        }


        h1 {
            color: darkgoldenrod;

            padding: 10px;
        }
        h3 {
            font-size: 18px;
            padding: 10px;
            text-align: center;
            color:darkolivegreen;

        }
        .r{
            background-color: saddlebrown;
        }
        .st {
            font-family: Arial, sans-serif;
            font-size: 8px;
            color: darkgoldenrod;
            background-color: bisque;
            margin-top: 5px;
            margin-bottom: 5px;
            margin-left: 300px;
            margin-right: 300px;
            font-size: 2em;
            border-radius: 15px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

    </style>
</head>
<body>

<center>
    <?php

    $tab = array();
    $tab[] = "karim";
    $tab[] = "maroua";
    $tab[] = "aya";
    $tab[] = "mohammed";
    $tab[] = "fatima";

    echo "<h1>Travaux pratiques du php :</h1>";

    // Tableau avant modification
    echo "<table>";
    echo "<tr><h3>Tableau avant modification :</h3></th></tr>"; // Titre dans une cellule d'en-tête
    echo "<tr><th>Index</th><th>Nom</th></tr>";
    foreach ($tab as $index => $nom) {
        echo "<tr><td>$index</td><td>$nom</td></tr>";
    }
    echo "</table><br>";

    // Tableau après ajout de "salim"
    array_push($tab, "salim");
    echo "<table>";
    echo "<tr><th colspan='2'><h3>Tableau après ajout de salim :</h3></th></tr>";
    echo "<tr><th>Index</th><th>Nom</th></tr>";
    foreach ($tab as $index => $nom) {
        echo "<tr><td>$index</td><td>$nom</td></tr>";
    }
    echo "</table><br>";

    // Tableau après suppression de "karim"
    if (in_array("karim", $tab)) {
        $index = array_search("karim", $tab);
        unset($tab[$index]);
    }
    echo "<table>";
    echo "<tr><th colspan='2'><h3>Tableau après suppression de karim :</h3></th></tr>";
    echo "<tr><th>Index</th><th>Nom</th></tr>";
    foreach ($tab as $index => $nom) {
        echo "<tr><td>$index</td><td>$nom</td></tr>";
    }
    echo "</table><br>";

    // Recherche de l'élément "Mohammed"
    echo "<h3>Recherche de l'élément Mohammed :</h3>";
    if (in_array("mohammed", $tab)) {
        echo "<div class='st'>L'étudiant mohammed est trouvé.</div><br>";
    } else {
        echo "<div class='st'>L'étudiant mohammed n'est pas trouvé.</div><br>";
    }
    echo "<br>";


    if (in_array("salim", $tab)) {
        $index = array_search("salim", $tab);
        $tab[$index] = "Daniel";
    }
    echo "<table>";
    echo "<tr><th colspan='2'><h3>Tableau avec salim modifié :</h3></th></tr>";
    echo "<tr><th>Index</th><th>Nom</th></tr>";
    foreach ($tab as $index => $nom) {
        echo "<tr><td>$index</td><td>$nom</td></tr>";
    }
    echo "</table><br>";



    sort($tab);
    echo "<table>";
    echo "<tr><th colspan='2'><h3>Tableau trié par ordre alphabétique:</h3></th></tr>";
    echo "<tr><th>Index</th><th>Nom</th></tr>";
    foreach ($tab as $index => $nom) {
        echo "<tr><td>$index</td><td>$nom</td></tr>";
    }
    echo "</table><br>";

    // Tableau renversé

    $tab2 = array_reverse($tab);
    echo "<table>";
    echo "<tr><th colspan='2'><h3>Tableau renversé:</h3></th></tr>";
    echo "<tr><th>Index</th><th>Nom</th></tr>";
    foreach ($tab2 as $index => $nom) {
        echo "<tr><td>$index</td><td>$nom</td></tr>";
    }
    echo "</table><br>";


    echo "<h3>Compter les éléments du tableau :</h3>";
    $c = count($tab2);
    echo "<div class='st'>Il y a $c éléments dans le tableau.</div><br>";



    $tab = array(
        "karim" => 22,
        "maroua" => 24,
        "aya" => 23,
        "mohammed" => 25,
        "fatima" => 24
    );
    echo "<table>";
    echo "<tr><th colspan='2'><h3>Tableau  multidimensionnel représentant les étudiants et leur âge:</h3></th></tr>";
    echo "<tr><th>Nom</th><th>Âge</th></tr>";
    foreach ($tab as $cle => $elem) {
        echo "<tr><td>$cle</td><td>$elem</td></tr>";
    }
    echo "</table><br>";

    ?>
</center>

</body>
</html>
