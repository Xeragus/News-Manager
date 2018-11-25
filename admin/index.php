<?php
// ()

include_once("../pdo/connectDb.php");

$sql = "SELECT * FROM news";

$query = $conn->query($sql);
$news = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <title>All news</title>
</head>
<body>
<h1>All news</h1>
<a href="../admin/create.php">Add new news item</a>
<table>
    <tr>
        <th>Title</th>
        <th>Text</th>
        <th>Published at</th>
        <td>Comments</td>
        <th>Actions</th>
    </tr>
    <?php foreach($news as $newsItem): ?>
    <tr>
        <td><?= $newsItem['news_title']; ?></td>
        <td><?= $newsItem['full_text'] ?></td>
        <td><?= $newsItem['date'] ?></td>
        <td><a href="comments.php?id=<?= $newsItem['news_id'] ?>">Comments</a></td>
        <td>
            <a href="edit.php?id=<?= $newsItem['news_id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $newsItem['news_id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>