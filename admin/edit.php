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

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Edit</title>
</head>
<body>
<h1>Edit a news item</h1>
<form action="process-edit.php" method="post">
    Title: <input type="text" name="news_title" value="<?= $newsItem['news_title'] ?>"/><br>
    Text: <textarea rows="4" name="full_text"><?= $newsItem['full_text'] ?></textarea>
    <input type="hidden" name="id" value="<?= $newsItem['news_id'] ?>">
    <button type="submit">Submit</button>
</form>

</body>
</html>