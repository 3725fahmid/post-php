<?php

include '../includes/helper-func.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $sql = "SELECT * , DATE_FORMAT(created_at, '%d-%M-%Y %h:%i %p') AS post_date FROM posts WHERE project_name LIKE '%$name%' AND post_by = $id ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <div class='col-12 col-sm-6 col-md-4'>
        <div class='card position-relative h-100'>
            <div class='card-body'>
            <h6 class='sr-card-subtitle mb-3 text-body-secondary'>".$row['project_name']."</h6>
            <p class='card-text mb-5'>".truncatePostContent($row['post_details'])."</p>
            <a type='button' href='user-view-post.php?postId=".$row['post_id']."' class='btn btn-primary p-2 card-link sr-position-end'>View Post</a>
            </div>
        </div>
    </div>
    ";
    }
    } else {
    echo "<h3 class='text-center py-2 text-danger'>No Post Available</h3>";
    }
}