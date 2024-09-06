<?php
include 'includes/header.php';
// include 'includes/helper-func.php';
?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Add Projects</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Project</a></li>
                        <li class="breadcrumb-item active">Add Project</li>
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
                    <h4 class="card-title">Add Project</h4>
                    <p class="card-title-desc text-center">

                        <?php
                            if (!empty($_SESSION['add-post-error'])) {
                                echo "<div class='alert alert-danger text-center' role='alert'>".$_SESSION['add-post-error']."</div>";
                                unset($_SESSION['add-post-error']);
                            }
                            elseif(!empty($_SESSION['add-post-success'])){
                                echo "<div class='alert alert-success text-center' role='alert'>".$_SESSION['add-post-success']."</div>";
                                unset($_SESSION['add-post-success']);
                            }
                        ?>
                    </p>

                    <form class="custom-validation" action="includes/add-handel.php" method="post" enctype="multipart/form-data">
                        <!-- <div class="mb-3">
                            <label>Post Title</label>
                            <input type="text" name="postTitle" class="form-control" required placeholder="Post title"/>
                        </div> -->

                        <div class="mb-3">
                            <label>Project Title</label>
                            <input type="text" name="projectName" class="form-control" required placeholder="Project title"/>
                        </div>

                        <div class="mb-3">
                            <label>Project Details</label>
                            <div>
                                <textarea name="postDetails" required class="form-control" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label>Organization</label>
                            <div>
                                <?php
                                    $orgList =  getOrgList(null, $conn);
                                    if (mysqli_num_rows($orgList) > 0) {
                                        echo "<select class='form-select' name='postOrg' aria-label='Default select example'>";
                                        while ($row = mysqli_fetch_assoc($orgList)) {
                                            echo "<option value='".$row['org_id']."'>".$row['org_name']."</option>";
                                        }
                                        echo "</select>";
                                    }
                                    else {
                                        echo "No Org Found";
                                    }
                                ?>
                            </div>
                        </div>

                        <div id="fileInputArea" class="row mb-3">
                            <label>Files</label>
                        </div>
                        <div class="mb-3">
                            <button type="button" id="addInputFile" class='btn btn-info'>Add Files</button>
                        </div>

                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div>


<?php
include 'includes/footer.php';
?>