<?php
include 'includes/header.php';
?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Add Organization</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Organization</a></li>
                        <li class="breadcrumb-item active">Add Organization</li>
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
                    <h4 class="card-title">Add Organization</h4>
                    <p class="card-title-desc text-center">
                    <?php
                            if (!empty($_SESSION['add-org-error'])) {
                                echo "<div class='alert alert-danger text-center' role='alert'>".$_SESSION['add-org-error']."</div>";
                                unset($_SESSION['add-org-error']);
                            }
                            elseif(!empty($_SESSION['add-org-success'])){
                                echo "<div class='alert alert-success text-center' role='alert'>".$_SESSION['add-org-success']."</div>";
                                unset($_SESSION['add-org-success']);
                            }
                        ?>
                    </p>

                    <form class="custom-validation" action="includes/add-handel.php" method="post">
                        <div class="mb-3">
                            <label>Name of the Organization</label>
                            <input type="text" name="orgName" class="form-control" required placeholder="Name"/>
                        </div>
                        <div class="mb-3">
                            <label>About Organization</label>
                            <div>
                                <textarea name="orgAbout" required class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" name="orgPhone" class="form-control" required placeholder="019XXXXXXXX"/>
                        </div>
                        <div class="mb-3">
                            <label>Address</label>
                            <input type="text" name="orgAddress" class="form-control" required placeholder="Address"/>
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Submit
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