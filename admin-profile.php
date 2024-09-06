<?php
include 'includes/header.php';
// include 'includes/helper-func.php';
?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Profile</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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

                <h4 class="card-title">Update</h4>

                <p class="card-title-desc text-center ">
                        <?php
                            if(!empty($_SESSION['update-success'])){
                                echo "<span class='text-success'>".$_SESSION['update-success']."</span>";
                                unset($_SESSION['update-success']);
                            }
                        ?>
                    </p>

                <?php
                    $adminInfo = getAdmin($conn);
                    $admin = mysqli_fetch_assoc($adminInfo)
                ?>
                <form action="includes/update-handel.php" method="post">
                <input  type="hidden" name="admin" value='1'>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="admin_name" value="<?php echo $admin['admin_name']; ?>" id="example-text-input">
                    </div>
                </div>

                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" name="admin_email" value="<?php echo $admin['admin_email']; ?>" id="example-email-input">
                    </div>
                </div>
                <!-- end row -->
                
                <div class="row mb-3">
                    <label for="example-password-input" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="admin_pass" value="<?php echo decrypt($admin['admin_pass'], "adminP@$$"); ?>" id="example-password-input">
                    </div>
                </div>
                <!-- end row -->
                <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Update
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                </div>
                </form>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->


</div>

<?php
include 'includes/footer.php';
?>

