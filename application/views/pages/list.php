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




<div class="row ">

    <div class="col-lg-12 col-md-12 col-sm-12 ">
        <div class="category-heading">
            <span>ALL LISTINGS : LIST</span>
            <div class="category-buttons">
                <a href="<?php echo base_url() . $gridview; ?>"><i class="icons icon-th-3"></i></a>
                <a href="<?php echo base_url() . $listview; ?>"><i class="icons icon-th-list-4 active-button"></i></a>
            </div>
        </div>
    </div>



</div>
<?php if (empty($flist)) { ?>
    <div class="col-lg-12 col-md-12 col-sm-12 ">
        <?php if ($this->session->userdata('user_id') == TRUE) { ?>
            <p>No Ads or Obituaries found in the selected criteria please be the first to create the <a class="btn btn-default btn-lg" style="background: #9e1461; color: white; font-weight: bold;" href="<?php echo base_url() . 'home/postada'; ?>"><i class="fa fa-paper-plane-o"></i> Normal Ad</a> or <a class="btn btn-default btn-lg" style="background: #9e1461; color: white; font-weight: bold;" href="<?php echo base_url() . 'home/postobituarya'; ?>"><i class="fa fa-paper-plane-o"></i> Obituary</a>.</p>

        <?php } else { ?>
            <p>No Ads or Obituaries found in the selected criteria please be the first to create the <a class="btn btn-default btn-lg" style="background: #9e1461; color: white; font-weight: bold;" href="<?php echo base_url() . 'home/postad'; ?>"><i class="fa fa-paper-plane-o"></i> Normal Ad</a> or <a class="btn btn-default btn-lg" style="background: #9e1461; color: white; font-weight: bold;" href="<?php echo base_url() . 'home/postobituary'; ?>"><i class="fa fa-paper-plane-o"></i> Obituary</a>.</p>

        <?php } ?>
    </div>
<?php } else { ?>
    <div class="row card" style="padding:10px;"> 
        <?php foreach ($flist as $ad):   $img = explode(",", $ad->image_path);?>
            <!-- Product Item -->
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <?php if ($ad->premium === '1') { ?>
                    <div class="ribbon"><span>PREMIUM</span></div>
                <?php } else { ?>

                <?php } ?>
                <div class="grid-view product card">
                    <div class="product-image col-lg-4 col-md-4 col-sm-4">

                        <a href="<?php echo base_url() . 'home/loadsingle/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>"><img class="" src="<?php echo base_url() . $img[0]; ?>" alt="<?php $ad->title; ?>" width="150px" height="180px">


                        </a>

                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="product-info">
  <?php
                         
                        $posted = mysql_to_unix( $ad->created_at);
                        $now = time();
                        $units = 2;
                        $time = timespan( $posted, $now, $units);
                        ?>

                            <span class="price"><a style="color:#000 !important;" href="<?php echo base_url() . 'home/loadsingle/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>"><?php echo $ad->title; ?></a><span style="color:#9e1461 !important; font-size: 21px;" class="pull-right">KES. <?php echo number_format($ad->price,2)?></span></span>
                            <div class="rating-box">
                            </div>
                            <p > <span class="price" style="color:#9e1461 !important;"><?php echo $ad->region; ?></span></p>
                            <p > <span class=""><?php echo mb_strimwidth($ad->description, 0, 240, '...'); ?></span></p>
                            <p><span style="font-weight:bold; color:black;"><small>Listing Posted: <?php echo $time .'ago at '. $ad->region; ?></small></span></p>
                        </div>


                    </div>
                </div>

            </div>
        <?php endforeach; ?>


        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php echo $pages; ?> 
        </div>



    </div>
<?php
}




