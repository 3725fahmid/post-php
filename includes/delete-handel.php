<?php

include 'helper-func.php';

if (isset($_GET['deletePostId'])) {
    deletePost($_GET['deletePostId'], $conn);
    header("Location: ../post-list.php");
}

if (isset($_GET['deleteUserId'])) {
    deleteUser($_GET['deleteUserId'],$conn);
    header("Location: ../user-list.php");
}