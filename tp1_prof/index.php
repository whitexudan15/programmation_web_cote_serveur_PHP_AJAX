<?php
require_once('connectdb.php');
//Recupération de la liste des articles
$articles = $pdo->query("SELECT * FROM article");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">

    <title>Articles</title>
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
                        <a class="nav-link active" href="#">Home
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
    <?php
    if (isset($_GET['message']) && ($_GET['message'] == 'Inserted' || $_GET['message'] == 'Updated' || $_GET['message'] == 'Deleted')) {
    ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong><?= $_GET['message'] ?>!</strong>
    </div>
    <?php
    }
    ?>
    <div class="container">

        <h1>Liste des articles</h1>
        <a href="create.php" class="btn btn-primary mb-3">Nouveau</a>
        <table id="t_article" class="table table-striped" style="width:100%">
            <thead style="font-size: 20px;">
                <tr>
                    <th>#</th>
                    <th>Libelle</th>
                    <th>Prix</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $i = 1;
            // Ici on va ajouter un lien href au bouton "Modifer" qui redirige vers la page de Mise à jour d'un article. (ligne 85)
            //dans notre cas (update.php)
            // Nous allons passer l'id du m'article à modifer par URL sur la page update.php avec lequel(l'id) on pourra récupérer les informations concernant l'article
            while ($result = $articles->fetch()) {
                $prix = number_format($result['prix'], 0, ',', '.') . ' <span style=\'font-weight: 600;\' class=\'text-success\'>FCFA</span>';
                echo "<tr>
                            <td>" . $i . "</td>
                            <td>" . $result['libelle'] . "</td>
                            <td>" . $prix . "</td>
                            <td>
                                <a class='btn btn-outline-primary btn-xs' href='./details.php?id=" . $result['id'] . "'>Détails</a>
                                <a class='btn btn-warning btn-xs' href='./update.php?id=" . $result['id'] . "'>Modifier</a> 
                                <a class='btn btn-danger btn-xs' href='./save.php?id=" . $result['id'] . "&action=delete'>Supprimer</a>
                            </td>
                        </tr>";
                $i++;
            }
            ?>
            </tbody>
            <tfoot style="font-size: 20px;">
                <tr>
                    <th>#</th>
                    <th>Libelle</th>
                    <th>Prix</th>
                    <th>Menu</th>
                </tr>
            </tfoot>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
    $('#t_article').DataTable();
    </script>
</body>

</html>