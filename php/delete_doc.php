<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.php");
    exit();
}

$id = $_POST['id'] ?? '';

$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM document WHERE id = $id AND user_id = $user_id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../Profile/profile.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>