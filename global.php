<?php
session_start();

try {
    // Connecxion au serveur
    $pdo = new PDO('mysql:host=localhost;dbname=onlineshopping', 'root');
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