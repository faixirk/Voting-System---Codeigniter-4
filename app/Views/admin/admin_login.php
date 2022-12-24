<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="#">
    <title>Admin Login | Daily Voting</title>
    <link href="<?= base_url('public/assets/css/style.min.css') ?>" rel="stylesheet">
    <style>
        .logoWidth-64 img {
            width: 64px !important;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url(<?= base_url('public/uploads/logo/auth-bg.jpg') ?>) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-6 col-md-5 modal-bg-img" style="background-image: url(<?= base_url('public/uploads/logo/').$breadcrumb['login_image'] ?>);">
                </div>

                <div class="col-lg-6 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center logoWidth-64">
                            <img src="<?= base_url('public/uploads/logo/profile.png') ?>" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Admin Login</h2>

                        <form method="POST" action="<?= base_url('/admin/login') ?>" aria-label="Login">
                            <?= csrf_field(); ?>

                            <?php if (session()->get('successfull')) :  ?>
                                <div class="alert alert-success"><?= session()->get('successfull'); ?></div>
                            <?php endif;
                            if (session()->get('fail')) :  ?>
                                <div class="alert alert-danger"><?= session()->get('fail'); ?></div>
                            <?php endif ?>
                            <!-- <input type="hidden" name="_token" value="ycLlHW7a8pFg4OBJ5hULtengNv95iXr0URiYWzeJ"> -->
                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="email">Email Or Username</label>
                                        <input id="username" type="email" class="form-control
                                                                                            " name="email" autocomplete="off" autofocus>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Password</label>
                                        <input id="password" type="password" class="form-control " name="password" autocomplete="current-password">

                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Sign In</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="<?= base_url('public/assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/bootstrap.min.js') ?>"></script>

    <script src="<?= base_url('public/assets/js/notiflix-aio-2.7.0.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('.notiflix-confirm').on('click', function() {

            })
        })
    </script>
    <script>
        "use strict";
        $(".preloader ").fadeOut();
    </script>

</body>

</html>