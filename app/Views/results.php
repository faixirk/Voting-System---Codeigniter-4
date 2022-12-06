<?php
include 'includes/head.php';
include 'includes/header.php';
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
                                                    <td data-label="Name"><?= $vote['team_b'] ?></td>
                                                    <td data-label="Result" on="getResultA()">REL</td>
                                                </tr>
                                                <tr>
                                                    <td data-label="#">2</td>
                                                    <td data-label="Name"><?= $vote['team_b'] ?></td>
                                                    <td data-label="Result">N/A</td>
                                                </tr>
                                                <tr>
                                                    <td data-label="#">3</td>
                                                    <td data-label="Name">Winner</td>
                                                    <td data-label="Result">N/A</td>
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
<script>
    
    function getResultA(){
    console.log("Fsdsdf");
            alert(123);
    
    }
</script>