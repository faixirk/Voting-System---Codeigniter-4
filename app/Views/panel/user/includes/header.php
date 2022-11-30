<body class="dark-mode">


    <!-- navbar -->
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img src="<?= base_url('/public/assets/DVL.png')?>" alt="homepage">
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
                        <a class="nav-link " href="<?= base_url('about') ?>">About</a>
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
                                <i class="fal fa-users-cog"></i>
                                Rooms </a>
                        </li>
                        <li>
                            <a href="<?= base_url('user/votes') ?>" class="dropdown-item">
                                <i class="fal fa-history" aria-hidden="true"></i>
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
                    <button class="dropdown-toggle" v-cloak>
                        <i class="fal fa-bell"></i>
                        <span v-if="items.length > 0" class="count">{{ items.length }}</span>
                    </button>
                    <ul class="notification-dropdown">
                        <div class="dropdown-box">
                            <li>
                                <a v-for="(item, index) in items" @click.prevent="readAt(item.id, item.description.link)" class="dropdown-item" href="javascript:void(0)">
                                    <i class="fal fa-bell"></i>
                                    <div class="text">
                                        <p v-cloak>{{ item.formatted_date }}</p>
                                        <span v-cloak v-html="item.description.text"></span>
                                    </div>
                                </a>
                            </li>
                        </div>
                        <div class="clear-all fixed-bottom">
                            <a v-if="items.length > 0" @click.prevent="readAll" href="javascript:void(0)">Clear all</a>
                            <a v-if="items.length == 0" href="javascript:void(0)">You have no notifications</a>
                        </div>
                    </ul>

                </div>
            </div>
        </div>
    </nav>