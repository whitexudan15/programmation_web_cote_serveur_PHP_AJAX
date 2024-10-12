<?php
require_once('connectdb.php');

if (isset(($_GET['action']))) $action = htmlspecialchars($_GET['action']);


if (isset($_POST['action'])) {
    if (isset(($_GET['action']))) $_POST['action'] = $_GET['action'];
    $action = htmlspecialchars($_POST['action']);
}
    switch ($action) {
        case 'insertion': //On va faire l'insertion
            $libelle = isset($_POST['libelle']) ? htmlspecialchars($_POST['libelle']) : '';
            $prix = isset($_POST['prix']) ? htmlspecialchars($_POST['prix']) : '';
            $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
            $quantite = isset($_POST['quantite']) ? htmlspecialchars($_POST['quantite']) : '';

            if (!empty($libelle)) {
                $req = $pdo->prepare("INSERT INTO article (libelle, prix, description, quantite) VALUES (:libelle, :prix, :description, :quantite)");
                $req->execute(array(
                    'libelle' => $libelle,
                    'prix' => $prix,
                    'description' => $description,
                    'quantite' => $quantite
                ));
                header('location:index.php?message=Inserted');
            } else {
                header('location:create.php?error=libelle');
            }

            break;
        case 'update': //On va faire la mis a jour
            $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
            $libelle = isset($_POST['libelle']) ? htmlspecialchars($_POST['libelle']) : '';
            $prix = isset($_POST['prix']) ? htmlspecialchars($_POST['prix']) : '';
            $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
            $quantite = isset($_POST['quantite']) ? htmlspecialchars($_POST['quantite']) : '';

            if (!empty($libelle)) {
                $req = $pdo->prepare("UPDATE article SET libelle = ? , prix = ?, description = ?, quantite = ? WHERE id = ?");
                $req->execute(array($libelle, $prix, $description, $quantite, $id));
                header('location:index.php?message=Updated');
            } else {
                header('location:create.php?error=libelle');
            }
            break;
        case 'fermer': //On va retourner sur la page INDEX
            header('location:index.php');
            break;
        case 'delete': //On va faire la suppression
            $idArticle = $_GET['id'];
            $pdo->query("DELETE FROM article WHERE id = '$idArticle'");
            header('location:index.php?message=Deleted');
            break;
        default: //On redirige vers la page d'accueil

    }