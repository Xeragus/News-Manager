<?php

// ()

include_once("../pdo/connectDb.php");


if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "DELETE FROM news WHERE news_id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $id]);
    die("news item successfully removed");
}