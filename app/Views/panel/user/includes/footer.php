<script src="<?= base_url('public/assets/js/jquery-3.6.1.min.js')?>"  ></script>
<script src="<?= base_url('public/assets/js/bootstrap.bundle.min.js')?>"></script>

 
<script src="<?= base_url('public/assets/js/popper.min.js')?>" ></script>
<script src="<?= base_url('public/assets/js/bootstrap.min.js')?>" ></script>

<script src="<?= base_url('public/assets/js/owl.carousel.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/masonry.pkgd.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/jquery.waypoints.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/jquery.counterup.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/jquery.easing.1.3.js')?>"></script>
<script src="<?= base_url('public/assets/js/jquery.skitter.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/aos.js')?>"></script>
<script src="<?= base_url('public/assets/js/jquery.fancybox.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/script.js')?>"></script>


<script src="<?= base_url('public/assets/js/notiflix-aio-2.7.0.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/pusher.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/vue.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/axios.min.js')?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<link
  rel="stylesheet"
  href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"
  type="text/css"
/>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <script>
  loadLogo();
  function loadLogo() {
    $.ajax({
      url: "<?= base_url() ?>" + "/user/logo",
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        var path = `<?= base_url("/public/uploads/profile/") ?>/${data.pic}`; 
        $("#logo").attr("src",`${path}`); 
        $('#image_preview_container').attr("src",`${path}`); 
      }, 

    });
  }
</script> -->
<script>
    "use strict";
    var root = document.querySelector(':root');
    root.style.setProperty('--primary', '#8fb568');
</script>
<!-- <script>
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
                let channel = pusher.subscribe('user-notification.' + "171");
                channel.bind('App\\Events\\UserNotification', function(data) {
                    app.items.unshift(data.message);
                });
                channel.bind('App\\Events\\UpdateUserNotification', function(data) {
                    app.getNotifications();
                });
            }
        }
    });
</script> -->
 


<script>
  

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
<script>
  
    var width = $(window).width();

    if ((width >= 992)) {
        $('#userList').removeClass('leftbar');
    } else {
        $('#userList').addClass('leftbar');
    }
    $('#userLst').click(() => {
        $('#userList').removeClass('d-none d-lg-block');
        $('#userList').addClass('d-block');
    });
</script>

</body>

</html>