<?php
session_start();
include "db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}


$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM myarticles WHERE id=$id");
$article = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $queryUpdate = "UPDATE myarticles SET title='$title', content='$content' WHERE id=$id";
    mysqli_query($conn,  $queryUpdate);
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Article</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 500px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 15px;
        }
        textarea {
            height: 120px;
            resize: vertical;
        }
        button {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 15px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Edit Article</h2>
    <form method="post">
        <input type="text" name="title" value="<?= $article['title']; ?>" required>
        <textarea name="content" required><?= $article['content']; ?></textarea>
        <button type="submit">Update</button>
    </form>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>

