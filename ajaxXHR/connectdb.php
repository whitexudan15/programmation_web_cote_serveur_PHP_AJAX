<?php
try {
    //Creation d'une instance de PDO
    $pdo = new PDO('mysql:host=localhost;dbname=boutique1', 'root', '');
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}