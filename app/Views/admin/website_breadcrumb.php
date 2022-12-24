<?php include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';

?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Banner Settings</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item text-muted" aria-current="page"> Banner Settings</li>
                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="alert alert-warning mb-4" role="alert">
            <i class="fas fa-info-circle mr-2"></i> After changes image. Please clear your browser's cache to see changes.
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card card-primary shadow">
                    <div class="card-body">


                        <form id="breadcrumb-form" action="" enctype="multipart/form-data">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">


                            <div class="row justify-content-center">


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5 class="text-dark">Login/Register Image</h5>
                                        <div class="image-input ">
                                            <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                            <input type="file" name="loginImage" placeholder="Choose image" id="loginImage">
                                            <img id="loginImage_preview_container" class="preview-image" src="<?= base_url('public/uploads/logo/' . $breadcrumb['login_image']) ?>" alt="preview image">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5 class="text-dark">Banner Image</h5>
                                        <div class="image-input">
                                            <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                            <input type="file" name="image" placeholder="Choose image" id="image">
                                            <img id="image_preview_container" class="preview-image" src="<?= base_url('public/uploads/banners/' . $breadcrumb['banner']) ?>"  alt="preview image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5 class="text-dark">Footer Background</h5>

                                        <div class="image-input">
                                            <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                            <input type="file" name="footer" placeholder="Choose image" id="footerImage">
                                            <img id="footerImage_preview_container" class="preview-image" src="<?= base_url('public/uploads/footer/' . $breadcrumb['footer']) ?>"  alt="preview image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">


                                <div class="col-md-12">
                                    <div class="submit-btn-wrapper text-center mt-4">
                                        <button id="bannerBtn" type="button" class="btn waves-effect waves-light btn-primary btn-block btn-rounded">
                                            <span>Save Changes</span></button>
                                        <input type="hidden" value="<?= $breadcrumb['login_image'] ?>" name="old_loginImage">
                                        <input type="hidden" value="<?= $breadcrumb['banner'] ?>" name="old_image">
                                        <input type="hidden" value="<?= $breadcrumb['footer'] ?>" name="old_footer">
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
            $('#bannerBtn').click(function(event) {
                // event.preventDefault();

                var id1 = $('#image').val();
                var id2 = $('#loginImage').val();
                var id3 = $('#footerImage').val();

                if (id1 != '' || id2 != '' || id3 != '') {
                    var formdata = new FormData(document.getElementById('breadcrumb-form'));
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>" + '/admin/breadcrumb/update',
                        data: formdata,
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",

                        success: function(data) {
                            if (data == 1) {
                                swal.fire({
                                    'icon': 'success',
                                    'text': "Image Uploaded Successfully!",
                                });
                                window.location.reload();

                            } else if (data == 2) {
                                swal.fire({
                                    'icon': 'info',
                                    'text': "Error while saving data. Contact Admin!",
                                });
                            } else if (data == 3) {
                                swal.fire({
                                    'icon': 'error',
                                    'text': "File has moved and not valid!",
                                });
                            } else if (data == 4) {
                                swal.fire({
                                    'icon': 'info',
                                    'text': "Oops! There was an error. Contact Admin!",
                                });
                            } else {
                                swal.fire({
                                    'icon': 'info',
                                    'text': "Validation Failed!",
                                });
                            }
                        },
                        error: function(data) {
                            swal.fire({
                                'icon': 'info',
                                'text': "Unexpected Error! Contact Admin.",
                            });
                        }
                    });
                } else {
                    swal.fire({
                        'icon': 'info',
                        'text': "Select An Image First!",
                    });
                }
            });

        });
    </script>