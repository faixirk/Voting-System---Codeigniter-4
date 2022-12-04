<?php
include 'includes/head.php';
if (session('type') == 'user') {
    include 'panel/user/includes/header.php';
} else {
    include 'includes/header.php';
}

?>
<section class="banner-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header-text text-center">
                    <h3>Contact Us</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- contact section -->
<div class="contact-section">
    <div class="container">
        <div class="row gy-5 g-lg-5 align-items-center">
            <div class="col-lg-6">
                <div class="text-box">
                    <div class="header-text">
                        <h5><?= $contact['heading'] ?></h5>
                        <h3><?= $contact['sub_heading'] ?></h3>
                        <p>
                        <?= $contact['short_description']?></p>
                    </div>
                    <div class="row">
                        <div class="info-box col-md-6">
                            <div class="icon-box">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="text">
                                <h5>Address</h5>
                                <p><?= $contact['address']?></p>
                            </div>
                        </div>
                        <div class="info-box col-md-6">
                            <div class="icon-box">
                                <i class="fal fa-building"></i>
                            </div>
                            <div class="text">
                                <h5>House</h5>
                                <p><?= $contact['house']?></p>
                            </div>
                        </div>
                        <div class="info-box col-md-6">
                            <div class="icon-box">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="text">
                                <h5>Email</h5>
                                <p><?= $contact['email']?></p>
                            </div>
                        </div>
                        <div class="info-box col-md-6">
                            <div class="icon-box">
                                <i class="fal fa-phone-alt"></i>
                            </div>
                            <div class="text">
                                <h5>Phone</h5>
                                <p><?= $contact['phone']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="#" method="post">
                    <input type="hidden" name="_token" value="FGTjCAXsL4YpaaSt6nAMNhsrl75tDOALaOXwN2KG">
                    <h4>just drop us a line</h4>
                    <div class="row g-3">
                        <div class="input-box col-md-6">
                            <input class="form-control" type="text" name="name" value="" placeholder="Full name" />
                        </div>
                        <div class="input-box col-md-6">
                            <input class="form-control" type="email" name="email" value="" placeholder="Email address" />
                        </div>
                        <div class="input-box col-12">
                            <input class="form-control" type="text" name="subject" value="" placeholder="Subject" />
                        </div>
                        <div class="input-box col-12">
                            <textarea class="form-control" cols="30" rows="3" name="message" placeholder="Your message"></textarea>
                        </div>
                        <div class="input-box col-12">
                            <button type="submit" class="btn-custom">submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<?php
include 'includes/footer1.php';
include 'includes/footer.php';
?>