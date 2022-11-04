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
</script>
<script src="https://script.bugfinder.net/prophecy/assets/themes/betting/js/apexcharts.js"></script>
<script>
    'use strict'
    $(document).on('click', '.investLogList', function() {
        var obj = $(this).data('resource');
        var output = [];
        if (0 < obj.length) {
            obj.map(function(obj, i) {
                var tr =
                    `<tr>
                        <td data-label="#">${++i}</td>
                        <td data-label="Match Name">${(obj).match_name}</td>
                        <td data-label="Category Name">${obj.category_icon} ${obj.category_name}</td>
                        <td data-label="Tournament Name">${obj.tournament_name}</td>
                        <td data-label="Question Name">${obj.question_name}</td>
                        <td data-label="Option Name">${obj.option_name}</td>
                        <td data-label="Ratio">${obj.ratio}</td>
                        <td data-label="Result">
                            ${(obj.status == '0') ? ` <span class='badge bg-warning'>Processing</span>` : ''}
                            ${(obj.status == '2') ? ` <span class='badge bg-success'>Win</span>` : ''}
                            ${(obj.status == '-2') ? ` <span class='badge bg-danger'>Lose</span>` : ''}
                            ${(obj.status == '3') ? ` <span class='badge bg-secondary'>Refunded</span>` : ''}

                        </td>
                    </tr>`;

                output[i] = tr;
            });

        } else {
            output[0] = `
                        <tr>
                            <td colspan="100%" class=""text-center>No Data Found</td>
                        </tr>`;
        }

        $('.result-body').html(output);
    });

    var options = {
        theme: {
            mode: 'dark',
        },
        series: [{
                name: "Invested",
                color: '#8fb568',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
            },

        ],
        chart: {
            type: 'bar',
            // height: ini,
            background: '#294056 ',
            toolbar: {
                show: false
            }

        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ["Day 01", "Day 02", "Day 03", "Day 04", "Day 05", "Day 06", "Day 07", "Day 08", "Day 09", "Day 10", "Day 11", "Day 12", "Day 13", "Day 14", "Day 15", "Day 16", "Day 17", "Day 18", "Day 19", "Day 20", "Day 21", "Day 22", "Day 23", "Day 24", "Day 25", "Day 26", "Day 27", "Day 28", "Day 29", "Day 30"],

        },
        yaxis: {
            title: {
                text: ""
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            colors: ['#000'],
            y: {
                formatter: function(val) {
                    return val + " USD"
                }
            }
        }
    };
    var chart = new ApexCharts(document.querySelector("#container"), options);
    chart.render();
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