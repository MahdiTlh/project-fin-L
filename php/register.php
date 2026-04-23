<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (empty($name) || empty($email) || empty($password)) {
        header("Location: ../Register/register.html?error=empty");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: ../Register/register.html?error=pass");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {

        header("Location: ../Login/login.html");
        exit();

    } else {
        echo "Error: " . $conn->error;
    }

} else {
    echo "Invalid request";
}
?>