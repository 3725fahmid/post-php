<?php
include 'includes/header-user.php';

if (isset($_GET['postId'])) {
    $post = getPost($_GET['postId'], $conn);
    $row = mysqli_fetch_assoc($post);
}



?>

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Posts</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Post</a></li>
                    <li class="breadcrumb-item active">Post List</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <!-- Left sidebar -->

            <!-- Right Sidebar -->
            <div class="email-rightbar m-0">

                <div class="card">

                    <div class="card-body">

                        <h4 class="font-size-16"><?php echo $row['post_title'] ?></h4>

                        <p><?php echo $row['project_name'] ?></p>
                        <p><?php echo $row['post_details'] ?></p>
                        <br><br>

                        <p>Attachments</p>
                        <hr>
                        <?php
                            $postFiles = getFiles($_GET['postId'], $conn);
                            if (mysqli_num_rows($postFiles) > 0) {
                                while ($row = mysqli_fetch_assoc($postFiles) ) {
                                    echo "<a download href='uploads/".$row['post_files_names']."'</a>".$row['post_files_names']."<br>";
                                    // echo "<embed src='uploads/".$row['post_files_names']."' width='100px' height='100px' />"."<br>";
                                }
                            }
                            else
                                echo "No was File Attached";
                        ?>

                    </div>

                </div>
            </div>
            <!-- card -->

    </div>

</div><!-- End row -->


</div>

<?php
include 'includes/footer.php';
?>