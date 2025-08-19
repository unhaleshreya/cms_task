<?php
include "db.php";
$queryGetArticles = "SELECT * FROM myarticles";
$result = mysqli_query($conn, $queryGetArticles);
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Blog</title>
  <link rel="stylesheet" href="assets/style.css">
  <style>
    .admin-btn {
      position: fixed;   
      top: 20px;         
      right: 20px;    
      padding: 8px 16px;
      background: #007bff;
      color: #fff;
      border-radius: 4px;
      text-decoration: none;
      font-size: 14px;
      z-index: 1000; 
    }
    .admin-btn:hover {
      background: #0056b3;
    }
    .container {
      max-width: 800px;
      margin: 80px auto 20px auto; 
    }
    .post {
      margin-bottom: 20px;
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>My Blog</h2>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
      <div class="post">
        <h3><a href="article.php?id=<?= $row['id']; ?>"><?= $row['title']; ?></a></h3>
        <p><?= substr($row['content'], 0, 150); ?>...</p>
      </div>
    <?php endwhile; ?>
  </div>

  <a href="login.php" class="admin-btn">Admin Login</a>
</body>
</html>
