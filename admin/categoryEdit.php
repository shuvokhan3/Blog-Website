<?php
include_once 'include/header.php';
include_once 'include/sidebar.php';

include_once '../classes/categoryEdit.php';



//USER SHOW THE EDITABLE VALUE INSIDE THE FORM
if(isset($_GET['editId'])){
    $id = base64_decode($_GET['editId']);

}else{
    header("Location:categoryList.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $newCategory = $_POST['catName'];
    $objectOfCategoryEdit = new categoryEdit();
    $update = $objectOfCategoryEdit->updateCategoryName($id, $newCategory);
}


?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <?php
                    if(isset($update)){
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $update ?>
                        </div>

                    <?php
                    }
                    ?>
                    <div class="card shadow ">
                        <h4 class="card-header">Category Edit Form</h4>
                        <div class="card-body">

                            <?php
                                $objectOfCategoryEdit = new categoryEdit();
                                $categoryName = $objectOfCategoryEdit->showCategoryName($id);
                                if($categoryName){
                                    $row = mysqli_fetch_assoc($categoryName);
                                        ?>
                                        <form method="post" action="">
                                            <div class="mb-3">
                                                <input type="text" name="catName" class="form-control" required placeholder="Type Category" value="<?=$row['categoryName']?>"/>
                                            </div>

                                            <div>
                                                <button type="submit" class="btn btn-success waves-effect waves-light me-1">
                                                    Edit Category
                                                </button>
                                            </div>
                                        </form>

                            <?php

                                }
                            ?>

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
