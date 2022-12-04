<!-- FOOTER SECTION -->

<!-- FOOTER SECTION -->
<footer class="footer-section" id="subscribe">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="footer-box">
                        <a class="navbar-brand" href="javascript:void(0)">
                            <img class="img-fluid" src="https://script.bugfinder.net/prophecy/assets/uploads/logo/logo.png" alt="..." /> </a>
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
                                <a href="https://script.bugfinder.net/prophecy/terms-amp-conditions/95"> Terms &amp; Conditions</a>
                            </li>
                            <li>
                                <a href="https://script.bugfinder.net/prophecy/privacy-policy/96"> Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-box">
                        
                        <div class="social-links">
                            <a href="https://www.facebook.com/">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/">
                                <i class="fab fa-linkedin"></i>
                            </a>
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
        background: url(https://script.bugfinder.net/prophecy/assets/uploads/logo/footer.jpg);
        background-size: cover;
        background-position: center top;
    }
</style>
<!-- FOOTER SECTION -->