<?php

require 'connPDO.php';
require 'function.php';
$pdo = new connPDO();
$db = $pdo->conn();

$rando = readRando($db);
$u = $_GET['u'];
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/basics.css">
    <title>mise à jour</title>
</head>
<body>
    <h2>mettre à jour la randonnée</h2>
        <?php
        if(isset($_GET['u'])){?>
            <form action="update.php?u=<?=$u?>" method="post">
                <input type="text" name="name" placeholder="Nom de la randonnée" value="<?=$rando[$u]['name']?>">
                <select name="difficulty" id="difficulty">
                    <option value="Très facile">Très facile</option>
                    <option value="Facile">Facile</option>
                    <option value="Moyen">Moyen</option>
                    <option value="Difficile">Difficile</option>
                    <option value="Très difficile">Très difficile</option>
                </select>
                <input type="number" name="distance" step="0.1" value="<?=$rando[$u]['distance']?>">
                <input type="time" name="duration" id="duration" value="<?=$rando[$u]['duration']?>">
                <input type="number" name="height_difference" value="<?=$rando[$u]['height_difference']?>">
                <button type="submit" name="updateRando">valider</button>
            </form>
            <?php
        }
        if(isset($_POST['updateRando'])){
            try {
                $stm = $db->prepare("
                UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, 
                                  height_difference = :height_difference WHERE id = :id
            ");

                $stm->bindParam(':name', $_POST['name']);
                $stm->bindParam(':difficulty', $_POST['difficulty']);
                $stm->bindParam(':distance', $_POST['distance']);
                $stm->bindParam(':duration', $_POST['duration']);
                $stm->bindParam(':height_difference', $_POST['height_difference']);
                $stm->bindParam(':id', $u);

                $stm->execute();

                echo "La randonnée a été modifiée";

            }
            catch (PDOException $e){
                echo "error : " . $e->getMessage();
            }
        }
        ?>
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
