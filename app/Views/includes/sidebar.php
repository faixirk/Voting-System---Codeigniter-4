<!-- wrapper -->
<div class="wrapper" id="getMatchList" v-cloak>
        <!-- leftbar -->
        <div class="leftbar" id="leftbar">
            <div class="px-1 mt-2 d-lg-none">
                <button
                    class="remove-class-btn light btn-custom"
                    onclick="removeClass('leftbar')"
                >
                    <i class="fal fa-chevron-left"></i> Back                </button>
            </div>
            <div class="top p-1 d-flex">
                <button @click="liveUpComing('live')" type="button" :class="{light: (showType == 'upcoming')}"  class="btn-custom me-1">
                    <i class="las la-podcast"></i>
                    Live                </button>
                <button @click="liveUpComing('upcoming')" type="button" :class="{light: (showType == 'live')}"  class="btn-custom ">
                    <i class="las la-meteor"></i>
                    Upcoming                </button>
            </div>
            <ul class="main">
    <li>
        <a   class="active"             href="https://script.bugfinder.net/prophecy">
            <i class="far fa-globe-americas"></i> <span>All Sports</span>
        </a>
    </li>
            <li>
            <a
                class="dropdown-toggle "
                data-bs-toggle="collapse"
                href="#collapse4"
                role="button"
                aria-expanded="true"
                aria-controls="collapseExample">
                <i class="far fa-futbol" aria-hidden="true"></i>Football
                <span class="count"><span class="font-italic">(9)</span></span>
            </a>
            <!-- dropdown item -->

            <div class="collapse show" id="collapse4">
                <ul class="">
                                            <li>
                            <a href="https://script.bugfinder.net/prophecy/tournament/uffa/3" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> UFFA</a>
                        </li>
                                            <li>
                            <a href="https://script.bugfinder.net/prophecy/tournament/la-liga/4" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> La Liga</a>
                        </li>
                                            <li>
                            <a href="https://script.bugfinder.net/prophecy/tournament/bundesliga/22" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> Bundesliga</a>
                        </li>
                                            <li>
                            <a href="https://script.bugfinder.net/prophecy/tournament/world-cup/23" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> World Cup</a>
                        </li>
                                    </ul>
            </div>
        </li>
            <li>
            <a
                class="dropdown-toggle "
                data-bs-toggle="collapse"
                href="#collapse26"
                role="button"
                aria-expanded="true"
                aria-controls="collapseExample">
                <i class="far fa-cricket" aria-hidden="true"></i>Cricket
                <span class="count"><span class="font-italic">(5)</span></span>
            </a>
            <!-- dropdown item -->

            <div class="collapse " id="collapse26">
                <ul class="">
                                            <li>
                            <a href="https://script.bugfinder.net/prophecy/tournament/ipl/28" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> IPL</a>
                        </li>
                                            <li>
                            <a href="https://script.bugfinder.net/prophecy/tournament/world-cup/29" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> World Cup</a>
                        </li>
                                            <li>
                            <a href="https://script.bugfinder.net/prophecy/tournament/big-bash/30" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> Big Bash</a>
                        </li>
                                    </ul>
            </div>
        </li>
            <li>
            <a
                class="dropdown-toggle "
                data-bs-toggle="collapse"
                href="#collapse3"
                role="button"
                aria-expanded="true"
                aria-controls="collapseExample">
                <i class="far fa-shuttlecock" aria-hidden="true"></i>Badminton
                <span class="count"><span class="font-italic">(0)</span></span>
            </a>
            <!-- dropdown item -->

            <div class="collapse " id="collapse3">
                <ul class="">
                                            <li>
                            <a href="https://script.bugfinder.net/prophecy/tournament/world-cup/2" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> World Cup</a>
                        </li>
                                            <li>
                            <a href="https://script.bugfinder.net/prophecy/tournament/bwf-uber-cup/25" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> BWF Uber Cup</a>
                        </li>
                                    </ul>
            </div>
        </li>
            <li>
            <a
                class="dropdown-toggle "
                data-bs-toggle="collapse"
                href="#collapse5"
                role="button"
                aria-expanded="true"
                aria-controls="collapseExample">
                <i class="far fa-chess" aria-hidden="true"></i>Chess
                <span class="count"><span class="font-italic">(0)</span></span>
            </a>
            <!-- dropdown item -->

            <div class="collapse " id="collapse5">
                <ul class="">
                                            <li>
                            <a href="https://script.bugfinder.net/prophecy/tournament/world-cup/6" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> World Cup</a>
                        </li>
                                    </ul>
            </div>
        </li>
            <li>
            <a
                class="dropdown-toggle "
                data-bs-toggle="collapse"
                href="#collapse6"
                role="button"
                aria-expanded="true"
                aria-controls="collapseExample">
                <i class="far fa-basketball-ball" aria-hidden="true"></i>Basketball
                <span class="count"><span class="font-italic">(0)</span></span>
            </a>
            <!-- dropdown item -->

            <div class="collapse " id="collapse6">
                <ul class="">
                                            <li>
                            <a href="https://script.bugfinder.net/prophecy/tournament/ball-on-track/26" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> Ball on track</a>
                        </li>
                                            <li>
                            <a href="https://script.bugfinder.net/prophecy/tournament/basketball-league/27" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> Basketball League</a>
                        </li>
                                    </ul>
            </div>
        </li>
            <li>
            <a
                class="dropdown-toggle "
                data-bs-toggle="collapse"
                href="#collapse7"
                role="button"
                aria-expanded="true"
                aria-controls="collapseExample">
                <i class="far fa-field-hockey" aria-hidden="true"></i>Hockey
                <span class="count"><span class="font-italic">(0)</span></span>
            </a>
            <!-- dropdown item -->

            <div class="collapse " id="collapse7">
                <ul class="">
                                            <li>
                            <a href="https://script.bugfinder.net/prophecy/tournament/asia-cup/5" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> Asia Cup</a>
                        </li>
                                    </ul>
            </div>
        </li>
    </ul>

            <div class="bottom p-1">
                <a href="https://script.bugfinder.net/prophecy/bet/result" class="btn-custom light w-100">results</a>
            </div>
        </div>