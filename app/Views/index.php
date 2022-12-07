<?php
include 'includes/head.php';
if (session('type') == 'user') {
    include 'panel/user/includes/header.php';
} else {
    include 'includes/header.php';
}
include 'includes/sidebar.php';

?>


<!-- rightbar -->
<div class="rightbar" id="rightbar">

    <div class="top mb-3 d-flex">
        <button class="btn-custom me-1" disabled>
            <i class="fas fa-podcast"></i>
            Private Rooms </button>

    </div>

    <div class="col-12">
        <div class="mb-2">
            <div class="d-flex flex-column">
                <ul class="list-group ">
                    <?php foreach ($groups as $g) :  ?>

                        <li class="list-group-item text-white bg-secondary"><?= substr($g['group_name'], 0, 16) ?>
                            <button value="<?= $g['group_id'] ?>" class="btn-custom1 ">Join</button>


                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
</div>

<!-- contents -->
<div class="content">
    <!-- slider -->
    <div class="skitter-large-box">
        <div class="skitter skitter-large with-dots" style="width: 1019.2px; height: 300px;">
            <ul>
                <li><a href="#">
                        <img src="<?= base_url() ?>/public/uploads/banners/banner1.jpeg" class="downBars"></a>
                    <div class="label_text">
                        <h2>Football</h2>
                        <p class="mb-4"></p> <a href="#"><button class="btn-custom"> place a bet</button></a>
                    </div>
                </li>
                <li><a href="<?= base_url() ?>/public/uploads/banners/banner2.jpeg" class="downBars"></a>
                    <div class="label_text">
                        <h2>Cricket</h2>
                        <p class="mb-4"></p> <a href="#"><button class="btn-custom"> find out more</button></a>
                    </div>
                </li>
                <li><a href="#"><img src="<?= base_url() ?>/public/uploads/banners/banner3.jpeg" class="downBars"></a>
                    <div class="label_text">
                        <h2>Casino</h2>
                        <p class="mb-4"></p> <a href="#"><button class="btn-custom"> play now</button></a>
                    </div>
                </li>
            </ul>
            <a href="#" class="prev_button" style="display: none;">prev</a><a href="#" class="next_button" style="display: none;">next</a><span class="info_slide" style="display: none; left: 50%; transform: translateX(-50%);"><span class="image_number" rel="0" id="image_n_1_0">1</span> <span class="image_number image_number_select" rel="1" id="image_n_2_0">2</span> <span class="image_number" rel="2" id="image_n_3_0">3</span> </span>
            <div class="container_skitter" style="width: 1019.2px; height: 300px;">
                <div class="image">
                    <a href="#" target="_self"><img class="image_main" src="<?= base_url() ?>/public/uploads/banners/banner1.jpeg" style="width: 100%; height: auto; display: inline;"></a>
                    <div class="label_skitter" style="display: block;">
                        <h2>Daily Voting</h2>
                        <p class="mb-4"></p> <a href="#"><button class="btn-custom"> find out more</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- categories -->
    <div class="categories" id="categories">
        <a href="#" class="active">
            <i class="far fa-globe-americas"></i> <span>All Categories</span>
        </a>


        <?php foreach ($categories as $cat) : ?>
            <a href="#" class="">
                <i class="far fa-futbol" aria-hidden="true"></i> <span><?= $cat['cat_title']; ?></span>
            </a>
        <?php endforeach; ?>

    </div>

    <div class="live-matches ">
        <!-- <h5>Voting</h5> -->
        <?php if (session('isLoggedIn') == true) { ?>
            <a href="<?= base_url('user/votes') ?>" class="btn-custom w-100 my-2"> Add Votes </a>

        <?php } else { ?>
            <button class="btn-custom w-100 my-2" id="loginBtn" data-bs-toggle="modal" data-bs-target="#loginModal">
                Add Votes </button>
        <?php }  ?>


        <?php
        if ($votes) {
            foreach ($votes as $vote) : ?>

                <div class="box">
                    <!-- <h5 class="mb-3">WHO WILL WIN?</h5> -->
                    <div class="row d-flex justify-content-around align-items-center">
                        <div class="col-3 team">
                            <img src="<?= base_url() ?>/public/uploads/votes/<?= $vote['banner1'] ?>" style="border-radius: 50%" alt="A" class="img-fluid">
                            <p><?= $vote['team_a'] ?></p>
                        </div>
                        <div class="col-6"><span> </span>
                            <!----> <button class="btn-custom w-75 my-2 btn-info" value="<?= $vote['vote_id'] ?>">See More</button>
                        </div>
                        <div class="col-3 team">
                            <img src="<?= base_url() ?>/public/uploads/votes/<?= $vote['banner2'] ?>" alt="B" style="border-radius: 50%" class="img-fluid">
                            <p><?= $vote['team_b'] ?></p>
                        </div>
                        <div class="col-12 align-self-end">
                            <div class="d-flex justify-content-between">
                                <button type="button" class="voteCount teamA teamA<?= $vote['vote_id'] ?> btn-light  downgrade-mobile" value="<?= $vote['vote_id'] ?>">Vote Team A </button>
                                <button type="button" disabled="disabled" class="btn-light disabled downgrade-mobile result<?= $vote['vote_id'] ?>"></button>
                                <button type="button" class="voteCount teamB teamB<?= $vote['vote_id'] ?> btn-light  downgrade-mobile" value="<?= $vote['vote_id'] ?>">Vote Team B</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        } else { ?>
            <div class="box">
                <h5 class="mb-3">Empty List.</h5>
            </div>
        <?php } ?>
    </div>




</div>

</div>

<?php
include 'includes/footer.php';
?>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {


        $(".btn-info").click(function() {
            var id = $(this).val();
            if (id != null) {
                $.post("user/getDesc", {
                        id
                    }, (result) => {
                        var obj = JSON.parse(result);
                        if (obj.status == true) {
                            Swal.fire(
                                'Description',
                                ` <center>  ${obj.description} </center> `,
                            )
                        } else {

                            Swal.fire(
                                'Failed',
                                obj.message,
                                'info'
                            )
                        }
                    }


                );
            }
        })
        $(".voteCount").click(function() {
            var id = $(this).val();
            var classType = this.className.split(" ")[1];
            var data = {
                id,
                classType
            };
            if (id != null && classType != null) {
                $.post("user/countvote", {
                        id,
                        classType
                    }, (result) => {
                        var obj = JSON.parse(result);
                        var classa = `.result${id}`;
                        if (obj.status == true) {
                            $(classa).text(`${obj.teamA} -- ${obj.teamB}`);
                            Swal.fire(
                                'Voted',
                                'Thanks for vote.',
                                'success'
                            )
                        } else {
                            $(classa).text(`${obj.teamA} -- ${obj.teamB}`);

                            Swal.fire(
                                'Votes',
                                `${obj.message} <br> Votes: ${obj.teamA} -- ${obj.teamB}`,
                                'info'
                            )
                        }
                    }


                );
            }

        });


        $(".btn-custom1").click(function(e) {
            var id = $(this).val();
            $.ajax({
                url: '<?= base_url() ?>' + "/user/groups/requests/" + id,
                beforeSend: function() {
                    $(".btn-custom1").hide();
                },
                success: function(data) {
                    if (data == 0) {
                        swal.fire({
                            'icon': 'success',
                            'text': "Request Sent!",
                        });
                        $(".btn-custom1").show();
                    } else if (data == 2) {
                        swal.fire({
                            'icon': 'info',
                            'text': "Request Already Sent!",
                        })
                        $(".btn-custom1").show();
                    } else if (data == 3) {
                        swal.fire({
                            'icon': 'info',
                            'text': "You need to login to join the group",
                        })
                        $(".btn-custom1").show();
                    } else {

                        swal.fire({
                            'icon': 'error',
                            'text': "Request Failed!",
                        });

                        $(".btn-custom1").show();
                    }
                },
                error: function() {
                    swal.fire({
                        'icon': 'info',
                        'text': "Something unexpected happened. Please contact admin",
                    });
                }
            });
        })

    });
</script>