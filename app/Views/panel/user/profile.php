<?php 
    include 'includes/head.php';
    include 'includes/header.php';
    include 'includes/sidebar.php';
?>


    <div class="content user-panel">
        <div class="d-flex justify-content-between">
            <div>
                <h4>Profile Settings</h4>
            </div>
            <button
                class="btn-custom light toggle-user-panel-sidebar d-lg-none"
                onclick="toggleSidebar('userPanelSideBar')">
                <i class="fal fa-sliders-h"></i>
            </button>
        </div>

            <div class="row">
        <div class="col-sm-4">
            <div class="card secbg br-4">
                <div class="card-body br-4">
                    <form method="post" action="https://script.bugfinder.net/prophecy/user/updateProfile"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="bwCP6ULnZVrCKMDKVITdu9ajobVgP0KwUasdHPGm">                            <div class="image-input ">
                                <label for="image-upload" id="image-label"><i
                                        class="fas fa-upload"></i></label>
                                <input type="file" name="image" placeholder="Choose image" id="image">
                                <img id="image_preview_container" class="preview-image"
                                     src="https://script.bugfinder.net/prophecy/assets/admin/images/default.png"
                                     alt="preview image">
                            </div>
                            
                        </div>
                        <h3></h3>
                        <p>Joined At 04 Nov, 2022 11:15 AM</p>
                        <div class="submit-btn-wrapper text-center text-md-left">
                            <button type="submit" class="btn-custom w-100">
                                <span>Image Update</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="card secbg form-block br-4">
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  active"
                               data-bs-toggle="tab" href="#home">Profile Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link "
                               data-bs-toggle="tab"
                               href="#menu1">Password Setting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link "
                               data-bs-toggle="tab"
                               href="#identity">Identity Verification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link "
                               data-bs-toggle="tab"
                               href="#addressVerification">Address Verification</a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content ">
                        <div id="home"
                             class="container mt-4 tab-pane   active">

                            <form action="https://script.bugfinder.net/prophecy/user/updateInformation" method="post">
                                <input type="hidden" name="_method" value="put">                                <input type="hidden" name="_token" value="bwCP6ULnZVrCKMDKVITdu9ajobVgP0KwUasdHPGm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <div class="form-group input-box mb-3">
                                            <input class="form-control" type="text" name="firstname"
                                                   value="Muhammad">
                                                                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <div class="form-group input-box mb-3">
                                            <input class="form-control" type="text" name="lastname"
                                                   value="Adnan">
                                                                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Username</label>
                                        <div class="form-group input-box mb-3">
                                            <input class="form-control" type="text" name="username"
                                                   value="mdfsf43">
                                                                                    </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label>Email Address</label>
                                        <div class="form-group input-box mb-3">
                                            <input class="form-control" type="email"
                                                   value="m.dfsfs@gmail.com" readonly>
                                                                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Phone Number</label>
                                        <div class="form-group input-box mb-3">
                                            <input class="form-control" type="text" readonly
                                                   value="03235893425">

                                                                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Preferred language</label>
                                        <div class="form-group input-box mb-3">
                                            <select name="language_id" id="language_id" class="form-select">
                                                <option value="" disabled>Select Language</option>
                                                                                                    <option value="1"

                                                        >English</option>
                                                                                                    <option value="18"

                                                        >Spanish</option>
                                                                                            </select>

                                                                                    </div>
                                    </div>
                                </div>

                                <label>Address</label>
                                <div class="form-group input-box mb-3">
                                    <textarea class="form-control" name="address"
                                              rows="5"></textarea>

                                                                    </div>

                                <div class="submit-btn-wrapper text-center text-md-left">
                                    <button type="submit"
                                            class="btn-custom w-100">
                                        <span>Update User</span></button>
                                </div>
                            </form>
                        </div>


                        <div id="menu1" class="container mt-4 tab-pane ">

                            <form method="post" action="https://script.bugfinder.net/prophecy/user/updatePassword">
                                <input type="hidden" name="_token" value="bwCP6ULnZVrCKMDKVITdu9ajobVgP0KwUasdHPGm">                                <label>Current Password</label>
                                <div class="form-group input-box mb-3">
                                    <input id="password" type="password" class="form-control"
                                           name="current_password" autocomplete="off">
                                                                    </div>
                                <label>New Password</label>
                                <div class="form-group input-box mb-3">
                                    <input id="password" type="password" class="form-control"
                                           name="password" autocomplete="off">
                                                                    </div>

                                <label>Confirm Password</label>
                                <div class="form-group input-box mb-3">
                                    <input id="password_confirmation" type="password"
                                           name="password_confirmation" autocomplete="off"
                                           class="form-control">
                                                                    </div>

                                <div class="submit-btn-wrapper text-center">
                                    <button type="submit"
                                            class="btn-custom w-100">
                                        <span>Update Password</span></button>
                                </div>
                            </form>
                        </div>


                        <div id="identity"
                             class="container mt-4 tab-pane ">
                                                                                            <form method="post" action="https://script.bugfinder.net/prophecy/user/verificationSubmit"
                                      enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="bwCP6ULnZVrCKMDKVITdu9ajobVgP0KwUasdHPGm">                                    <div class="col-md-12">
                                        <label class="form-label"
                                               for="identity_type">Identity Type</label>
                                        <div class="form-group input-box mb-3">
                                            <select name="identity_type" id="identity_type"
                                                    class="form-select">
                                                <option value="" selected disabled>Select Type</option>
                                                                                                    <option
                                                        value="driving-license" >Driving License</option>
                                                                                                    <option
                                                        value="passport" >Passport</option>
                                                                                                    <option
                                                        value="national-id" >National ID</option>
                                                                                            </select>
                                                                                    </div>
                                    </div>
                                                                    </form>
                                                    </div>

                        <div id="addressVerification"
                             class="container mt-4 tab-pane ">
                                                                                            <form method="post" action="https://script.bugfinder.net/prophecy/user/addressVerification"
                                      enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="bwCP6ULnZVrCKMDKVITdu9ajobVgP0KwUasdHPGm">                                    <div class="col-md-12">
                                        <label class="form-label">Address Proof <span
                                                class="text-danger">*</span> </label><br>
                                        <div class="form-group input-box">
                                            <div class="fileinput fileinput-new "
                                                 data-provides="fileinput">
                                                <div class="fileinput-new thumbnail "
                                                     data-trigger="fileinput">
                                                    <img class="wh-200-150"
                                                         src="https://script.bugfinder.net/prophecy/assets/admin/images/default.png"
                                                         alt="...">
                                                </div>
                                                <div
                                                    class="fileinput-preview fileinput-exists thumbnail wh-200-150 "></div>

                                                <div class="img-input-div">
                                                    <span class="btn btn-success btn-file">
                                                        <span
                                                            class="fileinput-new "> Select Image </span>
                                                        <span
                                                            class="fileinput-exists"> Change</span>
                                                        <input type="file" name="addressProof"
                                                               value=""
                                                               accept="image/*">
                                                    </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput"> Remove</a>
                                                </div>

                                            </div>

                                                                                    </div>
                                    </div>

                                    <div class="submit-btn-wrapper text-center text-md-left">
                                        <button type="submit"
                                                class="btn-custom w-100">Submit</button>
                                    </div>
                                </form>
                            
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

</div>

<?= include 'includes/footer.php'  ?>
