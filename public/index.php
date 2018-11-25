<?php
// ()

include_once("../pdo/connectDb.php");

$sql = "SELECT * FROM news ORDER BY date DESC LIMIT 5";

$query = $conn->query($sql);
$news = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>5 latest news</title>
</head>
<body>
<h1>5 latest news</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Text</th>
        <th>Published at</th>
    </tr>
    <?php foreach($news as $newsItem): ?>
    <tr>
        <td><?= $newsItem['news_title']; ?></td>
        <td><?= $newsItem['full_text'] ?></td>
        <td><?= $newsItem['date'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
