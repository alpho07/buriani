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
<div class="row">

    <!-- Heading -->
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="category-heading">
            <span>LATEST ADS</span>
             <div class="category-buttons">
                <?php  if ($this->input->get('page')=='grid') {?>
         <a href="<?php echo base_url().'search/'.$gridview; ?>"><i class="icons icon-th-3 active-button"></i></a>
                <a href="<?php echo base_url().'search/'.$listview; ?>"><i class="icons icon-th-list-4 "></i></a>
        <?php } else {?>
                <a href="<?php echo base_url().'search/'.$gridview; ?>"><i class="icons icon-th-3 active-button"></i></a>
                <a href="<?php echo base_url().'search/'.$listview; ?>"><i class="icons icon-th-list-4 "></i></a>   
                <?php }?>
        </div>
    </div>
<!-- /Heading -->

<div class="row"> 
    <?php foreach ($flist as $ob): ?>
        <div class="col-lg-3 col-md-3 col-sm-3 product ">

            <div class="product-image" >
                <a href="<?php echo base_url() . 'home/loadsingle/' . $ob->id . '/' . str_replace(" ", "-", $ob->title); ?>">
                    <img src="<?php echo base_url() . $ob->image_path; ?>" alt="<?php echo $ob->title; ?>" />
                </a>

            </div>

            <div class="product-info card">
                <h5><a href="<?php echo base_url() . 'home/loadsingle/' . $ob->id . '/' . str_replace(" ", "-", $ob->title); ?>"><?php echo mb_strimwidth($ob->title , 0, 22, "..."); ?></a></h5>
                <span class="price"><?php echo $ob->price; ?></span>
            </div>

        </div>
    <?php endforeach; ?>
    
     <div class="col-lg-12 col-md-12 col-sm-12">
       <?php echo $pages;?> 
    </div>
</div>
