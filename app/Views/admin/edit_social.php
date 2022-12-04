<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Social</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item text-muted" aria-current="page">Social</li>
                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>



    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">


        <div class="row justify-content-md-center">
            <div class="col-lg-12">
                <!-- Currency Create Form  -->
                <div class="card mb-4 shadow">
                    <div class="card-body">

                        <div class="media align-items-center justify-content-between mb-3">
                            <h4 class="card-title ">Social</h4>
                            <a href="<?= base_url('admin/social') ?>" class="btn btn-sm btn-primary"> <i class="fas fa-arrow-left"></i> Back</a>
                        </div>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#lang-tab-0" role="tab" aria-controls="lang-tab-0" aria-selected="true">English</a>
                            </li>

                        </ul>


                        <div class="tab-content mt-2" id="myTabContent">

                            <div class="tab-pane fade show active" id="lang-tab-0" role="tabpanel">
                                <form id="socialForm" enctype="multipart/form-data">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name"> Name </label>
                                                <input id="name" type="text" name="name" class="form-control  " value="<?= $social['name'] ?>">
                                                <div class="invalid-feedback">
                                                </div>
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="icon"> Icon </label>
                                                <div class="input-group">
                                                    <input type="text" name="icon[1]" class="form-control icon " value="<?= $social['icon'] ?>">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary iconPicker" data-icon="fab fa-facebook" role="iconpicker"></button>
                                                    </div>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="link"> Link </label>
                                                <input id="link" type="url" name="link" class="form-control  " value="<?= $social['link'] ?>">
                                                <div class="invalid-feedback">
                                                </div>
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button value="<?= $social['id'] ?>" id="socialBtn" type="button" class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3">Save Change</button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->
    <?php
    include 'includes/footer.php';
    ?>
    <script>
        $(document).ready(function() {
            $('#socialBtn').click(function(event) {
                var id = $(this).val();
                if ($('#name').val() != '' && $('#icon').val() != '' && $('#link').val() != '') {
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url() ?>' + "/admin/social/editLinks/" + id,
                        data: $('#socialForm').serialize(),

                        success: function(data) {
                            if (data == 1) {
                                swal.fire({
                                    'icon': 'success',
                                    'text': "Successfully Added!"
                                });
                                window.location.reload();
                            } else if (data == 2) {
                                swal.fire({
                                    'icon': 'info',
                                    'text': "Query Failed. Contact Admin!"
                                });
                            } else {
                                swal.fire({
                                    'icon': 'info',
                                    'text': "Name Should Be Unique!"
                                });
                            }


                        },
                        error: function(data) {

                        }
                    })
                } else {
                    swal.fire({
                        'icon': 'error',
                        'text': "All fields are required!",
                    });
                }


            });

        });
    </script>
    