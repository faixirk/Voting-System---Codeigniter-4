<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Category List</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item text-muted" aria-current="page"> Category List</li>
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
                            <th scope="col" class="text-center">Icon</th>
                            <th scope="col" class="text-center">Status</th>

                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; foreach ($categories as $cat) : ?>
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" id="chk-26" class="form-check-input row-tic tic-check" name="check" value="26" data-id="26">
                                    <label for="chk-26"></label>
                                </td>

                                <td data-label="SL No." class="text-center"><?= ++$count; ?></td>
                                <td data-label="Name">
                                    <?= $cat['cat_title']; ?>
                                </td>



                                <td data-label="Icon" class="text-lg-center text-right">
                                    <?= $cat['cat_icon']; ?>
                                </td>
                                <td data-label="Status" class="text-lg-center text-right">
                                    <?php
                                    if ($cat['cat_status'] == 'on') {
                                        echo '<span class="badge badge-light"><i class="fa fa-circle text-success success font-12"></i> Active</span>';
                                    } else {
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
                                            <button class="dropdown-item editBtn" value="<?= $cat['cat_id'] ?>" data-title="<?= $cat['cat_title'] ?>" data-icon="&lt;i class=&quot;far fa-cricket&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-status="<?= $cat['cat_status'] ?>" data-target="#editModal" data-toggle="modal">
                                                <i class="fa fa-edit text-warning pr-2" aria-hidden="true"></i> Edit </button>

                                            <button class="dropdown-item notiflix-confirm btn-cat" value="<?= $cat['cat_id'] ?>" data-target="#delete-modal" data-toggle="modal">
                                                <i class="fa fa-trash-alt text-danger pr-2" aria-hidden="true"></i> Delete </button>
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
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

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
                                <option value="&lt;i class=&quot;fas fa-bath&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-bath&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Bath">
                                    Bath </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-baseball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-baseball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Baseball">
                                    Baseball </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-basketball-ball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-basketball-ball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Basketball">
                                    Basketball </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-bell&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-bell&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Bell">
                                    Bell </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-bicycle&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-bicycle&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Bicycle">
                                    Bicycle </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-book-open&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-book-open&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Book">
                                    Book </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-box-open&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-box-open&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Box">
                                    Box </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-boxing-glove&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-boxing-glove&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Boxing">
                                    Boxing </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-building&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-building&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Building">
                                    Building </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-bullhorn&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-bullhorn&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Bullhorn">
                                    Bullhorn </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-camera&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-camera&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Camera">
                                    Camera </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-graduation-cap&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-graduation-cap&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Cap">
                                    Cap </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-car&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-car&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Car">
                                    Car </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-cat&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-cat&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Cat">
                                    Cat </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-chess&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-chess&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Chess">
                                    Chess </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-clipboard-check&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-clipboard-check&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Clipboard">
                                    Clipboard </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-cricket&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-cricket&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Cricket">
                                    Cricket </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-comment&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-comment&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Comment">
                                    Comment </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-couch&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-couch&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Couch">
                                    Couch </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-desktop&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-desktop&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Desktop">
                                    Desktop </i>
                                </option>

                                <option value="&lt;i class=&quot;far fa-dice&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-dice&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Dice">
                                    Dice </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-dog&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-dog&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Dog">
                                    Dog </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-dollar-sign&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-dollar-sign&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Dollar">
                                    Dollar </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-donate&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-donate&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Donate">
                                    Donate </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-envelope&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-envelope&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Envelope">
                                    Envelope </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-gamepad-alt&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-gamepad-alt&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; ESports">
                                    ESports </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-venus-double&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-venus-double&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Female">
                                    Female </i>
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

                                <option value="&lt;i class=&quot;fas fa-hamburger&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-hamburger&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Hamburger">
                                    Hamburger </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-heart&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-heart&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Health">
                                    Health </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-headphones&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-headphones&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Headphones">
                                    Headphones </i>
                                </option>

                                <option value="&lt;i class=&quot;far fa-field-hockey&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-field-hockey&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Hockey">
                                    Hockey </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-horse-head&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-horse-head&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Horse Racing">
                                    Horse Racing </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-ice-cream&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-ice-cream&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Icecream">
                                    Icecream </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-key&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-key&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Key">
                                    Key </i>
                                </option>
                                <option value="&lt;i class=&quot;	fas fa-mars-stroke-h&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;	fas fa-mars-stroke-h&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Male">
                                    Male </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-map-marker&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-map-marker&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Map">
                                    Map Marker </i>
                                </option>
                                <option value="&lt;i class=&quot;fab fa-cc-mastercard&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fab fa-cc-mastercard&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Mastercard">
                                    Mastercard </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-mobile&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-mobile&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Mobile">
                                    Mobile </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-music&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-music&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Music">
                                    Music </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-pen&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-pen&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Pen">
                                    Pen </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-phone&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-phone&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Phone">
                                    Phone </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-plug&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-plug&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Plug">
                                    Plug </i>
                                </option>


                                <option value="&lt;i class=&quot;far fa-swimmer&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-swimmer&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Swimming">
                                    Swimming </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-syringe&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-syringe&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Syringe">
                                    Syringe </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-tablet&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-tablet&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Tablet">
                                    Tablet </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-table-tennis&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-table-tennis&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Table tennis">
                                    Table tennis </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-tshirt&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-tshirt&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Tshirt">
                                    Tshirt </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-tools&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-tools&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Tools">
                                    Tools </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-tv&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-tv&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; TV">
                                    TV </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-user&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-user&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; User">
                                    User </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-vote-yea&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-vote-yea&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Vote">
                                    Vote </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-cloud-rain&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-cloud-rain&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Weather">
                                    Weather </i>
                                </option>




                            </select>


                        </div>
                        <div class="form-group">
                            <label for="edit-status" class="text-dark"> Status </label>
                            <input data-toggle="toggle" id="edit-status" checked data-onstyle="success" data-offstyle="info" data-on="Active" data-off="Deactive" data-width="100%" type="checkbox" name="status">
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
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form2" enctype="multipart/form-data">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Icon</label>


                            <select name="icon" id="cat_icon" class="form-control" class="selectpicker" data-live-search="true">
                                <option value="" selected disabled>Select Icon</option>
                                <option value="&lt;i class=&quot;far fa-shuttlecock&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-shuttlecock&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Badminton">
                                    Badminton </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-bath&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-bath&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Bath">
                                    Bath </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-baseball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-baseball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Baseball">
                                    Baseball </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-basketball-ball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-basketball-ball&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Basketball">
                                    Basketball </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-bell&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-bell&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Bell">
                                    Bell </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-bicycle&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-bicycle&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Bicycle">
                                    Bicycle </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-book-open&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-book-open&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Book">
                                    Book </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-box-open&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-box-open&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Box">
                                    Box </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-boxing-glove&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-boxing-glove&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Boxing">
                                    Boxing </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-building&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-building&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Building">
                                    Building </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-bullhorn&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-bullhorn&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Bullhorn">
                                    Bullhorn </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-camera&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-camera&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Camera">
                                    Camera </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-graduation-cap&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-graduation-cap&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Cap">
                                    Cap </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-car&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-car&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Car">
                                    Car </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-cat&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-cat&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Cat">
                                    Cat </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-chess&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-chess&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Chess">
                                    Chess </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-clipboard-check&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-clipboard-check&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Clipboard">
                                    Clipboard </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-cricket&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-cricket&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Cricket">
                                    Cricket </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-comment&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-comment&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Comment">
                                    Comment </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-couch&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-couch&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Couch">
                                    Couch </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-desktop&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-desktop&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Desktop">
                                    Desktop </i>
                                </option>

                                <option value="&lt;i class=&quot;far fa-dice&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-dice&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Dice">
                                    Dice </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-dog&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-dog&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Dog">
                                    Dog </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-dollar-sign&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-dollar-sign&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Dollar">
                                    Dollar </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-donate&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-donate&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Donate">
                                    Donate </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-envelope&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-envelope&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Envelope">
                                    Envelope </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-gamepad-alt&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-gamepad-alt&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; ESports">
                                    ESports </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-venus-double&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-venus-double&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Female">
                                    Female </i>
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

                                <option value="&lt;i class=&quot;fas fa-hamburger&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-hamburger&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Hamburger">
                                    Hamburger </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-heart&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-heart&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Health">
                                    Health </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-headphones&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-headphones&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Headphones">
                                    Headphones </i>
                                </option>

                                <option value="&lt;i class=&quot;far fa-field-hockey&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-field-hockey&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Hockey">
                                    Hockey </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-horse-head&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-horse-head&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Horse Racing">
                                    Horse Racing </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-ice-cream&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-ice-cream&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Icecream">
                                    Icecream </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-key&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-key&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Key">
                                    Key </i>
                                </option>
                                <option value="&lt;i class=&quot;	fas fa-mars-stroke-h&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;	fas fa-mars-stroke-h&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Male">
                                    Male </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-map-marker&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-map-marker&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Map">
                                    Map Marker </i>
                                </option>
                                <option value="&lt;i class=&quot;fab fa-cc-mastercard&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fab fa-cc-mastercard&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Mastercard">
                                    Mastercard </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-mobile&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-mobile&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Mobile">
                                    Mobile </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-music&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-music&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Music">
                                    Music </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-pen&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-pen&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Pen">
                                    Pen </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-phone&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-phone&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Phone">
                                    Phone </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-plug&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-plug&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Plug">
                                    Plug </i>
                                </option>


                                <option value="&lt;i class=&quot;far fa-swimmer&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-swimmer&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Swimming">
                                    Swimming </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-syringe&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-syringe&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Syringe">
                                    Syringe </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-tablet&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-tablet&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Tablet">
                                    Tablet </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-table-tennis&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-table-tennis&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Table tennis">
                                    Table tennis </i>
                                </option>

                                <option value="&lt;i class=&quot;fas fa-tshirt&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-tshirt&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Tshirt">
                                    Tshirt </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-tools&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-tools&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Tools">
                                    Tools </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-tv&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-tv&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; TV">
                                    TV </i>
                                </option>
                                <option value="&lt;i class=&quot;far fa-user&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;far fa-user&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; User">
                                    User </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-vote-yea&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-vote-yea&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Vote">
                                    Vote </i>
                                </option>
                                <option value="&lt;i class=&quot;fas fa-cloud-rain&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;" data-content="&lt;i class=&quot;fas fa-cloud-rain&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt; Weather">
                                    Weather </i>
                                </option>




                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-status" class="text-dark"> Status </label>
                            <input data-toggle="toggle" id="status" data-onstyle="success" data-offstyle="info" data-on="Active" data-off="Deactive" data-width="100%" type="checkbox" name="status">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <!-- <form class="update-action"> -->
                        <button id="updateCat" type="button" class="btn btn-primary">Update</button>
                        <!-- </form> -->

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
                    <form id="form2" class="deleteRoute">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                        <button id="confirm_cat" type="submit" class="btn btn-primary">Yes</button>

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

            //Add Catgeory
            $('#loadingBtn').hide();
            $("#updateBtn").click((e) => {
                e.preventDefault();

                if ($('#catTitle').val() != "" || $('#cat_icon').val() != "") {
                    $.ajax({
                        type: "POST",
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
                                    'icon': 'success',
                                    'text': "Successfully Added!"
                                }).then(() => {
                                    window.location.reload();
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
        //-------------------------------------------------------------------------------

        //------------------------------- Edit Category ---------------------------------
        $('.editBtn').click(function(event) {
            var id = $(this).val();
            $('#updateCat').click(function() {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url() ?>' + "/admin/edit/category/" + id,
                    data: $('#form2').serialize(),
                    success: function(data) {
                        if (data == 1) {
                            swal.fire({
                                'icon': 'success',
                                'text': "Updated Successfully!",
                            }).then(()=>{
                                window.location.reload();
                            });
                            window.location.reload();
                        } else if (data == 2) {
                            swal.fire({
                                'icon': 'info',
                                'text': "Oops! There was an error. Contact Admin!",
                            });
                        } else {
                            swal.fire({
                                'icon': 'info',
                                'text': "Validation Failed!",
                            });
                        }
                    },
                    error: function(data) {
                        swal.fire({
                            'icon': 'info',
                            'text': "Oops! There was an error. Contact Admin!",
                        });

                    }


                });

            });
            $.ajax({

            });

        });


        //-------------------------------------------------------------------------------
        //Delete Category
        $('.btn-cat').click(function(event) {
            var id = $(this).val();
            $('#confirm_cat').click(function() {
                $.ajax({
                    type: "GET",
                    url: "<?= base_url() ?>" + '/admin/delete/category/' + id,
                    success: function(data) {
                        if (data == 1) {
                            window.location.reload();
                        } else {
                            // alert(id);
                            swal.fire({
                                'icon': 'info',
                                'text': "Oops! There was an error. Contact Admin!",
                            });
                        }
                    },
                    error(data) {
                        // alert(id);

                        swal.fire({
                            'icon': 'error',
                            'text': "Unexpected Error! Contact admin.",
                        });
                    }
                });
            });
        });
        //--------------------------------------------------------------------------------
    </script>
    <script>
        $(document).ready(function() {
            $('.notiflix-confirm').on('click', function() {

            })
            $('#zero_config').DataTable({
                pagingType: 'full_numbers',
            });
        });
    </script>