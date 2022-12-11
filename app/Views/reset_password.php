<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/bootstrap.min.css') ?>" />

</head>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-6" style="height:520px;">
            <h1>Reset Your Password</h1>


            <form action="" id="resetForm">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">


                <div class='form-group'>
                    <label>Enter new password:</label>
                    <input id="pwd" type="password" name="pwd" class='form-control'>
                    <span class="text-danger"></span>
                </div>
                <div class='form-group '>
                    <label>Confirm new password:</label>
                    <input id="cpwd" type="password" name="cpwd" class='form-control'>
                    <span class="text-danger"></span>
                </div>
                <div class='form-group'>
                    <input id="resetPwdBtn" type="button" value='Update' class='btn btn-primary'>
                </div>
            </form>



        </div>
    </div>
</div>
<script src="<?= base_url('public/assets/js/jquery-3.6.0.min.js') ?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script></script>
<script>
    $(document).ready(function() {
        $('#resetPwdBtn').click(function() {
            if ($('#pwd').val() == "") {
                swal.fire({
                    'icon': 'error',
                    'text': "Password Field is empty",

                });
            } else if ($('#cpwd').val() == "") {
                swal.fire({
                    'icon': 'error',
                    'text': "Confirm Password Field is Empty",

                });
            } else if ($('#pwd').val() != $('#cpwd').val()) {
                swal.fire({
                    'icon': 'error',
                    'text': "Passwords don't match",

                });
            } else if ($('#pwd').val() == $('#cpwd').val()) {
                $.ajax({
                    type: 'POST',
                    data: $('#resetForm').serialize(),
                    success: function(data) {
                        if (data == 0) {
                            swal.fire({
                                'icon': 'success',
                                'text': "Password Updated Successfully!",
                                
                            }).then(() => {
                        window.location.href="<?= base_url()?>" + '/';
                    })
                        } else if (data == 1) {
                            swal.fire({
                                'icon': 'error',
                                'text': "Password could not be updated",

                            });
                        }
                        else if (data == 2) {
                            swal.fire({
                                'icon': 'error',
                                'text': "The link has expired!",

                            });

                        }
                    },
                    error: function(data) {
                        swal.fire({
                            'icon': 'info',
                            'text': "Unexpected error. Please contact admin!",

                        });
                    }
                });
            }
        });
    });
</script>

</html>