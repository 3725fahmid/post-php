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
                                <h1 class="fh-title-lg"><?php
                                                echo getOrgList($userInfo['user_org'], $conn);
                                                ?></h1></h1>
                                <p>Address: <span>Block K, 1213, House 23 Road 28, Dhaka 1213</span></p>
                                <p>Contact: <span>01718-209923</span></p>
                            </div>
                            <div class="org-log-info">
                                <ul>
                                    <li>
                                        <p>Log in history</p>
                                    </li>
                                    <li>IP: 192.168.0.0/16 <span>Date: 12 sat 2024</span></li>
                                    <li>IP: 192.168.0.0/16 <span>Date: 12 sat 2024</span></li>
                                    <li>IP: 192.168.0.0/16 <span>Date: 12 sat 2024</span></li>
                                    <li>IP: 192.168.0.0/16 <span>Date: 12 sat 2024</span></li>
                                    <li>IP: 192.168.0.0/16 <span>Date: 12 sat 2024</span></li>
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
                                <p class="text-end" style='width:400px;'>Created: <?php echo isset($row['project_name']) ?  $row['post_date'] :  "Unauthorized User"; ?></p>
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
                                        ?>
                                        <div class="fh-list">
                                            <ul class="fh_flex_space-btw">
                                                <li class="fh-content">
                                                    <h3 class="fh-title-small"><?php echo $fileName ?></h3>
                                                </li>
                                                <li class="fh-btn fh-flex-center">
                                                <a class="color-view" href="viewpdf.php?filename=<?php echo urlencode($fileName); ?>" target="_blank">View File</a>
                                                <a href="uploads/<?php echo $fileName; ?>" download>Download</a>
                                                    <!-- // <a class="color-view" href="uploads/'.$fileName.'" target="_blank">view</a> -->
                                                    <!-- <a href="uploads/'.$row['post_files_names'].'" download>Download</a> -->
                                                </li>
                                            </ul>
                                        </div>
                                    <?php
                                        }}}
                                    ?>

                            <!-- START:: file card -->
                            <!-- <div class="fh-list">
                                <a href="download.php?name='.$row['post_files_names'].'" title="Download File">file</a>
                                <a href="download.php?download='.$row['file'].'" title="Download File">file</a>
                                <ul class="fh_flex_space-btw">
                                    <li class="fh-content fh-flex-center">
                                        <h3 class="fh-title-small">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, nemo.</h3>
                                    </li>
                                    <li class="fh-btn fh-flex-center">
                                        <a href="#" class="color-view">view</a>
                                        <a href="#">Download</a>
                                    </li>
                                </ul>
                            </div> -->
                            <!-- END:: file card -->
                            

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