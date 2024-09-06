<?php
include 'includes/header-user.php';

if (isset($_GET['postId'])) {
    $post = getPostWithUserOrg($_GET['postId'], $userID, $conn);
    if (mysqli_num_rows($post) > 0) {
        $postFiles = getUserFiles($_GET['postId'], $conn);
        $row = mysqli_fetch_assoc($post);
    }
}



?>

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Projects</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Project</a></li>
                        <li class="breadcrumb-item active">Preview</li>
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
                        <div class="org-information fh_flex_space-btw">
                            <div class="org-details">
                                <?php 
                                    $orgDetails = getOrgDetails($userInfo['user_org'], $conn);
                                    $org = mysqli_fetch_assoc($orgDetails);
                                    // print_r($org);
                                ?>
                                <h1 class="fh-title-lg"><?php echo $org['org_name'] ?></h1>
                                <p>Address: <span><?php echo $org['org_address'] ?></span></p>
                                <p>Contact: <span><?php echo $org['org_phone'] ?></span></p>
                            </div>
                            <div class="org-log-info">
                                <?php
                                    $logs = getLogs($userInfo['user_org'], $conn);
                                ?>
                                <ul>
                                    <li>
                                        <p>Log in history</p>
                                    </li>
                                    <?php
                                    while ($log = mysqli_fetch_assoc($logs)) {
                                        echo  '<li>'. $log['user_name'] . ' ' .  $log['ip'] . ' <span>Date: '. $log['log_date'].'</span></li>';
                                    }
                                    ?>
                                </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="project_info">
                            <div class="d-flex justify-content-between">
                                <h2 class="fh-title-small"><?php echo isset($row['project_name']) ?  $row['project_name'] :  "Unauthorized User"; ?></h2>
                                <p class="text-end" style='width:400px;'>Project Created: <?php echo isset($row['project_name']) ?  $row['post_date'] :  "Unauthorized User"; ?></p>
                            </div>
                            <p><?php echo isset($row['post_details']) ?  nl2br($row['post_details']) :  "Unauthorized User"; ?></p>
                        </div>
                        <div class="disclimer-note">
                            <h2 class="fh-title-small text-center">Disclaimer</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, harum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde aliquam perferendis rerum nobis modi magni quidem distinctio ipsum eos labore.</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h2 class="fh-title-lg">Files</h2>
                            
                        <?php
                            if (isset($postFiles)) {
                                if (mysqli_num_rows($postFiles) > 0) {
                                    while ($row = mysqli_fetch_assoc($postFiles)) {
                                        $fileName = $row['post_files_names'];
                                        // print_r($fileName);
                                        echo '<div class="fh-list">
                                                <ul class="fh_flex_space-btw">
                                                    <li class="fh-content">
                                                        <h3 class="fh-title-small">'.truncatePostContent($fileName,500).'</h3>
                                                    </li>
                                                    <li class="user-access">
                                                        <i class="ri-download-cloud-2-fill"> - '. getDownloadCount ($row['post_files_id'], $conn).' Times</i> <br>
                                                        <i class="ri-eye-fill"> - '. getViewCount ($row['post_files_id'], $conn).' Times</i>
                                                    </li>   
                                                    <li class="fh-btn fh-flex-center">
                                                        <a class="color-view viewBtn" data-file-id='.$row['post_files_id'].' href="viewpdf.php?filename='.$fileName.'" target="_blank">view</a>
                                                        <a class="downloadBtn" href="uploads/'.$row['post_files_names'].'" data-file-id='.$row['post_files_id'].' download>Download</a>
                                                    </li>
                                                </ul>
                                            </div>';
                                    }}}
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


<script>
    $(document).ready(function() {
        $('.downloadBtn').click(function(e) {
            // Get the file ID from the button's data attribute
            var fileId = $(this).data('file-id');

            // Send an AJAX request to track the download
            $.ajax({
                url: 'track_download.php', // The PHP script to track downloads
                type: 'POST',
                data: { file_id: fileId },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        console.log("Download count updated");
                    } else {
                        console.error('Error: ' + response.error);
                    }
                },
                error: function() {
                    console.error('Error occurred while tracking the download.');
                }
            });
            // Let the default download behavior continue without preventing the event
        });
        $('.viewBtn').click(function(e) {
            // Get the file ID from the button's data attribute
            var fileId = $(this).data('file-id');

            // Send an AJAX request to track the download
            $.ajax({
                url: 'track_view.php', // The PHP script to track downloads
                type: 'POST',
                data: { file_id: fileId },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        console.log("Download count updated");
                    } else {
                        console.error('Error: ' + response.error);
                    }
                },
                error: function() {
                    console.error('Error occurred while tracking the download.');
                }
            });
            // Let the default download behavior continue without preventing the event
        });
    });
</script>
