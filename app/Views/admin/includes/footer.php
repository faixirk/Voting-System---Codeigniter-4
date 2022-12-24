<footer class="footer text-center text-muted">
    Copyrights © 2022 All Rights Reserved By Daily Voting </footer>

</div>
</div>



<script src="<?= base_url('public/assets/js/jquery.min.js') ?>"></script>
<script src="https://script.bugfinder.net/prophecy/assets/global/js/popper.min.js"></script>
<script src="<?= base_url('public/assets/js/bootstrap.min.js') ?>"></script>

<script src="<?= base_url('public/assets/js/bootstrap4-toggle.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/app-style-switcher.js') ?>"></script>
<script src="<?= base_url('public/assets/js/feather.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/notiflix-aio-2.7.0.min.js') ?>"></script>
<script src="https://script.bugfinder.net/prophecy/assets/admin/js/bootstrap-iconpicker.bundle.min.js"></script>
<script src="<?= base_url('public/assets/js/perfect-scrollbar.jquery.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/sidebarmenu.js') ?>"></script>
<script src="<?= base_url('public/assets/js/select2.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/admin-mart.js') ?>"></script>
<script src="<?= base_url('public/assets/js/custom.js') ?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<script>
    'use strict'
    $(document).ready(function() {

        $('.iconPicker').iconpicker({
            align: 'center', // Only in div tag
            arrowClass: 'btn-danger',
            arrowPrevIconClass: 'fas fa-angle-left',
            arrowNextIconClass: 'fas fa-angle-right',
            cols: 10,
            footer: true,
            header: true,
            icon: 'fas fa-bomb',
            iconset: 'fontawesome5',
            labelHeader: '{0} of {1} pages',
            labelFooter: '{0} - {1} of {2} icons',
            placement: 'bottom', // Only in button tag
            rows: 5,
            search: true,
            searchText: 'Search icon',
            selectedClass: 'btn-success',
            unselectedClass: ''
        }).on('change', function(e) {
            $(this).parent().siblings('.icon').val(`${e.icon}`);
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('.notiflix-confirm').on('click', function() {

        })
        $('#users').DataTable({
            pagingType: 'full_numbers',
        });
    });
</script>
<script src="<?= base_url('public/assets/js/axios.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/vue.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/pusher.min.js') ?>"></script>

<script>
    'use script'
    $(document).on('click', '.editBtn', function() {
        var modal = $('#editModal');
        var obj = $(this).data('resource');
        modal.find('input[name=name]').val(obj.name);
        $('.questionId').val(obj.id);
        $('#editStatus').val(obj.status);
        $('#editEndDate').val(obj.end_time);
        modal.find('form').attr('action', $(this).data('action'));
        modal.modal('show');
    });

    $(document).on('click', '.refundQuestion', function() {
        var modal = $('#refundQuestion-Modal');
        modal.find('form').attr('action', $(this).data('action'));
        modal.modal('show');
    });
</script>

<script>
    'use strict';
    let pushNotificationArea = new Vue({
        el: "#pushNotificationArea",
        data: {
            items: [],
        },
        beforeMount() {
            this.getNotifications();
            this.pushNewItem();
        },
        methods: {
            getNotifications() {
                let app = this;
                axios.get("https://script.bugfinder.net/prophecy/admin/push-notification-show")
                    .then(function(res) {
                        app.items = res.data;
                    })
            },
            readAt(id, link) {
                let app = this;
                let url = "https://script.bugfinder.net/prophecy/admin/push-notification-readAt/0";
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
                let url = "https://script.bugfinder.net/prophecy/admin/push.notification.readAll";
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
                let channel = pusher.subscribe('admin-notification.' + "1");
                channel.bind('App\\Events\\AdminNotification', function(data) {
                    app.items.unshift(data.message);
                });
                channel.bind('App\\Events\\UpdateAdminNotification', function(data) {
                    app.getNotifications();
                });
            }
        }
    });
</script>
</body>

</html>