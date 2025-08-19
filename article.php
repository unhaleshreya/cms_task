<?php
include "db.php";
$id = $_GET['id'];
$queryGetArticle = "SELECT * FROM myarticles WHERE id=$id";
$result = mysqli_query($conn, $queryGetArticle);
$article = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
  <title><?= $article['title']; ?></title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
  <h2><?= $article['title']; ?></h2>
  <p><?= nl2br($article['content']); ?></p>
  <br><br>
  <a href="index.php">Back</a>
</div>
</body>
</html>
