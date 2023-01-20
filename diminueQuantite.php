<?php
require "global.php";

$diminueQuantitePanier = $pdo->prepare("update panier set quantitePanier = quantitePanier - 1 where idClient = :idc and idProduit = :idp");
$augmenteQuantiteProduit = $pdo->prepare("update produit set quantite = quantite + 1 where idProduit = :idp");

$idc = $_SESSION['id'];
$idp = $_POST['idProduct'];

$diminueQuantitePanier->bindValue(":idc", $idc);
$diminueQuantitePanier->bindValue(":idp", $idp);

$augmenteQuantiteProduit->bindValue("idp", $idp);

$diminueQuantitePanier->execute();
$augmenteQuantiteProduit->execute();

header("Location: panier.php");