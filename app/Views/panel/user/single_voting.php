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
    <div class="bottom p-1">
      <a href="<?= base_url('/results') ?>" class="btn-custom light w-100">Results</a>
    </div>
  </div>


  <!-- </div> -->
  <div class="content user-panel p-5">
    <?php if ($member['creator_id'] == session('user_id')) { ?>
      <div class="row">

        <div class="col-6">
          <h4> Votes</h4>
        </div>
        <div class="col-12"><button type="button" id="addModelBtn" class="btn btn-primary w-100" data-toggle="modal" data-target=".bd-example-modal-lg">Add Vote</button></div>

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
                      <label for="title">Short Title</label>
                      <input type="text" class="form-control" placeholder="Enter Short Title" name="title" id="title">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="qstn">Question</label>
                      <input type="text" class="form-control" placeholder="Enter Question" name="question" id="qstn">
                    </div>
                  </div>
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
                      <select class="custom-select form-control mr-sm-2 subCateg" required name="subCategory" id="subCateg">
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
    <?php } ?>
    <div class="live-matches ">


      <?php if ($votes && $member) {
        foreach ($votes as $vote) : ?>

          <div class="box col-12">
            <h5 class="mb-3"><?= $vote['title'] ?></h5>
            <div class="row d-flex justify-content-around align-items-center">

              <div class="col-3 team">
                <img src="<?= base_url() ?>/public/uploads/votes/<?= $vote['banner1'] ?>" style="border-radius: 50%" alt="A" class="img-fluid">
                <p><?= $vote['team_a'] ?></p>
              </div>
              <div class="col-6">
                <h6><?= $vote['question'] ?></h6>
                <button class="btn-custom w-75 my-2 btn-info" value="<?= $vote['vote_id'] ?>">See More</button>
                <?php if ($member['creator_id'] == session('user_id')) { ?>

                  <select class="btn-custom w-25 my-2 voteAction" name="vote_status" id="<?= $vote['vote_id'] ?>">

                    <option value="active" <?= ($vote['status'] === 'active') ?  'selected' : '' ?>>Active</option>
                    <option value="closed" <?= ($vote['status'] === 'closed') ?  'selected' : '' ?>>Closed</option>
                    <option value="result" <?= ($vote['status'] === 'result') ?  'selected' : '' ?>>Result</option>
                  </select>
                  <button class="btn btn-danger w-30 my-2" onclick="deleteVote(<?= $vote['vote_id'] ?>)">Delete</button>
                <?php } ?>


              </div>
              <div class="col-3 team">
                <img src="<?= base_url() ?>/public/uploads/votes/<?= $vote['banner2'] ?>" alt="B" style="border-radius: 50%" class="img-fluid">
                <p><?= $vote['team_b'] ?></p>
              </div>
              <div class="col-12 align-self-end">
                <div class="d-flex justify-content-between">
                  <button type="button" class="voteCount teamA teamA<?= $vote['vote_id'] ?> btn-light  downgrade-mobile" value="<?= $vote['vote_id'] ?>">Vote Team A </button>
                  <button type="button" disabled="disabled" class="btn-light disabled downgrade-mobile result<?= $vote['vote_id'] ?>"></button>
                  <button type="button" class="voteCount teamB teamB<?= $vote['vote_id'] ?> btn-light  downgrade-mobile" value="<?= $vote['vote_id'] ?>">Vote Team B</button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach;
      } else { ?>
        <div class="box col-12">
          <h5 class="mb-3">Empty List.</h5>
        </div>
      <?php } ?>
    </div>
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
                  <label for="title">Short Title</label>
                  <input type="text" class="form-control" placeholder="Enter Short Title" name="title" id="title">
                </div>
                <div class="form-group col-md-6">
                  <label for="qstn">Question</label>
                  <input type="text" class="form-control" placeholder="Enter Question" name="question" id="qstn">
                </div>
              </div>
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
                  <select class="custom-select form-control mr-sm-2 subCateg" required name="subCategory" id="subCateg">
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


              <div class="modal-footer mr-3 my-2">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="addVote" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>

    

    <!-- Button trigger modal -->
    <button type="button" id="fixedbutton" class="btn btn-warning" style= "border-radius:30px; height:60px; width: 60px" data-toggle="modal" data-target="#exampleModal">
    <i class="far fa-comment"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Messenger</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
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
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?= include 'includes/footer.php'  ?>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
<script>
  $.validator.addMethod("valueNotEquals", function(value, element, arg) {
    // I use element.value instead value here, value parameter was always null
    return arg != element.value;
  }, "Value must not equal arg.");
</script>

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
<script>
  //Get Description
  $(".btn-info").click(function() {
    var id = $(this).val();
    if (id != null) {
      $.post('<?= base_url() ?>' + "/user/getDesc", {
          id
        }, (result) => {
          var obj = JSON.parse(result);
          if (obj.status == true) {
            Swal.fire(
              'Description',
              ` <center>  ${obj.description} </center> `,
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
    }
  })

  //Vote Count
  $(".voteCount").click(function() {
    var id = $(this).val();
    var classType = this.className.split(" ")[1];
    var data = {
      id,
      classType
    };
    if (id != null && classType != null) {
      $.post('<?= base_url() ?>' + "/user/countvote", {
          id,
          classType
        }, (result) => {
          var obj = JSON.parse(result);
          var classa = `.result${id}`;
          if (obj.status == true) {
            $(classa).text(`${obj.teamA} -- ${obj.teamB}`);
            Swal.fire(
              'Voted',
              'Thanks for vote.',
              'success'
            )
          } else {
            $(classa).text(`${obj.teamA} -- ${obj.teamB}`);

            Swal.fire(
              'Votes',
              `${obj.message} <br> Votes: ${obj.teamA} -- ${obj.teamB}`,
              'info'
            )
          }
        }


      );
    }

  });
  //Add Vote
  $('#addModelBtn').click(() => {
    $.get("<?= base_url() ?>/user/getcategory", (result) => {
      if (result) {
        $.each(JSON.parse(result), (key, value) => {
          $('#categ').append('<option value=' + value.cat_id + '>' + value.cat_title + '</option>');
        })
      } else {
        $('#categ').append('<option value=' + 99 + '>' + "Empty List" + '</option>');
      }
    });
  })
  $('#categ').change(() => {
    var id = $('#categ').find('option:selected').val();
    $.get("<?= base_url() ?>/user/getcategory/" + id, (result) => {
      if (result) {
        $('.subCateg').empty();
        $.each(JSON.parse(result), (key, value) => {
          $('#subCateg').append('<option value=' + value.sub_cat_id + '>' + value.sub_cat_title + '</option>');
        })
      } else {
        $('.subCateg').empty();
      }
    })
  })
  $('#vote-form').validate({
    rules: {
      title: {
        required: true,
        minlength: 3,
        maxlength: 50
      },
      question: {
        required: true,
        minlength: 3,
        maxlength: 50
      },
      teamA: {
        required: true,
        minlength: 3,
        maxlength: 50
      },
      teamB: {
        required: true,
        minlength: 3,
        maxlength: 50
      },
      category: {
        required: true,
        valueNotEquals: "0"
      },
      subCategory: {
        required: true,
        valueNotEquals: "0"
      },
      banner1: {
        extension: "png|jpeg|jpg",
      },
      banner2: {
        extension: "png|jpeg|jpg"
      },
      description: {
        required: true,
        minlength: 15,
        maxlength: 150
      },

    },
    messages: {
      category: {
        valueNotEquals: "Please select an category!"
      },
      subCategory: {
        valueNotEquals: "Please select an sub category!"
      },
      voteType: {
        valueNotEquals: "Please select vote type!"
      },
      banner1: {
        extension: "Only PNG , JPEG , JPG, GIF File Allowed",
      },
      banner1: {
        extension: "Only PNG , JPEG , JPG, GIF File Allowed",
      }

    },
    submitHandler: (form, e) => {
      e.preventDefault();
      let myform = document.getElementById("vote-form");
      let fd = new FormData(myform);
      var id = $("#groupID").html();

      $.ajax({
        url: "<?= base_url() ?>" + '/user/private/addvote/' + id,
        method: 'POST',
        processData: false,
        contentType: false,
        data: fd,
        success: (data) => {
          var result = JSON.parse(data);
          if (result.status == true) {
            $('form').trigger("reset");
            swal.fire({
              icon: 'success',
              title: 'Success',
              text: result.message,
            }).then(() => {
              window.location.reload();
            })
          } else {
            swal.fire(
              'warning',
              'Failed',
              result.message
            )

          }

        }
      });
    }
  })
</script>


<script>
  //Delete Vote
  $('#votesTable').DataTable();

  function deleteVote(id) {
    if (id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this vote!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {

          $.post('<?= base_url() ?>' + "/user/deletevote", {
              id
            }, (result) => {
              var obj = JSON.parse(result);

              if (obj.status == true) {
                Swal.fire(
                  'Deleted!',
                  'Your vote has been deleted.',
                  'success'
                ).then(() => {
                  window.location.reload();
                })
              } else if (obj.status == 500) {
                Swal.fire(
                  'Failed!',
                  'Internal server error!',
                  'error'
                )
              } else {
                Swal.fire(
                  'Failed!',
                  obj.message,
                  'error'
                )
              }
            })
            .fail(function(result) {
              Swal.fire(
                'Failed!',
                'Failed to delete.',
                'error'
              )
            })



        }
      })
    }
  };
  //Status Update
  $('.voteAction').change(function() {
    var status = $(this).find(":selected").val();
    var id = $(this).attr('id');
    var data = {
      status,
      id
    }
    Swal.fire({
      title: 'Are you sure?',
      text: "You want to update the status of  this vote!",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, update it!'
    }).then((result) => {
      if (result.isConfirmed) {

        $.post('<?= base_url() ?>' + "/user/updatestatus", data, (result) => {
            var obj = JSON.parse(result);

            if (obj.status == true) {
              Swal.fire(
                'Updated!',
                'Your vote status has been updated.',
                'success'
              ).then(() => {
                window.location.reload();
              })
            } else if (obj.status == 500) {
              Swal.fire(
                'Failed!',
                'Internal server error!',
                'error'
              )
            } else {
              Swal.fire(
                'Failed!',
                obj.message,
                'error'
              )
            }
          })
          .fail(function(result) {
            Swal.fire(
              'Failed!',
              'Failed to update.',
              'error'
            )
          })



      }
    })

  })
</script>