<?php
include 'includes/head.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>

 
<!-- rightbar -->
<div class="rightbar" id="rightbar">
    <div class="my-1 d-lg-none">
        <button class="remove-class-btn light btn-custom" onclick="removeClass('rightbar')">
            <i class="fal fa-chevron-left"></i> Back </button>
    </div>
    <div class="top mb-3 d-flex">
        <button class="btn-custom me-1">
            <i class="fas fa-podcast"></i>
            bet slip </button>
        <a href="https://script.bugfinder.net/prophecy/user/bet-history" class="btn-custom2 light">
            <i class="fas fa-meteor"></i>
            my bets </a>
    </div>

    <div :class="{ 'd-none': 0 == betSlip.length }">
        <div class="mb-2">
            <div class="d-flex justify-content-between">
                <p class="mb-0">Your Bets {{ betSlip.length }}</p>

                <div class="dropdown">
                    <button class="dropdown-toggle">
                        <i class="fal fa-cog"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3" />
                            <label class="form-check-label" for="flexCheckChecked3">
                                Default checkbox </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
                            <label class="form-check-label" for="flexCheckChecked">
                                Checked checkbox </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2" />
                            <label class="form-check-label" for="flexCheckChecked2">
                                Checked checkbox </label>
                        </div>
                        <button class="btn-custom w-100">save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <template>
            <div v-for="(item, index) in betSlip" class="bet-box mb-2" :class="{'bet-box-disable':(item.is_unlock_match == 1 || item.is_unlock_question == 1)}">
                <p class="series d-flex align-items-start">
                    <span>
                        <span v-html="item.category_icon"></span> {{ item.tournament_name }}
                    </span>
                    <button type="button" @click="removeItem(item)" class="close-btn">
                        <i class="fal fa-times"></i>
                    </button>
                </p>

                <p class="teams">{{item.match_name}} </p>
                <p>
                    <span class="badge">{{ item.ratio }}</span>
                    <span>{{item.question_name}}
                        <small>{{item.option_name}}</small>
                    </span>
                </p>

                <p v-if="item.is_unlock_match == 1 || item.is_unlock_question == 1" class="text-center "><i class="fas fa-hourglass-end"></i>Expired</p>
            </div>
        </template>

        <div class="mb-3">
            <p class="mb-1">
                Overall Odds <span class="float-end">{{ totalOdds }}</span>
            </p>
            <p class="mb-1">
                Maximum stake amount <span class="float-end">{{ minimum_bet }} {{ currency }}</span>
            </p>
            <p class="mb-1">
                Charge Apply <small> (IF YOU WIN) </small><span class="float-end">{{win_charge}}%</span>
            </p>

            <p class="mb-1">
                Potential Winnings <span class="float-end">{{ return_amount }} {{ currency }}</span>
            </p>
        </div>

        <div class="input-group inc-dec mb-3">
            <button type="button" class="decrement btn-custom" @click="decrement()">-</button>
            <input class="form-control" value="1" v-model="form.amount" @keyup="calc(form.amount)" type="number" data-zeros="true" :max="999999" />
            <button type="button" class="increment btn-custom" @click="increment()">+</button>
        </div>
        <button type="button" @click="betPlace" class=" btn-custom w-100">place bet</button>
    </div>
</div>

<!-- contents -->
<div class="content">
    <!-- slider -->
    <div class="skitter-large-box">
        <div class="skitter skitter-large with-dots">
            <ul>
                <li>
                    <a href="https://script.bugfinder.net/prophecy/">
                        <img src="https://script.bugfinder.net/prophecy/assets/uploads/content/6323220cbcb231663246860.jpg" class="downBars" />
                    </a>
                    <div class="label_text">
                        <h2>Football</h2>
                        <p class="mb-4">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit unde.
                        </p>
                        <a href="https://script.bugfinder.net/prophecy/"><button class="btn-custom"> place a bet</button></a>
                    </div>
                </li>
                <li>
                    <a href="https://script.bugfinder.net/prophecy/">
                        <img src="https://script.bugfinder.net/prophecy/assets/uploads/content/63232267df3401663246951.jpg" class="downBars" />
                    </a>
                    <div class="label_text">
                        <h2>Cricket</h2>
                        <p class="mb-4">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit unde.
                        </p>
                        <a href="https://script.bugfinder.net/prophecy/"><button class="btn-custom"> find out more</button></a>
                    </div>
                </li>
                <li>
                    <a href="https://script.bugfinder.net/prophecy">
                        <img src="https://script.bugfinder.net/prophecy/assets/uploads/content/632322b1c7bcb1663247025.jpg" class="downBars" />
                    </a>
                    <div class="label_text">
                        <h2>Casino</h2>
                        <p class="mb-4">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit unde.
                        </p>
                        <a href="https://script.bugfinder.net/prophecy"><button class="btn-custom"> play now</button></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- categories -->
    <div class="categories" id="categories">
        <a href="https://script.bugfinder.net/prophecy" class="active">
            <i class="far fa-globe-americas"></i> <span>All Sports</span>
        </a>



        <a href="https://script.bugfinder.net/prophecy/category/football/4" class="">
            <i class="far fa-futbol" aria-hidden="true"></i> <span>Football</span>
        </a>

        <a href="https://script.bugfinder.net/prophecy/category/cricket/26" class="">
            <i class="far fa-cricket" aria-hidden="true"></i> <span>Cricket</span>
        </a>

        <a href="https://script.bugfinder.net/prophecy/category/badminton/3" class="">
            <i class="far fa-shuttlecock" aria-hidden="true"></i> <span>Badminton</span>
        </a>

        <a href="https://script.bugfinder.net/prophecy/category/chess/5" class="">
            <i class="far fa-chess" aria-hidden="true"></i> <span>Chess</span>
        </a>

        <a href="https://script.bugfinder.net/prophecy/category/basketball/6" class="">
            <i class="far fa-basketball-ball" aria-hidden="true"></i> <span>Basketball</span>
        </a>

        <a href="https://script.bugfinder.net/prophecy/category/hockey/7" class="">
            <i class="far fa-field-hockey" aria-hidden="true"></i> <span>Hockey</span>
        </a>
    </div>
    <!-- live match table -->
    <div v-if="showType == 'live'" v-for="(item, index) in allSports_filter" class="table-parent table-responsive d-sm-block d-none">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">
                        <span v-html="item.game_category.icon"></span>
                    </th>
                    <th class="col-5">
                        <span>
                            {{item.game_tournament.name}} <span v-if="item.name">- {{item.name}} </span>
                        </span>
                    </th>

                    <th v-if="index <= 2" class="col-2" v-for="(question, index) in item.questions">
                        <div class="d-flex justify-content-evenly">
                            <span>1</span>
                            <span>{{question.name}}</span>
                            <span>2</span>
                        </div>
                    </th>

                    <template v-if="3 > (item.questions).length ">
                        <th class="col-2" v-for="index in (3 - (item.questions).length )" :key="index">
                            <div class="d-flex justify-content-evenly">
                                <span>1</span>
                                <span v-if="index == 1">X</span>
                                <span v-if="index == 2">2X</span>
                                <span v-if="index == 3">3X</span>
                                <span>2</span>
                            </div>
                        </th>
                    </template>
                    <th class="col-1 text-center">More</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">
                    </td>
                    <td>
                        <p>
                            <span>
                                <img :src="item.team1_img" alt="..">
                                {{ item.team1 }}
                            </span>
                        </p>
                        <p>
                            <span>
                                <img :src="item.team2_img" alt="..">
                                {{ item.team2 }}
                            </span>
                        </p>
                        <p>
                            <span class="float-end">
                                <a href="" class="me-2 d-none">
                                    <i class="fal fa-chart-bar"></i>
                                </a>
                            </span>
                        </p>
                    </td>

                    <td v-if="index <= 2" v-for="(question, index) in item.questions">
                        <div class="d-flex justify-content-evenly w-100">
                            <button type="button" :disabled="option.is_unlock_question == 1 || option.is_unlock_match == 1 " :class="{ disabled: (option.is_unlock_question == 1 || option.is_unlock_match == 1) }" v-for="(option, index) in question.options" :title="option.option_name" @click="addToSlip(option)">
                                <i v-if="option.is_unlock_question == 1 || option.is_unlock_match == 1" class="fas fa-lock-alt"></i> {{ option.ratio}}
                            </button>
                        </div>

                        <div v-if="(question.options).length == 0" class="d-flex justify-content-evenly w-100">
                            <button type="button" class="disabled downgrade">-</button>
                            <button type="button" class="disabled downgrade">-</button>
                        </div>

                    </td>

                    <template v-if="3 > (item.questions).length ">
                        <td v-for="index in (3 - (item.questions).length )" :key="index">
                            <div class="d-flex justify-content-evenly w-100">
                                <button type="button" class="disabled downgrade">-</button>
                                <button type="button" class="disabled downgrade">-</button>
                            </div>
                        </td>
                    </template>
                    <td>
                        <button type="button" v-if="0 == (item.questions).length" disabled class="disabled">-</button>
                        <button @click="goMatch(item)" type="button" v-else>+{{ (item.questions).length }}</button>
                    </td>
                </tr>
        </table>
    </div>


    <!-- Upcoming match table -->
    <div v-if="showType == 'upcoming'" v-for="(item, index) in upcoming_filter" class="table-parent table-responsive d-sm-block d-none">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">
                        <span v-html="item.game_category.icon"></span>
                    </th>
                    <th class="col-5">
                        <span>
                            {{item.game_tournament.name}} <span v-if="item.name">- {{item.name}} </span>
                        </span>
                    </th>

                    <th v-if="index <= 2" class="col-2" v-for="(question, index) in item.questions">
                        <div class="d-flex justify-content-evenly">
                            <span>1</span>
                            <span>{{question.name}}</span>
                            <span>2</span>
                        </div>
                    </th>

                    <template v-if="3 > (item.questions).length ">
                        <th class="col-2" v-for="index in (3 - (item.questions).length )" :key="index">
                            <div class="d-flex justify-content-evenly">
                                <span>1</span>
                                <span v-if="index == 1">X</span>
                                <span v-if="index == 2">2X</span>
                                <span v-if="index == 3">3X</span>
                                <span>2</span>
                            </div>
                        </th>
                    </template>
                    <th class="col-1 text-center">More</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">
                    </td>
                    <td>
                        <p>
                            <span>
                                <img :src="item.team1_img" alt="..">
                                {{ item.team1 }}
                            </span>
                        </p>
                        <p>
                            <span>
                                <img :src="item.team2_img" alt="..">
                                {{ item.team2 }}
                            </span>
                        </p>
                        <p>
                            <span class="float-end">
                                <a href="" class="me-2 d-none">
                                    <i class="fal fa-chart-bar"></i>
                                </a>
                            </span>
                        </p>
                    </td>

                    <td v-if="index <= 2" v-for="(question, index) in item.questions">
                        <div class="d-flex justify-content-evenly w-100">
                            <button type="button" :disabled="option.is_unlock_question == 1 || option.is_unlock_match == 1 " :class="{ disabled: (option.is_unlock_question == 1 || option.is_unlock_match == 1) }" v-for="(option, index) in question.options" :title="option.option_name" @click="addToSlip(option)">
                                <i v-if="option.is_unlock_question == 1 || option.is_unlock_match == 1" class="fas fa-lock-alt"></i> {{ option.ratio}}
                            </button>
                        </div>

                        <div v-if="(question.options).length == 0" class="d-flex justify-content-evenly w-100">
                            <button type="button" class="disabled downgrade">-</button>
                            <button type="button" class="disabled downgrade">-</button>
                        </div>

                    </td>

                    <template v-if="3 > (item.questions).length ">
                        <td v-for="index in (3 - (item.questions).length )" :key="index">
                            <div class="d-flex justify-content-evenly w-100">
                                <button type="button" class="disabled downgrade">-</button>
                                <button type="button" class="disabled downgrade">-</button>
                            </div>
                        </td>
                    </template>
                    <td>
                        <button type="button" v-if="0 == (item.questions).length" disabled class="disabled">-</button>
                        <button @click="goMatch(item)" type="button" v-else>+{{ (item.questions).length }}</button>
                    </td>
                </tr>
        </table>
    </div>

    <div class="live-matches d-sm-none" v-if="showType == 'live'">
        <h5>Live Matches</h5>
        <div class="live-matches-slider owl-carousel">
            <div class="box" v-for="(item, index) in allSports_filter">
                <h5 class="mb-3">{{ item.game_tournament.name }}</h5>
                <div class="row d-flex justify-content-around align-items-center">
                    <div class="col-3 team">
                        <img class="img-fluid" :src="item.team1_img" alt="..." />
                        <p>{{ item.team1}}</p>
                    </div>
                    <div class="col-6">
                        <span>{{item.name}} </span>
                        <h5 v-if="0 < item.questions.length ">{{ slicedArray(item.questions).name}}</h5>
                        <button class="btn-custom w-75 my-2" @click="goMatch(item)">See More</button>
                    </div>
                    <div class="col-3 team">
                        <img class="img-fluid" :src="item.team2_img" alt="..." />
                        <p>{{ item.team2}}</p>
                    </div>

                    <div class="col-12 align-self-end">

                        <div v-if="0 < item.questions.length" class="d-flex justify-content-between">
                            <button class="btn-light" type="button" :class="{ disabled: (option.is_unlock_question == 1 || option.is_unlock_match == 1) }" :disabled="option.is_unlock_question == 1 || option.is_unlock_match == 1 " :title="option.option_name" @click="addToSlip(option)" v-for="(option, index) in (slicedArray(item.questions).options)">

                                <i v-if="option.is_unlock_question == 1 || option.is_unlock_match == 1" class="fas fa-lock-alt"></i>
                                {{ option.ratio }}
                            </button>

                        </div>

                        <div v-else class="d-flex justify-content-between">
                            <button type="button" disabled class="btn-light disabled downgrade-mobile">-</button>
                            <button type="button" disabled class="btn-light disabled downgrade-mobile">-</button>
                            <button type="button" disabled class="btn-light disabled downgrade-mobile">-</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="live-matches d-sm-none" v-if="showType == 'upcoming'">
        <h5>Upcoming Matches</h5>
        <div class="live-matches-slider owl-carousel">
            <div class="box" v-for="(item, index) in upcoming_filter">
                <h5 class="mb-3">{{ item.game_tournament.name }}</h5>
                <div class="row d-flex justify-content-around align-items-center">
                    <div class="col-3 team">
                        <img class="img-fluid" :src="item.team1_img" alt="..." />
                        <p>{{ item.team1}}</p>
                    </div>
                    <div class="col-6">
                        <span>{{item.name}} </span>
                        <h5 v-if="0 < item.questions.length ">{{ slicedArray(item.questions).name}}</h5>
                        <button class="btn-custom w-75 my-2" @click="goMatch(item)">See More</button>
                    </div>
                    <div class="col-3 team">
                        <img class="img-fluid" :src="item.team2_img" alt="..." />
                        <p>{{ item.team2}}</p>
                    </div>

                    <div class="col-12 align-self-end">

                        <div v-if="0 < item.questions.length" class="d-flex justify-content-between">
                            <button class="btn-light" type="button" :class="{ disabled: (option.is_unlock_question == 1 || option.is_unlock_match == 1) }" :disabled="option.is_unlock_question == 1 || option.is_unlock_match == 1 " :title="option.option_name" @click="addToSlip(option)" v-for="(option, index) in (slicedArray(item.questions).options)">

                                <i v-if="option.is_unlock_question == 1 || option.is_unlock_match == 1" class="fas fa-lock-alt"></i>
                                {{ option.ratio }}
                            </button>

                        </div>

                        <div v-else class="d-flex justify-content-between">
                            <button type="button" disabled class="btn-light disabled downgrade-mobile">-</button>
                            <button type="button" disabled class="btn-light disabled downgrade-mobile">-</button>
                            <button type="button" disabled class="btn-light disabled downgrade-mobile">-</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<?php 
include 'includes/footer.php';
?>