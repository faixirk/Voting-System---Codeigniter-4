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
                           <?php foreach($requests as $req): ?>
                       
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
                    <a href="#">
                        <img src="#" class="downBars" />
                    </a>
                    <div class="label_text">
                        <h2>Football</h2>
                        <p class="mb-4">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit unde.
                        </p>
                        <a href="#"><button class="btn-custom"> place a bet</button></a>
                    </div>
                </li>
                <li>
                    <a href="#">
                        <img src="#" class="downBars" />
                    </a>
                    <div class="label_text">
                        <h2>Cricket</h2>
                        <p class="mb-4">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit unde.
                        </p>
                        <a href="#"><button class="btn-custom"> find out more</button></a>
                    </div>
                </li>
                <li>
                    <a href="#">
                        <img src="#" class="downBars" />
                    </a>
                    <div class="label_text">
                        <h2>Casino</h2>
                        <p class="mb-4">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit unde.
                        </p>
                        <a href="#"><button class="btn-custom"> play now</button></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- categories -->
    <div class="categories" id="categories">
        <a href="#" class="active">
            <i class="far fa-globe-americas"></i> <span>All Sports</span>
        </a>


        <?php foreach ($categories as $cat) : ?>
            <a href="#" class="">
                <i class="far fa-futbol" aria-hidden="true"></i> <span><?= $cat['cat_title']; ?></span>
            </a>
        <?php endforeach; ?>

    </div>
    


    


    <!-- Public Votes -->
    <?php foreach ($votes as $vote) : ?>
        <div class="table-parent table-responsive ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">

                        </th>
                        <th>

                        </th>

                        <th class="col-2">
                            Team A
                        </th>
                        <th class="col-2">
                            Team B
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p><span>
                                    Team A
                                </span></p>
                            <p><span>
                                    Team B
                                </span></p>
                            <p><span class="float-end"><a href="" class="me-2 d-none"><i aria-hidden="true" class="fal fa-chart-bar"></i></a></span></p>
                        </td>
                        <td>
                            <p><span><img src="#" alt="..">
                                    <?= $vote['team_a'] ?>
                                </span></p>
                            <p><span><img src="#" alt="..">
                                    <?= $vote['team_b'] ?>
                                </span></p>
                            <p><span class="float-end"><a href="" class="me-2 d-none"><i aria-hidden="true" class="fal fa-chart-bar"></i></a></span></p>
                        </td>
                        <td>
                            <div class="d-flex justify-content-evenly w-100">
                                <button type="button" class="voteCount teamA"  value="<?= $vote['vote_id'] ?>">Vote</button>

                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-evenly w-100">
                                <button type="button" class="voteCount teamB" value="<?= $vote['vote_id'] ?>" >Vote

                                </button>
                            </div>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    <?php endforeach; ?>


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
            var data = {id, classType};

            $.post("user/countvote", { id, classType }, (result)=> { 
                var obj = JSON.parse(result);
                            console.log(obj);
                            if(obj.status==true){
                                Swal.fire(
                                'Voted',
                                'Thanks for vote.',
                                'success'
                            )
                                }else{
                                    Swal.fire(
                                'Failed',
                                obj.message,
                                'info'
                            )
                            }
                            }
                            
                        
            );

        });


        $(".spinner-border").hide();
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
                        $(".spinner-border").hide();
                    }else if (data == 3) {
                        swal.fire({
                            'icon': 'info',
                            'text': "You need to login to join the group",
                        })
                        $(".btn-custom1").show();
                        $(".spinner-border").hide();
                    } 
                    else {
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