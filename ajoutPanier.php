<?php
require "global.php";

loginRedirection();

$selectPanierProduit = $pdo->prepare("select * from panier where idClient = :idc and idProduit = :idp");
$selectPanier = $pdo->prepare("select * from panier where idClient = :idc");
$increaseQuantity = $pdo->prepare("update panier set quantitePanier = quantitePanier + 1 where idProduit = :idp");
$insertProduit = $pdo->prepare("insert into panier (idClient, idProduit, quantitePanier) values (:idc, :idp, 1)");
$decreaseQuantity = $pdo->prepare("update produit set quantite = quantite - 1 where idProduit = :idp");
$checkQuantityProduit = $pdo->prepare("select quantite from produit where idProduit = :idp");
$deleteProduit = $pdo->prepare("delete from produit where quantite = 0");


$idc = $_SESSION['id'];
$idp = $_POST['idProduct'];

echo $idc."    ".$idp;


$selectPanierProduit->bindValue(':idc', $idc);
$selectPanierProduit->bindValue(':idp', $idp);
$selectPanierProduit->execute();


if($selectPanierProduit->rowCount() == 0) {
    $insertProduit->bindValue(":idc", $idc);
    $insertProduit->bindValue(':idp', $idp);
    $insertProduit->execute();
} else {
    echo "increase quantity";
    $increaseQuantity->bindValue(":idp", $idp);
    $increaseQuantity->execute();
}

$decreaseQuantity->bindValue(":idp", $idp);
$decreaseQuantity->execute();


$deleteProduit->execute();

header("Location: panier.php");