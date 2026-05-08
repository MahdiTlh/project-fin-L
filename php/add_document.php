<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$type = $_POST['type'] ?? '';
$name = $_POST['doc_name'] ?? '';
$document_type = $_POST['doc_type'] ?? '';
$location = $_POST['location'] ?? '';
$date_event = $_POST['date_event'] ?? '';
$description = $_POST['description'] ?? '';
$contact = $_POST['contact_phone'] ?? '';

if (empty($name) || empty($document_type) || empty($location) || empty($date_event)) {
    echo "All required fields must be filled!";
    exit();
}

$sql = "INSERT INTO document
(user_id, type, name, document_type, location, date_event, description, contact)
VALUES 
('$user_id', '$type', '$name', '$document_type', '$location', '$date_event', '$description', '$contact')";

if ($conn->query($sql) === TRUE)   {
    header("Location: ../Profile/profile.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>