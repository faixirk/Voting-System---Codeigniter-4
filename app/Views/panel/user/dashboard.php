<?php 
    include 'includes/head.php';
    include 'includes/header.php';
    include 'includes/sidebar.php';
?>
 
        <div class="content user-panel">
            <div class="d-flex justify-content-between">
                <div>
                    <h4>Dashboard</h4>
                </div>
                <button class="btn-custom light toggle-user-panel-sidebar d-lg-none" onclick="toggleSidebar('userPanelSideBar')">
                    <i class="fal fa-sliders-h"></i>
                </button>
            </div>

            <!-- contents -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-10 mb-2">
                    <div class="dashboard__card">
                        <div class="dashboard__card-content">
                            <h2 class="price">103</h2>
                            <p class="info">Categories</p>
                        </div>
                        <div class="dashboard__card-icon">
                            <img src="<?= base_url('public/assets/images/icons/categories.png') ?>" alt="categories">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-10 mb-2">
                    <div class="dashboard__card">
                        <div class="dashboard__card-content">
                            <h2 class="price">43423</h2>
                            <p class="info">Users</p>
                        </div>
                        <div class="dashboard__card-icon">
                            <img src="<?= base_url('public/assets/images/icons/man.png') ?>" alt="users">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-10 mb-2">
                    <div class="dashboard__card">
                        <div class="dashboard__card-content">
                            <h2 class="price">0</h2>
                            <p class="info">Total Bet</p>
                        </div>
                        <div class="dashboard__card-icon">
                            <img src="https://script.bugfinder.net/prophecy/assets/themes/betting/images/icon/bet.png" alt="...">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-10 mb-2">
                    <div class="dashboard__card">
                        <div class="dashboard__card-content">
                            <h2 class="price">0</h2>
                            <p class="info">Bet Win</p>
                        </div>
                        <div class="dashboard__card-icon">
                            <img src="https://script.bugfinder.net/prophecy/assets/themes/betting/images/icon/earn.png" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 col-sm-12">
                    <div id="container" class="apexcharts-canvas"></div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body ">
                            <div class="table-parent table-responsive m-0">
                                <table class="table  table-striped" id="service-table">
                                    <thead>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Invest Amount</th>
                                            <th>Return Amount</th>
                                            <th>Charge</th>
                                            <th>Ratio</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Information</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td colspan="100%">No Data Found!</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="investLogList" role="dialog">
                <div class="modal-dialog  modal-xl">
                    <div class="modal-custom-content">
                        <div class="modal-header modal-colored-header">
                            <h5 class="modal-title service-title">Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped" id="service-table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Match Name</th>
                                        <th>Category Name</th>
                                        <th>Tournament Name</th>
                                        <th>Question Name</th>
                                        <th>Option Name</th>
                                        <th>Ratio</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                                <tbody class="result-body">

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-custom me-2 mb-2" data-bs-dismiss="modal"><span>Close</span></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


<?= include 'includes/footer.php'  ?>
