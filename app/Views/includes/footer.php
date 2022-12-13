<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Login here</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="login-form" id="login-form" action="<?= base_url('login/auth') ?>" method="post">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                    <div class="row g-4">
                        <div class="input-box col-12">
                            <input type="text" autocomplete="off" id="email1" name="email" class="form-control" placeholder="Email" />
                            <span class="text-danger emailError"></span>
                        </div>
                        <div class="input-box col-12">
                            <input type="password" name="password" id="password1" autocomplete="off" class="form-control" placeholder="Password" />
                            <span class="text-danger passwordError"></span>
                        </div>
                        <div class="col-12">
                            <div class="links">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" autocomplete="off" value="" id="flexCheckDefault" name="remember" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me </label>
                                </div>
                                <a href="<?= base_url('user/reset/password') ?>">Forgot password?</a>
                            </div>
                        </div>
                    </div>

                    <button type="submit" id="loginBtn" class="btn-custom w-100">sign in</button>
                    <div class="bottom">
                        Don't have an account?
                        <a id="registerform" href="#">Create account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Join us</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="login-form" id="signup-form" action="<?= base_url('register/add') ?>" method="post">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                    <div class="row g-4">
                        <div class="input-box col-12">
                            <input type="text" id="f_name" autocomplete="off" name="f_name" value="" class="form-control" placeholder="First Name" />
                            <span class="text-danger f_nameError"></span>
                        </div>
                        <div class="input-box col-12">
                            <input type="text" id="l_name" autocomplete="off" name="l_name" value="" class="form-control" placeholder="Last name" />
                            <span class="text-danger l_nameError"></span>
                        </div>

                        <div class="input-box col-12">
                            <input type="email" id="email" autocomplete="off" name="email" value="" class="form-control" placeholder="Email address" />
                            <span class="text-danger emailError"></span>
                        </div>
                        <div class="input-box col-12">
                            <input type="password" id="password" name="password" value="" class="form-control" placeholder="Password" />
                            <span class="text-danger passwordError"></span>
                        </div>

                    </div>
                    <button id="loadingBtn1" class="btn-custom w-100" type="button" disabled>
                        Verifying...
                    </button>
                    <button type="submit" id="submitBtn" class="btn-custom w-100 mt-3 login-signup-auth-btn">sign up</button>
                    <div class="bottom">
                        Already have an account?
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#loginModal">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('public/assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/masonry.pkgd.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/jquery-3.6.0.min.js') ?>"></script>


<script src="<?= base_url('public/assets/js/jquery.skitter.min.js') ?>"></script>
<!-- <script src="https://script.bugfinder.net/prophecy/assets/themes/betting/js/jquery.easing.1.3.js"></script> -->
<script src="<?= base_url('public/assets/js/owl.carousel.min.js') ?>"></script>


<script src="<?= base_url('public/assets/js/jquery.waypoints.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/jquery.counterup.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/aos.js') ?>"></script>
<script src="<?= base_url('public/assets/js/jquery.fancybox.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/script.js') ?>"></script>


<script src="<?= base_url('public/assets/js/pusher.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/vue.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/axios.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/notiflix-aio-2.7.0.min.js') ?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--Start of Google analytic Script-->
<script async src="<?= base_url('public/assets/js/gtag/google-analytic.js') ?>"></script>
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




<script>
    "use strict";
    var root = document.querySelector(':root');
    root.style.setProperty('--primary', '#8fb568');
</script>



<script>
    let getMatchList = new Vue({
        el: "#getMatchList",
        data: {

            loaded: true,
            currency_symbol: "$",
            currency: "USD",
            minimum_bet: "5",
            allSports_filter: [],
            upcoming_filter: [],

            selectedData: {},
            betSlip: [],
            totalOdds: 0,
            minimumAmo: 1,
            return_amount: 0,
            win_charge: "0",
            form: {
                amount: ''
            },
            showType: 'live'
        },
        mounted() {
            var showType = localStorage.getItem('showType');
            if (showType == null) {
                localStorage.setItem("showType", 'live');
            }
            this.showType = localStorage.getItem("showType")

            this.getMatches();
            this.getSlip();
            this.getEvents();


        },
        methods: {
            async getMatches() {
                var _this = this;
                var _segment = ""
                var routeName = "home"
                var $lastSegment = ""

                var $url = 'https://script.bugfinder.net/prophecy/allSports';

                if (routeName == 'category') {
                    $url = 'https://script.bugfinder.net/prophecy/allSports?categoryId=' + $lastSegment;
                }
                if (routeName == 'tournament') {
                    $url = 'https://script.bugfinder.net/prophecy/allSports?tournamentId=' + $lastSegment;
                }

                if (routeName == 'match') {
                    $url = 'https://script.bugfinder.net/prophecy/allSports?matchId=' + $lastSegment;
                }


                await axios.get($url)
                    .then(function(response) {
                        _this.allSports_filter = response.data.liveList;
                        _this.upcoming_filter = response.data.upcomingList;
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            addToSlip(data) {
                if (data.is_unlock_question == 1 || data.is_unlock_match == 1) {
                    return 0;
                }
                var _this = this;
                const index = _this.betSlip.findIndex(object => object.match_id === data.match_id);
                if (index === -1) {
                    _this.betSlip.push(data);
                    Notiflix.Notify.Success("Added to Bet slip");
                } else {
                    var result = _this.betSlip.map(function(obj) {
                        if (obj.match_id == data.match_id) {
                            obj = data
                        }
                        return obj
                    });
                    _this.betSlip = result

                    Notiflix.Notify.Info("Bet slip has been updated");
                }
                _this.totalOdds = _this.oddsCalc(_this.betSlip)
                localStorage.setItem("newBetSlip", JSON.stringify(_this.betSlip));
            },
            getSlip() {
                var _this = this;
                var selectData = JSON.parse(localStorage.getItem('newBetSlip'));
                if (selectData != null) {
                    _this.betSlip = selectData;
                } else {
                    _this.betSlip = []
                }
                _this.totalOdds = _this.oddsCalc(_this.betSlip)
            },

            removeItem(obj) {
                var _this = this;
                _this.betSlip.splice(_this.betSlip.indexOf(obj), 1);
                _this.totalOdds = _this.oddsCalc(_this.betSlip)

                var selectData = JSON.parse(localStorage.getItem('newBetSlip'));
                var storeIds = selectData.filter(function(item) {
                    if (item.id === obj.id) {
                        return false;
                    }
                    return true;
                });
                localStorage.setItem("newBetSlip", JSON.stringify(storeIds));
            },

            oddsCalc(obj) {
                var ratio = 1;
                for (var property in obj) {
                    ratio *= parseFloat(obj[property].ratio);
                }
                return ratio.toFixed(3);
            },

            decrement() {
                if (this.form.amount > this.minimumAmo) {
                    this.form.amount--;
                    this.return_amount = parseFloat(this.form.amount * this.totalOdds).toFixed(3);

                    return 0;
                }
                return 1;
            },
            increment() {
                this.form.amount++;
                this.return_amount = parseFloat(this.form.amount * this.totalOdds).toFixed(3);
                return 0;
            },
            calc(val) {
                if (isNaN(val)) {
                    val = 0
                }
                if (0 >= val) {
                    val = 0;
                }
                this.return_amount = parseFloat(val * this.totalOdds).toFixed(2);
            },

            goMatch(item) {
                var $url = 'https://script.bugfinder.net/prophecy/match/:match_name/:match_id';
                $url = $url.replace(':match_name', item.slug);
                $url = $url.replace(':match_id', item.id);
                window.location.href = $url;
            },

            getEvents() {
                let _this = this;
                // Pusher.logToConsole = true;
                let pusher = new Pusher("1c6cc9b6da8d4322c22e", {
                    encrypted: true,
                    cluster: "ap2"
                });
                var channel = pusher.subscribe('match-notification');

                channel.bind('App\\Events\\MatchNotification', function(data) {
                    console.log(data)
                    if (data && data.type == 'Edit') {
                        _this.updateEventData(data)
                    } else if (data && data.type != 'Edit') {
                        _this.enlistedEventData(data)
                    }
                });

            },
            updateEventData(data) {
                var _this = this;
                var list = _this.allSports_filter;
                const result = list.map(function(obj) {
                    if (obj.id == data.match.id) {
                        obj = data.match
                    }
                    return obj
                });
                _this.allSports_filter = result


                var list2 = _this.upcoming_filter;


                const upcomingResult = list2.map(function(obj) {
                    if (obj.id == data.match.id) {
                        obj = data.match
                    }
                    return obj
                });

                _this.upcoming_filter = upcomingResult
            },
            enlistedEventData(data) {
                var _this = this;
                if (data && data.type == 'Enlisted') {
                    var list = _this.allSports_filter;
                    list.push(data.match);
                }
                if (data && data.type == 'UpcomingList') {
                    var upcomingList = _this.upcoming_filter;
                    upcomingList.push(data.match);
                }
            },
            betPlace() {
                var _this = this;
                var authCheck = ""
                if (authCheck !== '1') {
                    window.location.href = "https://script.bugfinder.net/prophecy/login"
                    return 0;
                }
                if (_this.betSlip.length == 0) {
                    Notiflix.Notify.Failure("Please make a bet slip");
                    return 0
                }
                if (_this.form.amount == '') {
                    Notiflix.Notify.Failure("Please put a amount");
                    return 0
                }
                if (0 > (_this.form.amount)) {
                    Notiflix.Notify.Failure("Please put a valid amount");
                    return 0
                }
                if (parseInt(_this.minimum_bet) > parseInt(_this.form.amount)) {
                    Notiflix.Notify.Failure("Minimum Bet " + _this.minimum_bet + " " + _this.currency);
                    return 0
                }
                axios.post('https://script.bugfinder.net/prophecy/user/betSlip', {
                        amount: _this.form.amount,
                        activeSlip: _this.betSlip,
                    })
                    .then(function(response) {
                        if (response.data.errors) {
                            for (err in response.data.errors) {
                                let error = response.data.errors[err][0]
                                Notiflix.Notify.Failure("" + error);
                            }
                            return 0;
                        }
                        if (response.data.newSlipMessage) {
                            Notiflix.Notify.Warning("" + response.data.newSlipMessage);
                            var newSlip = response.data.newSlip;
                            var unlisted = _this.getDifference(_this.betSlip, newSlip);
                            const newUnlisted = unlisted.map(function(obj) {
                                obj.is_unlock_match = 1;
                                obj.is_unlock_question = 1;
                                return obj
                            });
                            _this.betSlip.concat(newSlip, newUnlisted);
                            localStorage.setItem("newBetSlip", JSON.stringify(_this.betSlip));
                            return 0;
                        }

                        if (response.data.success) {
                            _this.betSlip = [];
                            localStorage.setItem("newBetSlip", JSON.stringify(_this.betSlip));
                            Notiflix.Notify.Success("Your bet has place successfully");

                            return 0;
                        }

                    })
                    .catch(function(err) {

                    });
            },

            getDifference(array1, array2) {
                return array1.filter(object1 => {
                    return !array2.some(object2 => {
                        return object1.id === object2.id;
                    });
                });
            },
            slicedArray(items) {
                return Object.values(items)[0];
            },
            liveUpComing(type) {
                localStorage.setItem("showType", type);
                this.showType = type
            }


        }
    });
</script>
<script>
    "use strict";
    $(document).ready(function() {
        setDialCode();
        $(document).on('change', '.dialCode-change', function() {
            setDialCode();
        });

        function setDialCode() {
            let currency = $('.dialCode-change').val();
            $('.dialcode-set').val(currency);
        }

    });
</script>


<script>
    $(document).ready(function() {
        $(".language").find("select").change(function() {
            window.location.href = "https://script.bugfinder.net/prophecy/language/" + $(this).val()
        })
    })
    // dark mode
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
    $(document).ready(function() {
        $('#loadingBtn1').hide();
        $('#registerform').click(() => {
            $('#loginModal').hide();
            $('#registerBtn').click();
        })

        $('#signup-form').submit(e => {
            $('#loadingBtn1').show();
            $('#submitBtn').hide();
            e.preventDefault();
            var f_name = $('#f_name').val();
            var l_name = $('#l_name').val();
            var email = $('#email').val();
            var pass = $('#password').val();

            if (f_name != "" && l_name != "" && email != "" && pass != "") {
                var tokenHash = jQuery("input[name=csrf_token_name]").val();
                var form = $('#signup-form');
                var url = $('#signup-form').attr('action');
                $.ajax({
                    url: url,
                    type: "POST",
                    data: form.serialize(),
                    dataType: 'json',
                    beforeSend: function(xhr) {
                        $('#submitBtn').add('disable', true);
                        xhr.setRequestHeader('X-CSRF-Token', tokenHash);
                    },
                    success: (response) => {
                        if (response.status == '404') {
                            $('#loadingBtn1').hide();
                            $('#submitBtn').show();
                            swal.fire({
                                'icon': 'error',
                                'title': response.status,
                                'text': response.message
                            })
                            
                        } else if (response.status) {


                            $('#signup-form').trigger("reset");
                            $('#loadingBtn1').hide();
                            $('#submitBtn').show();
                            swal.fire({
                                'icon': 'success',
                                'title': 'Registered',
                                'text': response.message
                            }).then((error) => {
                                $('#registerModal').hide();
                                $('#loginBtn').click();

                            })
                        } else if (!response.status) {
                            $('#loadingBtn1').hide();
                            $('#submitBtn').show();
                            swal.fire({
                                'icon': 'error',
                                'title': response.type,
                                'text': response.message
                            })
                           
                        }

                    },
                    error: (error) => {
                        console.log(error);
                        console.log(error.type + error.message);
                        swal.fire({
                            'icon': 'error',
                            'title': error.type,
                            'text': error.message
                        })
                        $('#loadingBtn1').hide();
                        $('#submitBtn').show();
                    },
                });
            } else {
                swal.fire("Please fill all the fields");
                $('#loadingBtn1').hide();

                $('#submitBtn').show();

            }
            return false;
        });

        $('#login-form').submit(e => {
                e.preventDefault();

                var email = $('#email1').val();
                var pass = $('#password1').val();

                if (email != "" && pass != "") {
                    var tokenHash = jQuery("input[name=csrf_token_name]").val();
                    var form = $('#login-form');
                    var url = $('#login-form').attr('action');
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: form.serialize(),
                        dataType: 'json',
                        beforeSend: function(xhr) {
                            $('#loginBtn').add('disable', true);
                            xhr.setRequestHeader('X-CSRF-Token', tokenHash);
                        },
                        success: (response) => {
                            if (response.status) {
                                $('#login-form').trigger("reset");

                                swal.fire({
                                    'icon': 'success',
                                    'title': 'Authenticated',
                                    'text': response.message
                                }).then((error) => {
                                    $('#loginModal').hide();
                                    window.location.replace = '/';
                                })
                                window.location.href = '<?= base_url() ?>' + "/user/dashboard";
                            } else {
                                swal.fire({
                                    'icon': 'error',
                                    'title': response.type,
                                    'text': response.message
                                })
                            }
                        },
                        error: (error) => {
                            swal.fire({
                                'icon': 'error',
                                'title': error.type,
                                'text': error.message
                            })
                        },
                    });
                } else {
                    swal.fire({
                        'icon': 'info',
                        'text': "Please fill all the fields"
                    });
                }
                return false;
            }

        )


    });
</script>

</body>

</html>