<?php
include 'includes/head.php';
if (session('isLoggedIn') == true) {
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
                    <?php foreach ($groups as $g) : ?>

                        <li class="list-group-item text-white bg-secondary"><?= $g['group_name'] ?>
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
        <div class="skitter skitter-large with-dots">
            <ul>
                <li>
                    <a href="https://script.bugfinder.net/prophecy/">
                        <img src="https://script.bugfinder.net/prophecy/assets/uploads/content/6323220cbcb231663246860.jpg" class="downBars" />
                    </a>
                    <div class="label_text">
                        <h2>Football</h2>
                        <p class="mb-4">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit unde.
                        </p>
                        <a href="https://script.bugfinder.net/prophecy/"><button class="btn-custom"> place a bet</button></a>
                    </div>
                </li>
                <li>
                    <a href="https://script.bugfinder.net/prophecy/">
                        <img src="https://script.bugfinder.net/prophecy/assets/uploads/content/63232267df3401663246951.jpg" class="downBars" />
                    </a>
                    <div class="label_text">
                        <h2>Cricket</h2>
                        <p class="mb-4">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit unde.
                        </p>
                        <a href="https://script.bugfinder.net/prophecy/"><button class="btn-custom"> find out more</button></a>
                    </div>
                </li>
                <li>
                    <a href="https://script.bugfinder.net/prophecy">
                        <img src="https://script.bugfinder.net/prophecy/assets/uploads/content/632322b1c7bcb1663247025.jpg" class="downBars" />
                    </a>
                    <div class="label_text">
                        <h2>Casino</h2>
                        <p class="mb-4">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit unde.
                        </p>
                        <a href="https://script.bugfinder.net/prophecy"><button class="btn-custom"> play now</button></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- categories -->
    <div class="categories" id="categories">
        <a href="https://script.bugfinder.net/prophecy" class="active">
            <i class="far fa-globe-americas"></i> <span>All Sports</span>
        </a>


        <?php foreach ($categories as $cat) : ?>
            <a href="#" class="">
                <i class="far fa-futbol" aria-hidden="true"></i> <span><?= $cat['cat_title']; ?></span>
            </a>
        <?php endforeach; ?>

    </div>
 

 

    <!-- Public Votes -->
    <div class="table-parent table-responsive ">
        <?php foreach ($votes as $vote) : ?> 
            <table class="table table-striped"> 
                <tbody>
                    <tr>
                        <td class="text-center"></td>
                        <td class="d-sm-flex d-xl-block d-lg-block">
                            <p><span>
                                    <?= $vote['team_a'] ?> 
                                </span>[A]</p>
                            <p><span>
                                    <?= $vote['team_b'] ?> 
                                </span>[B]</p>
                            <!-- <p>
                                <span class="float-end"><a href="#" class="me-2 d-none"><i aria-hidden="true" class="fal fa-chart-bar"></i></a></span>
                            </p> -->
                        </td> 
                        <td>
                            <div class="d-flex justify-content-evenly w-100">

                                <button type="button" class="voteCount teamA" value="<?= $vote['vote_id'] ?>">Vote Team A</button>
                                <button type="button" class="voteCount teamB" value="<?= $vote['vote_id'] ?>">Vote Team B</button>
                            </div>

                        </td> 
                    </tr>
                </tbody>
            </table>
        <?php endforeach; ?>
    </div>





</div>

</div>

<?php
include 'includes/footer.php';
?>
<script>
    $(document).ready(function() {

        $(".voteCount").click(function() {
            var id = $(this).val();
            var classType = this.className.split(" ")[1];
            var data = {
                id,
                classType
            };

            $.post("user/countvote", {
                    id,
                    classType
                }, (result) => {
                    var obj = JSON.parse(result);
                    console.log(obj);
                    if (obj.status == true) {
                        Swal.fire(
                            'Voted',
                            'Thanks for vote.',
                            'success'
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