<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.php");
    exit();
}

$id = $_SESSION['user_id'];

$delete_docs = "DELETE FROM document WHERE user_id = $id";
$conn->query($delete_docs);

$delete_user = "DELETE FROM users WHERE id = $id";
$conn->query($delete_user);

session_unset();
session_destroy();

header("Location: ../Login/login.php?deleted=1");
exit();
?>
