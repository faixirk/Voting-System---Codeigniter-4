<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<div class="content user-panel chats">
    <div>
        <h4> Requests</h4>
    </div>
    <ul class="list-group">
        <li class="list-group-item">First item</li>
        <li class="list-group-item">Second item</li>
        <li class="list-group-item">Third item</li>
    </ul>






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
        })
    });
</script>