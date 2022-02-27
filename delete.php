<?php

require 'connPDO.php';
require 'function.php';
$pdo = new connPDO();
$db = $pdo->conn();

$rando = readRando($db);
$d = $_GET['d'];

try {
    $sql = "DELETE FROM hiking WHERE id = '$d'";

    if ($db->exec($sql) !== false) {
        echo "randonnée supprimée";
        header('Location: read.php');
    }

} catch (PDOException $e) {
    echo "error : " . $e->getMessage();
}
