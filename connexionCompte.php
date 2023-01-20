<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rainbow Shopping</title>
    <link rel="stylesheet" type="text/css" href="css/boutique.css">
</head>


<?php
require "global.php";
?>

<body>
<header>
    <h1><a href="index.php">Rainbow Shopping</a></h1>
    <nav>
    <ul>
        <li><button onclick="window.location.href='boutique.php'">Boutique</button></li>
        <li><button onclick="window.location.href='panier.php'">Panier</button></li>
        <li><button onclick="window.location.href='compte'">Votre Compte</button></li>
    </ul>
    </nav>
</header>

<main>
    <div id="loginPage">
        <form class="login" action="loginConnexion.php" method="post">
            <h1>Connexion à votre compte</h1>
            <?php
            if(isset($_GET["noAccount"]) and $_GET["noAccount"] == "true") {?>
                <p>Warning : Ce compte n'existe pas</p>
            <?php
            }
            ?>
            
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <p>Pas de compte ? <a href="creationCompte.php">Creez en un</a></p>
            <input id="submit" type="submit" value="Login">
        </form>
    </div>
    
</main>


<footer>
    <p>Romain PATUREAU - S3T G4</p>
</footer>
</body>
</html>