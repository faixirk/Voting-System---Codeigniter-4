<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>




<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Result History</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item text-muted" aria-current="page"> Result History</li>
                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>

    <div class="page-header card card-primary m-0 m-md-4 my-4 m-md-0 p-5 shadow">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <form action="#" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="search" value="" class="form-control" placeholder="Questions or teams name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="date" class="form-control" name="date_time" id="datepicker" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn w-100  btn-primary"><i class="fas fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card card-primary m-0 m-md-4  m-md-0 shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered" id="zero_config">
                    <thead class="thead-dark">
                        <tr>
                            <th>SL No.</th>
                            <th>Question</th>
                            <th class="text-center">Match</th>
                            <th>Start Time</th>
                            <th>Winner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($votes as $v) :
                            $count++;
                        ?>
                            <tr>
                                <td data-label="SL No."><?= $count ?></td>
                                <td data-label="Question">Who will win?</td>
                                <td data-label="Match">
                                    <div class="d-lg-flex d-block align-items-center ">
                                        <div class="mr-3 cursor-pointer" title="Team A">
                                            <small class="text-dark font-weight-bold"><?= $v['team_a'] ?></small>
                                        </div>
                                        <div class="mr-2 cursor-pointer" title="CSK">
                                            <img src="<?= base_url('public/uploads/votes/' . $v['banner1']) ?>" alt="user" class="rounded-circle" width="25" height="25">
                                        </div>
                                        <small class="font-italic mb-0 font-16 ">vs</small>

                                        <div class="mr-3 ml-2 cursor-pointer" title="Team B">
                                            <img src="<?= base_url('public/uploads/votes/' . $v['banner2']) ?>" alt="user" class="rounded-circle" width="25" height="25">
                                        </div>
                                        <div class="cursor-pointer" title="KKR">
                                            <small class="text-dark font-weight-bold"><?= $v['team_b'] ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="End Time">
                                    <?= $v['created_at'] ?>
                                </td>
                                <?php if ($v['teama_vote'] > $v['teamb_vote']) { ?>
                                <td data-label="Predictions"><span class="badge badge-success"><?= $v['team_a']?></span></td>
                                <?php } else if($v['teama_vote'] < $v['teamb_vote']){ ?>
                                    <td data-label="Predictions"><span class="badge badge-success"><?= $v['team_b']?></span></td>
                                <?php } else{?>
                                    <td data-label="Predictions"><span class="badge badge-info"> In-progress</span></td>
                                    <?php } ?>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <nav id="pagination">
                </nav>

            </div>
        </div>
    </div>



    <?php
    include 'includes/footer.php';
    ?>