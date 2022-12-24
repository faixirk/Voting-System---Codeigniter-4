<?php include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Logos</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>

                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>

    <div class="container-fluid">

        <div class="alert alert-warning mb-4" role="alert">
            <i class="fas fa-info-circle mr-2"></i> After changing image, please clear your browser's cache to see changes.
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-primary shadow">
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home">Logo </a>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="mt-3 container tab-pane active">
                                <form id="logo-form" action="" enctype="multipart/form-data">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                    <div class="row justify-content-center">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <h5 class="text-dark">Frontend Logo</h5>
                                                <div class="image-input">
                                                    <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                                    <input type="file" name="image" placeholder="Choose image" id="image">

                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-9">

                                            <div class="submit-btn-wrapper text-center mt-4">
                                                <button id="logo-submit" type="button" class="btn waves-effect waves-light btn-primary btn-block btn-rounded">
                                                    <span>Save Changes</span></button>
                                                <input type="hidden" value="<?= $logo['header_logo'] ?>" name="old_logo">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
    <script>
        $(document).ready(function() {
            $('#logo-submit').click(function(event) {
                var id1 = $('#image').val();

                if (id1 != '') {
                    var formdata = new FormData(document.getElementById('logo-form'));
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>" + '/admin/logo/update',
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