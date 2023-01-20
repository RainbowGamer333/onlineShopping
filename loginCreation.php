<?php
require "global.php";

$selectClient = $pdo->prepare("select * from client where email = :email");
$insertClient = $pdo->prepare("insert into client (nom, prenom, email, mdp, admin) values (:nom, :prenom, :email, :mdp, 0)");

if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['email']) and !empty($_POST['mdp'])) {
    echo "apres premier if";
    $selectClient->bindValue(":email", $$_POST["email"], PDO::PARAM_STR);
    $selectClient->execute();

    if($selectClient->rowCount() == 0) {
        $insertClient->bindValue(":nom", $_POST["nom"], PDO::PARAM_STR);
        $insertClient->bindValue(":prenom", $_POST["prenom"], PDO::PARAM_STR);
        $insertClient->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
        $insertClient->bindValue(":mdp", password_hash($_POST["password"], PASSWORD_DEFAULT), PDO::PARAM_STR);
        $insertClient->execute();
        
        $selectClient->execute();
        $client = $selectClient->fetch(PDO::FETCH_ASSOC);

        $_SESSION['id'] = $client['idClient'];
        $_SESSION['email'] = $client['email'];

        header("Location: boutique.php");
    } else {
        header("Location: creationCompte.php?dejaCompte=".urlencode("true"));
    }
} else {
    header("Location: creationCompte.php?noInfo=".urlencode("true"));
}