<?php
session_start();
include "db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$queryDelete = "DELETE FROM myarticles WHERE id=$id";

mysqli_query($conn, $queryDelete);

header("Location: dashboard.php");
exit;
?>
