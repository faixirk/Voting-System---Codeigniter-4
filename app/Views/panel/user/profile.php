<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>


<div class="content user-panel">
    <div class="d-flex justify-content-between">
        <div>
            <h4>Profile Settings</h4>
        </div>
        <button class="btn-custom light toggle-user-panel-sidebar d-lg-none" onclick="toggleSidebar('userPanelSideBar')">
            <i class="fal fa-sliders-h"></i>
        </button>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="card secbg br-4">
                <div class="card-body br-4">
                    <form action="" enctype="multipart/form-data" id="imageForm">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                        <div class="form-group">
                            <div id="profileImg" class="image-input ">
                                <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                <input type="file" name="profileimage" placeholder="Choose image" id="image">
                                <img id="image_preview_container" src="<?= base_url('public/uploads/profile/' . session('pic')) ?>" class="preview-image" alt="preview image">
                            </div>

                        </div>
                        <h3></h3>
                        <p><?= $user['created_at'] ?></p>
                        <div class="submit-btn-wrapper text-center text-md-left">
                            <button id="profileUpdateLoading" class="btn-custom w-100" type="button" disabled>
                                <span class="btn-custom w-100" role="status" aria-hidden="true"></span>
                                Updating...
                            </button>
                            <button id="updateProfile" type="submit" class="btn-custom w-100"><span>Image Update</span></button></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="card secbg form-block br-4">
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  active" data-bs-toggle="tab" href="#home">Profile Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-bs-toggle="tab" href="#menu1">Password Setting</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link " data-bs-toggle="tab" href="#identity">Identity Verification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-bs-toggle="tab" href="#addressVerification">Address
                                Verification</a>
                        </li> -->

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content ">
                        <div id="home" class="container mt-4 tab-pane   active">

                            <form action="" id="profileForm">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <div class="form-group input-box mb-3">
                                            <input class="form-control" type="text" id="fn" name="firstname" value="<?= $user['first_name']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <div class="form-group input-box mb-3">
                                            <input class="form-control" type="text" id="ln" name="lastname" value="<?= $user['last_name']; ?>">
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-6">
                                        <label>Username</label>
                                        <div class="form-group input-box mb-3">
                                            <input class="form-control" type="text" name="username" value="adnan">
                                        </div>
                                    </div> -->


                                    <div class="col-md-6">
                                        <label>Email Address</label>
                                        <div class="form-group input-box mb-3">
                                            <input class="form-control" type="email" value="<?= session('useremail') ?>" disabled>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-6">
                                        <label>Phone Number</label>
                                        <div class="form-group input-box mb-3">
                                            <input class="form-control" type="text" readonly value="222134124">

                                        </div>
                                    </div> -->

                                    <!-- <div class="col-md-6">
                                        <label>Preferred language</label>
                                        <div class="form-group input-box mb-3">
                                            <select name="language_id" id="language_id" class="form-select">
                                                <option value="" disabled>Select Language</option>
                                                <option value="1">English</option>
                                                <option value="18">Spanish</option>
                                            </select>

                                        </div>
                                    </div> -->
                                </div>

                                <!-- <label>Address</label>
                                <div class="form-group input-box mb-3">
                                    <textarea class="form-control" name="address" rows="5"></textarea>

                                </div> -->

                                <div class="submit-btn-wrapper text-center text-md-left">
                                    <button id="loadingBtn" class="btn-custom w-100" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Verifying...
                                    </button>
                                    <button id="updateBtn" class="btn-custom w-100">Update User</button>

                                </div>
                            </form>
                        </div>


                        <div id="menu1" class="container mt-4 tab-pane ">

                            <form method="post" action="" id="passwordForm">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                <label>Current Password</label>
                                <div class="form-group input-box mb-3">
                                    <input id="pass" type="password" class="form-control" name="current_password" autocomplete="off">
                                </div>
                                <label>New Password</label>
                                <div class="form-group input-box mb-3">
                                    <input id="new_pass" type="password" class="form-control" name="password" autocomplete="off">
                                </div>

                                <label>Confirm Password</label>
                                <div class="form-group input-box mb-3">
                                    <input id="confirm_pass" type="password" name="password_confirmation" autocomplete="off" class="form-control">
                                </div>

                                <div class="submit-btn-wrapper text-center">
                                    <button id="loadingBtn1" class="btn-custom w-100" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Verifying...
                                    </button>

                                    <button id="updateBtn1" class="btn-custom w-100">Update Password</button>
                                </div>
                            </form>
                        </div>


                        <!-- <div id="identity" class="container mt-4 tab-pane ">
                            <form method="post" action="https://script.bugfinder.net/prophecy/user/verificationSubmit"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="y8JmcdjhTs99oJhSXpEYs3s75PrJrj04OvbRfdnE">
                                <div class="col-md-12">
                                    <label class="form-label" for="identity_type">Identity Type</label>
                                    <div class="form-group input-box mb-3">
                                        <select name="identity_type" id="identity_type" class="form-select">
                                            <option value="" selected disabled>Select Type</option>
                                            <option value="driving-license">Driving License</option>
                                            <option value="passport">Passport</option>
                                            <option value="national-id">National ID</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div> -->

                        <!-- <div id="addressVerification" class="container mt-4 tab-pane ">
                            <form method="post" action="https://script.bugfinder.net/prophecy/user/addressVerification"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="y8JmcdjhTs99oJhSXpEYs3s75PrJrj04OvbRfdnE">
                                <div class="col-md-12">
                                    <label class="form-label">Address Proof <span class="text-danger">*</span>
                                    </label><br>
                                    <div class="form-group input-box">
                                        <div class="fileinput fileinput-new " data-provides="fileinput">
                                            <div class="fileinput-new thumbnail " data-trigger="fileinput">
                                                <img class="wh-200-150"
                                                    src="https://script.bugfinder.net/prophecy/assets/admin/images/default.png"
                                                    alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail wh-200-150 "></div>

                                            <div class="img-input-div">
                                                <span class="btn btn-success btn-file">
                                                    <span class="fileinput-new "> Select Image </span>
                                                    <span class="fileinput-exists"> Change</span>
                                                    <input type="file" name="addressProof" value="" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-danger fileinput-exists"
                                                    data-dismiss="fileinput"> Remove</a>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="submit-btn-wrapper text-center text-md-left">
                                    <button type="submit" class="btn-custom w-100">Submit</button>
                                </div>
                            </form>

                        </div> -->

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>

<?= include 'includes/footer.php'  ?>

<script>
    $(document).ready(function() {

        $('#updateProfile').show();
        $('#profileUpdateLoading').hide();
        $("#image").on("change", function(e) {
            e.preventDefault();
            if (this.files[0].size > 2000000) {
                swal.fire("Please upload file less than 2MB. Thanks!!");
                $(this).val('');
            } else {
                // $('#updateProfile').click((e)=>{
                var ext = $(this).val().split('.').pop().toLowerCase();
                if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                    swal.fire("Invalid Image Format! Image Format Must Be JPG, JPEG or PNG.");
                    $(this).val('');
                } else {
                    $('#updateProfile').show();
                    $('#updateProfile').click((e) => {
                        e.preventDefault();
                        if ($('#image').val() == '') {
                            swal.fire("Please select an image to upload!");
                        } else {
                            var formdata = new FormData(document.getElementById('imageForm'));
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: '<?= base_url() ?>' + "/user/photo/update",
                                data: formdata,
                                processData: false,
                                contentType: false,
                                cache: false,
                                dataType: "json",
                                beforeSend: function() {
                                    $('#updateProfile').hide();
                                    $('#profileUpdateLoading').show();

                                },
                                success: function(response) {
                                    if (response.success) {
                                        $('#profileUpdateLoading').hide();
                                        $('#updateProfile').show();
                                        $('#image').val('');
                                        swal.fire({
                                            'icon': 'success',
                                            'text': response.message,
                                        });
                                        $('#logo').attr('src', '<?= base_url() ?>' + "/public/uploads/profile/" + response.path);
                                        $('#image_preview_container').attr('src', '<?= base_url() ?>' + "/public/uploads/profile/" + response.path);

                                        // loadLogo();
                                    } else if (response == 2) {
                                        $('#updateProfile').show();
                                        $('#profileUpdateLoading').hide();
                                        $('#image').val('');
                                        swal.fire("Invalid Image Format! Image Format Must Be JPG, JPEG or PNG.");

                                    } else if (response == 3) {
                                        $('#updateProfile').show();
                                        $('#profileUpdateLoading').hide();
                                        $('#image').val('');
                                        swal.fire("Data could not be stored. Contact admin!");

                                    } else if (response == 4) {
                                        $('#updateProfile').show();
                                        $('#profileUpdateLoading').hide();
                                        $('#image').val('');
                                        swal.fire("File is not valid.");

                                    } else {
                                        $('#updateProfile').show();
                                        $('#profileUpdateLoading').hide();
                                        swal.fire('Invalid error occur. Try again');
                                        $('#image').val('');


                                    }
                                },
                            });
                        }
                    });

                }

                // })
            }
        });
    });
</script>
<script>
    $(document).ready(function() {

        $('#loadingBtn').hide();

        $("#updateBtn").click((e) => {
            e.preventDefault();
            if ($('#fn').val() != "" || $('#ln').val() != '') {
                $('#fn').addClass('is-valid').fadeIn();
                $.ajax({
                    type: "POST",
                    url: '<?= base_url() ?>' + "/user/profile/update",
                    dataType: 'JSON',
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
                        } else if (response == 2) {
                            swal.fire('Validation failed!');
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
<script>
    $(document).ready(function() {
        $('#loadingBtn1').hide();
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
        $('#updateBtn1').click((e) => {
            e.preventDefault();
            if ($("#pass").val() != "" && $("#new_pass").val() != "" && $("#confirm_pass").val() != "") {
                $("#pass").addClass('is-valid').fadeIn();
                $("#new_pass").addClass('is-valid').fadeIn();
                $("#confirm_pass").addClass('is-valid').fadeIn();
                if ($("#new_pass").val() == $("#confirm_pass").val()) {
                    $.ajax({
                        type: "POST",
                        url: '<?= base_url() ?>' + "/user/password/update",
                        data: $('#passwordForm').serialize(),
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