<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>



<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> profile</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item text-muted" aria-current="page"> profile</li>
                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>


    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3"><i class="icon-user"></i> Profile Setting</h4>
                        <form class="form-body file-upload" id="profileForm" enctype="multipart/form-data">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                            <div class="form-row justify-content-between">
                                <div class="col-sm-6 col-md-3">
                                    <div class="image-input ">
                                        <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                        <input type="file" name="image" placeholder="" id="image">
                                        <img id="image_preview_container" class="preview-image" src="https://script.bugfinder.net/prophecy/assets/uploads/admin/627a4928ec4a51652181288.jpg" alt="preview image">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-8">

                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username <span class="text-danger">*</span></label>
                                                <input type="text" id="userName" name="username" class="form-control" value="<?= session('name'); ?>" placeholder="Enter Username">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address <span class="text-danger">*</span></label>
                                                <input type="text" name="email" class="form-control" value="<?= session('email'); ?>" placeholder="Enter Email Address" disabled>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number </label>
                                                <input id="phoneNo" type="text" name="phone" class="form-control" placeholder="Enter Phone Number">

                                            </div>
                                        </div> -->

                                        <!-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address <span class="text-muted text-sm">(optional)</span></label>
                                                <textarea name="address" id="address1" class="form-control" rows="3" placeholder="Your Address"></textarea>

                                            </div>
                                        </div> -->

                                        <div class="col-md-12">
                                            <div class="text-right">
                                                <button id="loadingBtn" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0" type="button" disabled>
                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    Verifying...
                                                </button>


                                                <button id="updateBtn" class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3">Submit</button>
                                                <!-- <button type="submit" id="btn" class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3">Submit</button> -->
                                            </div>
                                        </div>
                                    </div>


                                </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>
    <script>
        $(document).ready(function() {
            $('#loadingBtn').hide();

            $("#updateBtn").click((e) => {
                e.preventDefault();
                if ($('#userName').val() != "") {
                    $('#userName').addClass('is-valid').fadeIn();
                    $.ajax({
                        type: "POST",
                        url: '<?= base_url() ?>' + "/admin/profile/update",
                        data: $('#profileForm').serialize(),
                        beforeSend: function() {
                            $('#updateBtn').hide();
                            $('#loadingBtn').show();
                        },
                        success: function(response) {
                            if (response == 1) {
                                swal.fire({
                                    'icon': 'success',
                                    'text': "Successfully Updated!"
                                });
                                $('#updateBtn').show();
                                $('#loadingBtn').hide();
                            } else if (response == 0) {
                                toastr.error('Error while updating username. Contact admin');
                                $('#updateBtn').show();
                                $('#loadingBtn').hide();
                            } else if (response == 3) {
                                toastr.error('Email is not verified');
                                $('#updateBtn').show();
                                $('#loadingBtn').hide();
                            } else {
                                toastr.error('Invalid response');
                                $('#updateBtn').show();
                                $('#loadingBtn').hide();
                            }
                        },
                        error: (error) => {
                            console.log(JSON.stringify(error));
                        },
                    });
                } else {
                    toastr.error("All fields are required.");

                }
            });
        });
    </script>