<?php
include 'includes/header-user.php';
?>

<?php

?>

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box p-0 d-sm-flex align-items-center justify-content-between">
                 <?php
                    echo getOrgList($userInfo['user_org'], $conn);
                ?>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="text-center py-3">
        <input class='sr-search' type="text" name="searchUser" placeholder="Search posts..." id="searchPost">
    </div>

    <?php
    $start = 0;
    $limit = 6;

    if (isset($_GET['page'])) {
        $start = ($_GET['page'] - 1) * $limit;
    }
    ?>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                                        <p>Logs</p>
                                    </li>
                                    <?php
                                        while ($row = mysqli_fetch_assoc($logs)) {
                                            echo  '<li>'. $row['user_name'] . ' ' .  $row['ip'] . ' <span>Date: '. $row['created_at'].'</span></li>';
                                        }
                                    ?>

                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id='showData' class="row g-3 mb-3">

    </div>


    <div class="d-flex justify-content-between px-3">
        <!-- Page Info -->
        <div class="">
            <?php

            $totalPages = ceil(mysqli_num_rows($conn->query("SELECT *, DATE_FORMAT(created_at, '%d-%M-%Y %h:%i %p') AS post_date FROM posts WHERE post_by = " . $userInfo['user_org'] . "")) / $limit);
            // $pages = ceil($postList / 4);
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            echo "Page " . $page . " of $totalPages";
            ?>
        </div>
        <!-- Pagination -->
        <div class="">
            <ul class="pagination">
                <?php
                if (isset($_GET['page']) && $_GET['page'] > 1) {
                    echo "<li class='page-item'><a class='page-link' href='?page=" . $_GET['page'] - 1 . "'>Previous</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link'>Previous</a></li>";
                }
                ?>


                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<li class='page-item'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
                }
                ?>


                <?php
                if (!isset($_GET['page'])) {
                    echo "<li class='page-item'><a class='page-link' href='?page=2'>Next</a></li>";
                } elseif ($_GET['page'] >= $totalPages) {
                    echo "<li class='page-item'><a class='page-link'>Next</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='?page=" . $_GET['page'] + 1 . "'>Next</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>


    <script>
        // for user posts
        $(document).ready(function() {
            $.ajax({
                url: "ajax/showUserPost.php",
                method: 'POST',
                data: {
                    id: <?php echo $userInfo['user_org']; ?>,
                    start: <?php echo $start; ?>,
                    limit: <?php echo $limit; ?>
                },

                success: function(data) {
                    $("#showData").html(data);
                }
            });
            $("#searchPost").keyup(function() {
                var name = $(this).val();
                // alert(name);

                if (name != '') {
                    $.ajax({
                        url: "ajax/searchUserPost.php",
                        method: 'POST',
                        data: {
                            name: name,
                            id: <?php echo $userInfo['user_org']; ?>,
                            start: <?php echo $start; ?>,
                            limit: <?php echo $limit; ?>
                        },

                        success: function(data) {
                            $("#showData").html(data);
                        }
                    });
                } else {
                    $.ajax({
                        url: "ajax/showUserPost.php",
                        method: 'POST',
                        data: {
                            id: <?php echo $userInfo['user_org']; ?>,
                            start: <?php echo $start; ?>,
                            limit: <?php echo $limit; ?>
                        },

                        success: function(data) {
                            $("#showData").html(data);
                        }
                    });
                }
            });
        });
    </script>