<?php
include_once 'include/header.php';
include_once 'include/sidebar.php';


//include postAdd file that help to add data on database
include_once '../classes/postAdd.php';


//create object on this class
$post = new postAdd();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try{

        $post_add = $post->AddPost($_POST, $_FILES);

    }catch (error $ex){
        echo $ex;
    }
}

?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                <span>
                    <?php
                    if (isset($post_add)) {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   <?= $post_add ?>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                        <?php
                    }
                    ?>

                </span>

                <div class="col-xl-11">
                    <div class="card shadow ">
                        <h4 class="card-header">Add Post</h4>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="">

                                <!--Post title-->
                                <div class="mb-3">
                                    <label class="form-label">Post Title</label>
                                    <input type="text" name="title" class="form-control" required placeholder="Type title"/>
                                </div>

                                <!--Post category-->
                                <div class="mb-3">
                                    <label class="form-label">Select Category</label>
                                    <div >
                                        <select class="form-select" name="categoryId">
                                            <option>Select</option>
                                            <option>Large select</option>
                                            <option>Small select</option>
                                        </select>
                                    </div>
                                </div>

                                <!--Image File Upload-->
                                <div class="mb-3">
                                    <label class="form-label">Image One</label>
                                    <input type="file" name="imageOne" class="form-control" required placeholder="Image One"/>
                                </div>

                                <!--Image File Upload-->
                                <div class="mb-3">
                                    <label class="form-label">Image Two</label>
                                    <input type="file" name="imageTwo" class="form-control" required placeholder="Image Two"/>
                                </div>

                                <!--Image File Upload-->
                                <div class="mb-3">
                                    <label class="form-label">Image Three</label>
                                    <input type="file" name="imageThree" class="form-control" required placeholder="Image Three"/>
                                </div>

                                <!--Post description-->
                                <div class="mb-3">
                                    <label class="form-label">Post Description</label>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <textarea name="description" id="classic-editor"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Post Visibility position -->
                                <div class="mb-3">
                                    <label class="form-label">Post Visibility</label>
                                    <div >
                                        <select class="form-select" name="visibility">
                                            <option value="1">Slider</option>
                                            <option value="1">Post</option>
                                        </select>
                                    </div>
                                </div>

                                <!--Tag-->
                                <div class="mb-3">
                                    <label class="form-label">Tags</label>
                                    <input type="text" name="tag" class="form-control" required placeholder="Type Tag"/>
                                </div>


                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Add Post
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
<!-- ckeditor -->
<script src="assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#classic-editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>



<?php
include_once 'include/footer.php';
?>
