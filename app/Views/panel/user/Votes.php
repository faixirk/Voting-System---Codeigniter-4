<?php

print_r($myvotes);
die;
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<div class="content user-panel p-4">
    <div class="row">

        <div class="col-6">
            <h4> Votes</h4>
        </div>
        <div class="col-6"><button type="button" id="addModelBtn" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Vote</button></div>

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
                                    <select class="custom-select form-control mr-sm-2" required name="subCategory" id="subCateg">
                                        <option selected>Choose...</option>
                                    </select>
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row"></td>
                    <td>Adnan a</td>
                    <td>Adnan</td>
                    <td>10-21-2022</td>
                    <td><span class="badge badge-primary">Active</span> </td>
                </tr>
                <tr>
                    <td scope="row"></td>
                    <td>Adnan a</td>
                    <td>Adnan</td>
                    <td>10-21-2022</td>
                    <td><span class="badge badge-primary">Active</span> </td>
                </tr>
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
    renderList = (id, obj) => {
        if (obj) {
            $.each(JSON.parse(obj), (key, value) => {
                $('#' + id).append('<option value=' + value.cat_id + '>' + value.cat_title + '</option>');
            })
        } else {
            $('#' + id).append('<option value=' + 99 + '>' + "Empty List" + '</option>');
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
            console.log(result);
            renderList("subCateg", result);
        })
    })
    $('#vote-form').validate({
        rules: {
            teamA: {
                required: true,
                minlength: 10,
                maxlength: 50
            },
            teamB: {
                required: true,
                minlength: 10,
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

        },
        submitHandler: (form, e) => {
            e.preventDefault();
            $.post("addvote", $('form').serialize(), (data) => {
                var result = JSON.parse(data);
                console.log(result.status);
                console.log(result.message);
                if (result.status == true) {
                    swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: result.message,
                    }).then(() => {
                        // window.location = '<?= base_url() ?>/login';
                    })
                } else {
                    swal.fire(
                        'warning',
                        'Failed',
                        result.message
                    )

                }

            })
        }
    })
</script>