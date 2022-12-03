<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>



<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> User List</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item text-muted" aria-current="page"> User List</li>
                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>

    <style>
        .fa-ellipsis-v:before {
            content: "\f142";
        }
    </style>
    <!-- <div class="page-header card card-primary m-0 m-md-4 my-4 m-md-0 p-5 shadow">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="search" value="" class="form-control" placeholder="Type Here">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="date" class="form-control" name="date_time" id="datepicker" />
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="status" class="form-control">
                                    <option value="">All User</option>
                                    <option value="1">Active User</option>
                                    <option value="0">Inactive User</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="btn w-100 w-md-auto btn-primary"><i class="fas fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">

            <div class="dropdown mb-2 text-right">
                <button class="btn btn-sm  btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><i class="fas fa-bars pr-2"></i> Action</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" type="button" data-toggle="modal" data-target="#all_active">Active</button>
                    <button class="dropdown-item" type="button" data-toggle="modal" data-target="#all_inactive">Inactive</button>
                </div>
            </div>

            <div class="table-responsive">
                <table id="users" class="categories-show-table table table-hover table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">
                                <input type="checkbox" class="form-check-input check-all tic-check" name="check-all" id="check-all">
                                <label for="check-all"></label>
                            </th>
                            <th scope="col">No.</th>
                            <th scope="col">User</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($users as $u) :
                        ?>
                            <tr>

                                <td class="text-center">
                                    <input type="checkbox" id="chk-185" class="form-check-input row-tic tic-check" name="check" value="185" data-id="185">
                                    <label for="chk-185"></label>
                                </td>
                                <td data-label="No."><?= $u['user_id'] ?></td>
                                <td data-label="User">

                                    <div class="d-lg-flex d-block align-items-center ">
                                        <div class="mr-3"><img src="<?= base_url('public/uploads/profile/' . $u['pic']) ?>" alt="user" class="rounded-circle" width="45" height="45">
                                        </div>
                                        <div class="">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium"><?= $u['first_name'] ?></h5>
                                            <span class="text-muted font-14"><?= $u['user_email'] ?></span>
                                        </div>
                                    </div>
                                </td>

                                <td data-label="Status" class="text-lg-center text-right">
                                    <span class="badge badge-light">
                                        <?php if ($u['status'] == 'Active') { ?>
                                            <i class="fa fa-circle text-success success font-12"></i> Active</span>
                                <?php } else { ?>
                                    <i class="fa fa-circle text-danger danger font-12"></i> Inactive</span>
                                <?php } ?>

                                </td>
                                <td data-label="Action">
                                    <div class="dropdown show ">
                                        <a class="dropdown-toggle p-3" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <!-- <a class="dropdown-item" href="https://script.bugfinder.net/prophecy/admin/user/edit/185">
                                            <i class="fa fa-edit text-warning pr-2" aria-hidden="true"></i> Edit </a> -->
                                            <!-- <a class="dropdown-item" href="https://script.bugfinder.net/prophecy/admin/user/send-email/185">
                                            <i class="fa fa-envelope text-success pr-2" aria-hidden="true"></i> Send Email </a> -->
                                            <button value="<?= $u['user_id']; ?>" data-toggle="modal" data-target="#login_as_user" class="dropdown-item user-login" data-id="185">
                                                <i class="fa fa-trash text-danger pr-2" aria-hidden="true"></i> Delete User </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>











                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <!-- <div class="modal fade" id="all_active" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h5 class="modal-title">Active User Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <p>Are you really want to active the User's</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal"><span>No</span></button>
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="zCIPBVp0XycU7LwUsNuesez68nr1s9jwp1REq3Jd"> <a href="" class="btn btn-primary active-yes"><span>Yes</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="all_inactive" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h5 class="modal-title">DeActive User Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <p>Are you really want to Inactive the User's</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal"><span>No</span></button>
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="zCIPBVp0XycU7LwUsNuesez68nr1s9jwp1REq3Jd"> <a href="" class="btn btn-primary inactive-yes"><span>Yes</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <div class="modal fade" id="login_as_user" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h5 class="modal-title">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal"><span>No</span></button>
                    <form action="" method="post" class="update-action">
                        <input type="hidden" name="_token" value="zCIPBVp0XycU7LwUsNuesez68nr1s9jwp1REq3Jd"> <input type="hidden" class="userId" name="userId" value="" />
                        <button id="confirm" type="submit" class="btn btn-primary"><span>Yes</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    include 'includes/footer.php';
    ?>
    <script>
        $(document).ready(function() {

            $('.user-login').click(function(event) {
                var id = $(this).val();
                $('#confirm').click(function() {
                    $.ajax({
                        type: "GET",
                        url: "<?= base_url() ?>" + '/admin/user/delete/' + id,
                        success: function(response) {
                            if (response == 1) {
                                window.location.reload();
                            } else {
                                swal.fire({
                                    'icon': 'info',
                                    'text': "Oops! There was an error. Contact Admin!",
                                });
                            }
                        },
                        error: function(data) {
                            swal.fire({
                                'icon': 'error',
                                'text': "Unexpected Error! Contact admin.",
                            });
                        }
                    });
                })
            });
        });
    </script>