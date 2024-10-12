<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo1</title>
</head>

<body>
    <h1>#PROGRMMATION WEB CÔTE SERVEUR</h1>
    <h2>#EXO1 : TRANSMISSION DE DONNEES VIA URL</h2>
    <P>
        Demande à l'utilisateur de saisir deux nombres puis transmettre ces données via un formulaire par la méthode
        GET. <br>
        Afficher en suite la somme et le produit de ces deux nombres.
    </P><br>
    <!--Mettre en place un formulaire qui demande à l'utilisateur
        de saisir deux nombres puis transmettre ces données via un formulaire par la méthode GET.
        Afficher en suite la somme et le produit de ces deux nombres.
    -->

    <!--Formulaire de saisie de nombres à additionner-->
    <form action="./exo1.php" method="get">
        <label for="nombre1">Nombre 1:</label>
        <input style="margin-bottom: 10px;" type="number" id="nombre1" name="nombre1" required><br>
        <label for="nombre2">Nombre 2:</label>
        <input style="margin-bottom: 10px;" type="number" id="nombre2" name="nombre2" required><br>
        <button type="submit">Additionner</button>
    </form>
</body>

</html>