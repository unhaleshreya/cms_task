<?php
session_start();
include "db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM myarticles");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: #0066cc;
        }
        a:hover {
            text-decoration: underline;
        }
        .add-btn {
            display: inline-block;
            margin: 10px 0;
            padding: 6px 12px;
            background: #28a745;
            color: #fff;
            border-radius: 4px;
        }
        .add-btn:hover {
            background: #218838;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 10px;
            text-align: left;
        }
        th {
            background: #f2f2f2;
        }
        tr:nth-child(even) {
            background: #fafafa;
        }
        .edit {
            color: #007bff;
        }
        .delete {
            color: #dc3545;
        }
          @media (max-width: 768px) {
            body {
                margin: 10px;
            }
            h2 {
                font-size: 18px;
            }
            .add-btn {
                width: 100%;
                text-align: center;
                margin: 15px 0;
                font-size: 16px;
            }
            th, td {
                font-size: 13px;
                padding: 8px;
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: 16px;
            }
            .add-btn {
                font-size: 14px;
                padding: 10px;
            }
            table {
                min-width: 400px; 
            }
        }
    </style>
</head>
<body>
    <h2>
        Welcome, <?php echo $_SESSION['admin']; ?> | 
        <a href="logout.php">Logout</a>
    </h2>

    <h3>Articles</h3>
    <a href="add_article.php" class="add-btn">+ Add New Article</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
             <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['title']; ?></td>
            <td><?= $row['content']; ?></td>
            <td>
                <a href="edit_article.php?id=<?= $row['id']; ?>" class="edit">Edit</a> | 
                <a href="delete_article.php?id=<?= $row['id']; ?>" class="delete" onclick="return confirm('Delete this article?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
