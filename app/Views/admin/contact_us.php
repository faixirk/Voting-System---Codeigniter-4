<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';

?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Contact Us</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item text-muted" aria-current="page">Contact Us</li>
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
                            <h4 class="card-title">Contact Us</h4>
                            <a href="<?= base_url('admin/about_us') ?>" class="btn btn-sm btn-primary">Back</a>
                        </div>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#lang-tab-0" role="tab" aria-controls="lang-tab-0" aria-selected="true">English</a>
                            </li>
                            
                        </ul>

                        <div class="tab-content mt-2" id="myTabContent">
                            <div class="tab-pane fade show active" id="lang-tab-0" role="tabpanel">
                                <form  id="contactForm" action="" enctype="multipart/form-data">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                  
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="heading"> Heading </label>
                                                <input id="heading" type="text" name="heading" class="form-control  " value="<?= $contact['heading']?>">
                                                <div class="invalid-feedback">
                                                </div>
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sub_heading"> Sub Heading </label>
                                                <input type="text" id="sub_heading" name="sub_heading" class="form-control  " value="<?= $contact['sub_heading']?>">
                                                <div class="invalid-feedback">
                                                </div>
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="short_description">Short Description</label>
                                                <textarea class="form-control  summernote" id="short_description" name="short_description" rows="5"> <?= $contact['short_description']?></textarea>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address"> Address </label>
                                                <input type="text" id="address" name="address" class="form-control " value="<?= $contact['address']?>">
                                                <div class="invalid-feedback">
                                                </div>
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="house"> House </label>
                                                <input type="text" id="house" name="house" class="form-control  " value="<?= $contact['house']?>">
                                                <div class="invalid-feedback">
                                                </div>
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email"> Email </label>
                                                <input type="text" id="email" name="email" class="form-control  " value="<?= $contact['email']?>">
                                                <div class="invalid-feedback">
                                                </div>
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="phone"> Phone </label>
                                                <input type="text" id="phone" name="phone" class="form-control  " value="<?= $contact['phone']?>">
                                                <div class="invalid-feedback">
                                                </div>
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="footer_short_details">Footer Short Details</label>
                                                <textarea class="form-control  summernote " id="footer_short_details" name="footer_short_details" rows="5"><?= $contact['footer_short_details']?></textarea>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="contactBtn" type="button" class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3">Save Change</button>
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
            $('#contactBtn').click(function() {
                if ($('#heading').val() != '' && $('#sub_heading').val() != '' && $('#short_description').val() != '' && $('#house').val() != '' && $('#phone').val() != '' && $('#email').val() != '' && $('#address').val() != '' && $('#footer_short_details').val() != '') {
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url() ?>' + "/admin/contact_us/add",
                        data: $('#contactForm').serialize(),
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