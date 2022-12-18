<?php 
    include 'includes/head.php';
    include 'includes/header.php';
    include 'includes/sidebar.php';
?>
 
        <div class="content user-panel">
            <div class="d-flex justify-content-between">
                <div>
                    <h4>Dashboard</h4>
                </div>
                <button class="btn-custom light toggle-user-panel-sidebar d-lg-none" onclick="toggleSidebar('userPanelSideBar')">
                    <i class="fal fa-sliders-h"></i>
                </button>
            </div>

            <!-- contents -->
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-10 mb-2">
                    <div class="dashboard__card">
                        <div class="dashboard__card-content">
                            <h2 class="price"><?= ($totalVotes) ? $totalVotes : '0' ?></h2>
                            <p class="info">Total Votes</p>
                        </div>
                        <div class="dashboard__card-icon">
                            <img src="<?= base_url('public/assets/images/icons/categories.png') ?>" alt="categories">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-10 mb-2">
                    <div class="dashboard__card">
                        <div class="dashboard__card-content">
                            <h2 class="price"><?= ($closeVotes) ? $closeVotes : '0' ?></h2>
                            <p class="info">Close Votes</p>
                        </div>
                        <div class="dashboard__card-icon">
                            <img src="<?= base_url('public/assets/images/icons/categories.png') ?>" alt="users">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-10 mb-2">
                    <div class="dashboard__card">
                        <div class="dashboard__card-content">
                            <h2 class="price"><?= ($activeVotes) ? $activeVotes : '0' ?></h2>
                            <p class="info">Active Votes</p>
                        </div>
                        <div class="dashboard__card-icon">
                            <img src="<?= base_url('public/assets/images/icons/categories.png') ?>" alt="...">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-10 mb-2">
                    <div class="dashboard__card">
                        <div class="dashboard__card-content">
                            <h2 class="price"><?= ($resultVotes) ? $resultVotes : '0' ?></h2>
                            <p class="info">Show Results</p>
                        </div>
                        <div class="dashboard__card-icon">
                            <img src="<?= base_url('public/assets/images/icons/categories.png') ?>" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 col-sm-12">
                    <div id="container" class="apexcharts-canvas"></div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="card">
                        <div class="card-body ">
                            <div class="table-parent table-responsive m-0">
                                <table class="table  table-striped" id="service-table">
                                    <thead>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Invest Amount</th>
                                            <th>Return Amount</th>
                                            <th>Charge</th>
                                            <th>Ratio</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Information</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td colspan="100%">No Data Found!</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
 

        </div>

    </div>


<?= include 'includes/footer.php'  ?>
<script>
  $(document).ready(function() {

    setInterval(function() {
      showmsg();
    }, 5000);

    showmsg();
      function showmsg() {
    //   var id = $("#groupID").html();
      $.ajax({
        type: "GET",
        url: '<?= base_url() ?>' + "/getNotification",
        // async: true,
        // dataType: 'JSON',
        success: function(data) {
          var html = "";
        //   alert(data);
          for (i = 0; i < data.length; i++) {
            html +=
              "<div class='p-3 ms-3 mt-2 ' style='border-radius: 15px; background-color: rgba(57, 192, 237,.2);'>" +
              data[i].user_id +
              "</div>";
          }
          $("#getNotification").html(html);
        },
        error: function(err) {
          console.log(err);
        }
      });
    }
  });

</script>
