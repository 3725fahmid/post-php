<?php
include 'includes/header.php';
// include 'includes/helper-func.php';

?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Project List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Project</a></li>
                        <li class="breadcrumb-item active">Project List</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Code Here -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-0">Project List</h4>
                    <div class="text-center py-4">
                        <input class='sr-search' type="text" name="searchUser" placeholder="Search by Project Title, Posted By..." id="searchPost">
                    </div>
                    <div class="text-end">
                        <?php
                        $trashList = getTrashList($conn);
                            if (mysqli_num_rows($trashList) > 0) {
                                echo "<a href='trash.php?trash=post' class='d-inline-block bg-danger text-white p-2 rounded-2'>Trash (".mysqli_num_rows($trashList)." items)</a>";
                            }
                        ?>
                    </div>

                    <?php
                        $start = 0;
                        $limit = 5;
                        
                        if (isset($_GET['page'])) {
                            $start = ($_GET['page'] - 1) * $limit;
                        }
                    ?>
                    
                    <div id="showData" class="mb-4">

                    </div>
                    
                    <?php
                        // $postList =  getPostList(null, $conn);
                        // if (mysqli_num_rows($postList) > 0) {
                        //     $count = 1;
                        //     echo "<div class='w-100 overflow-auto'>  <table class='text-center table table-hover mb-0'>
                        //         <thead>
                        //             <tr>
                        //                 <th width='50px'>#</th>
                        //                 <th width='150px'>Post Title</th>
                        //                 <th width='150px'>Project Name</th>
                        //                 <th width='400px'>Post Details</th>
                        //                 <th width='150px'>Posted By</th>
                        //                 <th width='150px'>Attachment</th>
                        //                 <th width='100px'>Actions</th>
                        //             </tr>
                        //         </thead>";
                        //         while ($row = mysqli_fetch_assoc($postList)) {
                        //             $postFIle = getFiles($row ['post_id'], $conn);
                        //             echo "<tr>
                        //             <th width='50px'>".$count."</th>
                        //             <td width='150px'>".$row['post_title']."</td>
                        //             <td width='150px'>".$row['project_name']."</td>
                        //             <td width='400px'>".truncatePostContent($row['post_details'])."</td>
                        //             <td width='150px'>".getOrgList($row ['post_by'], $conn)."</td>
                        //             <td width='150px'>".mysqli_num_rows($postFIle)." files</td>
                        //             <td width='100px'>
                        //                 <a class='d-inline-block bg-info text-white p-2 m-1 rounded-2' href='view-post-admin.php?postId=".$row ['post_id']."'>View</a>
                        //                 <a class='d-inline-block bg-primary text-white p-2 m-1 rounded-2' href='update-post.php?postId=".$row ['post_id']."'>Update</a>
                        //                 <a class='d-inline-block bg-danger text-white p-2 m-1 rounded-2' href='".htmlspecialchars($_SERVER['PHP_SELF'])."?postId=".$row ['post_id']."'>Delete</a>
                        //             </td>
                        //         </tr>";
                        //         $count++;
                        //         } 
                        //     echo "</table> </div>";
                        // }
                        // else {
                        //     echo "<p class='text-center fs-4'>No posts 😔</p>";
                        // }
                    ?>

                    <div class="d-flex justify-content-between px-3">
                        <!-- Page Info -->
                        <div class="">
                        <?php

                            $totalPages = ceil(mysqli_num_rows($conn->query("SELECT * FROM posts  WHERE post_status = 1")) / $limit);
                            // $pages = ceil($postList / 4);
                            if (!isset($_GET['page'])) {
                                $page = 1;
                            }
                            else {
                                $page = $_GET['page'];
                            }
                            echo "Page ".$page." of $totalPages";
                        ?>
                        </div>
                        <!-- Pagination -->
                        <div class="">
                        <ul class="pagination">
                            <?php
                                if (isset($_GET['page']) && $_GET['page'] > 1) {
                                    echo "<li class='page-item'><a class='page-link' href='?page=". $_GET['page'] - 1 ."'>Previous</a></li>";
                                }
                                else {
                                    echo "<li class='page-item'><a class='page-link'>Previous</a></li>";
                                }
                            ?>


                            <?php
                                    for ($i=1; $i <= $totalPages; $i++) { 
                                        echo "<li class='page-item'><a class='page-link' href='?page=".$i."'>".$i."</a></li>";
                                    }
                                ?>


                            <?php
                                if (!isset($_GET['page'])) {
                                    echo "<li class='page-item'><a class='page-link' href='?page=2'>Next</a></li>";
                                }
                                elseif ($_GET['page'] >= $totalPages) {
                                    echo "<li class='page-item'><a class='page-link'>Next</a></li>";
                                }
                                else {
                                    echo "<li class='page-item'><a class='page-link' href='?page=".$_GET['page'] + 1 ."'>Next</a></li>";
                                }
                            ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>


<?php
include 'includes/footer.php';
?>

<script>
    // for posts
    $(document).ready(function () {
        $.ajax({
            url: "ajax/showPost.php",
            method: 'POST',
            data:{start: <?php echo $start;?>, limit: <?php echo $limit;?>, count: <?php echo $page;?>},

        success: function (data) {
            $("#showData").html(data);
        }
    });
    $("#searchPost").keyup(function () {
        var name = $(this).val();
        // alert(name);

        if (name != '') {
            $.ajax({
                url: "ajax/searchPost.php",
                method: 'POST',
                data: { name: name },

                success: function (data) {
                    $("#showData").html(data);
                }
            });
        }
        else {
            $.ajax({
                url: "ajax/showPost.php",
                method: 'POST',
                // data:{show:show},
                data:{start: <?php echo $start;?>, limit: <?php echo $limit;?>, count: <?php echo $page;?>},

                success: function (data) {
                    $("#showData").html(data);
                }
            });
        }
    });
});

</script>