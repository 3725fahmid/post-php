<?php
session_start();
include 'helper-func.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $userEmail = htmlspecialchars($_POST['userEmail']);
    $userPass = htmlspecialchars($_POST['userPass']);
    
    if (empty($userEmail) || empty($userPass)) {
        header("Location: ../user-login.php");
        exit();
    }

    if (isNotUser($userEmail, $userPass, $conn)) {
        $_SESSION['user-login-error'] = "Invalid Email/Password";
        header("Location: ../user-login.php");
        exit();
    }

    $userId = getUserId($userEmail, $conn);

    $_SESSION['user'] = $userId;
    header("Location: ../index.php");

}
else
    header("Location: ../user-login.php");