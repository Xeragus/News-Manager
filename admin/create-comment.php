<?php


include_once("../pdo/connectDb.php");

if ($_POST['author'] && $_POST['comment'] && $_POST['id']) {
    $author = $_POST['author'];
    $comment = $_POST['comment'];
    $id = $_POST['id'];
    $sql = "INSERT INTO comments (news_id, author, comment) VALUES (:newsId, :author, :comment)";
    $statement = $conn->prepare($sql);
    $statement->execute(['newsId' => $id, 'author' => $author, 'comment' => $comment]);
    die('comment added successfully');
}