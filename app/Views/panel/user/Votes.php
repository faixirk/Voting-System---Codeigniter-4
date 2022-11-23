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
                                <div class="alert alert-danger" id="errorMesg" role="alert">

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="team1">Team A</label>
                                    <select class="custom-select form-control mr-sm-2" id="team1" name="teamA" required>
                                        <option default value="0">Choose...</option>
                                        <option value="India">India</option>
                                        <option value="Eng">Eng</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="team2">Team B</label>
                                    <select class="custom-select form-control mr-sm-2" id="team2" name="teamB" required>
                                        <option default value="0">Choose...</option>
                                        <option value="Pakinstan">Pakinstan</option>
                                        <option value="UK">UK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="categ">Category</label>
                                    <select class="custom-select form-control mr-sm-2" name="category" required id="categ">
                                        <?php foreach ($categories as $cat) : ?>
                                            <option value="<?= $cat['cat_id'] ?>" selected><?= $cat['cat_title'] ?></option>
                                            <?php if ($cat['have_sub_cat']) { ?>
                                                <?php foreach ($subcategories as $sub_cat) { ?>
                                                    <?php if ($sub_cat['cat_id'] == $cat['cat_id']) { ?>
                                                        <select class="custom-select form-control mr-sm-2" required name="subCategory" id="subCateg">
                                                            <option default value="0">Choose...</option>
                                                        </select>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- <div class="form-group col-md-6">
                                            <label for="subCateg">Sub Category</label>


                                                    

                                        </div> -->

                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="customFile">Team A Banner</label>
                                    <div class="custom-file">
                                        <input type="file" name="teamABanner" id="customFile" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="customFile2">Team B Banner</label>
                                    <div class="custom-file">
                                        <input type="file" name="teamBBanner" id="customFile2" required>
                                    </div>
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
        <table class="table table-hover table-responsive">
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
<?= include 'includes/footer.php'  ?>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
<script>
    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        // I use element.value instead value here, value parameter was always null
        return arg != element.value;
    }, "Value must not equal arg.");
    $.validator.addMethod('filesize', function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param * 1000000)
    }, 'File size must be less than {0} MB');
</script>
<script>
    // swal.fire('testing');
    // renderList = (id, obj) => {
    //     if (obj) {
    //         $.each(JSON.parse(obj), (key, value) => {
    //             $('#' + id).append('<option value=' + value.cat_id + '>' + value.cat_title + '</option>');
    //         })
    //     } else {
    //         $('#' + id).append('<option disabled value=' + 0 + '>' + "Empty List" + '</option>');
    //     }

    // }
    // $('#addModelBtn').click(() => {
    //     $.get("<?= base_url() ?>/user/getcategory", (result) => {
    //         renderList("categ", result);
    //     });
    // })
    // $('#categ').change(() => {
    //     var id = $('#categ').find('option:selected').val();
    //     $.get("<?= base_url() ?>/user/getcategory/" + id, (result) => {
    //         renderList("subCateg", result);
    //     })
    // })
    $('#vote-form').validate({
        rules: {
            teamA: {
                required: true,
                valueNotEquals: "0"
            },
            teamB: {
                required: true,
                valueNotEquals: "0"
            },
            category: {
                required: true,
                valueNotEquals: "0"
            },
            subCategory: {
                required: true,
                valueNotEquals: "0"
            },
            teamABanner: {
                required: true,
                extension: "png|jpe?g|gif",
                filesize: 1,
            },
            teamBBanner: {
                required: true,
                extension: "png|jpe?g|gif",
                filesize: 1,
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
            teamA: {
                valueNotEquals: "Please select team a!"
            },
            teamB: {
                valueNotEquals: "Please select team b!"
            },
            category: {
                valueNotEquals: "Please select an category!"
            },
            subCategory: {
                valueNotEquals: "Please select an sub category!"
            },
            teamABanner: "Banner must be JPG, GIF or PNG, less than 1MB",
            teamBBanner: "Banner must be JPG, GIF or PNG, less than 1MB",
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
                    swal.fire(
                        'success',
                        'Success',
                        result.message
                    ).then(() => {
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