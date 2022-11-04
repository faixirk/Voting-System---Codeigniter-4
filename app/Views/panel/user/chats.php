<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<div class="content user-panel chats">
    <div class="d-flex justify-content-between">
        <div>
            <h4> Chats</h4>
        </div>
        <div>
            <button class="btn-custom light toggle-user-panel-sidebar d-lg-none" id="userLst" onclick="toggleSidebar('userList')">
                <i class="far fa-users"></i>
            </button>

            <button class="btn-custom light toggle-user-panel-sidebar d-lg-none" onclick="toggleSidebar('userPanelSideBar')">
                <i class="fal fa-sliders-h"></i>
            </button>
        </div>

    </div>

    <div class="row justify-content-between">

        <div class="col-md-5 col-lg-3 leftbar d-none d-lg-block" id="userList">
            <div class="card">
            <div class="px-2 d-lg-none">
                        <button class="remove-class-btn light btn-custom" onclick="removeClass('userList')">
                            <i class="fal fa-chevron-left"></i>Back to Chat </button>
                    </div>
                <div class="form-group p-2">
                    <div class="input-group input-box">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text form-control copytext">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <ul class="list-unstyled chat-list mt-2 mb-0 px-4" style="height:70vh; overflow-y: scroll;">
                    
                    <li class=" d-flex my-2">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" height="40px" alt="avatar">
                        <div class="px-2">
                            <div class="name">Vincent Porter</div>
                            <small class="status d-none d-xl-block d-md-block d-sm-block"> <small class="fa fa-circle offline"></small> left 7 mins ago </small>
                        </div>
                    </li>
                    <li class=" d-flex my-2">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" height="40px" alt="avatar">
                        <div class="px-2">
                            <div class="name">Vincent Porter</div>
                            <small class="status d-none d-xl-block d-md-block d-sm-block"> <small class="fa fa-circle offline"></small> left 7 mins ago </small>
                        </div>
                    </li>
                    <li class=" d-flex my-2">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" height="40px" alt="avatar">
                        <div class=" px-2">
                            <div class="name">Vincent Porter</div>
                            <small class="status d-none d-xl-block d-md-block d-sm-block"> <small class="fa fa-circle offline"></small> left 7 mins ago </small>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-12 col-lg-9" id="userChat">
            <div class="card ">
                <div class="row">
                    <div class="chat_profile p-4">
                        <div class="d-flex px-3">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" height="40px" alt="avatar">
                            <div class=" px-2">
                                <div class="name">Vincent Porter</div>
                                <small class="status"> <small class="fa fa-circle offline"></small> left 7 mins ago </small>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <ul class="list-unstyled p-3" style="height:50vh; overflow-y: scroll;">
                                <li class="my-3">
                                    <div class="d-flex">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle" height="40px" alt="avatar">
                                        <div>
                                            <span class="px-3">Sender <small>10:10 AM, Today</small></span>
                                            <div class="" style="margin-left: 1.2rem;"> Hi Aiden, how are you? How is the project coming along? </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="my-3">
                                    <div class="d-flex justify-content-end">
                                        <div>
                                            <span style="text-align: right;" class="px-3 d-block"><small>10:10 AM, Today</small> You </span>
                                            <div class="" style="margin-right: 1.2rem;"> Hi Aiden, how are you? How is the project coming along? </div>

                                        </div>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle" height="40px" alt="avatar">
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <div class="row p-4 pb-3">
                        <div class="col-12 mx-2">
                            <div class="form-group">
                                <div class="input-group input-box">
                                    <input type="text" class="form-control" placeholder="Type here...">
                                    <div class="input-group-append">
                                        <span class="input-group-text form-control px-3 copytext">
                                            <i class="fas fa-paper-plane" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>




<script src="https://script.bugfinder.net/prophecy/assets/themes/betting/js/bootstrap.bundle.min.js"></script>
<script src="https://script.bugfinder.net/prophecy/assets/themes/betting/js/jquery-3.6.0.min.js"></script>



<script src="https://script.bugfinder.net/prophecy/assets/themes/betting/js/owl.carousel.min.js"></script>
<script src="https://script.bugfinder.net/prophecy/assets/themes/betting/js/masonry.pkgd.min.js"></script>
<script src="https://script.bugfinder.net/prophecy/assets/themes/betting/js/jquery.waypoints.min.js"></script>
<script src="https://script.bugfinder.net/prophecy/assets/themes/betting/js/jquery.counterup.min.js"></script>
<script src="https://script.bugfinder.net/prophecy/assets/themes/betting/js/jquery.easing.1.3.js"></script>
<script src="https://script.bugfinder.net/prophecy/assets/themes/betting/js/jquery.skitter.min.js"></script>
<script src="https://script.bugfinder.net/prophecy/assets/themes/betting/js/aos.js"></script>
<script src="https://script.bugfinder.net/prophecy/assets/themes/betting/js/jquery.fancybox.min.js"></script>
<script src="https://script.bugfinder.net/prophecy/assets/themes/betting/js/script.js"></script>


<script src="https://script.bugfinder.net/prophecy/assets/global/js/notiflix-aio-2.7.0.min.js"></script>
<script src="https://script.bugfinder.net/prophecy/assets/global/js/pusher.min.js"></script>
<script src="https://script.bugfinder.net/prophecy/assets/global/js/vue.min.js"></script>
<script src="https://script.bugfinder.net/prophecy/assets/global/js/axios.min.js"></script>

<!--Start of Google analytic Script-->
<script async src="https://www.googletagmanager.com/gtag/js?id="></script>
<script>
    "use strict";
    $(document).ready(function() {
        var MEASUREMENT_ID = "";
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', MEASUREMENT_ID);
    });
</script>
<!--End of Google analytic Script-->




<script>
    "use strict";
    var root = document.querySelector(':root');
    root.style.setProperty('--primary', '#8fb568');
</script>
<script>
    'use strict';
    let pushNotificationArea = new Vue({
        el: "#pushNotificationArea",
        data: {
            items: [],
        },
        mounted() {
            this.getNotifications();
            this.pushNewItem();
        },
        methods: {
            getNotifications() {
                let app = this;
                axios.get("https://script.bugfinder.net/prophecy/user/push-notification-show")
                    .then(function(res) {
                        app.items = res.data;
                    })
            },
            readAt(id, link) {
                let app = this;
                let url = "https://script.bugfinder.net/prophecy/user/push-notification-readAt/0";
                url = url.replace(/.$/, id);
                axios.get(url)
                    .then(function(res) {
                        if (res.status) {
                            app.getNotifications();
                            if (link != '#') {
                                window.location.href = link
                            }
                        }
                    })
            },
            readAll() {
                let app = this;
                let url = "https://script.bugfinder.net/prophecy/user/push.notification.readAll";
                axios.get(url)
                    .then(function(res) {
                        if (res.status) {
                            app.items = [];
                        }
                    })
            },
            pushNewItem() {
                let app = this;
                // Pusher.logToConsole = true;
                let pusher = new Pusher("1c6cc9b6da8d4322c22e", {
                    encrypted: true,
                    cluster: "ap2"
                });
                let channel = pusher.subscribe('user-notification.' + "174");
                channel.bind('App\\Events\\UserNotification', function(data) {
                    app.items.unshift(data.message);
                });
                channel.bind('App\\Events\\UpdateUserNotification', function(data) {
                    app.getNotifications();
                });
            }
        }
    });
</script>


<script>
    $(document).ready(function() {
        $(".language").find("select").change(function() {
            window.location.href = "https://script.bugfinder.net/prophecy/language/" + $(this).val()
        })
    })

    const darkMode = () => {
        var $theme = document.body.classList.toggle("dark-mode");
        $.ajax({
            url: "https://script.bugfinder.net/prophecy/themeMode/" + $theme,
            type: 'get',
            success: function(response) {
                console.log(response);
            }
        });
    };
</script>

</body>

</html>
<?= include 'includes/footer.php'  ?>