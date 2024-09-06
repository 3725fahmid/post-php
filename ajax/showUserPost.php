<?php
include "../includes/helper-func.php";

$start = $_POST['start'];
$limit = $_POST['limit'];

$postList = getLimitedPostListWithId($_POST['id'], $start, $limit, $conn);

if (mysqli_num_rows($postList) > 0) {
while ($row = mysqli_fetch_assoc($postList)) {
echo "
<div class='col-12 col-sm-6 col-md-3'>
    <div class='card position-relative h-100'>
        <div class='card-body'>
        <h6 class='sr-card-subtitle mb-3 text-body-secondary'>".$row['project_name']."</h6>
        <p class='card-text mb-5'>".truncatePostContent($row['post_details'])."</p>
        <a type='button' href='user-view-post.php?postId=".$row['post_id']."' class='btn btn-primary p-2 card-link sr-position-end'>View</a>
        </div>
    </div>
</div>
";
}
} else {
echo "<h3 class='text-center py-2 text-danger'>No Post Available</h3>";
}