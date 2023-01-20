<?php
session_start();

try {
    // Connecxion au serveur
    $dsn = 'mysql:host=localhost;dbname=id20000431_onlineshopping';
    $username = 'id20000431_romainpatureau';
    $password = 'G~JHQ)XH4}l)l_{e';
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
}


function isLoggedIn() { 
    return !empty($_SESSION['email']) and !empty($_SESSION['id']); 
}

function loginRedirection() {
    if(!isLoggedIn()) {
        header("Location: connexionCompte.php");
    }
}
