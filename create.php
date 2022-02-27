<?php
require 'connPDO.php';
$pdo = new connPDO();
$db = $pdo->conn();

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/basics.css">
    <title>Randonnées, ajout</title>
</head>
<body>
    <h2>Ajouter une randonnée</h2>
    <form action="create.php" method="post">
        <input type="text" name="name" placeholder="Nom de la randonnée">
        <select name="difficulty" id="difficulty">
            <option value="Très facile">Très facile</option>
            <option value="Facile">Facile</option>
            <option value="Moyen">Moyen</option>
            <option value="Difficile">Difficile</option>
            <option value="Très difficile">Très difficile</option>
        </select>
        <input type="number" name="distance" step=0.1>
        <input type="time" name="duration" id="duration">
        <input type="number" name="height_difference">
        <button type="submit" name="newRando">valider</button>
    </form>
    <ul>
        <li>
            <a href="index.php">home</a>
        </li>
        <li>
            <a href="read.php">liste</a>
        </li>
    </ul>
</body>
</html>
<?php
    if(isset($_POST['newRando'])){
        try {
            $stm = $db->prepare("
                INSERT INTO hiking (name, difficulty, distance, duration, height_difference)
                VALUES (:name, :difficulty, :distance, :duration, :height_difference)
            ");

            $stm->bindParam(':name', $_POST['name']);
            $stm->bindParam(':difficulty', $_POST['difficulty']);
            $stm->bindParam(':distance', $_POST['distance']);
            $stm->bindParam(':duration', $_POST['duration']);
            $stm->bindParam(':height_difference', $_POST['height_difference']);

            $stm->execute();

            echo "La randonnée a été ajoutée avec succès";

        }
        catch (PDOException $e){
            echo "error : " . $e->getMessage();
        }
    }
