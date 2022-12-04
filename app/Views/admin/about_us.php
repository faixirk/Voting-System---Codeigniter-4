<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">About Us</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item text-muted" aria-current="page">About Us</li>
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
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="media align-items-center justify-content-between mb-3">
                            <h4 class="card-title">About Us</h4>
                            <a href="<?= base_url('admin/breadcrumb') ?>" class="btn btn-sm btn-primary">Back</a>
                        </div>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#lang-tab-0" role="tab" aria-controls="lang-tab-0" aria-selected="true">English</a>
                            </li>

                        </ul>

                        <div class="tab-content mt-2" id="myTabContent">
                            <div class="tab-pane fade show active" id="lang-tab-0" role="tabpanel">
                                <form action="" enctype="multipart/form-data" id="aboutForm">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title"> Title </label>
                                                <input type="text" name="title" class="form-control  " value="<?= $about['title'] ?>" id="title">
                                                <div class="invalid-feedback">
                                                </div>
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sub_title"> Sub Title </label>
                                                <input type="text" name="sub_title" class="form-control " value="<?= $about['sub_title'] ?>" id="sub-title">
                                                <div class="invalid-feedback">
                                                </div>
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea id="description" class="form-control  summernote" name="description" rows="5"><?= $about['description'] ?></textarea>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 source-parent">
                                            <div class="form-group">
                                                <label for="image"> Image </label>


                                                <div class="image-input ">
                                                    <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                                    <input type="file" placeholder="Choose image" class="image-preview" id="image" name="image" value="<?= $about['image'] ?>">
                                                    <img id="image_preview_container" class="preview-image" src="<?= base_url('public/uploads/about/' . $about['image']) ?>" alt="preview image">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <button id="aboutBtn" type="button" class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3">Save Change</button>
                                    <input type="hidden" value="<?= $about['image'] ?>" name="old_logo">
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
            $('#aboutBtn').click(function() {
                if ($('#title').val() != '' && $('#sub-title').val() != '' && $('#description').val() != '') {
                    var formdata = new FormData(document.getElementById('aboutForm'));
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url() ?>' + "/admin/about_us/add",
                        data: formdata,
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
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
                                    'text': "Validation Failed!"
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