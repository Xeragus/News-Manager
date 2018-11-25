<?php

include_once("../pdo/connectDb.php");

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM comments WHERE news_id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $id]);
    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Comments</title>
</head>
<body>
<h1>Comments for: </h1>
<table>
    <tr>
        <th>Author</th>
        <th>Comment</th>
    </tr>
    <?php foreach($comments as $comment): ?>
        <tr>
            <td><?= $comment['author']; ?></td>
            <td><?= $comment['comment'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<hr>
<h1>Add a comment</h1>
<form action="create-comment.php" method="post">
    Author: <input type="text" name="author" /><br>
    Comment: <textarea rows="4" name="comment"></textarea>
    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="submit">Submit</button>
</form>

</body>
</html>