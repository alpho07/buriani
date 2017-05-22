<style type="text/css">
    .product-image{
        box-shadow: -1px 4px 6px 3px #CCCED0;
    }
    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    /* On mouse-over, add a deeper shadow */
    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
</style>




<div class="row"  style="padding:10px;">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="category-heading">
            <span><?php echo $ptitle; ?></span>
            <div class="category-buttons">
                <a href="<?php echo base_url() . $gridview; ?>"><i class="icons icon-th-3"></i></a>
                <a href="<?php echo base_url() . $listview; ?>"><i class="icons icon-th-list-4 active-button"></i></a>
            </div>
        </div>
    </div>



</div>

<div class="row"> 
    <?php foreach ($flist as $ad): ?>
        <!-- Product Item -->
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class="grid-view product card">
                <div class="product-image col-lg-4 col-md-4 col-sm-4">

                    <a href="<?php echo base_url() . 'home/loadprofile/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>"><img src="<?php echo base_url() . $ad->image_path; ?>" alt="<?php $ad->title; ?>" height="200px" width="180px" />


                    </a>

                </div>

                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="product-info">


                        <span class="" ><a style="color:#9e1461; font-weight: bold; font-size: 18px;" href="<?php echo base_url() . 'home/loadprofile/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>"><?php echo strtoupper($ad->title); ?></a></span>
                        <div class="rating-box">
                        </div>
                        <p > <span style="font-weight: bold;"><?php $b = explode('-', $ad->dob);
                        $d = explode('-', $ad->dod);
                        echo $ad->obtitle . " ($b[2]-$d[2])"; ?></span></p>
                        <p > <span class=""><?php echo mb_strimwidth($ad->description, 0, 250, '...'); ?></span></p>
                        <?php
                         
                        $posted = mysql_to_unix( $ad->created_at);
                        $now = time();
                        $units = 2;
                        $time = timespan( $posted, $now, $units);
                        ?>

                        <p><span style="font-weight:bold; color:black; font-style: normal;"><small>Listing Posted <?php echo $time . ' ago at ' . $ad->region; ?> </small></span></p>
                    </div>


                </div>
            </div>

        </div>
<?php endforeach; ?>


    <div class="col-lg-12 col-md-12 col-sm-12">
<?php echo $pages; ?> 
    </div>



</div>




