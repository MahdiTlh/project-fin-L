<?php 
require '../php/config.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.php");
    exit();
}

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    $user = ['name' => 'Unknown', 'email' => 'Unknown'];
}

$report_sql = "SELECT * FROM document WHERE user_id = $id ORDER BY created_at DESC";
$report_result = $conn->query($report_sql);

?>