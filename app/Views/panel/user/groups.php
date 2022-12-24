<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<div class="content user-panel chats">
    <div>
        <h4> Rooms</h4>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-2">
            <div class="dashboard__card">
                <div class="dashboard__card-content">
                    <h2 class="price"><a href="<?= base_url('user/groups/private') ?>" style="color:white">Private Rooms</a></h2>
                    <p class="info">User: <small><?= session('f_name') ?></small><br><small><?= $user['created_at']; ?></small></p>
                </div>
                <div class="dashboard__card-icon">
                    <a href="<?= base_url('user/groups/private') ?>">
                        <img src="<?= base_url('public/assets/images/icons/private.png') ?>" alt="...">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-2">
            <div class="dashboard__card">
                <div class="dashboard__card-content">
                    <h2 class="price"><a href="<?= base_url('user/groups/requests') ?>" style="color:white">Requests </a></h2>
                    <p class="info">Admin: <small><?= session('f_name') ?></small><br><small><?= $user['created_at']; ?></small></p>
                </div>
                <div class="dashboard__card-icon">
                    <a href="<?= base_url('user/groups/requests') ?>">
                        <img src="<?= base_url('public/assets/images/icons/request.png') ?>" alt="..."> </button>
                    </a>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-2">
            <div class="dashboard__card">
                <div class="dashboard__card-content">
                    <h2 class="price">Create Room</h2>
                </div>
                <div class="dashboard__card-icon" data-toggle="modal" data-target=".bd-example-modal-lg">

                    <button id="addModelBtn" type="submit"><img src="<?= base_url('public/assets/images/icons/plus.png') ?>" alt="..."></button>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Group</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="p-0 m-0" id="group-form" style="width: 100% !important; max-width: 100% !important" enctype="multipart/form-data">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                <div class="row mb-3">

                                    <div class="form-group col-md-12">
                                        <label for="team1">Group Name</label>
                                        <input type="text" class="form-control" name="group">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-6">
                                        <label for="categ">Category</label>
                                        <select class="custom-select form-control mr-sm-2" name="category" required id="categ">
                                            <option selected>Choose...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="subCateg">Sub Category</label>
                                        <select class="custom-select form-control mr-sm-2" required name="subCategory" id="subCateg">
                                            <option selected>Choose...</option>
                                        </select>
                                    </div>
                                </div>

                                

                                <div class="modal-footer mr-3 my-2">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" id="addGroup" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>




    </div>

</div>

<?= include 'includes/footer.php'  ?>

<script>
    renderList = (id, obj) => {
        if (obj) {
            $.each(JSON.parse(obj), (key, value) => {
                $('#' + id).append('<option value=' + value.cat_id + '>' + value.cat_title + '</option>');
            })
        } else {
            $('#' + id).append('<option disabled value=' + 0 + '>' + "Empty List" + '</option>');
        }

    }
    $('#addModelBtn').click(() => {
        $.get("<?= base_url() ?>/user/getcategory", (result) => {
            renderList("categ", result);
        });
    })
    $('#categ').change(() => {
        var id = $('#categ').find('option:selected').val();
        $.get("<?= base_url() ?>/user/getcategory/" + id, (result) => {
            if (result) {
                $.each(JSON.parse(result), (key, value) => {
                    $('#subCateg').append('<option value=' + value.sub_cat_id + '>' + value.sub_cat_title + '</option>');
                })
            } else {
                $('#subCateg').append('<option value=' + 99 + '>' + "Empty List" + '</option>');
            }
        })
    })
    $(document).ready(function() {

        $('#group-form').submit((e) => {
            e.preventDefault();

            // set some basic validation
            $.ajax({
                type: "POST",
                url: '<?= base_url() ?>' + "/user/addgroup",
                dataType: "JSON",
                data: $('#group-form').serialize(),
                success: function(response) {
                    if (response == 1) {
                        swal.fire({
                            'icon': 'success',
                            'text': "Successfully Added!",
                        }).then(() => {
                            window.location.reload();
                        })

                    } else if (response == 2) {
                        swal.fire({
                            'icon': 'danger',
                            'text': "Error! Please conact admin.",
                        });
                    } else {
                        swal.fire({
                            'icon': 'danger',
                            'text': "Please Enter Correct Data!",
                        });
                    }
                },
                error: function(err) {
                    $("#msg_err").text(err.responseJSON.messages.message);
                    alert('error');
                }
            })
        })
    });
</script>