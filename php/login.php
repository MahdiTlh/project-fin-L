<?php
session_start();
include 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $use = $result->fetch_assoc();

    if (password_verify($password, $use['password'])) {

        $_SESSION['user_id'] = $use['id'];
        $_SESSION['user_name'] = $use['name'];

        header("Location: ../Home/index.php");
        exit();

    } else {

        header("Location: ../Login/login.html?error=pass");
        exit();
    }
}

else {
    header("Location: ../Login/login.html?error=email");
    exit();
}

?>