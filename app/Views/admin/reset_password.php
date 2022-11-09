
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="https://script.bugfinder.net/prophecy/assets/uploads/logo/favicon.png">
    <title>Admin Reset Password | Prophecy</title>
    <link href="https://script.bugfinder.net/prophecy/assets/admin/css/style.min.css" rel="stylesheet">
        <style>
        .auth-wrapper .auth-box {
            min-width: 600px;
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

            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
                 style="background:url(https://script.bugfinder.net/prophecy/assets/uploads/logo/auth-bg.jpg) no-repeat center center;">
                <div class="auth-box row">
                    <div class="col-lg-6 col-md-5 modal-bg-img"
                         style="background-image: url(https://script.bugfinder.net/prophecy/assets/uploads/logo/theme.jpg);">
                    </div>

                    <div class="col-lg-6 col-md-7 bg-white">
                            <div class="p-3">
        <div class="text-center">
            <img src=" https://script.bugfinder.net/prophecy/assets/uploads/logo/favicon.png" alt="wrapkit">
        </div>
        <h2 class="mt-3 text-center">Reset Password</h2>

        <form method="POST" action="https://script.bugfinder.net/prophecy/admin/password/email" class=" mt-4">
            <input type="hidden" name="_token" value="IdpY7XBECfD9R5G8qsuyNxszzVLNuZAmmjUjl3tc">            <div class="row">

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="text-dark" for="pwd">Enter Email Address</label>
                        <input  type="email" class="form-control" name="email" value="" required autocomplete="off">
                                            </div>
                </div>

                <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-block btn-dark">Send to reset link</button>
                </div>

                <div class="col-lg-12 text-center mt-5">
                    Click to  <a href="https://script.bugfinder.net/prophecy/admin" class="text-danger">Sign In</a>
                </div>

            </div>
        </form>
    </div>
                    </div>
                </div>
            </div>
        </div>



    <script src="https://script.bugfinder.net/prophecy/assets/global/js/jquery.min.js"></script>
    <script src="https://script.bugfinder.net/prophecy/assets/global/js/popper.min.js"></script>
    <script src="https://script.bugfinder.net/prophecy/assets/global/js/bootstrap.min.js"></script>

    <script src="https://script.bugfinder.net/prophecy/assets/global/js/notiflix-aio-2.7.0.min.js"></script>
    
        <script>

    $(document).ready(function () {
        $('.notiflix-confirm').on('click', function () {

        })
    })
</script>
    <script>
        "use strict";
        $(".preloader ").fadeOut();
    </script>

</body>
</html>

