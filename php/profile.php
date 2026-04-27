<?php
session_start();

echo "SESSION: <br>";
var_dump($_SESSION);

echo "<br><br>";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.php");
    exit();
}

include '../php/config.php';

$id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("User not found");
}
?>