<?php
include 'includes/header-user.php';
if (isset($_GET['userId'])) {
    $userInfo = getUserList($_GET['userId'], $conn);
}
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


    <!-- 
        /* 
        ! Code Here
        */
    -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Profile</h4>
                    <p class="card-title-desc text-center ">
                        <?php
                            if (!empty($_SESSION['update-error'])) {
                                echo "<span class='text-danger'>".$_SESSION['update-error']."</span>";
                                unset($_SESSION['update-error']);
                            }
                            elseif(!empty($_SESSION['update-success'])){
                                echo "<span class='text-success'>".$_SESSION['update-success']."</span>";
                                unset($_SESSION['update-success']);
                            }
                        ?>
                    </p>

                    <!-- 
                        /* 
                            TODO Form Start
                        */
                    -->
                    <?php
                        while ($user = mysqli_fetch_assoc($userInfo)) {
                    ?>
                    <form class="custom-validation" action="includes/update-handel.php" method="post">
                    <input type="hidden" name="updateUserProfileId" value="<?php echo $user['user_id']?>">
                        <div class="mb-3">
                            <label>User Name</label>
                            <input type="text" name="userName" value="<?php echo $user['user_name']; ?>" class="form-control" required placeholder="Name"/>
                        </div>

                        <div class="mb-3">
                            <label>E-Mail</label>
                            <div>
                                <input type="email" name="userEmail" value="<?php echo $user['user_email']; ?>" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail"/>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <div>
                                <input type="password" name="userPass" value="<?php echo decrypt($user['user_pass'], $user['user_email']) ?>" id="pass2" class="form-control" required placeholder="Password"/>
                            </div>
                            <div class="mt-2">
                                <input type="password" name="userConfPass" value="<?php echo decrypt($user['user_pass'], $user['user_email']) ?>" class="form-control" required data-parsley-equalto="#pass2" placeholder="Re-Type Password"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label>Organization</label>
                            <div>
                                <?php
                                    $orgList =  getOrgList(null, $conn);
                                    if (mysqli_num_rows($orgList) > 0) {
                                        while ($row = mysqli_fetch_assoc($orgList)) {
                                            if ($user['user_org'] == $row['org_id']) {
                                                echo "<p>".$row['org_name']."</p>";
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        </div>

                        <input type="hidden" name="userOrg" value='<?php echo $user['user_org'];?>'>

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
                    </form>

                    <?php
                        }
                    ?>

                                        <!-- 
                        /* 
                            TODO Form End
                        */
                    -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div>
<?php
include 'includes/footer.php';
?>