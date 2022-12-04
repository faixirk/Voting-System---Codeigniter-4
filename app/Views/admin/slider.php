<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Slider</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item text-muted" aria-current="page">Slider</li>
                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">


        <div class="card card-primary  my-4 ">
            <div class="card-body">
                <div class="media align-items-center justify-content-between mb-3">
                    <h4 class="card-title">Slider</h4>
                    <a href="https://script.bugfinder.net/prophecy/admin/content-create/slider" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>

                </div>


                <div class="table-responsive">
                    <table class="categories-show-table table table-hover table-striped table-bordered">
                        <thead class="thead-primary">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    Football </td>
                                <td>

                                    <a href="https://script.bugfinder.net/prophecy/admin/content-show/100/slider" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="javascript:void(0)" data-route="https://script.bugfinder.net/prophecy/admin/contents/100" data-toggle="modal" data-target="#delete-modal" class="btn btn-danger btn-sm notiflix-confirm"><i class="fas fa-trash"></i> Delete</a>

                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    Cricket </td>
                                <td>

                                    <a href="https://script.bugfinder.net/prophecy/admin/content-show/101/slider" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="javascript:void(0)" data-route="https://script.bugfinder.net/prophecy/admin/contents/101" data-toggle="modal" data-target="#delete-modal" class="btn btn-danger btn-sm notiflix-confirm"><i class="fas fa-trash"></i> Delete</a>

                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    Casino </td>
                                <td>

                                    <a href="https://script.bugfinder.net/prophecy/admin/content-show/102/slider" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="javascript:void(0)" data-route="https://script.bugfinder.net/prophecy/admin/contents/102" data-toggle="modal" data-target="#delete-modal" class="btn btn-danger btn-sm notiflix-confirm"><i class="fas fa-trash"></i> Delete</a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->


    <!-- Primary Header Modal -->
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="primary-header-modalLabel">Delete Confirmation </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <form action="" method="post" class="deleteRoute">
                        <input type="hidden" name="_token" value="orloXnamlfEYJs1yDMfxrAVYV3KbrMJpTencGquL"> <input type="hidden" name="_method" value="delete"> <button type="submit" class="btn btn-primary">Yes</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php
    include 'includes/footer.php';
    ?>