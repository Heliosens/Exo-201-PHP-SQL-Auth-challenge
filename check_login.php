<?php
require 'connPDO.php';
$pdo = new connPDO();
$db = $pdo->conn();
var_dump($_POST['username']);
//Check if credentials are valid
if(isset($_POST['username'], $_POST['password'])){
    $stm = $db->prepare("SELECT * FROM user WHERE username = :pseudo");
    $stm->bindValue(':pseudo', $_POST['username']);
    $stm->execute();
    $result = $stm->fetch();
    var_dump($result);
    if($result && $result['password'] == $_POST['password']){
        session_start();
        $_SESSION['pseudo'] = $_POST['username'];
        $_SESSION['pass'] = $_POST['password'];

        header('Location: index.php');
    }
    else {
        echo "error";
    }
}
