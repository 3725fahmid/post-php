<?php
include 'includes/header.php';
// include 'includes/helper-func.php';

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
            <h4 class="mb-sm-0">Project</h4>

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

<div class="row">
    <div class="col-12">
        <!-- Left sidebar -->

            <!-- Right Sidebar -->
            <div class="email-rightbar m-0">

                <div class="card">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h2 class="font-size-20"><?php echo $row['project_name'] ?></h2>
                            <p class="text-end"><?php echo $row['post_date'] ?></p>
                        </div>

                        <p><?php echo nl2br($row['post_details']) ?></p>
                        <br><br>

                        <p>Attachments</p>
                        <hr>
                        <div class="sr-file-card">
                        <?php
                            $postFiles = getUserFiles($_GET['postId'], $conn);
                            if (mysqli_num_rows($postFiles) > 0) {
                                while ($row = mysqli_fetch_assoc($postFiles) ) {

                                    $fileName = $row['post_files_names'];
                                    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
                                    
                                    // For File Icons
                                    if ($extension == "doc" || $extension == "docx") {
                                        echo "
                                            <a download href='uploads/".$row['post_files_names']."'>
                                                <div class='card p-3 border-1 border-dark'>
                                                    <div class='file-icon'>
                                                        <i class='mb-4 far fa-file-word'></i>
                                                    </div>
                                                    <p>
                                                        ". truncatePostContent($row['post_files_names'], 20) ."
                                                    </p>
                                                </div>
                                            </a> <br>
                                        ";
                                    }
                                    elseif ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                                        echo "
                                            <a download href='uploads/".$row['post_files_names']."'>
                                                <div class='card p-3 border-1 border-dark'>
                                                    <div class='file-icon'>
                                                        <i class='mb-4 far fa-file-image'></i>
                                                    </div>
                                                    <p>
                                                        ". truncatePostContent($row['post_files_names'], 20) ."
                                                    </p>
                                                </div>
                                            </a> <br>
                                        ";
                                    }
                                    elseif ($extension == "pdf") {
                                        echo "
                                            <a download href='uploads/".$row['post_files_names']."'>
                                                <div class='card p-3 border-1 border-dark'>
                                                    <div class='file-icon'>
                                                        <i class='mb-4 far fa-file-pdf'></i>
                                                    </div>
                                                    <p>
                                                        ". truncatePostContent($row['post_files_names'], 20) ."
                                                    </p>
                                                </div>
                                            </a> <br>
                                        ";
                                    }
                                    elseif ($extension == "excel") {
                                        echo "
                                            <a download href='uploads/".$row['post_files_names']."'>
                                                <div class='card p-3 border-1 border-dark'>
                                                    <div class='file-icon'>
                                                        <i class='mb-4 far fa-file-excel'></i>
                                                    </div>
                                                    <p>
                                                        ". truncatePostContent($row['post_files_names'], 20) ."
                                                    </p>
                                                </div>
                                            </a> <br>
                                        ";
                                    }
                                    elseif ($extension == "xlsx") {
                                        echo "
                                            <a download href='uploads/".$row['post_files_names']."'>
                                                <div class='card p-3 border-1 border-dark'>
                                                    <div class='file-icon'>
                                                        <i class='mb-4 far fa-file-excel'></i>
                                                    </div>
                                                    <p>
                                                        ". truncatePostContent($row['post_files_names'], 20) ."
                                                    </p>
                                                </div>
                                            </a> <br>
                                        ";
                                    }
                                    elseif ($extension == "pptx") {
                                        echo "
                                            <a download href='uploads/".$row['post_files_names']."'>
                                                <div class='card p-3 border-1 border-dark'>
                                                    <div class='file-icon'>
                                                        <i class='mb-4 far fa-file-powerpoint'></i>
                                                    </div>
                                                    <p>
                                                        ". truncatePostContent($row['post_files_names'], 20) ."
                                                    </p>
                                                </div>
                                            </a> <br>
                                        ";
                                    }
                                    else {
                                        echo "
                                            <a download href='uploads/".$row['post_files_names']."'>
                                                <div class='card p-3 border-1 border-dark'>
                                                    <div class='file-icon'>
                                                        <i class='mb-4 far fa-file'></i>
                                                    </div>
                                                    <p>
                                                        ". truncatePostContent($row['post_files_names'], 20) ."
                                                    </p>
                                                </div>
                                            </a> <br>
                                        ";
                                    }
                                }
                            }
                            else
                                echo "No was File Attached";
                        ?>
                            
                        </div>
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