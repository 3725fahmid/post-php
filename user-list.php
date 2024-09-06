<?php
include 'includes/header.php';
// include 'includes/helper-func.php';


?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">User List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                        <li class="breadcrumb-item active">User List</li>
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
                    <h4 class="card-title">User List</h4>   
                    <div class="text-center py-4">
                        <input class='sr-search' type="text" name="searchUser" placeholder="Search users..." id="searchItem">
                    </div>
                    <?php
                        $start = 0;
                        $limit = 10;

                        if (isset($_GET['page'])) {
                            $start = ($_GET['page'] - 1) * $limit;
                        }
                    ?>

                    <div id='showData' class="mb-3">

                    </div>

                    <div class="d-flex justify-content-between px-3 align-items-center">
                        <!-- Page Info -->
                        <div class="">
                        <?php

                            $totalPages = ceil(mysqli_num_rows($conn->query("SELECT * FROM posts  WHERE post_status = 1")) / $limit);
                            // $pages = ceil($postList / 4);
                            if (!isset($_GET['page'])) {
                                $page = 1;
                            }
                            else {
                                $page = $_GET['page'];
                            }
                            echo "Page ".$page." of $totalPages";
                        ?>
                        </div>
                        <!-- Pagination -->
                        <div class="">
                        <ul class="pagination">
                            <?php
                                if (isset($_GET['page']) && $_GET['page'] > 1) {
                                    echo "<li class='page-item'><a class='page-link' href='?page=". $_GET['page'] - 1 ."'>Previous</a></li>";
                                }
                                else {
                                    echo "<li class='page-item'><a class='page-link'>Previous</a></li>";
                                }
                            ?>


                            <?php
                                    for ($i=1; $i <= $totalPages; $i++) { 
                                        echo "<li class='page-item'><a class='page-link' href='?page=".$i."'>".$i."</a></li>";
                                    }
                                ?>


                            <?php
                                if (!isset($_GET['page'])) {
                                    echo "<li class='page-item'><a class='page-link' href='?page=2'>Next</a></li>";
                                }
                                elseif ($_GET['page'] >= $totalPages) {
                                    echo "<li class='page-item'><a class='page-link'>Next</a></li>";
                                }
                                else {
                                    echo "<li class='page-item'><a class='page-link' href='?page=".$_GET['page'] + 1 ."'>Next</a></li>";
                                }
                            ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>





<?php
include 'includes/footer.php';
?>

<script>
    // for users
$(document).ready(function () {
    $.ajax({
        url: "ajax/showdata.php",
        method: 'POST',
        data:{start: <?php echo $start;?>, limit: <?php echo $limit;?>, count: <?php echo $page;?>},

        success: function (data) {
            $("#showData").html(data);
        }
    });
    $("#searchItem").keyup(function () {
        var name = $(this).val();
        // alert(name);

        if (name != '') {
            $.ajax({
                url: "ajax/livesearch.php",
                method: 'POST',
                data: { name: name },

                success: function (data) {
                    $("#showData").html(data);
                }
            });
        }
        else {
            $.ajax({
                url: "ajax/showdata.php",
                method: 'POST',
                data:{start: <?php echo $start;?>, limit: <?php echo $limit;?>, count: <?php echo $page;?>},

                success: function (data) {
                    $("#showData").html(data);
                }
            });
        }
    });
});
</script>