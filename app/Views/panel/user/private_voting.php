<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<div class="content user-panel chats">
    <div>
        <h4> Private Voting</h4>
    </div>
    <div class="row align-items-end">
        <div class="col">
            <?php foreach ($private as $p) : ?>
               <?=   $p['first_name'];  ?>
            <?php endforeach; ?>
        </div>
    </div>







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

        $(".btn1").click(function(event) {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: '<?= base_url() ?>' + "/user/groups/requests/accept/" + id,
                success: function(data) {
                    if (data == 1) {
                        swal.fire({
                            'icon': 'success',
                            'text': "Request Accepted",
                        });
                        setInterval('location.reload()', 2000);
                    } else {
                        swal.fire({
                            'icon': 'error',
                            'text': "Unexpected Error! Contact admin.",
                        });

                    }
                },
                error: function(data) {
                    swal.fire({
                        'icon': 'error',
                        'text': "Unexpected Error! Contact admin.",
                    });
                }
            });
        });
        $(".btn2").click(function(event) {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: '<?= base_url() ?>' + "/user/groups/requests/delete/" + id,
                success: function(data) {
                    if (data == 1) {
                        swal.fire({
                            'icon': 'success',
                            'text': "Request Declined!",
                        });
                        setInterval('location.reload()', 2000);
                    } else {
                        swal.fire({
                            'icon': 'success',
                            'text': "Unexpected Error! Contact admin.",

                        });
                    }
                },
                error: function(data) {
                    swal.fire({
                        'icon': 'success',
                        'text': "Unexpected Error! Contact admin.",

                    });
                }

            });
        });
    });
</script>