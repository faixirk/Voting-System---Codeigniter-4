    <!-- wrapper -->
    <div class="wrapper">
        <!-- leftbar -->
        <div class="leftbar" id="userPanelSideBar">
            <div class="px-2 d-lg-none">
                <button class="remove-class-btn light btn-custom" onclick="removeClass('userPanelSideBar')">
                    <i class="fal fa-chevron-left"></i>Back </button>
            </div>
           
            <div class="top profile">
                <h4 class="d-flex justify-content-between p-2">
                    Profile
                    <a href="<?= base_url('user/logout') ?>">
                        <button class="btn-custom light">
                            <i class="fal fa-sign-out-alt"></i>
                        </button>
                    </a>

                </h4>
                <img src="https://script.bugfinder.net/prophecy/assets/admin/images/default.png" alt="..." />
                <h5> User</h5>
            </div>
            <ul class="main">
                <li>
                    <a href="<?= base_url('user/dashboard') ?>" class="active">
                        <i class="fal fa-home"></i>
                        Dashboard </a>
                </li>


                <li>
                    <a href="<?= base_url('user/chats') ?>" class="">
                        <i class="far fa-comment-dots"></i>
                        Chats </a>
                </li>
                <li>
                    <a href="<?= base_url('user/groups') ?>">
                        <i class="fal fa-users-cog"></i>
                        Groups </a>
                </li>
                <li>
                    <a href="<?= base_url('user/history') ?>">
                        <i class="fal fa-history" aria-hidden="true"></i>
                        Voting history </a>
                </li>

                <li>
                    <a href="<?= base_url('user/profile') ?>" class="">
                        <i class="fal fa-user"></i>
                        personal profile </a>
                </li>
                <li>
                    <a href="<?= base_url('user/logout') ?>" class="">
                        <i class="fal fa-sign-out-alt"></i>
                        Logout </a>
                </li>
            </ul>
        </div>