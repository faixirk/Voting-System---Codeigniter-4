<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<div class="content user-panel p-4">
    <div class="row">

        <div class="col-6">
            <h4> Chats</h4>
        </div>
        <div class="col-6"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button></div>

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
                        <form class="p-0 m-0" style="width: 100% !important; max-width: 100% !important">
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="team1">Team A</label>
                                    <select class="custom-select form-control mr-sm-2" id="team1">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="team1">Team B</label>
                                    <select class="custom-select form-control mr-sm-2" id="team1">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="team1">Team A Banner</label>
                                    <div class="custom-file">
                                        <input type="file" id="customFile">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="team1">Team B Banner</label>
                                    <div class="custom-file">
                                        <input type="file" id="customFile">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="desc">Description</label>
                                    <textarea name="description"  class="form-control" id="desc"  ></textarea>
                                </div> 
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="type">Type</label>
                                    <select class="custom-select form-control mr-sm-2" id="type">
                                        <option selected>Choose...</option>
                                        <option value="1">Public</option>
                                        <option disabled value="2">Private</option>
                                    </select>
                                </div> 
                            </div> 
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-4">
        <table class="table table-hover table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Team A</th>
                    <th>Team B</th>
                    <th>Created At</th>
                    <th> Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row"></td>
                    <td>Adnan a</td>
                    <td>Adnan</td>
                    <td>10-21-2022</td>
                    <td><span class="badge badge-primary">Active</span> </td>
                </tr>
                <tr>
                    <td scope="row"></td>
                    <td>Adnan a</td>
                    <td>Adnan</td>
                    <td>10-21-2022</td>
                    <td><span class="badge badge-primary">Active</span> </td>
                </tr>
            </tbody>
        </table>



    </div>

</div>

<?= include 'includes/footer.php'  ?>