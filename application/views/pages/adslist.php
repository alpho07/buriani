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


   

<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="category-heading">
            <span>LATEST OBITUARUES</span>
           <div class="category-buttons">
                <a href="<?php echo base_url().$gridview; ?>"><i class="icons icon-th-3"></i></a>
                <a href="<?php echo base_url().$listview; ?>"><i class="icons icon-th-list-4 active-button"></i></a>
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

                    <a href="<?php echo base_url() . 'home/loadprofile/' . $ad->id.'/'.str_replace(" ", "-", $ad->title); ?>"><img src="<?php echo base_url() . $ad->image_path; ?>" alt="<?php $ad->title; ?>" height="200px" width="180px" />


                    </a>

                </div>

                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="product-info">


                        <span class="price"><a href="<?php echo base_url() . 'home/loadprofile/' . $ad->id.'/'.str_replace(" ", "-", $ad->title); ?>"><?php echo $ad->title; ?></a></span>
                        <div class="rating-box">
                        </div>
                        <p > <span class="price"><?php echo $ad->region; ?></span></p>
                        <p><span style="font-weight:bold; color:black;"><?php echo $ad->date_posted; ?></span></p>
                    </div>


                </div>
            </div>

        </div>
    <?php endforeach; ?>


    <div class="col-lg-12 col-md-12 col-sm-12">
       <?php echo $pages;?> 
    </div>

   

</div>




