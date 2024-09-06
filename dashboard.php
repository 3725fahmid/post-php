<?php
include 'includes/header.php';
// include 'includes/helper-func.php';
?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>
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
    <h3>Hello <?php echo $_SESSION['admin']?>, Welcome to Dashboard</h3>
    

    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">Total Posts</p>
                            <h4 class="mb-2">
                                <?php 
                                    $postList = getPostList(null, $conn);
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
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">Total Users</p>
                            <h4 class="mb-2">
                            <?php 
                                    $userList = getUserList(null, $conn);
                                    echo mysqli_num_rows($userList);
                                    mysqli_free_result($userList);
                                ?>
                            </h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class="ri-user-line font-size-24"></i>  
                            </span>
                        </div>
                    </div>                                              
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">Total Organizations</p>
                            <h4 class="mb-2">
                            <?php 
                                    $orgList = getOrgList(null, $conn);
                                    echo mysqli_num_rows($orgList);
                                    // mysqli_free_result($orgList);
                                ?>
                            </h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class="ri-building-line font-size-24"></i>  
                            </span>
                        </div>
                    </div>                                              
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Column with Data Labels</h4>
                    
                    <div id="column_chart_datalabel" class="apex-charts" dir="ltr"></div>
                </div>
            </div><!--end card-->
        </div>
    </div>  
    <!-- end row -->

    <?php
        // if (mysqli_num_rows($orgList) > 0 ) {
        //     while ($row = mysqli_fetch_assoc($orgList)) {
        //         $post = getPostList($row['org_id'], $conn);
        //         echo  mysqli_num_rows($post) . ", ";
        //     }
        // }

        // if (mysqli_num_rows($orgList) > 0 ) {
        //     while ($row = mysqli_fetch_assoc($orgList)) {
        //         echo "'" . $row['org_name'] ."'" . ", ";
        //     }
        // }
    ?>


</div>


<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<script>
// charts

var options = {
    // series: [1, 2, 2],
    series: [<?php 
    if (mysqli_num_rows($orgList) > 0 ) {
        while ($row = mysqli_fetch_assoc($orgList)) {
            $post = getPostList($row['org_id'], $conn);
            echo  mysqli_num_rows($post) . ", ";
        }
        mysqli_free_result($post);
    }
    ?>],
    chart: {
        width: 380,
        type: 'pie',
    },
    labels: [ <?php 
    $orgList = getOrgList(null, $conn);
    if (mysqli_num_rows($orgList) > 0 ) {
            while ($row = mysqli_fetch_assoc($orgList)) {
                echo "'" . $row['org_name'] . "'" . ", ";
            }
        }
        mysqli_free_result($orgList);
    ?> ],
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'bottom'
            }
        }
    }]
};
console.log(options);
var chart = new ApexCharts(document.querySelector("#column_chart_datalabel"), options);
chart.render();
</script>

<?php
include 'includes/footer.php';
?>

