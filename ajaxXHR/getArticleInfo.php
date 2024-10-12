<?php
require_once('./connectdb.php');

// Vérification et filtrage de l'entrée
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);

    // Requête SQL pour récupérer les données de l'article
    $query = $pdo->prepare("SELECT * FROM article WHERE id = :id");
    $query->bindParam(':id', $id,);
    $query->execute();

    // Récupération des résultats
    $article = $query->fetch();
        echo '<table class="table table-striped text-center">
                <thead style="font-size: 20px;">
                    <tr>
                        <th>Libellé</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>';
        echo "<tr>
                <td>" . htmlspecialchars($article['libelle']) . "</td>
                <td>" . number_format($article['prix'], 0, ',', '.') . " FCFA</td>
                <td>" . htmlspecialchars($article['quantite']) . "</td>
                <td>" . htmlspecialchars($article['description']) . "</td>
              </tr>";
        echo '</tbody></table>';
    }else if ($_GET['id'] == 0){
        echo "<b>Veuillez Sélectionner un utilisateur</b>";
    }else{
        // Si aucun article n'est trouvé, on affiche un message d'erreur
        echo "<p>Aucun article trouvé pour le libellé : " . intval($id) . "</p>";
    }