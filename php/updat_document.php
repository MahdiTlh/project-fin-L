<?php
require 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.php");
    exit();
}

$id          = $_POST['id'];
$name        = $conn->real_escape_string($_POST['name']);
$location    = $conn->real_escape_string($_POST['location']);
$description = $conn->real_escape_string($_POST['description']);
$contact     = $conn->real_escape_string($_POST['contact']);
$date_event  = $conn->real_escape_string($_POST['date_event'] ?? '');

$sql = "UPDATE document SET 
        name='$name',
        location='$location',
        description='$description',
        contact='$contact',
        date_event='$date_event'
        WHERE id=$id AND user_id=" . $_SESSION['user_id'];

if ($conn->query($sql)) {
    header("Location: ../Profile/profile.php");
} else {
    echo "Error updating document: " . $conn->error;
}
?>