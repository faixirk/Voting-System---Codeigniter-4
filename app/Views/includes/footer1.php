<!-- FOOTER SECTION -->

<!-- FOOTER SECTION -->
<footer class="footer-section" id="subscribe">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="footer-box">
                        <a class="navbar-brand" href="javascript:void(0)">
                            <img class="img-fluid" src="<?= base_url('public/uploads/logo/' . $logo['header_logo']) ?>" alt="..." /> </a>
                        <p>
                        <?= $contact['footer_short_details']?> </p>
                        <ul>
                            <li>
                                <i class="fas fa-phone-alt"></i>
                                <span><?= $contact['phone']?></span>
                            </li>
                            <li>
                                <i class="far fa-envelope"></i>
                                <span><?= $contact['email']?></span>
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?= $contact['email']?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ps-lg-5">
                    <div class="footer-box">
                        <h5>Quick Links</h5>
                        <ul>
                            <li>
                                <a href="<?= base_url('/')?>">Home</a>
                            </li>
                            <li>
                                <a href="<?= base_url('about-us') ?>">About</a>
                            </li>
                            <li>
                                <a href="<?= base_url('blog') ?>">Blog</a>
                            </li>
                            <li>
                                <a href="<?= base_url('contact') ?>">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ps-lg-5">
                    <div class="footer-box">
                        <h5>OUR Services</h5>
                        <ul>
                            <li>
                                <a href="#"> Terms &amp; Conditions</a>
                            </li>
                            <li>
                                <a href="#"> Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-box">
                        
                        <div class="social-links">
                            <?php foreach($social as $s):?>
                            <a href="<?= $s['link']?>">
                                <i class="<?= $s['icon']?>"></i>
                            </a>
                           <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <p class="copyright">
                            Copyright &copy; 2022 Daily Voting All Rights Reserved </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</footer>


<style>
    .footer-section {
        background: url(<?= base_url('public/uploads/footer/'. $breadcrumb['footer'])?>);
        background-size: cover;
        background-position: center top;
    }
</style>
<!-- FOOTER SECTION -->