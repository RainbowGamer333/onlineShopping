<?php
require "global.php";

loginRedirection();

$selectClient = $pdo->prepare("select * from client where email = :email");
$selectClient->bindValue(":email", $_SESSION['email']);
$selectClient->execute();
$client = $selectClient->fetch(PDO::PARAM_STR);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rainbow Shopping Website</title>
    <link rel="stylesheet" type="text/css" href="css/boutique.css">
</head>

<body>
<header>
    <h1><a href="index.php">Rainbow Shopping</a></h1>
    <nav>
    <ul>
        <li><button onclick="window.location.href='boutique.php'">Boutique</button></li>
        <li><button onclick="window.location.href='panier.php'">Panier</button></li>
        <li><button onclick="window.location.href='compte.php'">Votre Compte</button></li>
    </ul>
    </nav>
</header>

<main>
    <div class="compte">
        <h1>Votre Compte</h1>
        <div>
            <h2>Prenom : </h2>
            <p><?php echo $client['prenom']?></p>
        </div>
        <div>
            <h2>Nom : </h2>
            <p><?php echo $client['nom']?></p>
        </div>
        <div>
            <h2>Email : </h2>
            <p><?php echo $client['email']?></p>
        </div>
        <button onclick="window.location.href='destroyCompte.php'">Déconnecter</button>
    </div>
</main>
<footer>
    <p>Romain PATUREAU - S3T G4</p>
</footer>
</body>
</html>