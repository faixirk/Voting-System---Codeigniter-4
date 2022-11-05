<footer class="footer text-center text-muted">
        Copyrights © 2022 All Rights Reserved By Prophecy </footer>

</div>
</div>



<script src="<?= base_url('public/assets/js/jquery.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/popper.min.js')?>"></script>
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
<script>
    $(document).ready(function() {
        $('.notiflix-confirm').on('click', function() {

        })
    })
</script>
<script src="<?= base_url('public/assets/js/axios.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/vue.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/pusher.min.js')?>"></script>
<script src="<?= base_url('public/assets/js/Chart.min.js')?>"></script>

<script>
    "use strict";

    $(document).on('click', '.user-login', function() {
        var id = $(this).data('id');
        $('.userId').val(id);
    });

    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: ["Day 01", "Day 02", "Day 03", "Day 04", "Day 05", "Day 06", "Day 07", "Day 08", "Day 09", "Day 10", "Day 11", "Day 12", "Day 13", "Day 14", "Day 15", "Day 16", "Day 17", "Day 18", "Day 19", "Day 20", "Day 21", "Day 22", "Day 23", "Day 24", "Day 25", "Day 26", "Day 27", "Day 28", "Day 29", "Day 30"],
            datasets: [{
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    label: "Bets",
                    borderColor: "#64ce18",
                    fill: false
                }, {
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    label: "Bet Profit",
                    borderColor: "#ff6f62",
                    fill: false
                }, {
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    label: "Bet Refund",
                    borderColor: "#eead0d",
                    fill: false
                },
                {
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    label: "Deposits",
                    borderColor: "#9b18cb",
                    fill: false
                }, {
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    label: "Payout",
                    borderColor: "#0dd2bb",
                    fill: false
                }
            ]
        }
    });


    new Chart(document.getElementById("pie-chart"), {
        type: 'pie',
        data: {
            labels: ["Stripe ", "PayStack", "Mollie", "Monnify", "RazorPay"],
            datasets: [{
                backgroundColor: ["#6fbbff", "#ff6f62", "#05ffe4", "#98df8a", "#8b6ef3", "#f9dd7e", "#f34da3"],
                data: [40, 60, 12, 12, 20],
            }]
        },
        options: {
            tooltips: {
                callbacks: {
                    label: function(tooltipItems, data) {
                        return data.labels[tooltipItems.index] + ': ' + data.datasets[0].data[tooltipItems.index] + '%';
                    }
                }

            }
        }
    });


    $(document).on('click', '#details', function() {
        var title = $(this).data('servicetitle');
        var description = $(this).data('description');
        $('#title').text(title);
        $('#servicedescription').text(description);
    });

    $(document).ready(function() {
        let isActiveCronNotification = '1';
        if (isActiveCronNotification == 1)
            $('#cron-info').modal('show');
        $(document).on('click', '.copy-btn', function() {
            var _this = $(this)[0];
            var copyText = $(this).parents('.input-group-append').siblings('input');
            $(copyText).prop('disabled', false);
            copyText.select();
            document.execCommand("copy");
            $(copyText).prop('disabled', true);
            $(this).text('Coppied');
            setTimeout(function() {
                $(_this).text('');
                $(_this).html('<i class="fas fa-copy"></i>');
            }, 500)
        });
    })
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