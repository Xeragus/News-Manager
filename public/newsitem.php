<?php
// ()

include_once("../pdo/connectDb.php");

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM news WHERE news_id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $id]);
    $newsItem = $statement->fetch(PDO::FETCH_ASSOC);
}
if (!$newsItem) {
    die("404: news item not found");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <title><?= $newsItem['news_title'] ?></title>
</head>
<body>
<h1><?= $newsItem['news_title'] ?></h1>
<strong>Published at: <?= $newsItem['date'] ?></strong>
<p><?= $newsItem['full_text'] ?></p>

</body>
</html>
