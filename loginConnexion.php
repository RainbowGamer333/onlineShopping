<?php
require "global.php";

$selectClient = $pdo->prepare("select * from client where email = :email");



if(!empty($_POST['email']) and !empty($_POST['password'])) {
    $selectClient->bindValue(":email", $_POST['email']);
    $selectClient->execute();
    $client = $selectClient->fetch(PDO::FETCH_ASSOC);
    print_r($client);
    
    if(in_array($_POST['email'], $client) and password_verify($_POST['mdp'], $client['mdp'])) {
        $_SESSION['email'] = $client['email'];
        $_SESSION['id'] = $client['idClient'];
        header("Location: boutique.php");
    } else {
        header("Location: connexionCompte.php?noAccount=".urlencode("true"));
    }
}