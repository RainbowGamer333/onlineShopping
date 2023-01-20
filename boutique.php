<?php
require "global.php";

// Preparation des requetes SQL
$selectProducts = $pdo->prepare("select * from produit");
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
<?php
$selectProducts->execute();

if($selectProducts->rowCount() > 0) {?>
    <div class="product-grid">
        <?php
        $listProducts = $selectProducts->fetchAll(PDO::FETCH_ASSOC);
        foreach($listProducts as $product) {
            ?>
            <form class="product" action="ajoutPanier.php" method="post">
                <!--Cet input renvoi l'id du produit automatiquement au post-->
                <input type="hidden" name="idProduct" value=<?php echo $product["idProduit"]?>>
                
                <img src=<?php echo "img/".$product["idProduit"].".png"?>>
                <h3><?php echo $product["nomProduit"];?></h3>
                <p><?php echo $product["prix"];?> €</p>
                <p><?php echo $product["quantite"];?> en stock</p>           
            
                <input id="submit" type="submit" value="Ajouter au panier">
            </form>
        <?php
        }
        ?>
    </div>
<?php
}
else {?>
    <h2>Il n'y a pas de produits en vente pour l'instant. Revenez plus tard</h2>
<?php
}
?>

</main>
<footer>
    <p>Romain PATUREAU - S3T G4</p>
</footer>

</body>

</main>
</html>
<?php
unset($pdo);
?>