<?php
include './includes/header-user.php';
?>

<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between align-items-center">
                <h4 class="mb-sm-0">Dashboard</h4>
                <p class="fw-bolder text-center font-size-18 m-0">Today: <?php echo date("D, d-M-Y");?></p>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Code Here -->
     
    <h4 class='mb-4'>Hello <?php echo $userInfo['user_name']?>,  Welcome to Dashboard</h4>

    <?php
        $orgDetails = getOrgDetails($userInfo['user_org'], $conn);
        $org = mysqli_fetch_assoc($orgDetails);
    ?>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fs-5">About <?php echo $org['org_name'];?></h5>
                <p class="card-text font-size-15"><?php echo $org['org_about'];?></p>
                <address class="card-text">
                    <p><strong>Address :</strong> <em><?php echo $org['org_address'];?></em> <br></p>
                    <p><strong>Contact :</strong> <a href='tel: <?php echo $org['org_phone'] ?>'><?php echo $org['org_phone'] ?></a></p>
            </address>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">Total projects by <em><?php echo getOrgList($userInfo['user_org'], $conn);?></em></p>
                            <h4 class="mb-2">
                                <?php 
                                    $postList = getPostList($userInfo['user_org'], $conn);
                                    echo mysqli_num_rows($postList);
                                    mysqli_free_result($postList);
                                ?>
                            </h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class="ri-edit-line font-size-24"></i>  
                            </span>
                        </div>
                    </div>                                            
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->

    </div><!-- end row -->




</div>

<?php
include './includes/footer.php';
?>