<?php
// ()

include_once("../pdo/connectDb.php");

if ($_POST['news_title'] && $_POST['full_text'] && $_POST['id']) {
    $newsTitle = $_POST['news_title'];
    $fullText = $_POST['full_text'];
    $id = $_POST['id'];
    $time = date('Y-m-d H:m:s');
    $sql = "UPDATE news SET date = :time, news_title = :newsTitle, full_text = :fullText WHERE news_id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute(['time' => $time, 'newsTitle' => $newsTitle, 'fullText' => $fullText, 'id' => $id]);
    die('news item edited successfully');
}