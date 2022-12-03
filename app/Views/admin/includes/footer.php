<footer class="footer text-center text-muted">
            Copyrights © 2022 All Rights Reserved By Daily Voting       </footer>

    </div>
</div>



<script src="<?= base_url('public/assets/js/jquery.min.js')?>"></script>
<script src="https://script.bugfinder.net/prophecy/assets/global/js/popper.min.js"></script>
<script src="<?= base_url('public/assets/js/bootstrap.min.js')?>"></script>

<script src="<?= base_url('public/assets/js/bootstrap4-toggle.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/app-style-switcher.js')?>"></script>
<script src="<?= base_url('public/assets/js/feather.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/notiflix-aio-2.7.0.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/perfect-scrollbar.jquery.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/sidebarmenu.js')?>"></script>
<script src="<?= base_url('public/assets/js/select2.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/admin-mart.js')?>"></script>
<script src="<?= base_url('public/assets/js/custom.js')?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script>

    $(document).ready(function () {
        $('.notiflix-confirm').on('click', function () {

        })
        $('#users').DataTable({
        pagingType: 'full_numbers',
    });
    });
</script>
<script src="<?= base_url('public/assets/js/axios.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/vue.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/pusher.min.js')?>"></script>

<script>
        $(function () {
            $('select').selectpicker();
        });
    </script>

        <script>
        'use strict'
        $(document).ready(function () {
            $('.notiflix-confirm').on('click', function () {
                var route = $(this).data('route');
                $('.deleteRoute').attr('action', route)
            })
        });

        $(document).on('click', '#check-all', function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $(document).on('change', ".row-tic", function () {
            let length = $(".row-tic").length;
            let checkedLength = $(".row-tic:checked").length;
            if (length == checkedLength) {
                $('#check-all').prop('checked', true);
            } else {
                $('#check-all').prop('checked', false);
            }
        });

        //multiple active
        $(document).on('click', '.active-yes', function (e) {
            e.preventDefault();
            var allVals = [];
            $(".row-tic:checked").each(function () {
                allVals.push($(this).attr('data-id'));
            });

            var strIds = allVals;

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: "https://script.bugfinder.net/prophecy/admin/category-active",
                data: {strIds: strIds},
                datatType: 'json',
                type: "post",
                success: function (data) {
                    location.reload();

                },
            });
        });

        //multiple deactive
        $(document).on('click', '.inactive-yes', function (e) {
            e.preventDefault();
            var allVals = [];
            $(".row-tic:checked").each(function () {
                allVals.push($(this).attr('data-id'));
            });

            var strIds = allVals;
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: "https://script.bugfinder.net/prophecy/admin/category-deactive",
                data: {strIds: strIds},
                datatType: 'json',
                type: "post",
                success: function (data) {
                    location.reload();

                }
            });
        });

        $(document).on('click', '.editBtn', function () {

            var modal = $('#editModal');
            modal.find('input[name=title]').val($(this).data('title'));
            modal.find('#editIcon').selectpicker('val', $(this).data('icon'));
            modal.find('form').attr('action', $(this).data('action'));
            if ($(this).data('status') == 1) {
                $('#status').bootstrapToggle('on')
            } else {
                $('#status').bootstrapToggle('off')
            }
            modal.modal('show');
        });

        $(document).on('shown.bs.modal', '#editModal', function (e) {
            $(document).off('focusin.modal');
        });
        $(document).on('shown.bs.modal', '#newModal', function (e) {
            $(document).off('focusin.modal');
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
                    .then(function (res) {
                        app.items = res.data;
                    })
            },
            readAt(id, link) {
                let app = this;
                let url = "https://script.bugfinder.net/prophecy/admin/push-notification-readAt/0";
                url = url.replace(/.$/, id);
                axios.get(url)
                    .then(function (res) {
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
                    .then(function (res) {
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
                channel.bind('App\\Events\\AdminNotification', function (data) {
                    app.items.unshift(data.message);
                });
                channel.bind('App\\Events\\UpdateAdminNotification', function (data) {
                    app.getNotifications();
                });
            }
        }
    });
</script>
</body>
</html>
