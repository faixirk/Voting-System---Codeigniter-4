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
                        <h4 class="card-title mb-5"><i class="icon-key"></i> Password Setting</h4>
                        <form id="form1" class="form-body file-upload">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">


                            <div class="form-body">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-lg-2">Current Password</label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="pass" name="current_password" placeholder="Current Password">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-lg-2">New Password</label>
                                        <div class="col-lg-6">
                                            <input id="new_pass" type="password" name="password" class="form-control" placeholder="New Password">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-lg-2">Confirm Password</label>
                                        <div class="col-lg-6">
                                            <input id="confirm_pass" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-6 offset-md-2">
                                            <!-- <button id="pass" type="submit" class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3">Change Password</button> -->
                                            <button id="loadingBtn" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0" type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                Verifying...
                                            </button>


                                            <button id="updateBtn" class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3">Change Password</button>
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
            $('#pass').blur(function(e) {
                if ($("#pass").val() == "") {
                    $("#pass").addClass('is-invalid').fadeIn();
                } else if ($("#pass").val() != "") {
                    $("#pass").addClass('is-valid').fadeIn();

                }
            });
            $('#new_pass').keyup(function(e) {
                if ($("#new_pass").val() == "") {
                    $("#new_pass").addClass('is-invalid').fadeIn();
                } else if ($("#new_pass").val() != "") {
                    $("#new_pass").addClass('is-valid').fadeIn();
                }
            });
            $('#confirm_pass').blur(function(e) {
                if ($("#confirm_pass").val() == "") {
                    $("#confirm_pass").addClass('is-invalid').fadeIn();
                } else if ($("#confirm_pass").val() != "") {
                    $("#confirm_pass").addClass('is-valid').fadeIn();
                }

            });
            $('#updateBtn').click((e) => {
                e.preventDefault();
                if ($("#pass").val() != "" && $("#new_pass").val() != "" && $("#confirm_pass").val() != "") {
                    $("#pass").addClass('is-valid').fadeIn();
                    $("#new_pass").addClass('is-valid').fadeIn();
                    $("#confirm_pass").addClass('is-valid').fadeIn();
                    if ($("#new_pass").val() == $("#confirm_pass").val()) {
                        $.ajax({
                            type: "POST",
                            url: '<?= base_url() ?>' + "/admin/password/update",
                            data: $('#form1').serialize(),
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
                                    window.location.reload();
                                } else if (response == 2) {
                                    swal.fire({
                                        'icon': 'error',
                                        'text': "Old Password is Incorrent"
                                    });
                                    $('#loadingBtn').hide();
                                    $('#updateBtn').show();
                                } else {
                                    $('#loadingBtn').hide();
                                    $('#updateBtn').show();
                                    toastr.error('Invalid error occur. Try again');
                                }
                            },
                            error: (error) => {
                                console.log(JSON.stringify(error));
                            },
                        });
                    } else {
                        toastr.error("New and confirm password not matched.");

                    }


                } else if ($("#pass").val() == "" || $("#new_pass").val() == "" || $("#confirm_pass").val() == "") {
                    swal.fire({
                        'icon': 'error',
                        'text': "All fields are required"
                    });
                    $('#loadingBtn').hide();
                    $('#updateBtn').show();
                }


            });

        });
    </script>