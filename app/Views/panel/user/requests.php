<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<div class="content user-panel chats">
    <div>
        <h4> Requests</h4>
    </div>
    <table class="table">
        <tr class="h6">
            <th>First Name </th>
            <th>Last Name </th>
            <th>Email </th>
            <th>Group Request</th>
            <th>Manage</th>
        </tr>
        <?php foreach ($requests as $r) : ?>
            <?php if($r['has_joined'] == 'false'){?>

            <tr>
                <td> <?= $r['first_name'] ?></td>
                <td> <?= $r['last_name'] ?></td>
                <td> <?= $r['user_email'] ?></td>
                <td><?= $r['group_name'] ?> </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" value="<?= $r['group_id'] ?>" id="<?= $r['user_id']?>" class="btn btn-success btn1">Accept</button>
                        <button type="button" value="<?= $r['request_id'] ?>" class="btn btn-danger btn2">Decline</button>
                    </div>
                </td>
            </tr>
            <?php } ?>
            <?php endforeach; ?>

    </table>






</div>

</div>

<?= include 'includes/footer.php'  ?>

<script>
    renderList = (id, obj) => {
        if (obj) {
            $.each(JSON.parse(obj), (key, value) => {
                $('#' + id).append('<option value=' + value.cat_id + '>' + value.cat_title + '</option>');
            })
        } else {
            $('#' + id).append('<option disabled value=' + 0 + '>' + "Empty List" + '</option>');
        }

    }
    $('#addModelBtn').click(() => {
        $.get("<?= base_url() ?>/user/getcategory", (result) => {
            renderList("categ", result);
        });
    })
    $('#categ').change(() => {
        var id = $('#categ').find('option:selected').val();
        $.get("<?= base_url() ?>/user/getcategory/" + id, (result) => {
            renderList("subCateg", result);
        })
    })
    $(document).ready(function() {

        $('#group-form').submit((e) => {
            e.preventDefault();

            // set some basic validation
            $.ajax({
                type: "POST",
                url: '<?= base_url() ?>' + "/user/addgroup",
                dataType: "JSON",
                data: $('#group-form').serialize(),
                success: function(response) {
                    if (response == 1) {
                        swal.fire({
                            'icon': 'success',
                            'text': "Successfully Added!",
                        });
                    } else if (response == 2) {
                        swal.fire({
                            'icon': 'danger',
                            'text': "Error! Please conact admin.",
                        });
                    } else {
                        swal.fire({
                            'icon': 'danger',
                            'text': "Please Enter Correct Data!",
                        });
                    }
                },
                error: function(err) {
                    $("#msg_err").text(err.responseJSON.messages.message);
                    alert('error');
                }
            })
        });

        $(".btn1").click(function(event){
            var id = $(this).val();
            var userID = $(this).attr('id');
            $.ajax({
              type: "GET",
              url: '<?= base_url() ?>' + "/user/groups/requests/accept/" + id + '/' + userID,
              success: function(data){
                if(data == 1){
                    swal.fire({
                            'icon': 'success',
                            'text': "Request Accepted",
                        }).then(() => {
                        window.location.reload();
                    })

                }
                
                else{
                    swal.fire({
                            'icon': 'error',
                            'text': "Unexpected Error! Contact admin.",
                        });

                }
              },
              error: function(data){
                swal.fire({
                            'icon': 'error',
                            'text': "Unexpected Error! Contact admin.",
                        });
              }
            });
        });
        $(".btn2").click(function(event){
           var id = $(this).val();
           $.ajax({
            type: "GET",
            url: '<?= base_url()?>' + "/user/groups/requests/delete/" + id,
            success: function(data){
                if(data ==1){
                swal.fire({
                            'icon': 'success',
                            'text': "Request Declined!",
                        }).then(() => {
                        window.location.reload(); 
                    })
                    }
                else{
                    swal.fire({
                            'icon': 'success',
                            'text': "Unexpected Error! Contact admin.",

                        });
                }
            },
            error: function(data){
                swal.fire({
                            'icon': 'success',
                            'text': "Unexpected Error! Contact admin.",

                        });
            }

           });
        });
    });
</script>