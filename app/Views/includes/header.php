<body class="dark-mode">


    <!-- navbar -->
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('/') ?>">
                <img src="<?= base_url('public/uploads/logo/' . $logo['header_logo'])?>" alt="homepage">
            </a>
            <button class="navbar-toggler p-0" type="button"
             data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('/') ?>">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('/about-us') ?>">About</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('/faq') ?>">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('/blog') ?>">Blog</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('/contact') ?>">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-text">
                <button onclick="darkMode()" class="btn-custom light night-mode">
                    <i class="fal fa-moon"></i>
                </button>



                <!-- notification panel -->
                <div class="notification-panel" id="pushNotificationArea">

                    <!-- login register button -->
                    <button class="btn-custom" id="registerBtn" data-bs-toggle="modal" data-bs-target="#registerModal">
                        Join </button>
                    <button class="btn-custom" id="loginBtn" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login </button>
                </div>
            </div>
        </div>
    </nav>
    <body class="dark-mode">


<!-- navbar -->
<nav class="navbar navbar-expand-md fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <img src="<?= base_url('public/uploads/logo/' . $logo['header_logo'])?>" alt="homepage">
        </a>
        <button class="navbar-toggler p-0" type="button"
         data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('/') ?>">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('/about-us') ?>">About</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('/faq') ?>">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('/blog') ?>">Blog</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('/contact') ?>">Contact</a>
                </li>
            </ul>
        </div>
        <div class="navbar-text">
            <button onclick="darkMode()" class="btn-custom light night-mode">
                <i class="fal fa-moon"></i>
            </button>



            <!-- notification panel -->
            <div class="notification-panel" id="pushNotificationArea">

                <!-- login register button -->
                <button class="btn-custom" id="registerBtn" data-bs-toggle="modal" data-bs-target="#registerModal">
                    Join </button>
                <button class="btn-custom" id="loginBtn" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login </button>
            </div>
        </div>
    </div>
</nav>
<div class="bottom-bar fixed-bottom text-center">
    <a href="<?= base_url('/') ?>" class="text-dark">
        <i class="fa fa-home"></i>
        Home </a>
    <a href="javascript:void(0)" class="text-dark" onclick="toggleSidebar('leftbar')">
        <i class="far fa-globe-americas"></i>
        Categories </a>

    <a href="javascript:void(0)" class="text-dark" onclick="toggleSidebar('rightbar')">
        <i class="fal fa-ticket-alt"></i>
        Private Rooms </a>

    <?php
    if (session('isLoggedIn') == false) {  ?>  
     <button  class="text-dark" data-bs-toggle="modal" data-bs-target="#loginModal">
            <i class="fa fa-sign-in"></i>
            Login </button>
    <?php } else {?>
        <a href="<?= base_url('user/logout') ?>" class="text-dark">
            <i class="fa fa-sign-in"></i>
            Logout </a>
        <?php } ?>


</div>
<style>
    .banner-section {
        padding: 174px 0 100px 0;
        background-image: url(https://script.bugfinder.net/prophecy/assets/uploads/logo/banner.jpg);
        background-position: center;
        background-size: cover;
    }
</style>
    <style>
        .banner-section {
            padding: 174px 0 100px 0;
            background-image: url(https://script.bugfinder.net/prophecy/assets/uploads/logo/banner.jpg);
            background-position: center;
            background-size: cover;
        }
    </style>