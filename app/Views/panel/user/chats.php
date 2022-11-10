<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<div class="content user-panel chats">
    <div class="d-flex justify-content-between">
        <div>
            <h4> Chats</h4>
        </div>
        <!-- <div>
            <button class="btn-custom light toggle-user-panel-sidebar d-lg-none" id="userLst" onclick="toggleSidebar('userList')">
                <i class="far fa-users"></i>
            </button>

            <button class="btn-custom light toggle-user-panel-sidebar d-lg-none" onclick="toggleSidebar('userPanelSideBar')">
                <i class="fal fa-sliders-h"></i>
            </button>
        </div> -->

    </div>

    <!-- <div class="row justify-content-between"> -->

        <!-- <div class="col-md-5 col-lg-3 leftbar d-none d-lg-block" id="userList">
            <div class="card">
                <div class="px-2 d-lg-none">
                    <button class="remove-class-btn light btn-custom" onclick="removeClass('userList')">
                        <i class="fal fa-chevron-left"></i>Back to Chat </button>
                </div>
                <div class="form-group p-2">
                    <div class="input-group input-box">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text form-control copytext">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <ul class="list-unstyled chat-list mt-2 mb-0 px-4" style="height:70vh; overflow-y: scroll;">

                    <li class=" d-flex my-2">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" height="40px" alt="avatar">
                        <div class="px-2">
                            <div class="name">Vincent Porter</div>
                            <small class="status d-none d-xl-block d-md-block d-sm-block"> <small class="fa fa-circle offline"></small> left 7 mins ago </small>
                        </div>
                    </li>
                    <li class=" d-flex my-2">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" height="40px" alt="avatar">
                        <div class="px-2">
                            <div class="name">Vincent Porter</div>
                            <small class="status d-none d-xl-block d-md-block d-sm-block"> <small class="fa fa-circle offline"></small> left 7 mins ago </small>
                        </div>
                    </li>
                    <li class=" d-flex my-2">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" height="40px" alt="avatar">
                        <div class=" px-2">
                            <div class="name">Vincent Porter</div>
                            <small class="status d-none d-xl-block d-md-block d-sm-block"> <small class="fa fa-circle offline"></small> left 7 mins ago </small>
                        </div>
                    </li>
                </ul>
            </div>
        </div> -->
        <!-- <div class="col-md-12 col-lg-9" id="userChat">
        <div id="getmsg">

        </div>
        <form action="" method="POST">
            <div class="card ">
                <div class="row">
                    <div class="chat_profile p-4">
                        <div class="d-flex px-3">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" height="40px" alt="avatar">
                            <div class=" px-2">
                                <div class="name">Vincent Porter</div>
                                <small class="status"> <small class="fa fa-circle offline"></small> left 7 mins ago </small>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <ul class="list-unstyled p-3" style="height:50vh; overflow-y: scroll;">
                                <li class="my-3">
                                    <div class="d-flex">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle" height="40px" alt="avatar">
                                        <div>
                                            <span class="px-3">Sender <small>10:10 AM, Today</small></span>
                                            <div id="getmsg" class="" style="margin-left: 1.2rem;"> </div>
                                            
                                        </div>
                                    </div>
                                </li>
                                <li class="my-3">
                                    <div class="d-flex justify-content-end">
                                        <div>
                                            <span style="text-align: right;" class="px-3 d-block"><small>10:10 AM, Today</small> You </span>
                                            <div class="" style="margin-right: 1.2rem;"> Hi Aiden, how are you? How is the project coming along? </div>

                                        </div>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle" height="40px" alt="avatar">
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <div class="row p-4 pb-3">
                        <div class="col-12 mx-2">
                            <div class="form-group">
                                <div class="input-group input-box">
                                   <textarea name="message" id="msg" class="form-control"></textarea>
                <span id="msg_err"></span>
                                    <div class="input-group-append">
                                        <button type="submit" id="send" class="btn btn-success">Send</button>
                                        <span class="input-group-text form-control px-3 copytext">
                                            <i class="fas fa-paper-plane" aria-hidden="true"></i>
                                        </span> -->
                                    <!-- </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div> --> 
        <div id="getmsg">


        </div>

        <form id="chatForm" action="" class="col-md-12 col-lg-9"  method="POST">
        <input type="hidden" name="<?=csrf_token()?>" value="<?=csrf_hash()?>">  

            <div class="form-group">
                <textarea name="message" id="msg" class="form-control"></textarea>
                <span id="msg_err"></span>
            </div>
            <div class="form-group pt-3">
                <button type="submit" id="send" class="btn btn-success">Send</button>
            </div>

        </form> 
    </div> 

</div>

<?php include 'includes/footer.php'  ?>

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
                url: '<?=base_url()?>' + "/user/chat",
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