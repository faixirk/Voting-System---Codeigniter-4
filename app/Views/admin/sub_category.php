<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Team List</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item text-muted" aria-current="page"> Team List</li>
                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>

    <div class="card card-primary m-0 m-md-4  m-md-0 shadow">
        <div class="card-header bg-transparent">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <a href="javascript:void(0)" class="btn btn-sm btn-primary mr-2" data-target="#newModal" data-toggle="modal">
                    <span><i class="fa fa-plus-circle"></i> Add New</span>
                </a>
                <div class="dropdown mb-2 text-right">
                    <button class="btn btn-sm  btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><i class="fas fa-bars pr-2"></i> Action</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#all_active">Active</button>
                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#all_inactive">DeActive</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered" id="zero_config">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">
                                <input type="checkbox" class="form-check-input check-all tic-check" name="check-all" id="check-all">
                                <label for="check-all"></label>
                            </th>

                            <th scope="col" class="text-center">ID.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($sub_category as $sub_cat): ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" id="chk-23" class="form-check-input row-tic tic-check" name="check" value="23" data-id="23">
                                <label for="chk-23"></label>
                            </td>

                            <td data-label="SL No." class="text-center"><?= $sub_cat['sub_cat_id']; ?></td>
                            <td data-label="Name">
                                <div class="d-lg-flex d-block align-items-center ">
                                    <div class="mr-3"><img src="https://script.bugfinder.net/prophecy/assets/uploads/team/631c7a16600ce1662810646.png" alt="user" class="rounded-circle" width="25" height="25"></div>
                                    <div class="mr-3">
                                        <h5 class="text-dark mb-0 font-16 font-weight-medium"><?= $sub_cat['sub_cat_title']; ?></h5>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Category" class="text-dark">
                                <i class="far fa-futbol" aria-hidden="true"></i>
                                <?= $sub_cat['cat_title'];?>
                            </td>
                            <td data-label="Status" class="text-lg-center text-right">
                                <?php if($sub_cat['status'] == 'on'){
                                echo '<span class="badge badge-light">
                                    <i class="fa fa-circle text-success success font-12"></i> Active</span>';
                                }
                                else{
                                    echo '<span class="badge badge-light">
                                    <i class="fa fa-circle text-danger danger font-12"></i> Inactive</span>';
                                }
                                ?>
                            </td>

                            <td data-label="Action">

                                <div class="dropdown show dropup text-lg-center text-right">
                                    <a class="dropdown-toggle p-3" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item editBtn" href="javascript:void(0)" data-title="Barcelona" data-status="1" data-category_id="4" data-category="{&quot;id&quot;:4,&quot;name&quot;:&quot;Football&quot;,&quot;icon&quot;:&quot;&lt;i class=\&quot;far fa-futbol\&quot; aria-hidden=\&quot;true\&quot;&gt;&lt;\/i&gt;&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;2022-09-03T01:05:01.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-06T05:36:25.000000Z&quot;}" data-image="https://script.bugfinder.net/prophecy/assets/uploads/team/631c7a16600ce1662810646.png" data-action="https://script.bugfinder.net/prophecy/admin/team/update/23">
                                            <i class="fa fa-edit text-warning pr-2" aria-hidden="true"></i> Edit </a>

                                        <a class="dropdown-item notiflix-confirm" href="javascript:void(0)" data-target="#delete-modal" data-route="https://script.bugfinder.net/prophecy/admin/team/delete/23" data-toggle="modal">
                                            <i class="fa fa-trash-alt text-danger pr-2" aria-hidden="true"></i> Delete </a>
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

    <!-- All Active Modal -->
    <div class="modal fade" id="all_active" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h5 class="modal-title">Active Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <p>Are you really want to active the Team</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal"><span>No</span></button>
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="4ZvvhSDniAgyDNzYYrYeijtw2k7B3dgaXfgDnh5k"> <a href="" class="btn btn-primary active-yes"><span>Yes</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- All Inactive Modal -->
    <div class="modal fade" id="all_inactive" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h5 class="modal-title">DeActive Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <p>Are you really want to Deactive the Team</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal"><span>No</span></button>
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="4ZvvhSDniAgyDNzYYrYeijtw2k7B3dgaXfgDnh5k"> <a href="" class="btn btn-primary inactive-yes"><span>Yes</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="newModal" class="modal fade show" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h5 class="modal-title">Add New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form1" enctype="multipart/form-data">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="text-dark">Category </label>
                            <select class="form-control selectpicker" data-show-content="true" data-live-search="true" name="category">
                                <?php
                                echo '<option disabled>Select a Category</option>';

                                foreach ($category as $c) {
                                    echo '<option value="' . $c['cat_id'] . '">' . $c['cat_title'] . '</option>';
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Name</label>
                            <input type="text" class="form-control" name="name" id="subcatTitle">
                        </div>
                        <div class="form-group">
                            <label for="image" class="text-dark">Image</label>
                            <div class="image-input">
                                <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                <input type="file" name="image" placeholder="Choose image" id="">
                                <!-- <img id="image_preview_container" class="preview-image" src="https://script.bugfinder.net/prophecy/assets/admin/images/default.png" alt="preview image"> -->
                            </div>
                            <!-- <div>
                                <span class="text-secondary">Image size 64x64 px</span>
                            </div> -->
                        </div>

                        <div class="form-group">
                            <label for="status" class="text-dark"> Status </label>
                            <input data-toggle="toggle" id="status" data-onstyle="success" data-offstyle="info" data-on="Active" data-off="Deactive" data-width="100%" type="checkbox" name="status">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="loadingBtn" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0" type="button" disabled>
                            <span class="btn btn-primary" role="status" aria-hidden="true"></span>
                            Verifying...
                        </button>


                        <button id="updateBtn" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="editModal" class="modal fade show" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h5 class="modal-title">Edit Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="4ZvvhSDniAgyDNzYYrYeijtw2k7B3dgaXfgDnh5k">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="text-dark">Game Category </label>
                            <select id="editCategory" class="form-control selectpicker" data-show-content="true" data-live-search="true" name="category" required>
                                <option value="">Select Game Category</option>
                                <option value="3" data-content="&lt;i class=&quot;far fa-shuttlecock&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Badminton">
                                </option>
                                <option value="6" data-content="&lt;i class=&quot;far fa-basketball-ball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Basketball">
                                </option>
                                <option value="5" data-content="&lt;i class=&quot;far fa-chess&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Chess">
                                </option>
                                <option value="26" data-content="&lt;i class=&quot;far fa-cricket&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Cricket">
                                </option>
                                <option value="4" data-content="&lt;i class=&quot;far fa-futbol&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Football">
                                </option>
                                <option value="7" data-content="&lt;i class=&quot;far fa-field-hockey&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Hockey">
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="" required>
                        </div>

                        <div class="form-group">
                            <label for="image" class="text-dark">Image</label>
                            <div class="image-input ">
                                <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                <input type="file" name="image" placeholder="Choose image" id="editImage">
                                <img id="edit_image_preview_container" class="preview-image" src="" alt="preview image">
                            </div>
                            <div>
                                <span class="text-secondary">Image size 64x64 px</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="edit-status" class="text-dark"> Status </label>
                            <input data-toggle="toggle" id="edit-status" data-onstyle="success" data-offstyle="info" data-on="Active" data-off="Deactive" data-width="100%" type="checkbox" name="status">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="primary-header-modalLabel">Delete Confirmation </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <form id="form2"  class="deleteRoute">
                    <input data-id="{$id}" type="hidden" name="<?=csrf_token()?>" value="<?=csrf_hash()?>">  
                        
                        <button id="loadingBtn1" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Verifying...
                        </button>
                        <button id="updateBtn1" type="submit" class="btn btn-primary">Yes</button>


                                                
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
                $('#loadingBtn').hide();
                $("#updateBtn").click((e) => {
                    e.preventDefault();

                    if ($('#subcatTitle').val() != "" || $('#image').val() != "") {
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url() ?>" + '/admin/add/sub-category',
                            data: $('#form1').serialize(),
                            beforeSend: function() {
                                $('#updateBtn').hide();
                                $('#loadingBtn').show();
                            },
                            success: function(response) {
                                console.log(response);
                                swal.fire(response);
                                if (response == 1) {
                                    swal.fire({
                                        'icon': 'success',
                                        'text': "Successfully Added!"
                                    });
                                    $('#updateBtn').show();
                                    $('#loadingBtn').hide();
                                } else if (response == 2) {
                                    swal.fire('Error while adding sub category. Contact admin');
                                    $('#updateBtn').show();
                                    $('#loadingBtn').hide();
                                } else {
                                    swal.fire('Validation failed');
                                    $('#updateBtn').show();
                                    $('#loadingBtn').hide();
                                }
                            },
                            error: (error) => {
                                console.log(JSON.stringify(error));
                            },
                        });
                    } else {
                        swal.fire("All fields are required.");

                    }
                });
            });
      
    </script>
    <script>
        $(document).ready(function(){
            $('#loadingBtn1').hide();
            $('#updateBtn1').click((e)=>{
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '<?= base_url() ?>' + "/admin/delete/sub-category/" + id,
                    data: $('#form2').serialize(),
                    beforeSend: function() {
                            $('#updateBtn1').hide();
                            $('#loadingBtn1').show();
                        },
                        success: function(response) {
                            if (response == 1) {
                                swal.fire({
                                    'icon' : 'success',
                                    'text': "Successfully Deleted!"
                                });
                                $('#updateBtn1').show();
                                $('#loadingBtn1').hide();
                            }  else {
                                toastr.error('Invalid response');
                                $('#updateBtn1').show();
                                $('#loadingBtn1').hide();
                            }
                        },
                        error: (error) => {
                            console.log(JSON.stringify(error));
                        },
                    
                });

            });
        });
    </script>