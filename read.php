<?php

require 'connPDO.php';
require 'function.php';
$pdo = new connPDO();
$db = $pdo->conn();

$rando = readRando($db);

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/basics.css">
    <title>liste des randonnées</title>
</head>
<body>
    <h2>Liste des randonnées</h2>
    <table>
        <thead>
            <tr>
                <th>nom</th>
                <th>difficulté</th>
                <th>distance</th>
                <th>durée</th>
                <th>dénivelé</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($rando as $key => $item){?>
            <tr><?php
                foreach ($item as $value){?>
                <td><?=$value?></td><?php
                }?>
                <td>
                    <a href="update.php?u=<?=$key?>">màj</a>
                </td>
                <td>
                    <a href="delete.php?d=<?=$key?>">suppr</a>
                </td>
            </tr><?php
        }?>
        </tbody>
    </table>
    <ul>
        <li>
            <a href="index.php">home</a>
        </li>
        <li>
            <a href="create.php">ajouter une randonnée</a>
        </li>
    </ul>
</body>
</html>
