<?php
include_once 'include/header.php';
include_once 'include/sidebar.php';
include_once '../classes/category.php';

$category = new category();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];
    $catMessage = $category->AddCategory($catName);
    // Redirect after 1 seconds
    echo "<meta http-equiv='refresh' content='1;url=categoryAdd.php'>";
}
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <span>
                        <?php
                        if (isset($catMessage)){
                            echo $catMessage;
                        }
                        ?>
                    </span>
                    <div class="card shadow ">
                        <h4 class="card-header">Category Add Form</h4>
                        <div class="card-body">

                            <form method="post" action="categoryAdd.php">
                                <div class="mb-3">
                                    <input type="text" name="catName" class="form-control" required placeholder="Type Category"/>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Add Category
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>
</div>
<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>


<?php
include_once 'include/footer.php';
?>
