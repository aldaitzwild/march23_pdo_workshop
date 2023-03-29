<?php

    $errors = [];
    if($_SERVER['REQUEST_METHOD'] === "POST") {

        $data = array_map("trim", $_POST);

        if(!isset($data['title']) || empty($data['title'])) {
            $errors[] = "Le titre est obligatoire";
        }

        if(!isset($data['author']) || empty($data['author'])) {
            $errors[] = "L'auteur est obligatoire";
        }

        if(empty($errors)) {

            $query = "INSERT INTO story (title, content, author)
            VALUES (:title, :content, :author);";

            require 'connec.php';
            $pdo = new PDO(DSN, LOGIN, PASSWORD);
            $statement = $pdo->prepare($query);

            $statement->bindValue(':title', $data['title'], PDO::PARAM_STR);
            $statement->bindValue(':content', $data['content'], PDO::PARAM_STR);
            $statement->bindValue(':author', $data['author'], PDO::PARAM_STR);

            $statement->execute();

            header("Location: index.php");
            die();

        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Histoire</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>Créer une nouvelle histoire</h1>
    
    <form method="post">
        <p>
            <label for="title">Titre : </label>
            <input type="text" name="title" id="title">
        </p>

        <p>
            <label for="content">Histoire : </label>
            <textarea name="content" id="content" rows="10"></textarea>
        </p>

        <p>
            <label for="author">Auteur : </label>
            <input type="text" name="author" id="author">
        </p>

        <p id="btnBar">
            <input type="submit" id="btnSubmit" value="Ecrire">
        </p>
    </form>

</body>
</html>