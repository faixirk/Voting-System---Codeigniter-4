<?php 
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>


   

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">    Result History</h4>

                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item text-muted" aria-current="page">    Result History</li>
                            </ol>
                        </nav>
                    </div>

                </div>

            </div>
        </div>

            <div class="page-header card card-primary m-0 m-md-4 my-4 m-md-0 p-5 shadow">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <form action="https://script.bugfinder.net/prophecy/admin/result/history/search" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="search" value="" class="form-control"
                                       placeholder="Questions or teams name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="date" class="form-control" name="date_time" id="datepicker"/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn w-100  btn-primary"><i
                                        class="fas fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card card-primary m-0 m-md-4  m-md-0 shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered" id="zero_config">
                    <thead class="thead-dark">
                    <tr>
                        <th>SL No.</th>
                        <th>Question</th>
                        <th class="text-center">Match</th>
                        <th>End Time</th>
                        <th>Predictions</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                                            <tr>
                            <td data-label="SL No.">1</td>
                            <td data-label="Question">Who will win?</td>
                            <td data-label="Match">
                                <div class="d-lg-flex d-block align-items-center ">
                                    <div class="mr-3 cursor-pointer"
                                         title="CSK">
                                        <small
                                            class="text-dark font-weight-bold">CSK</small>
                                    </div>
                                    <div class="mr-2 cursor-pointer"
                                         title="CSK">
                                        <img
                                            src="https://script.bugfinder.net/prophecy/assets/uploads/team/631c72f9c1a641662808825.png"
                                            alt="user" class="rounded-circle" width="25" height="25">
                                    </div>
                                    <small class="font-italic mb-0 font-16 ">vs</small>

                                    <div class="mr-3 ml-2 cursor-pointer"
                                         title="KKR">
                                        <img
                                            src="https://script.bugfinder.net/prophecy/assets/uploads/team/631c7326d060c1662808870.png"
                                            alt="user" class="rounded-circle" width="25" height="25">
                                    </div>
                                    <div class="cursor-pointer" title="KKR">
                                        <small
                                            class="text-dark font-weight-bold">KKR</small>
                                    </div>
                                </div>
                            </td>
                            <td data-label="End Time">
                                11 Jul 2030 06:27 PM
                            </td>
                            <td data-label="Predictions"><span
                                    class="badge badge-success">3</span></td>
                            <td data-label="Action">

                                <a href="https://script.bugfinder.net/prophecy/admin/result/winner/6">
                                    <button type="button"
                                            class="btn btn-outline-dark btn-sm optionInfo"
                                            title="Select Winner">
                                        <i class="fa fa-eye"
                                           aria-hidden="true"></i>
                                    </button>
                                </a>


                                <button type="button" class="btn btn-sm btn-outline-primary editBtn"
                                        data-resource="{&quot;id&quot;:6,&quot;match_id&quot;:1,&quot;result_id&quot;:null,&quot;name&quot;:&quot;Who will win?&quot;,&quot;status&quot;:1,&quot;is_unlock&quot;:0,&quot;result&quot;:1,&quot;limit&quot;:100,&quot;creator_id&quot;:1,&quot;end_time&quot;:&quot;2030-07-11 18:27:00&quot;,&quot;created_at&quot;:&quot;2022-09-11T04:26:25.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-18T05:54:44.000000Z&quot;,&quot;bet_invest_log_count&quot;:3,&quot;game_match&quot;:{&quot;id&quot;:1,&quot;category_id&quot;:26,&quot;tournament_id&quot;:28,&quot;team1_id&quot;:11,&quot;team2_id&quot;:13,&quot;name&quot;:&quot;1st round&quot;,&quot;start_date&quot;:&quot;2022-09-11 00:00:00&quot;,&quot;end_date&quot;:&quot;2031-06-11 00:00:00&quot;,&quot;status&quot;:1,&quot;is_unlock&quot;:0,&quot;created_at&quot;:&quot;2022-09-10T05:25:08.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-18T05:38:10.000000Z&quot;,&quot;game_team1&quot;:{&quot;id&quot;:11,&quot;name&quot;:&quot;CSK&quot;,&quot;image&quot;:&quot;631c72f9c1a641662808825.png&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;2022-09-10T05:20:25.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-10T05:20:25.000000Z&quot;,&quot;category_id&quot;:26},&quot;game_team2&quot;:{&quot;id&quot;:13,&quot;name&quot;:&quot;KKR&quot;,&quot;image&quot;:&quot;631c7326d060c1662808870.png&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;2022-09-10T05:21:10.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-10T05:21:10.000000Z&quot;,&quot;category_id&quot;:26}},&quot;bet_invest_log&quot;:[{&quot;id&quot;:4,&quot;bet_invest_id&quot;:5,&quot;user_id&quot;:1,&quot;match_id&quot;:1,&quot;question_id&quot;:6,&quot;bet_option_id&quot;:9,&quot;ratio&quot;:&quot;1.2&quot;,&quot;category_icon&quot;:&quot;&lt;i class=\&quot;far fa-cricket\&quot; aria-hidden=\&quot;true\&quot;&gt;&lt;\/i&gt;&quot;,&quot;category_name&quot;:&quot;Cricket&quot;,&quot;tournament_name&quot;:&quot;IPL&quot;,&quot;match_name&quot;:&quot;CSK vs KKR&quot;,&quot;question_name&quot;:&quot;Who will win?&quot;,&quot;option_name&quot;:&quot;CSK&quot;,&quot;status&quot;:3,&quot;created_at&quot;:&quot;2022-09-13T07:57:57.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-18T07:07:06.000000Z&quot;,&quot;bet_invest&quot;:{&quot;id&quot;:5,&quot;transaction_id&quot;:&quot;KMNO25R878VW&quot;,&quot;user_id&quot;:1,&quot;creator_id&quot;:null,&quot;invest_amount&quot;:&quot;100.00&quot;,&quot;return_amount&quot;:&quot;360.00&quot;,&quot;charge&quot;:&quot;26.00&quot;,&quot;remaining_balance&quot;:&quot;999999.99&quot;,&quot;ratio&quot;:&quot;3.6&quot;,&quot;status&quot;:1,&quot;isMultiBet&quot;:1,&quot;created_at&quot;:&quot;2022-09-13T07:57:57.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-20T05:24:29.000000Z&quot;}},{&quot;id&quot;:7,&quot;bet_invest_id&quot;:6,&quot;user_id&quot;:1,&quot;match_id&quot;:1,&quot;question_id&quot;:6,&quot;bet_option_id&quot;:11,&quot;ratio&quot;:&quot;1&quot;,&quot;category_icon&quot;:&quot;&lt;i class=\&quot;far fa-cricket\&quot; aria-hidden=\&quot;true\&quot;&gt;&lt;\/i&gt;&quot;,&quot;category_name&quot;:&quot;Cricket&quot;,&quot;tournament_name&quot;:&quot;IPL&quot;,&quot;match_name&quot;:&quot;CSK vs KKR&quot;,&quot;question_name&quot;:&quot;Who will win?&quot;,&quot;option_name&quot;:&quot;DRAW&quot;,&quot;status&quot;:-2,&quot;created_at&quot;:&quot;2022-09-14T07:18:45.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-17T02:45:11.000000Z&quot;,&quot;bet_invest&quot;:{&quot;id&quot;:6,&quot;transaction_id&quot;:&quot;K2NO25RS78VW&quot;,&quot;user_id&quot;:1,&quot;creator_id&quot;:null,&quot;invest_amount&quot;:&quot;100.00&quot;,&quot;return_amount&quot;:&quot;200.00&quot;,&quot;charge&quot;:&quot;0.00&quot;,&quot;remaining_balance&quot;:&quot;999999.99&quot;,&quot;ratio&quot;:&quot;2&quot;,&quot;status&quot;:-1,&quot;isMultiBet&quot;:1,&quot;created_at&quot;:&quot;2022-09-14T07:18:45.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-20T05:24:29.000000Z&quot;}},{&quot;id&quot;:8,&quot;bet_invest_id&quot;:6,&quot;user_id&quot;:1,&quot;match_id&quot;:1,&quot;question_id&quot;:6,&quot;bet_option_id&quot;:10,&quot;ratio&quot;:&quot;2&quot;,&quot;category_icon&quot;:&quot;&lt;i class=\&quot;far fa-cricket\&quot; aria-hidden=\&quot;true\&quot;&gt;&lt;\/i&gt;&quot;,&quot;category_name&quot;:&quot;Cricket&quot;,&quot;tournament_name&quot;:&quot;IPL&quot;,&quot;match_name&quot;:&quot;CSK vs KKR&quot;,&quot;question_name&quot;:&quot;Who will win?&quot;,&quot;option_name&quot;:&quot;KKR&quot;,&quot;status&quot;:2,&quot;created_at&quot;:&quot;2022-09-14T07:18:45.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-17T02:45:11.000000Z&quot;,&quot;bet_invest&quot;:{&quot;id&quot;:6,&quot;transaction_id&quot;:&quot;K2NO25RS78VW&quot;,&quot;user_id&quot;:1,&quot;creator_id&quot;:null,&quot;invest_amount&quot;:&quot;100.00&quot;,&quot;return_amount&quot;:&quot;200.00&quot;,&quot;charge&quot;:&quot;0.00&quot;,&quot;remaining_balance&quot;:&quot;999999.99&quot;,&quot;ratio&quot;:&quot;2&quot;,&quot;status&quot;:-1,&quot;isMultiBet&quot;:1,&quot;created_at&quot;:&quot;2022-09-14T07:18:45.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-20T05:24:29.000000Z&quot;}}]}"
                                        data-action="https://script.bugfinder.net/prophecy/admin/match/question/update?6"
                                        data-target="#edit-modal"
                                        data-toggle="modal" data-backdrop="static"
                                        title="Edit Question" disabled>
                                    <i class="fa fa-edit"
                                       aria-hidden="true"></i>
                                </button>


                                


                                <a href="https://script.bugfinder.net/prophecy/admin/bet/user/6">
                                    <button type="button"
                                            class="btn btn-sm btn-outline-success investLogList">
                                        <i class="fa fa-info-circle"></i></button>
                                </a>
                            </td>
                        </tr>
                                            <tr>
                            <td data-label="SL No.">2</td>
                            <td data-label="Question">Who will win?</td>
                            <td data-label="Match">
                                <div class="d-lg-flex d-block align-items-center ">
                                    <div class="mr-3 cursor-pointer"
                                         title="Real Madrid">
                                        <small
                                            class="text-dark font-weight-bold">REA</small>
                                    </div>
                                    <div class="mr-2 cursor-pointer"
                                         title="Real Madrid">
                                        <img
                                            src="https://script.bugfinder.net/prophecy/assets/uploads/team/631c79bd53baa1662810557.png"
                                            alt="user" class="rounded-circle" width="25" height="25">
                                    </div>
                                    <small class="font-italic mb-0 font-16 ">vs</small>

                                    <div class="mr-3 ml-2 cursor-pointer"
                                         title="Liverpool">
                                        <img
                                            src="https://script.bugfinder.net/prophecy/assets/uploads/team/631c79f3ca9dc1662810611.png"
                                            alt="user" class="rounded-circle" width="25" height="25">
                                    </div>
                                    <div class="cursor-pointer" title="Liverpool">
                                        <small
                                            class="text-dark font-weight-bold">LIV</small>
                                    </div>
                                </div>
                            </td>
                            <td data-label="End Time">
                                21 Sep 2022 08:01 PM
                            </td>
                            <td data-label="Predictions"><span
                                    class="badge badge-success">2</span></td>
                            <td data-label="Action">

                                <a href="https://script.bugfinder.net/prophecy/admin/result/winner/1">
                                    <button type="button"
                                            class="btn btn-outline-dark btn-sm optionInfo"
                                            title="Select Winner">
                                        <i class="fa fa-eye"
                                           aria-hidden="true"></i>
                                    </button>
                                </a>


                                <button type="button" class="btn btn-sm btn-outline-primary editBtn"
                                        data-resource="{&quot;id&quot;:1,&quot;match_id&quot;:13,&quot;result_id&quot;:null,&quot;name&quot;:&quot;Who will win?&quot;,&quot;status&quot;:2,&quot;is_unlock&quot;:0,&quot;result&quot;:1,&quot;limit&quot;:100,&quot;creator_id&quot;:1,&quot;end_time&quot;:&quot;2022-09-21 20:01:00&quot;,&quot;created_at&quot;:&quot;2022-09-10T06:11:37.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-28T19:31:57.000000Z&quot;,&quot;bet_invest_log_count&quot;:2,&quot;game_match&quot;:{&quot;id&quot;:13,&quot;category_id&quot;:4,&quot;tournament_id&quot;:3,&quot;team1_id&quot;:20,&quot;team2_id&quot;:22,&quot;name&quot;:&quot;&quot;,&quot;start_date&quot;:&quot;2022-09-01 00:00:00&quot;,&quot;end_date&quot;:&quot;2026-01-04 00:00:00&quot;,&quot;status&quot;:1,&quot;is_unlock&quot;:0,&quot;created_at&quot;:&quot;2022-09-10T05:52:56.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-20T01:42:53.000000Z&quot;,&quot;game_team1&quot;:{&quot;id&quot;:20,&quot;name&quot;:&quot;Real Madrid&quot;,&quot;image&quot;:&quot;631c79bd53baa1662810557.png&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;2022-09-10T05:49:17.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-10T05:49:17.000000Z&quot;,&quot;category_id&quot;:4},&quot;game_team2&quot;:{&quot;id&quot;:22,&quot;name&quot;:&quot;Liverpool&quot;,&quot;image&quot;:&quot;631c79f3ca9dc1662810611.png&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;2022-09-10T05:50:11.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-10T05:50:11.000000Z&quot;,&quot;category_id&quot;:4}},&quot;bet_invest_log&quot;:[{&quot;id&quot;:1,&quot;bet_invest_id&quot;:3,&quot;user_id&quot;:1,&quot;match_id&quot;:13,&quot;question_id&quot;:1,&quot;bet_option_id&quot;:2,&quot;ratio&quot;:&quot;1.36&quot;,&quot;category_icon&quot;:&quot;&lt;i class=\&quot;far fa-futbol\&quot; aria-hidden=\&quot;true\&quot;&gt;&lt;\/i&gt;&quot;,&quot;category_name&quot;:&quot;Football&quot;,&quot;tournament_name&quot;:&quot;UFFA&quot;,&quot;match_name&quot;:&quot;Real Madrid vs Liverpool&quot;,&quot;question_name&quot;:&quot;Who will win?&quot;,&quot;option_name&quot;:&quot;Draw&quot;,&quot;status&quot;:-2,&quot;created_at&quot;:&quot;2022-09-13T07:46:10.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-20T04:11:10.000000Z&quot;,&quot;bet_invest&quot;:{&quot;id&quot;:3,&quot;transaction_id&quot;:&quot;KMNO25RS78VW&quot;,&quot;user_id&quot;:1,&quot;creator_id&quot;:null,&quot;invest_amount&quot;:&quot;10.00&quot;,&quot;return_amount&quot;:&quot;13.60&quot;,&quot;charge&quot;:&quot;0.50&quot;,&quot;remaining_balance&quot;:&quot;999999.99&quot;,&quot;ratio&quot;:&quot;1.36&quot;,&quot;status&quot;:-1,&quot;isMultiBet&quot;:0,&quot;created_at&quot;:&quot;2022-09-13T07:46:10.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-20T05:24:29.000000Z&quot;}},{&quot;id&quot;:6,&quot;bet_invest_id&quot;:5,&quot;user_id&quot;:1,&quot;match_id&quot;:13,&quot;question_id&quot;:1,&quot;bet_option_id&quot;:1,&quot;ratio&quot;:&quot;1.5&quot;,&quot;category_icon&quot;:&quot;&lt;i class=\&quot;far fa-futbol\&quot; aria-hidden=\&quot;true\&quot;&gt;&lt;\/i&gt;&quot;,&quot;category_name&quot;:&quot;Football&quot;,&quot;tournament_name&quot;:&quot;UFFA&quot;,&quot;match_name&quot;:&quot;Real Madrid vs Liverpool&quot;,&quot;question_name&quot;:&quot;Who will win?&quot;,&quot;option_name&quot;:&quot;REL&quot;,&quot;status&quot;:3,&quot;created_at&quot;:&quot;2022-09-13T07:57:57.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-18T07:07:06.000000Z&quot;,&quot;bet_invest&quot;:{&quot;id&quot;:5,&quot;transaction_id&quot;:&quot;KMNO25R878VW&quot;,&quot;user_id&quot;:1,&quot;creator_id&quot;:null,&quot;invest_amount&quot;:&quot;100.00&quot;,&quot;return_amount&quot;:&quot;360.00&quot;,&quot;charge&quot;:&quot;26.00&quot;,&quot;remaining_balance&quot;:&quot;999999.99&quot;,&quot;ratio&quot;:&quot;3.6&quot;,&quot;status&quot;:1,&quot;isMultiBet&quot;:1,&quot;created_at&quot;:&quot;2022-09-13T07:57:57.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-09-20T05:24:29.000000Z&quot;}}]}"
                                        data-action="https://script.bugfinder.net/prophecy/admin/match/question/update?1"
                                        data-target="#edit-modal"
                                        data-toggle="modal" data-backdrop="static"
                                        title="Edit Question" disabled>
                                    <i class="fa fa-edit"
                                       aria-hidden="true"></i>
                                </button>


                                


                                <a href="https://script.bugfinder.net/prophecy/admin/bet/user/1">
                                    <button type="button"
                                            class="btn btn-sm btn-outline-success investLogList">
                                        <i class="fa fa-info-circle"></i></button>
                                </a>
                            </td>
                        </tr>
                                        </tbody>
                </table>
                <nav id="pagination">
    </nav>

            </div>
        </div>
    </div>
    
    <div id="editModal" class="modal fade show" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h5 class="modal-title">Edit Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="Z01n56aiJaPYjOYNxpjAZhpYPXqJGXpjQdgO9En2">                    <div class="modal-body">
                        <input type="hidden" class="questionId" name="questionId" value="">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control editName" name="name" value="" required>
                                                    </div>

                        <div class="form-group">
                            <label class="text-dark">Status </label>
                            <select id="editStatus" class="form-control editStatus"
                                    name="status" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Pending</option>
                                <option value="2">Closed</option>
                            </select>
                                                    </div>

                        <div class="form-group">
                            <label>End Date</label>
                            <input type="datetime-local" class="form-control editTime" name="end_time"
                                   id="editEndDate" required>
                                                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div id="refundQuestion-Modal" class="modal fade show" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h5 class="modal-title">Refund Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="Z01n56aiJaPYjOYNxpjAZhpYPXqJGXpjQdgO9En2">                    <div class="modal-body">
                        <p>Are you sure to refund this?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Yes</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php 
include 'includes/footer.php';
?>

      
