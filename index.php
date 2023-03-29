<?php
    require_once 'connec.php';

    $pdo = new PDO(DSN, LOGIN, PASSWORD);

    $query = "SELECT * FROM story";
    $statment = $pdo->query($query);
    $stories = $statment->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des histoires</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>

    <main class="container">

    <h1 class="text-center">Liste des histoires</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Histoire</th>
                <th>Auteur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($stories as $story) { ?>

            <tr>
                <td><?= $story['title'] ?></td>
                <td><?= $story['content'] ?></td>
                <td><?= $story['author'] ?></td>
            </tr>

            <?php } ?>
        </tbody>
    </table>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>