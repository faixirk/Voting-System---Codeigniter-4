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
                    <h3>About Us</h3>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- about section -->
<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="img-box">
                    <img src="<?= base_url('public/uploads/about/'. $about['image']) ?>" alt="..." class="img-fluid" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="header-text">
                    <h5><?= $about['title'] ?></h5>
                    <h2><?= $about['sub_title'] ?></h2>
                </div>
                <p><?= $about['description'] ?></p>
            </div>
        </div>
    </div>
</section>
<!-- testimonial section -->
<!-- <section class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header-text mb-5 text-center">
                    <h5>Testimonials</h5>
                    <h3>What Clients Say</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti impedit molestias ipsa quo deserunt ipsam eveniet temporibus cupiditate natus praesentium? </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonials owl-carousel">
                    <div class="review-box">
                        <div class="upper">
                            <div class="img-box">
                                <img src="#" alt="..." />
                            </div>
                            <div class="client-info">
                                <h5>selena gomez</h5>
                                <span> Director, BAT</span>
                            </div>
                        </div>
                        <p class="mb-0">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius voluptas distinctio hic commodi itaque aperiam aliquam ullam adipisci laborum eum. </p>
                        <i class="fad fa-quote-right quote"></i>
                    </div>
                    <div class="review-box">
                        <div class="upper">
                            <div class="img-box">
                                <img src="#" alt="..." />
                            </div>
                            <div class="client-info">
                                <h5>selena gomez</h5>
                                <span> Director, BAT</span>
                            </div>
                        </div>
                        <p class="mb-0">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius voluptas distinctio hic commodi itaque aperiam aliquam ullam adipisci laborum eum. </p>
                        <i class="fad fa-quote-right quote"></i>
                    </div>
                    <div class="review-box">
                        <div class="upper">
                            <div class="img-box">
                                <img src="#" alt="..." />
                            </div>
                            <div class="client-info">
                                <h5>selena gomez</h5>
                                <span> Director, BAT</span>
                            </div>
                        </div>
                        <p class="mb-0">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius voluptas distinctio hic commodi itaque aperiam aliquam ullam adipisci laborum eum. </p>
                        <i class="fad fa-quote-right quote"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->


<?php
include 'includes/footer1.php';
include 'includes/footer.php';
?>