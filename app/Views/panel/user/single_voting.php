<?php
include 'includes/head.php';
include 'includes/header.php';
?>
<div class="content user-panel chats">

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
  <div class="container py-5">

    <div class="row d-flex justify-content-end">
      <div class="col-md-4 col-lg-4 col-xl-4">

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