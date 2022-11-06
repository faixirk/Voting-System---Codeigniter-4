<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Game Category List</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item text-muted" aria-current="page"> Game Category List</li>
                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>

    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-header bg-transparent ">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
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

                            <th scope="col" class="text-center">SL No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Sub Category</th>
                            <th scope="col" class="text-center">Icon</th>
                            <th scope="col" class="text-center">Status</th>

                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categories as $cat): ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" id="chk-26" class="form-check-input row-tic tic-check" name="check" value="26" data-id="26">
                                <label for="chk-26"></label>
                            </td>

                            <td data-label="SL No." class="text-center"><?= $cat['cat_id']; ?></td>
                            <td data-label="Name">
                                <?= $cat['cat_title']; ?>
                            </td>
                            
                            <td data-label="Active Team">
                                <span class="badge badge-success">6</span>
                            </td>
                            
                            <td data-label="Icon" class="text-lg-center text-right">
                                <?= $cat['cat_icon']; ?>
                            </td>
                            <td data-label="Status" class="text-lg-center text-right">
                            <?php
                                    if($cat['cat_status'] == 'on'){
                                    echo'<span class="badge badge-light"><i class="fa fa-circle text-success success font-12"></i> Active</span>';
                                    }
                                    else{
                                        echo ' <span class="badge badge-light">
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
                                        <a class="dropdown-item editBtn" href="javascript:void(0)" data-title="Cricket" data-icon="&lt;i class=&quot;far fa-cricket&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-status="1" data-action="https://script.bugfinder.net/prophecy/admin/category/update/26">
                                            <i class="fa fa-edit text-warning pr-2" aria-hidden="true"></i> Edit </a>

                                        <a class="dropdown-item notiflix-confirm" href="javascript:void(0)" data-target="#delete-modal" data-route="https://script.bugfinder.net/prophecy/admin/category/delete/26" data-toggle="modal">
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
                    <p>Are you really want to active the Category</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal"><span>No</span></button>
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="DBtaZmIOVyXsou7spQrZ39wVhVZzGtXa0A4miOan"> <a href="" class="btn btn-primary active-yes"><span>Yes</span></a>
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
                    <p>Are you really want to Deactive the Category</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal"><span>No</span></button>
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="DBtaZmIOVyXsou7spQrZ39wVhVZzGtXa0A4miOan"> <a href="" class="btn btn-primary inactive-yes"><span>Yes</span></a>
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
                <input type="hidden" name="<?=csrf_token()?>" value="<?=csrf_hash()?>">  
                    
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="text-dark">Title</label>
                            <input type="text" class="form-control" id="catTitle" name="title">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Icon</label>


                            <select name="icon" id="cat_icon" class="form-control" class="selectpicker" data-live-search="true">
                                <option value="" selected disabled>Select Icon</option>
                                <option value="&lt;i class=&quot;far fa-shuttlecock&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-shuttlecock&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Badminton">
                                    Badminton </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-baseball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-baseball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Baseball">
                                    Baseball </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-basketball-ball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-basketball-ball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Basketball">
                                    Basketball </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-boxing-glove&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-boxing-glove&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Boxing">
                                    Boxing </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-chess&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-chess&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Chess">
                                    Chess </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-cricket&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-cricket&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Cricket">
                                    Cricket </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-dice&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-dice&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Dice">
                                    Dice </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-gamepad-alt&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-gamepad-alt&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; ESports">
                                    ESports </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-futbol&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-futbol&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Football">
                                    Football </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-globe-americas&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-globe-americas&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Globe">
                                    Globe </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-golf-club&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-golf-club&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Golf">
                                    Golf </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-field-hockey&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-field-hockey&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Hockey">
                                    Hockey </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-horse-head&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-horse-head&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Horse Racing">
                                    Horse Racing </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-swimmer&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-swimmer&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Swimming">
                                    Swimming </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-table-tennis&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-table-tennis&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Table tennis">
                                    Table tennis </i>
                                </option>
                            </select>


                        </div>
                        <div class="form-group">
                            <label for="edit-status" class="text-dark"> Status </label>
                            <input data-toggle="toggle" id="edit-status" checked data-onstyle="success" data-offstyle="info" data-on="Active" data-off="Deactive" data-width="100%" type="checkbox" name="status" >
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
                    <h5 class="modal-title">Edit Game</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <input type="hidden" name="_token" value="DBtaZmIOVyXsou7spQrZ39wVhVZzGtXa0A4miOan"> <input type="hidden" name="key" value="social.item">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Icon</label>


                            <select name="icon" id="editIcon" class="form-control selectpicker" data-live-search="true">
                                <option value="" selected disabled>Select Icon</option>
                                <option value="&lt;i class=&quot;far fa-shuttlecock&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-shuttlecock&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Badminton">
                                    Badminton </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-baseball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-baseball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Baseball">
                                    Baseball </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-basketball-ball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-basketball-ball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Basketball">
                                    Basketball </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-boxing-glove&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-boxing-glove&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Boxing">
                                    Boxing </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-chess&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-chess&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Chess">
                                    Chess </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-cricket&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-cricket&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Cricket">
                                    Cricket </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-dice&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-dice&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Dice">
                                    Dice </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-gamepad-alt&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-gamepad-alt&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; ESports">
                                    ESports </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-futbol&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-futbol&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Football">
                                    Football </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-globe-americas&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-globe-americas&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Globe">
                                    Globe </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-golf-club&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-golf-club&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Golf">
                                    Golf </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-field-hockey&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-field-hockey&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Hockey">
                                    Hockey </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-horse-head&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-horse-head&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Horse Racing">
                                    Horse Racing </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-swimmer&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-swimmer&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Swimming">
                                    Swimming </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-table-tennis&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-table-tennis&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Table tennis">
                                    Table tennis </i>
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-status" class="text-dark"> Status </label>
                            <input data-toggle="toggle" id="status" data-onstyle="success" data-offstyle="info" data-on="Active" data-off="Deactive" data-width="100%" type="checkbox" name="status">
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
                    <form action="" method="post" class="deleteRoute">
                        <input type="hidden" name="_token" value="DBtaZmIOVyXsou7spQrZ39wVhVZzGtXa0A4miOan"> <input type="hidden" name="_method" value="delete"> <button type="submit" class="btn btn-primary">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    include 'includes/footer.php';
    ?>

    <script>
        $(document).ready(function(){
            $('#loadingBtn').hide();
            $("#updateBtn").click((e) => {
                e.preventDefault(); 
              
         if($('#catTitle').val() != "" || $('#cat_icon').val() != ""){
            $.ajax({
                type : "POST",
                url: "<?= base_url() ?>" + '/admin/add/category',
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
                                    'icon' : 'success',
                                    'text': "Successfully Added!"
                                });
                                $('#updateBtn').show();
                                $('#loadingBtn').hide();
                            } else if (response == 2) {
                                swal.fire('Error while adding category. Contact admin');
                                $('#updateBtn').show();
                                $('#loadingBtn').hide();
                            } else {
                                swal.fire('Valiadtion failed');
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