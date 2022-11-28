<?php
include 'includes/head.php';
include 'includes/header.php';
?>
<div class="wrapper">
  <!-- leftbar -->
  <div class="leftbar" id="userPanelSideBar">
    <div>
      <h3>Room Members</h3>
      <table class="table">
        <th>ID</th>
        <th>Name</th>
        <?php foreach ($members as $m) : ?>
          <tr>
            <td><?= $m['user_id'] ?></td>
            <td><?= $m['first_name'] ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>

  </div>
  <div class="container py-5">

    <div class="row d-flex justify-content-end">
      <div class="col-md-8 col-lg-6 col-xl-4">

        <div class="card" id="chat1" style="border-radius: 15px;">
          <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <i class="fas fa-angle-left"></i>
            <p class="mb-0 fw-bold">Live chat</p>
            <i class="fas fa-times"></i>
          </div>
          <div class="card-body">
           <form id="chatForm" action="" class="col-md-12 col-lg-9"  method="POST">

             <div class="d-flex flex-row justify-content-start mb-4">
               <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
              <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                <p class="small mb-0">Hello and thank you for visiting MDBootstrap. Please click the video
                  below.</p>
                </div>
              </div>
              
              <div class="d-flex flex-row justify-content-end mb-4">
                <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                  <p class="small mb-0">Thank you, I really like your product.</p>
              </div>
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
            </div>
            
            <div class="d-flex flex-row justify-content-start mb-4">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
              <div class="ms-3" style="border-radius: 15px;">
                <div class="bg-image">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/screenshot1.webp" style="border-radius: 15px;" alt="video">
                  <a href="#!">
                    <div class="mask"></div>
                  </a>
                </div>
              </div>
            </div>
            
            <div class="d-flex flex-row justify-content-start mb-4">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
              <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                <p class="small mb-0">...</p>
              </div>
            </div>
            
            <div class="form-outline">
              <textarea class="form-control" name="message" id="msg" rows="4"></textarea>
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
      <div id="getmsg">


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
        $.ajax({
          type: "GET",
          url: '<?= base_url() ?>' + "/user/getmsg",
          async: true,
          dataType: 'JSON',
          success: function(data) {
            var html = "";
            for (i = 0; i < data.length; i++) {
              html +=
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
        // alert('dasd');
        $.ajax({
          type: "POST",
          url: '<?= base_url() ?>' + "/user/chat",
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