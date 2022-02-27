<?php
session_start();
require 'connPDO.php';
$pdo = new connPDO();
$db = $pdo->conn();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/basics.css">
    <title>Randonnée</title>
</head>
<body style="background: antiquewhite">
<h1>Randonnée</h1>

    <div style="color: olivedrab"><?php echo 'Bienvenue !'?></div>

    <form action="login.php" method="post">
        <div>
            <button type="submit" name="button">Connexion</button>
        </div>
    </form>

    <form action="logout.php" method="post">
        <div>
            <button type="submit" name="button">Déconnexion</button>
        </div>
    </form>
<?php
if(isset($_SESSION['pseudo'], $_SESSION['pass'])){?>
    <ul>
        <li>
            <a href="create.php">ajouter une randonnée</a>
        </li>
        <li>
            <a href="read.php">liste</a>
        </li>
    </ul>
    <?php
}
?>
</body>
</html>
