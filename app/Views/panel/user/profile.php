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
                    <form method="post" action="" enctype="multipart/form-data" id="imageForm">
                        <div class="form-group">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                            <div class="image-input ">
                                <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                <input type="file" name="image" placeholder="Choose image" id="image">
                                <img id="image_preview_container" class="preview-image" src="" alt="preview image">
                            </div>

                        </div>
                        <h3></h3>
                        <p>Joined At 04 Nov, 2022 11:15 AM</p>
                        <div class="submit-btn-wrapper text-center text-md-left">
                            <!-- <button type="submit" class="btn-custom w-100">
                                <span>Image Update</span></button> -->
                            <button id="profileUpdateLoading" class="btn-custom w-100" type="button" disabled>
                                <span class="btn-custom w-100" role="status" aria-hidden="true"></span>
                                Updating...
                            </button>
                            <button id="updateProfile" type="submit" class="btn-custom w-100"><span>Image Update</span></button></button>
                        </div>
                </div>
                </form>
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
                                        <input class="form-control" type="text" id="fn" name="firstname" value="<?= session('f_name'); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Last Name</label>
                                    <div class="form-group input-box mb-3">
                                        <input class="form-control" type="text" id="ln" name="lastname" value=<?= session('l_name') ?>>
                                    </div>
                                </div>

                                <!-- <div class="col-md-6">
                                        <label>Username</label>
                                        <div class="form-group input-box mb-3">
                                            <input class="form-control" type="text" name="username" value="">
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
                                            <input class="form-control" type="text" readonly value="03235893425">

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

                            <label>Address</label>
                            <div class="form-group input-box mb-3">
                                <textarea class="form-control" name="address" rows="5"></textarea>

                            </div>

                            <div class="submit-btn-wrapper text-center text-md-left">
                                <!-- <button type="submit" class="btn-custom w-100">
                                        <span>Update User</span></button> -->
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
                                <!-- <button type="submit" class="btn-custom w-100"> -->
                                <!-- <span>Update Password</span></button> -->
                                <button id="loadingBtn1" class="btn-custom w-100" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Verifying...
                                </button>

                                <button id="updateBtn1" class="btn-custom w-100">Update Password</button>
                            </div>
                        </form>
                    </div>






                </div>
            </div>
        </div>

    </div>
    </div>

    
</div>
</div>

</div>

<?= include 'includes/footer.php'  ?>
<script>
    $('#updateProfile').show();
    $('#profileUpdateLoading').hide();
    $("#image").on("change", function() {
        if (this.files[0].size > 2000000) {
            swal.fire("Please upload file less than 2MB. Thanks!!");
            $(this).val('');
        } else {
            alert('dasd');
            // $('#updateProfile').click((e)=>{
            var ext = $(this).val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                swal.fire("Invalid Image Format! Image Format Must Be JPG, JPEG or PNG.");
                $(this).val('');
            } else {
                $('#updateProfile').show();
                $('#updateProfile').click((e) => {
                    alert(asdas);
                    // var formdata = new FormData(document.getElementById('imageForm'));
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: '<?= base_url() ?>' + "/user/photo/update",
                        data: $('#imageForm').serialize(),
                        contentType: false,
                        // neither object neither string  by default its true;
                        processData: false,
                        beforeSend: function() {
                            $('#updateProfile').hide();
                            $('#profileUpdateLoading').show();

                        },
                        success: function(response) {
                            if (response == 1) {
                                $('#profileUpdateLoading').hide();
                                $('#image').val('');
                                toastr.success("Successfully Updated");
                                loadLogo();
                            } else if (response == 2) {
                                $('#updateProfile').show();
                                $('#profileUpdateLoading').hide();
                                $('#image').val('');
                                toastr.error("Invalid Image Format! Image Format Must Be JPG, JPEG or PNG.");

                            } else {
                                $('#updateProfile').show();
                                $('#profileUpdateLoading').hide();
                                toastr.error('Invalid error occur. Try again');
                                $('#image').val('');


                            }
                        },
                    });
                });

            }

            // })
        }
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