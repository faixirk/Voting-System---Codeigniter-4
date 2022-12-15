<?php
include 'includes/head.php';
if (session('type') == 'user') {
    include 'panel/user/includes/header.php';
} else {
    include 'includes/header.php';
}

?>


<section class="banner-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header-text text-center">
                    <h3>Latest Results</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<!-- faq section -->
<section class="faq-section faq-page">
    <div class="container">
        <div class="row g-4 gy-5 justify-content-center align-items-center">
            <div class="col-lg-12">
                <div class="accordion" id="accordionExample">
                    <?php
                    if ($votes) {
                        foreach ($votes as $vote) : ?>
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="heading0">
                                    <button class="accordion-button" type=" button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $vote['vote_id'] ?>" aria-expanded="true" aria-controls="collapse<?= $vote['vote_id'] ?>">
                                        <?= $vote['team_a'] ?>
                                        <img src="<?= base_url() ?>/public/uploads/votes/<?= $vote['banner1'] ?>" alt="user" class="rounded-circle mx-1" width="25" height="25">
                                        vs <img src="<?= base_url() ?>/public/uploads/votes/<?= $vote['banner2'] ?>" alt="user" class="rounded-circle mx-1" width="25" height="25">
                                        <?= $vote['team_b'] ?>
                                    </button>
                                </h5>
                                <div id="collapse<?= $vote['vote_id'] ?>" class="accordion-collapse collapse show" aria-labelledby="heading0" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <table class="table table-striped ">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Result</th>
                                                </tr>
                                            </thead>
                                            <tbody class="result-body">
                                                <tr>
                                                    <td data-label="#">1</td>
                                                    <td data-label="Name"><?= $vote['team_a'] ?></td>
                                                    <td data-label="Result">  <?= $vote['teama_votes'] ?> </td>
                                                </tr>
                                                <tr>
                                                    <td data-label="#">2</td>
                                                    <td data-label="Name"><?= $vote['team_b'] ?></td>
                                                    <td data-label="Result" >  <?= $vote['teamb_votes'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td data-label="#">3</td>
                                                    <td data-label="Name">Winner</td>
                                                    <td data-label="Result"> <?php if($vote['teama_votes'] > $vote['teamb_votes']){
                                                        echo 'Team A Winner';
                                                    } else if($vote['teamb_votes'] > $vote['teama_votes']){
                                                        echo 'Team B Winner';
                                                    }else if($vote['teamb_votes'] ==  $vote['teama_votes']){
                                                        echo 'Witdraw';
                                                    }else {
                                                        echo 'Failed';
                                                    }
                                                    
                                                    ?> </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
    </div>
</section>
<?php
include 'includes/footer1.php';
include 'includes/footer.php';
?>