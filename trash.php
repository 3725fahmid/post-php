<?php
include 'includes/header.php';
// include 'includes/helper-func.php';

if (isset($_GET['restore'])) {
    restorePost($_GET['restore'], $conn);
}
if (isset($_GET['deleteFE'])) {
    deletePostFileLocation($_GET['deleteFE'], $conn);
    deletePostForEver($_GET['deleteFE'], $conn);
}
if (isset($_GET['emptyTrash'])) {
    deleteAllPostForEver($conn);
    // echo $_GET['emptyTrash'];
}
?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Trash List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Project</a></li>
                        <li class="breadcrumb-item active">Trash List</li>
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
                    <h4 class="card-title">Trash List</h4>
                    <div class="text-end">
                        <?php
                        $trashList = getTrashList($conn);
                            if (mysqli_num_rows($trashList) > 0) {
                                echo "<a href='trash.php?emptyTrash=post' class='d-inline-block bg-danger text-white p-2 rounded-2'>Empty (".mysqli_num_rows($trashList)." items) ?</a>";
                                # code...
                            }
                        ?>
                    </div>   
                    
                    <?php
                        $trashList =  getTrashList( $conn);
                        if (mysqli_num_rows($trashList) > 0) {
                            $count = 1;
                            echo "<table class='text-center table table-hover mb-0'>
                                <thead>
                                    <tr>
                                        <th width='50px'>#</th>
                                        <th width='300px'>Project Name</th>
                                        <th width='400px'>Post Details</th>
                                        <th >Posted By</th>
                                        <th >Attachment</th>
                                        <th >Actions</th>
                                    </tr>
                                </thead>";
                                while ($row = mysqli_fetch_assoc($trashList)) {
                                    $postFIle = getFiles($row ['post_id'], $conn);
                                    echo "<tr>
                                    <th width='50px'>".$count."</th>
                                    <td width='300px'>".$row['project_name']."</td>
                                    <td width='400px'>".truncatePostContent($row['post_details'], 100)."</td>
                                    <td >".getOrgList($row ['post_by'], $conn)."</td>
                                    <td >".mysqli_num_rows($postFIle)." files</td>
                                    <td >
                                        <a class='d-inline-block bg-primary text-white p-2 m-1 rounded-2' href='".htmlspecialchars($_SERVER['PHP_SELF'])."?restore=".$row ['post_id']."'>Restore</a>
                                        <a class='d-inline-block bg-danger text-white p-2 m-1 rounded-2' href='".htmlspecialchars($_SERVER['PHP_SELF'])."?deleteFE=".$row ['post_id']."'>Delete</a>
                                    </td>
                                </tr>";
                                $count++;
                                } 
                            echo "</table>";
                        }
                        else {
                            echo "<p class='text-center fs-4'>Trash is empty 😊</p>";
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>


<?php
include 'includes/footer.php';
?>