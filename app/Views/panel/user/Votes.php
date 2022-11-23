<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<div class="content user-panel p-4">
    <div class="row">

        <div class="col-6">
            <h4> Chats</h4>
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
                        <form class="p-0 m-0" id="vote-form" style="width: 100% !important; max-width: 100% !important" enctype="multipart/form-data">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                            <div class="row mb-3">
                                <div class="alert alert-danger" id="errorMesg" role="alert">

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="team1">Team A</label>
                                    <select class="custom-select form-control mr-sm-2" id="team1" name="teamA" required>
                                        <option selected>Choose...</option>
                                        <option value="India">India</option>
                                        <option value="Eng">Eng</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="team2">Team B</label>
                                    <select class="custom-select form-control mr-sm-2" id="team2" name="teamB" required>
                                        <option selected>Choose...</option>
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
                                                        <option selected>Choose...</option>
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
                                    <label for="team1">Team A Banner</label>
                                    <div class="custom-file">
                                        <input type="file" name="teamABanner" id="customFile" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="team1">Team B Banner</label>
                                    <div class="custom-file">
                                        <input type="file" class="teamBBanner" id="customFile" required>
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
                                    <select class="custom-select form-control mr-sm-2" class="voteType" id="type" required>
                                        <option selected>Choose...</option>
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
    var formdata = new FormData(document.getElementById('vote-form'));
    $('#vote-form').submit((e) => {
        e.preventDefault();
        // set some basic validation
        $.post("<?= base_url() ?>/user/addvote", formdata, (result) => {
            console.log(result);
            if (result.errors) {
                $(result.errors).each(function(key, value) {
                    $('#errorMesg').html(value);
                });
            } else {

            }

        })
    })
</script>