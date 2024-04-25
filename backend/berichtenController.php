<?php

$action = $_POST['action'];

if($action == "edit")
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    if(empty($title)) {
        $errors[] = "Vul de titel in";
    }
    $content = $_POST['content'];
    if(empty($content)) {
        $errors[] = "Vul de content in";
    }
    
    require_once 'conn.php';
    $query = "UPDATE berichten SET title = :title, content = :content WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ':title' => $title,
        ':content' => $content,
        ':id' => $id
    ]);

    header('Location: ../index.php?msg=Bericht is aangepast');
}

if($action == "delete"){
    $id = $_POST['id'];
    require_once 'conn.php';
    $query = "DELETE FROM berichten WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ':id' => $id
    ]);

    header('Location:  ../index.php?msg=Melding verwijderd');
}