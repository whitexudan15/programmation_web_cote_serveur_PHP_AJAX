<?php
require_once('connectdb.php');
//Récupération des données de l'articla à modifier
$idArticle = $_GET['id'];
$infos_modifier_article = $pdo->query("SELECT * FROM article WHERE id = '$idArticle'");
$modifier_article = $infos_modifier_article->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>updating...</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                </ul>
                <form class="d-flex" action="search.php">
                    <input class="form-control me-sm-2" type="search" name="search" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'libelle') {
        ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Vous n'avez pas entrer de libelle</strong>
        </div>
        <?php
        }
        ?>
        <form action="save.php" method="post">
            <fieldset>
                <legend class="mt-4">
                    <h1>Details Sur l'Article</h1>
                </legend>
                <div class="">
                    <label for="libelle" class="form-label">Libelle</label>
                    <input style="font-weight: 600;" type="text" name="libelle" class="form-control text-success"
                        value="<?= $modifier_article['libelle'] ?>" disabled>
                </div>
                <div class="">
                    <label for="prix" class="form-label">Prix</label>
                    <input style="font-weight: 600;" type="number" name="prix" class="form-control text-success"
                        value="<?= $modifier_article['prix'] ?>" disabled>
                </div>
                <div class="">
                    <label for="quantite" class="form-label">Quantité</label>
                    <input style="font-weight: 600;" type="number" name="quantite" class="form-control text-success"
                        value="<?= $modifier_article['quantite'] ?>" disabled>
                </div>
                <div class="">
                    <label for="description" class="form-label">Description</label>
                    <textarea style="font-weight: 600;" name="description" class="form-control text-success"
                        disabled><?= $modifier_article['description'] ?></textarea>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary mt-3" name="action" value="fermer">Fermer</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>