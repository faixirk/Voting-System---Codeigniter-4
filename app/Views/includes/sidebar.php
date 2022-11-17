<!-- wrapper -->
<div class="wrapper" id="getMatchList" v-cloak>
    <!-- leftbar -->
    <div class="leftbar" id="leftbar">
        <div class="px-1 mt-2 d-lg-none">
            <button class="remove-class-btn light btn-custom" onclick="removeClass('leftbar')">
                <i class="fal fa-chevron-left"></i> Back </button>
        </div>
        <div class="top p-1 d-flex">
            <button @click="liveUpComing('live')" type="button" :class="{light: (showType == 'upcoming')}" class="btn-custom me-1">
                <i class="las la-podcast"></i>
                Live </button>
            <button @click="liveUpComing('upcoming')" type="button" :class="{light: (showType == 'live')}" class="btn-custom ">
                <i class="las la-meteor"></i>
                Upcoming </button>
        </div>
        <ul class="main">
            <li>
                <a class="active" href="https://script.bugfinder.net/prophecy">
                    <i class="far fa-globe-americas"></i> <span>All Categories</span>
                </a>
            </li>
            <?php foreach($categories as $key => $cat): ?>
                <?php if($cat['cat_status'] == 'on'){ ?>
            <li>
                <a class="dropdown-toggle " data-bs-toggle="collapse" href="#collapse4" role="button" aria-expanded="true" aria-controls="collapseExample">
                    <i class="far fa-futbol" aria-hidden="true"></i><?= $cat['cat_title']; ?>
                    <span class="count"><span class="font-italic">(9)</span></span>
                </a>
                <!-- dropdown item -->
               <?php if($cat['have_sub_cat'])  { ?>
                <div class="collapse show" id="collapse4">
                    <ul class="">
                        <?php foreach($sub_categories as $sub_cat){ ?>
                        <?php if($sub_cat['cat_id'] == $cat['cat_id']) { ?>
                        <li>
                            <a href="#" class="sidebar-link ">
                                <i class="far fa-hand-point-right"></i> <?= $sub_cat['sub_cat_title'] ?></a>
                        </li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?> 
            </li>
            <?php } ?>
        <?php endforeach; ?>
            
        </ul>

        <div class="bottom p-1">
            <a href="https://script.bugfinder.net/prophecy/bet/result" class="btn-custom light w-100">results</a>
        </div>
    </div>