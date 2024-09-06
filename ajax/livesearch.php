<?php

include '../includes/helper-func.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $sql = "SELECT * FROM users WHERE user_name LIKE '$name%' OR user_email LIKE '$name%' OR user_org = (SELECT org_id FROM organizations WHERE org_name LIKE '$name%')";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $count = 1;
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
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                <th>".$count."</th>
                <td>".$row ['user_name']."</td>
                <td>".$row ['user_email']."</td>
                <td>".getOrgList($row['user_org'],$conn)."</td>
                <td>
                    <a class='d-inline-block bg-primary text-white p-2 m-1 rounded-2' href='update-post.php?userId=".$row ['user_id']."'>Update</a>
                    <a class='d-inline-block bg-danger text-white p-2 m-1 rounded-2' href='includes/delete-handel.php?deleteUserId=".$row ['user_id']."'>Delete</a>
                </td>
            </tr>";
            $count++;
            } 
        echo "</table> </div>";
    }
    else {
        echo "<p class='text-center fs-4'>No users found 😔</p>";
    }
}

?>