<?php
require "global.php";

loginRedirection();


$selectPanier = $pdo->prepare("select * from panier inner join produit on panier.idProduit = produit.idProduit where idClient = :id");
$selectPanier->bindValue(":id", $_SESSION['id']);
$selectPanier->execute();
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
    <div class="panier">
        <?php
        $listProducts = $selectPanier->fetchAll(PDO::FETCH_ASSOC);
        foreach($listProducts as $product) {
            ?>
            <div class="produitPanier">
                <div>
                    <p><?php echo $product['nomProduit']?></p>
                </div>
                <div id="choisitQuantite">
                    <form action="diminueQuantite.php" method="post">
                        <input type="hidden" name="idProduct" value=<?php echo $product["idProduit"]?>>
                        <input id="plusMinus" type="submit" value="-">
                    </form>
                    <p><?php echo $product['quantitePanier']?></p>
                    <form action="augmenteQuantite.php" method="post">
                    <input type="hidden" name="idProduct" value=<?php echo $product["idProduit"]?>>
                        <input id="plusMinus" type="submit" value="+">
                    </form>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
    



</main>
<footer>
    <p>Romain PATUREAU - S3T G4</p>
</footer>
</body>