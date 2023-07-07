<!-- wrapper -->
<div class="wrapper" id="getMatchList" v-cloak>
    <!-- leftbar -->
    <div class="leftbar" id="leftbar">
        <div class="px-1 mt-2 d-lg-none">
            <button class="remove-class-btn light btn-custom" onclick="removeClass('leftbar')">
                <i class="fal fa-chevron-left"></i> Back </button>
        </div>
        <div class="top p-1 d-flex">
            <button disabled type="button"  class="btn-custom me-1">
                <i class="las la-podcast"></i>
                All Categories </button>
            
        </div>
        <ul class="main">
           
            <?php foreach($categories as $key => $cat): ?>
                <?php if($cat['cat_status'] == 'on'){ ?>
            <li>
                <a class="dropdown-toggle " data-bs-toggle="collapse" href="#collapse<?= $cat['cat_id']; ?>"
                 role="button" aria-expanded="true" aria-controls="collapseExample">
                    <i class="far fa-futbol" aria-hidden="true"></i><?= $cat['cat_title']; ?>
                    <!-- <span class="count"><span class="font-italic">(9)</span></span> -->
                </a>
                <!-- dropdown item -->
               <?php if($cat['have_sub_cat'])  { ?>
                <div class="collapse show" id="collapse<?= $cat['cat_id']; ?>">
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
            <a href="<?=base_url('/results')?>" class="btn-custom light w-100">Results</a>
        </div>
    </div>