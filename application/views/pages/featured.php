<style type="text/css">

    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    /* On mouse-over, add a deeper shadow */
    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .product-image img { 
        background-position: 50% 50%;
        background-repeat:   no-repeat;
        background-size:     cover;
    }

</style>
<div class="row card" >

    <!-- Heading -->
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="carousel-heading">
            <h4>LATEST OBITUARIES</h4>
        </div>

    </div>
    <!-- /Heading -->

    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="row subcategories" >
            <?php
            foreach ($obituaries as $ob):

                $img = base_url() . $ob->image_path;
                if (@getimagesize($img)) {
                    $im = $img;
                } else {
                    $im = base_url() . "img/noimage.png";
                }
                ?>

                <!-- Subcategory -->
                <div class="col-lg-fifth col-md-fifth col-sm-fifth subcategory" >

                    <a class="product-image" href="<?php echo base_url() . 'home/loadProfile/' . $ob->id . '/' . str_replace(" ", "-", $ob->obtitle); ?>">
                        <img src="<?php echo base_url() . $ob->image_path; ?>" alt="<?php echo $ob->obtitle; ?>"  style="height:180px !important;"  /></a>
                    <div class="product-info card">
                        <h6><a href="<?php echo base_url() . 'home/loadProfile/' . $ob->id . '/' . str_replace(" ", "-", $ob->obtitle); ?>"><span class="price" style="color:#9e1461 !important;"><small><?php echo mb_strimwidth($ob->obtitle, 0, 15, '...'); ?></small></span></a></h6>
                        <h6>Birth: <?php echo $ob->dob; ?>  </h6>
                        <h6>Died: <?php echo $ob->dod; ?>  </h6>
                    </div>

                </div>
            <?php endforeach; ?>

        </div>

        <a href="<?php echo base_url(); ?>home/allobs" class="pull-right btn btn-warning" style="margin: 20px; background: #000;">View More <i class="fa fa-arrow-right"></i></a>
    </div>

</div>
<div class="row card" style="margin-top:10px; padding:10px;">
    <!-- Heading -->
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="carousel-heading">
            <h4>LATEST LISTINGS</h4>
        </div>

    </div>
    <!-- /Heading -->

    <div class="row"> 
        <?php
        foreach ($featured as $ob):
            $img = explode(',', $ob->image_path);
            ?>

            <div class="col-lg-3 col-md-3 col-sm-3 product ">

                <div class="product-image" style=";">
                    <div class=" imgLiquid" style="width:160px; height:160px;">
                        <a href="<?php echo base_url() . 'home/loadsingle/' . $ob->id . '/' . str_replace(" ", "-", $ob->title); ?>">
                            <img src="<?php echo base_url() . $img[0]; ?>" alt="<?php echo $ob->title; ?>" alt="Listing Image"/>
                        </a>
                    </div>

                </div>

                <div class="product-info card">
                    <h5><a style="color:black;" href="<?php echo base_url() . 'home/loadsingle/' . $ob->id . '/' . str_replace(" ", "-", $ob->title); ?>"><?php echo mb_strimwidth($ob->title, 0, 19, "..."); ?></a></h5>
                    <span class="price" style="color:#9e1461 !important;">KES. <?php echo number_format($ob->price, 2); ?></span>
                </div>

            </div>
        <?php endforeach; ?>
        <a href="<?php echo base_url(); ?>home/all" class="pull-right btn btn-success" style="margin: 20px; background: #000;">View More <i class="fa fa-arrow-right"></i></a>
    </div>
</div>
