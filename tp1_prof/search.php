<?php
require_once('connectdb.php');

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = htmlspecialchars(($_GET['search']));

    $articles = $pdo->prepare("SELECT * FROM article WHERE libelle LIKE :query");
    $articles->execute(array(':query' => '%' . $search . '%'));
    //$articles->execute([':query' => '%' . $search . '%']);
} else {
    //Recupération de la liste des articles
    $articles = $pdo->query("SELECT * FROM article");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Search</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1>Liste des articles</h1>
        <table class="table table-condensed table-striped">
            <tr>
                <td>#</td>
                <td>Libelle</td>
                <td>Prix</td>
                <td>Menu</td>
            </tr>

            <?php
            $i = 1;
            while ($result = $articles->fetch()) {
                echo "<tr>
                            <td>" . $i . "</td>
                            <td>" . $result['libelle'] . "</td>
                            <td>" . $result['prix'] . "</td>
                            <td>
                                <a class='btn btn-outline-primary btn-xs'>Détails</a>
                                <a class='btn btn-warning btn-xs'>Modifier</a>
                                <a class='btn btn-danger btn-xs'>Supprimer</a>
                            </td>
                        </tr>";
                $i++;
            }
            ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>