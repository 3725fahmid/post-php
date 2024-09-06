<?php
include "../includes/helper-func.php";

$start = $_POST['start'];
$limit = $_POST['limit'];
$count = $_POST['count'];

$userList =  getLimitedUserList($start, $limit, $conn);
if (mysqli_num_rows($userList) > 0) {
    $index = ($limit * ($count -1)) + 1;
    echo "<div class='w-100 overflow-auto'> <table class='text-center table overflow-y-auto table-hover mb-0'>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Organization</th>
                <th>Actions</th>
            </tr>
        </thead>";
        while ($row = mysqli_fetch_assoc($userList)) {
            echo "<tr>
            <th>".$index."</th>
            <td>".$row ['user_name']."</td>
            <td>".$row ['user_email']."</td>
            <td>".getOrgList($row['user_org'],$conn)."</td>
            <td>
                <a class='d-inline-block bg-primary text-white p-2 m-1 rounded-2' href='update-post.php?userId=".$row ['user_id']."'>Update</a>
                <a class='d-inline-block bg-danger text-white p-2 m-1 rounded-2' href='includes/delete-handel.php?deleteUserId=".$row ['user_id']."'>Delete</a>
            </td>
        </tr>";
        $index++;
        } 
    echo "</table> </div>";
}
else {
    echo "<p class='text-center fs-4'>No users 😔</p>";
}