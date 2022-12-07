<body>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

    <header class="topbar" data-navbarbg="skin6">

    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <div class="navbar-brand">
                <a href="#">

                    <span class="logo-text">
                        <img src="<?= base_url('public/uploads/logo/'. $logo['header_logo'])?>" alt="homepage"
                             class="dark-logo"/>
                        <img src="<?= base_url('public/uploads/logo/'. $logo['header_logo'])?>" class="light-logo"
                             alt="homepage"/>
                    </span>
                </a>
            </div>

            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
               data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ti-more"></i></a>
        </div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                
            </ul>

            <ul class="navbar-nav float-right">
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="javascript:void(0)">
                        <form class="navbar-search-form" onsubmit="return false;">
                            <div class="customize-input">
                                <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                       type="search" name="navbar_search" id="navbar_search" autocomplete="off"
                                       placeholder="Search" aria-label="Search">
                                <i class="form-control-icon" data-feather="search"></i>
                            </div>

                            <div id="navbar_search_result_area">
                                <ul class="navbar_search_result"></ul>
                            </div>
                        </form>
                    </a>
                </li>

                <!-- ============================================================== -->
                <!-- User profile and search
                .ti-menu:before {
                content: "\e68e";
                }
                -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">


                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <img src="<?= base_url('public/uploads/profile/avatar.jpg')?>"
                             alt="user"
                             class="rounded-circle width-40p">
                        <span class="ml-2 d-none d-lg-inline-block"><span class="text-dark">Hello,</span> <span
                                class="text-dark"><?= session('name'); ?></span> <i
                                data-feather="chevron-down"
                                class="svg-icon"></i></span>
                    </a>


                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">

                        <a class="dropdown-item" href="<?= base_url('admin/profile')?>">
                            <i class="svg-icon mr-2 ml-1 icon-user"></i>
                            Profile                        </a>

                        <a class="dropdown-item" href="<?= base_url('admin/password')?>">
                            <i class="svg-icon mr-2 ml-1 icon-settings"></i>
                            Password                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('admin/logout')?>"
                           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                                data-feather="power" class="svg-icon mr-2 ml-1"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="<?= base_url('admin/logout')?>" method="POST" class="d-none">
                            <input type="hidden" name="_token" value="Z01n56aiJaPYjOYNxpjAZhpYPXqJGXpjQdgO9En2">                        </form>

                    </div>
                </li>


            </ul>
        </div>

    </nav>
</header>