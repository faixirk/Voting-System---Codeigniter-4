<?php

include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<div class="content user-panel p-4">
    <div class="row">

        <div class="col-6">
            <h4> Votes</h4>
        </div>
        <div class="col-12 "><button type="button" id="addModelBtn" class="btn btn-primary w-100" data-toggle="modal" data-target=".bd-example-modal-lg">Add Vote</button></div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Vote</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form onsubmit="return false" class="p-0 m-0" id="vote-form" style="width: 100% !important; max-width: 100% !important" enctype="multipart/form-data">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="team1">Team A</label>
                                    <input type="text" class="form-control" placeholder="Team A" name="teamA" id="team1">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="team2">Team B</label>
                                    <input type="text" class="form-control" placeholder="Team B" name="teamB" id="team2">
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
                                    <select class="custom-select form-control mr-sm-2 subCateg" required name="subCategory" id="subCateg">
                                        <option selected>Choose...</option>
                                    </select>
                                </div>
                                          
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="banner1">Banner 1</label>
                                    <input type="file" class="form-control" placeholder="Team A Banner" name="banner1" id="banner1">

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="banner2">Banner 2</label>
                                    <input type="file" class="form-control" placeholder="Team B Banner" name="banner2" id="banner2">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="desc">Description</label>
                                    <textarea name="description" class="form-control" id="desc" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="type">Type</label>
                                    <select class="custom-select form-control mr-sm-2" name="voteType" id="type" required>
                                        <option default value="0">Choose...</option>
                                        <option value="public">Public</option>
                                        <option disabled value="2">Private</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer mr-3 my-2">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="addVote" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row p-4">

        <table id="votesTable" class="table table-hover table-responsive" style="width: 100%;">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Team A</th>
                    <th>Team B</th>
                    <th>Created At</th>
                    <th> Status</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $count = 1;
                foreach ($votes as $v) :  ?>
                    <tr>
                        <td scope="row"><?= $count++; ?></td>
                        <td><?= $v['team_a'] ?></td>
                        <td><?= $v['team_b'] ?></td>
                        <td><?= $v['description'] ?></td>
                        <td>
                            <select class="form-select voteAction" name="vote_status" id="<?= $v['vote_id'] ?>">
                                <option value="active" <?= ($v['status'] === 'active') ?  'selected' : '' ?>>Active</option>
                                <option value="closed" <?= ($v['status'] === 'closed') ?  'selected' : '' ?>>Closed</option>
                                <option value="result" <?= ($v['status'] === 'result') ?  'selected' : '' ?>>Result</option>
                            </select>
                        </td>
                        <td><button class="btn btn-danger" onclick="deleteVote(<?= $v['vote_id'] ?>)">Delete</button> </td>
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
    </div>
</div>
<?php include 'includes/footer.php'  ?>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
<script>
    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        // I use element.value instead value here, value parameter was always null
        return arg != element.value;
    }, "Value must not equal arg.");
</script>
<script>
    $('#votesTable').DataTable();

    function deleteVote(id) {
        if (id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this vote!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.post("deletevote", {
                            id
                        }, (result) => {
                            var obj = JSON.parse(result);

                            if (obj.status == true) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your vote has been deleted.',
                                    'success'
                                ).then(() => {
                                    window.location.reload();
                                })
                            } else if (obj.status == 500) {
                                Swal.fire(
                                    'Failed!',
                                    'Internal server error!',
                                    'error'
                                )
                            } else {
                                Swal.fire(
                                    'Failed!',
                                    obj.message,
                                    'error'
                                )
                            }
                        })
                        .fail(function(result) {
                            Swal.fire(
                                'Failed!',
                                'Failed to delete.',
                                'error'
                            )
                        })



                }
            })
        }
    };

    $('#addModelBtn').click(() => {
        $.get("<?= base_url() ?>/user/getcategory", (result) => {
            if (result) {
                $.each(JSON.parse(result), (key, value) => {
                    $('#categ').append('<option value=' + value.cat_id + '>' + value.cat_title + '</option>');
                })
            } else {
                $('#categ').append('<option value=' + 99 + '>' + "Empty List" + '</option>');
            }
        });
    })
    $('#categ').change(() => {
        var id = $('#categ').find('option:selected').val();
        $.get("<?= base_url() ?>/user/getcategory/" + id, (result) => {
            if (result) {
                $('.subCateg').empty();

                $.each(JSON.parse(result), (key, value) => {
                    $('#subCateg').append('<option value=' + value.sub_cat_id + '>' + value.sub_cat_title + '</option>');
                })
            } else {
                $('.subCateg').empty();

            }
        })
    })
    $('#vote-form').validate({
        rules: {
            teamA: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            teamB: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            category: {
                required: true,
                valueNotEquals: "0"
            },
            subCategory: {
                required: true,
                valueNotEquals: "0"
            },
            banner1: {
                extension: "png|jpeg|jpg",
            },
            banner2: {
                extension: "png|jpeg|jpg"
            },
            description: {
                required: true,
                minlength: 15,
                maxlength: 150
            },
            voteType: {
                required: true,
                valueNotEquals: "0"
            },
        },
        messages: {
            category: {
                valueNotEquals: "Please select an category!"
            },
            subCategory: {
                valueNotEquals: "Please select an sub category!"
            },
            voteType: {
                valueNotEquals: "Please select vote type!"
            },
            banner1: {
                extension: "Only PNG , JPEG , JPG, GIF File Allowed",
            },
            banner1: {
                extension: "Only PNG , JPEG , JPG, GIF File Allowed",
            }

        },
        submitHandler: (form, e) => {
            e.preventDefault();
            let myform = document.getElementById("vote-form");
            let fd = new FormData(myform);

            $.ajax({
                url: "<?= base_url() ?>" + '/user/addvote',
                method: 'POST',
                processData: false,
                contentType: false,
                data: fd,
                success: (data) => {
                    var result = JSON.parse(data);
                    if (result.status == true) {
                        $('form').trigger("reset");
                        swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: result.message,
                        }).then(() => {
                            window.location.reload();
                        })
                    } else {
                        swal.fire(
                            'warning',
                            'Failed',
                            result.message
                        )

                    }

                }
            });
        }
    })
</script>
<script>
    $('.voteAction').change(function() {
        var status = $(this).find(":selected").val();
        var id = $(this).attr('id');
        var data = {
            status,
            id
        }
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to update the status of  this vote!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post("updatestatus", data, (result) => {
                        var obj = JSON.parse(result);

                        if (obj.status == true) {
                            Swal.fire(
                                'Updated!',
                                'Your vote status has been updated.',
                                'success'
                            ).then(() => {
                                window.location.reload();
                            })
                        } else if (obj.status == 500) {
                            Swal.fire(
                                'Failed!',
                                'Internal server error!',
                                'error'
                            )
                        } else {
                            Swal.fire(
                                'Failed!',
                                obj.message,
                                'error'
                            )
                        }
                    })
                    .fail(function(result) {
                        Swal.fire(
                            'Failed!',
                            'Failed to update.',
                            'error'
                        )
                    })



            }
        })

    })
</script>