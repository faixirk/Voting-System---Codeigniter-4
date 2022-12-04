<?php include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';

?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Banner Settings</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item text-muted" aria-current="page"> Banner Settings</li>
                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="alert alert-warning mb-4" role="alert">
            <i class="fas fa-info-circle mr-2"></i> After changes image. Please clear your browser's cache to see changes.
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card card-primary shadow">
                    <div class="card-body">


                        <form action="https://script.bugfinder.net/prophecy/admin/breadcrumb" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="put"> <input type="hidden" name="_token" value="YTQa9fqu2fSAgH28fnx5Go1KiuQgUF0XGXWY5SQm">
                            <div class="row justify-content-center">


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5 class="text-dark">Login/Register Image</h5>
                                        <div class="image-input ">
                                            <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                            <input type="file" name="loginImage" placeholder="Choose image" id="loginImage">
                                            <img id="loginImage_preview_container" class="preview-image" src="https://script.bugfinder.net/prophecy/assets/uploads/logo/loginImage.png" alt="preview image">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5 class="text-dark">Banner Image</h5>
                                        <div class="image-input">
                                            <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                            <input type="file" name="banner" placeholder="Choose image" id="image">
                                            <img id="image_preview_container" class="preview-image" src="https://script.bugfinder.net/prophecy/assets/uploads/logo/banner.jpg" alt="preview image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5 class="text-dark">Footer Background</h5>

                                        <div class="image-input">
                                            <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                            <input type="file" name="footer" placeholder="Choose image" id="footerImage">
                                            <img id="footerImage_preview_container" class="preview-image" src="https://script.bugfinder.net/prophecy/assets/uploads/logo/footer.jpg" alt="preview image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">


                                <div class="col-md-12">
                                    <div class="submit-btn-wrapper text-center mt-4">
                                        <button type="submit" class="btn waves-effect waves-light btn-primary btn-block btn-rounded">
                                            <span>Save Changes</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include 'includes/footer.php';
    ?>