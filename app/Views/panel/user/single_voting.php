<?php
include 'includes/head.php';
include 'includes/header.php';
?>
<div class="wrapper">

  <!-- <div class="content user-panel chats"> -->

  <!-- leftbar -->
  <div class="leftbar" id="userPanelSideBar">
    <div>
      <h3>Room Members</h3>
      <table class="table">
        <th>Name</th>
        <th>Email</th>
        <?php foreach ($members as $m) :
          if ($m['has_joined'] == 'true') { ?>
            <tr>
              <td style="display:none;" id="groupID"><?= $m['group_id'] ?></td>
              <td><?= $m['first_name'] ?></td>
              <td><?= $m['user_email'] ?></td>
            </tr>
        <?php }
        endforeach; ?>
      </table>
    </div>
  </div>

  <!-- </div> -->
  <div class="content user-panel p-4">
  <?= if()
    <div class="row">

      <div class="col-6">
        <h4> Votes</h4>
      </div>
      <div class="col-8 "><button type="button" id="addModelBtn" class="btn btn-primary w-100" data-toggle="modal" data-target=".bd-example-modal-lg">Add Vote</button></div>

      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Vote</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form onsubmit="return false" class="p-0 m-0" id="vote-form" style="width: 100% !important; max-width: 100% !important" enctype="multipart/form-data">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                <div class="row mb-3">
                  <div class="form-group col-md-6">
                    <label for="team1">Team A</label>
                    <input type="text" class="form-control" placeholder="Team A" name="teamA" id="team1">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="team2">Team B</label>
                    <input type="text" class="form-control" placeholder="Team B" name="teamB" id="team2">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="form-group col-md-6">
                    <label for="categ">Category</label>
                    <select class="custom-select form-control mr-sm-2" name="category" required id="categ">
                      <option selected>Choose...</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="subCateg">Sub Category</label>
                    <select class="custom-select form-control mr-sm-2" required name="subCategory" id="subCateg">
                      <option selected>Choose...</option>
                    </select>
                  </div>
                            
                </div>
                <div class="row mb-3">
                  <div class="form-group col-md-6">
                    <label for="banner1">Banner 1</label>
                    <input type="file" class="form-control" placeholder="Team A Banner" name="banner1" id="banner1">

                  </div>
                  <div class="form-group col-md-6">
                    <label for="banner2">Banner 2</label>
                    <input type="file" class="form-control" placeholder="Team B Banner" name="banner2" id="banner2">

                  </div>
                </div>

                <div class="row mb-3">
                  <div class="form-group col-12">
                    <label for="desc">Description</label>
                    <textarea name="description" class="form-control" id="desc" required></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="form-group col-12">
                    <label for="type">Type</label>
                    <select class="custom-select form-control mr-sm-2" name="voteType" id="type" required>
                      <option default value="0">Choose...</option>
                      <option value="public">Public</option>
                      <option disabled value="2">Private</option>
                    </select>
                  </div>
                </div>

                <div class="modal-footer mr-3 my-2">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" id="addVote" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="rightbar">
      <div class="container py-5">

        <div class="row d-flex justify-content-end">
          <!-- <div class="col-md-4 col-lg-4 col-xl-4"> -->

            <div class="card" id="chat1" style="border-radius: 15px;">
              <div class="card-header d-flex justify-content-center p-3 bg-info text-white border-bottom-0" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <p class="mb-0 fw-bold">Private Chat</p>
              </div>
              <div class="card-body ">
                <form id="chatForm" action="" class="col-md-9 col-lg-12" method="POST">

                  <div class="d-flex  flex-row justify-content-start mb-4 DivWithScroll ">
                    <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;"> -->
                    <!-- <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);"> -->
                    <p id="getmsg" class="small mb-0 "></p>
                    <!-- </div> -->
                  </div>



                  <div class="form-outline">
                    <textarea class="form-control" name="message" id="msg" rows="2"></textarea>
                    <label class="form-label" for="textAreaExample">Type your message</label>
                    <span id="msg_err"></span>
                  </div>
                  <div class="form-group pt-3">
                    <button type="submit" id="send" class="btn btn-success">Send</button>
                  </div>
                </form>

              </div>
            </div>

          <!-- </div> -->
        </div>

      </div>
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
      var id = $("#groupID").html();
      $.ajax({
        type: "GET",
        url: '<?= base_url() ?>' + "/user/getmsg/" + id,
        async: true,
        dataType: 'JSON',
        success: function(data) {
          var html = "";
          for (i = 0; i < data.length; i++) {
            html +=
              "<div class='p-3 ms-3 mt-2 ' style='border-radius: 15px; background-color: rgba(57, 192, 237,.2);'>" +
              data[i].username +
              "<p>" + data[i].message + "</p>" +
              "<span class='time-right'>" + data[i].created_at + "</span></div>";
          }
          $("#getmsg").html(html);
        },
        error: function(err) {
          console.log(err);
        }
      });
    }

    $("#send").on('click', function(e) {
      e.preventDefault();
      var msg = $("#msg").val();
      var id = $("#groupID").html();

      $.ajax({
        type: "POST",
        url: '<?= base_url() ?>' + "/user/chat/" + id,
        dataType: 'JSON',
        data: {
          message: msg
        },
        data: $('#chatForm').serialize(),
        success: function(data) {
          console.log('sent');
          showmsg();
          $("#msg").val("");
        },
        error: function(err) {
          $("#msg_err").text(err.responseJSON.messages.message);
          $("#msg_err").addClass('text-danger');
        }
      });
    });
  });
</script>