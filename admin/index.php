
<?php

    //add header dynamicly on this file 
    include_once 'include/header.php';

    //add leftsidebar dynamicly on the index file
    include_once 'include/sidebar.php';

    //add footer dynamicly on the index file
    include_once 'include/footer.php';

?>





        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Minible</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <div id="total-revenue-chart"></div>
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1">$<span data-plugin="counterup">34,152</span></h4>
                                        <p class="text-muted mb-0">Total Revenue</p>
                                    </div>
                                    <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i
                                                class="mdi mdi-arrow-up-bold me-1"></i>2.65%</span> since last week
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <div id="orders-chart"> </div>
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">5,643</span></h4>
                                        <p class="text-muted mb-0">Orders</p>
                                    </div>
                                    <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                                class="mdi mdi-arrow-down-bold me-1"></i>0.82%</span> since last week
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <div id="customers-chart"> </div>
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">45,254</span></h4>
                                        <p class="text-muted mb-0">Customers</p>
                                    </div>
                                    <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                                class="mdi mdi-arrow-down-bold me-1"></i>6.24%</span> since last week
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3">

                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <div id="growth-chart"></div>
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1">+ <span data-plugin="counterup">12.58</span>%</h4>
                                        <p class="text-muted mb-0">Growth</p>
                                    </div>
                                    <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i
                                                class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->



                    <!-- end row-->


                    <!-- end row -->

                    <!-- end row -->


                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">

            <div class="rightbar-title d-flex align-items-center px-3 py-4">

                <h5 class="m-0 me-2">Settings</h5>

                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>



            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch" />
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch" />
                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
                </div>
                <div class="form-check form-switch mb-5">
                    <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                    <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                </div>


            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

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



