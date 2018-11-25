<?php
// ()

include_once("../pdo/connectDb.php");

if ($_POST['news_title'] && $_POST['full_text']) {
    $newsTitle = $_POST['news_title'];
    $fullText = $_POST['full_text'];
    $time = date('Y-m-d H:m:s');
    $sql = "INSERT INTO news (date, news_title, full_text) VALUES (:time, :newsTitle, :fullText)";
    $statement = $conn->prepare($sql);
    $statement->execute(['time' => $time, 'newsTitle' => $newsTitle, 'fullText' => $fullText]);
    die('news item added successfully');
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
    <title>Create</title>
</head>
<body>
<h1>Add a news item</h1>
<form action="create.php" method="post">
    Title: <input type="text" name="news_title" /><br>
    Text: <textarea rows="4" name="full_text"></textarea>
    <button type="submit">Submit</button>
</form>

</body>
</html>