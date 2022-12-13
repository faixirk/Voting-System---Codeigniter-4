<?php
include 'includes/head.php';
if (session('type') == 'user') {
    include 'panel/user/includes/header.php';
} else {
    include 'includes/header.php';
}

?>



<style>
    .banner-section {
        padding: 174px 0 100px 0;
        background-image: url(https://script.bugfinder.net/prophecy/assets/uploads/logo/banner.jpg);
        background-position: center;
        background-size: cover;
    }
</style>

<section class="login-section">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-lg-6 p-0">
                <div class="text-box h-100">
                    <div class="overlay h-100">
                        <div class="text">
                            <h2>Account Recover</h2>
                            <a href="<?= base_url('/') ?>">back to home</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-wrapper d-flex align-items-center h-100">
                    <form action="" id="pwdForm" method="post">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                        <div class="row g-4">
                            <div class="text-center">
                            </div>
                            <div class="col-12">
                                <h4>Recover password</h4>
                            </div>
                            <div class="input-box col-12">
                                <input id="pwdEmail" type="text" name="email" value="" class="form-control" placeholder="Email address" />
                            </div>
                        </div>
                        <button id="loadingBtn1" class="btn-custom w-100" type="button" disabled>
                            Verifying...
                        </button>
                        <button id="pwdBtn" type="button" class="btn-custom w-100 mt-4">Send Password Reset Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>




<?php include 'includes/footer.php'; ?>
<script>
    $(document).ready(function() {
        $('#pwdBtn').show();
        $('#loadingBtn1').hide();
        $('#pwdBtn').click(function() {
            $('#pwdBtn').hide();
            $('#loadingBtn1').show();
            if ($('#pwdEmail').val() != "") {
                var email = $('#pwdEmail').val();
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>' + "/user/forgot/password",
                    data: $('#pwdForm').serialize(),
                    success: function(data) {
                        if (data == 0) {
                            $('#pwdBtn').show();
                            $('#loadingBtn1').hide();
                            swal.fire({
                                'icon': 'success',
                                'text': "A link has been sent to your Email. Please change your password before the link expires.",

                            });
                        } else if (data == 1) {
                            $('#pwdBtn').show();
                            $('#loadingBtn1').hide();
                            swal.fire({
                                'icon': 'error',
                                'text': "This email does not exists!",

                            });
                        } else if (data == 2) {
                            $('#pwdBtn').show();
                            $('#loadingBtn1').hide();
                            swal.fire({
                                'icon': 'error',
                                'text': "Unable to update. Contact Admin!",

                            });
                        } else if (data == 3) {
                            $('#pwdBtn').show();
                            $('#loadingBtn1').hide();
                            swal.fire({
                                'icon': 'error',
                                'text': "The email could not be sent!",

                            });
                        }

                    },

                    error: function(data) {
                        $('#pwdBtn').show();
                        $('#loadingBtn1').hide();
                        swal.fire({
                            'icon': 'error',
                            'text': "Unexpected error. Please contact admin!",

                        });
                    }

                });
            } else {
                $('#pwdBtn').show();
                $('#loadingBtn1').hide();
                swal.fire({
                    'icon': 'info',
                    'text': "The email field cannot be blank!",

                });
            }
        });

    });
</script>