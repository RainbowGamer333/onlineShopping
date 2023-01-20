<?php
require "global.php";

$augmenteQuantitePanier = $pdo->prepare("update panier set quantitePanier = quantitePanier + 1 where idClient = :idc and idProduit = :idp");
$diminueQuantiteProduit = $pdo->prepare("update produit set quantite = quantite - 1 where idProduit = :idp");
$deleteProduit = $pdo->prepare("delete from produit where quantite = 0");

$idc = $_SESSION['id'];
$idp = $_POST['idProduct'];

$augmenteQuantitePanier->bindValue(":idc", $idc);
$augmenteQuantitePanier->bindValue(":idp", $idp);

$diminueQuantiteProduit->bindValue("idp", $idp);

$augmenteQuantitePanier->execute();
$diminueQuantiteProduit->execute();

$deleteProduit->execute();

header("Location: panier.php");