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
    <div id="createAccount">
        <form class="login" action="loginCreation.php" method="post">
            <h1>Création de compte</h1>
            <?php
            if(isset($_GET["noInfo"]) and $_GET["noInfo"] == "true") {?>
                <p>Warning : Veuillez entrer les informations correctement</p>
            <?php
            }
            if(isset($_GET["dejaCompte"]) and $_GET["dejaCompte"] == "true") {?>
                <p>Warning : Cet email est déjà utilisé par un autre compte</p>
            <?php
            }
            ?>
            <div>
                <label for="prenom">Prenom:</label>
                <input type="text" id="prenom" name="prenom">
            </div>
            <div>
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom">
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="password">Mot de passe:</label>
                <input type="password" id="mdp" name="mdp">
            </div>
            <p>Déjà un compte ? <a href="connexionCompte.php">Connectez vous</a></p>
            <input id="submit" type="submit" value="Login">
            
        </form>
    </div>
</main>
<footer>
    <p>Romain PATUREAU - S3T G4</p>
</footer>
</body>
</html>