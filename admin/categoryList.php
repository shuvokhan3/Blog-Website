<?php

include_once 'include/header.php';
include_once 'include/sideBar.php';
include_once '../classes/categoryGet.php';
include_once '../classes/categoryDelete.php';


//create an object in categoryGet.php class and called it method name allCategory()

$allCategory = new categoryGet();
$categoryValue = $allCategory->getCategories();

if(isset($_GET['deleteId'])){
    $id = base64_decode($_GET['deleteId']);
    $objDelete = new categoryDelete();
    $deleteCategory = $objDelete->deleteCategory($id);

    // Redirect after 1 seconds //mete refresh
    echo "<meta http-equiv='refresh' content='1;url=categoryList.php'>";
}
?>





<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <!--massage for delete category-->
                <?php
                if(isset($deleteCategory)){
                    echo "<script>
                      setTimeout(function(){
                       window.location.href = 'categoryList.php';
                      }, 2000);
                     </script>";
                   echo '<div class="alert alert-success" role="alert">
                        Successfully deleted the category.!!
                         </div>';
                }
                ?>




                <h4 class="card-title">Buttons example</h4>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>SN:</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>


                    <?php
                       if($categoryValue){
                           //$sn variable use for count the serial number
                           $sn = 0;
                           //mysqli_fetch_assoc($categoryValue) means the loop run untill the row exits in this categorys database
                           while($row = mysqli_fetch_assoc($categoryValue)){
                               ?>
                               <tr>
                                   <td><?=$sn?></td>
                                   <td><?=$row['categoryName']?></td>
                                   <td>
                                       <a href='categoryEdit.php?editId=<?=base64_encode($row['categorysId'])?>' class="btn btn-success">Edit</a>
                                       <a href='?deleteId=<?=base64_encode($row['categorysId'])?>' onclick= "return confirm('Are you sure want to delete : <?=$row['categoryName']?>')" class="btn btn-danger">Delete</a>
                                   </td>
                               </tr>
                             <?php
                               $sn++;
                           }
                       }
                    ?>

                    </tbody>
                </table>

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

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>






<?php
include_once 'include/footer.php';
?>

