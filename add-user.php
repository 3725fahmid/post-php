<?php
include 'includes/header.php';
// include 'includes/helper-func.php';
?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Add User</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                        <li class="breadcrumb-item active">Add User</li>
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
                    <h4 class="card-title">Add User</h4>
                    <p class="card-title-desc text-center ">
                        <?php
                            if (!empty($_SESSION['add-user-error'])) {
                                echo "<div class='alert alert-danger text-center' role='alert'>".$_SESSION['add-user-error']."</div>";
                                unset($_SESSION['add-user-error']);
                            }
                            elseif(!empty($_SESSION['add-user-success'])){
                                echo "<div class='alert alert-success text-center' role='alert'>".$_SESSION['add-user-success']."</div>";
                                unset($_SESSION['add-user-success']);
                            }
                        ?>
                    </p>

                    <!-- 
                        /* 
                            TODO Form Start
                        */
                    -->
                    <form class="custom-validation" action="includes/add-handel.php" method="post">
                        <div class="mb-3">
                            <label>User Name</label>
                            <input type="text" name="userName" class="form-control" required placeholder="Name"/>
                        </div>

                        <div class="mb-3">
                            <label>E-Mail</label>
                            <div>
                                <input type="email" name="userEmail" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail"/>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <div>
                                <input type="password" name="userPass" id="pass2" class="form-control" required placeholder="Password"/>
                            </div>
                            <div class="mt-2">
                                <input type="password" name="userConfPass" class="form-control" required data-parsley-equalto="#pass2" placeholder="Re-Type Password"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label>Organization</label>
                            <div>
                                <?php
                                    $orgList =  getOrgList(null, $conn);
                                    if (mysqli_num_rows($orgList) > 0) {
                                        echo "<select class='form-select' name='userOrg' aria-label='Default select example'>";
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