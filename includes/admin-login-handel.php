<?php
session_start();
include 'helper-func.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $adminEmail = htmlspecialchars($_POST['adminEmail']);
    $adminPass = htmlspecialchars($_POST['adminPass']);
    
    if (empty($adminEmail) || empty($adminPass)) {
        header("Location: ../admin-login.php");
        exit();
    }

    if (isNotAdmin($adminEmail, $adminPass, $conn)) {
        $_SESSION['admin-login-error'] = "Invalid Email/Password";
        header("Location: ../admin-login.php");
        exit();
    }

    $_SESSION['admin'] = "Admin";
    header("Location: ../dashboard.php");

}
else
    header("Location: ../admin-login.php");