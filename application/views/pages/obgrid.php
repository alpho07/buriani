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
   .product-image img {

height: 180px;
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;
}
</style>
<div class="row card" style="padding:10px;" >

    <!-- Heading -->
    <div class="col-lg-12 col-md-12 col-sm-12 ">
        <div class="category-heading">
            <span><?php echo $ptitle;?></span>
            <div class="category-buttons">
                <?php  if ($this->input->get('page')=='grid') {?>
         <a href="<?php echo base_url().$gridview; ?>"><i class="icons icon-th-3 active-button"></i></a>
                <a href="<?php echo base_url().$listview; ?>"><i class="icons icon-th-list-4 "></i></a>
        <?php } else {?>
                <a href="<?php echo base_url().$gridview; ?>"><i class="icons icon-th-3 active-button"></i></a>
                <a href="<?php echo base_url().$listview; ?>"><i class="icons icon-th-list-4 "></i></a>   
                <?php }?>
            </div>
        </div>
    </div>

<!-- /Heading -->

<div class="row" style="padding: 3px;"> 
      <?php
            foreach ($flist as $ob):

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
                      <a style="font-weight: bold;" href="<?php echo base_url() . 'home/loadProfile/' . $ob->id . '/' . str_replace(" ", "-", $ob->obtitle); ?>"><span class="price" style="color:#9e1461 !important; font-weight: bold;"><?php echo mb_strimwidth($ob->obtitle, 0, 15, '...'); ?></span></a>
                        <h6>Birth: <?php echo $ob->dob; ?>  </h6>
                        <h6>Died: <?php echo $ob->dod; ?>  </h6>
                    </div>

                </div>
            <?php endforeach; ?>
    
     <div class="col-lg-12 col-md-12 col-sm-12">
       <?php echo $pages;?> 
    </div>
</div>
