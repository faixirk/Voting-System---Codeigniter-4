<body class="dark-mode">


    <!-- navbar -->
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img src="<?= base_url('public/uploads/logo/' . $logo['header_logo'])?>" alt="homepage">
            </a>
            <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url() ?>">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('about-us') ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('contact') ?>">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-text">
                <button onclick="darkMode()" class="btn-custom light night-mode">
                    <i class="fal fa-moon"></i>
                </button>


                <div class="dropdown user-dropdown d-inline-block">
                    <button class="dropdown-toggle">
                        <i class="fal fa-user"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= base_url('user/dashboard') ?>" class=" dropdown-item active">
                                <i class="fal fa-home"></i>
                                Dashboard </a>
                        </li>

                        <li>
                            <a href="<?= base_url('user/chats') ?>" class="dropdown-item">
                                <i class="far fa-comment-dots"></i>
                                Chats </a>
                        </li>
                        <li>
                            <a href="<?= base_url('user/groups') ?> " class="dropdown-item">
                                <i class="fa fa-user-group"></i>
                                Rooms </a>
                        </li>
                        <li>
                            <a href="<?= base_url('user/votes') ?>" class="dropdown-item">
                                <i class="fal fa-box-ballot"></i>
                                Votes </a>
                        </li>

                        <li>
                            <a href="<?= base_url('user/profile') ?>" class="dropdown-item">
                                <i class="fal fa-user"></i>
                                Personal Profile </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="<?= base_url('user/logout') ?>">
                                <i class="fas fa-sign-out-alt"></i>
                                Sign Out </a>
                        </li>
                    </ul>
                </div>

                <!-- notification panel -->
                <div class="notification-panel" id="pushNotificationArea">
                    <button class="dropdown-toggle">
                        <i class="fal fa-bell"></i>
                        <span class="count">1</span>
                    </button>
                    <ul class="notification-dropdown">
                        <div class="dropdown-box">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fal fa-bell"></i>
                                    <div class="text">
                                        <p></p>
                                        <span id="getNotification"></span>
                                    </div>
                                </a>
                            </li>
                        </div>
                        <div class="clear-all fixed-bottom">
                            <a href="javascript:void(0)">Clear all</a>
                            <a href="javascript:void(0)">You have no notifications</a>
                        </div>
                    </ul>

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
            <button class="text-dark" data-bs-toggle="modal" data-bs-target="#loginModal">
                <i class="fa fa-sign-in"></i>
                Login </button>
        <?php } else { ?>
            <a href="<?= base_url('user/logout') ?>" class="text-dark">
                <i class="fa fa-sign-in"></i>
                Logout </a>
        <?php } ?>


    </div>