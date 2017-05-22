<style type="text/css">
    .ribbon {
  position: absolute;
  left: 10px; top: -5px;
  z-index: 1;
  overflow: hidden;
  width: 75px; height: 75px;
  text-align: right;
}
.ribbon span {
  font-size: 10px;
  font-weight: bold;
  color: #FFF;
  text-transform: uppercase;
  text-align: center;
  line-height: 20px;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  width: 100px;
  display: block;
  background: #9e1461;
  background: linear-gradient(#9e1461 0%, #9e1461 100%);
  box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
  position: absolute;
  top: 19px; left: -21px;
}
.ribbon span::before {
  content: "";
  position: absolute; left: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid #8F0808;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #8F0808;
}
.ribbon span::after {
  content: "";
  position: absolute; right: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid transparent;
  border-right: 3px solid #8F0808;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #8F0808;
}
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
            <span>ALL LISTINGS</span>
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
<!-- /Heading -->
<?php if(empty($flist)){?>
<div class="col-lg-12 col-md-12 col-sm-12 ">
    <?php if($this->session->userdata('user_id') == TRUE){?>
            <p>No Ads or Obituaries found in the selected criteria please be the first to create the <a class="btn btn-default btn-lg" style="background: #9e1461; color: white; font-weight: bold;" href="<?php echo base_url().'home/postada';?>"><i class="fa fa-paper-plane-o"></i> Normal Ad</a> or <a class="btn btn-default btn-lg" style="background: #9e1461; color: white; font-weight: bold;" href="<?php echo base_url().'home/postobituarya';?>"><i class="fa fa-paper-plane-o"></i> Obituary</a>.</p>

    <?php }else{?>
    <p>No Ads or Obituaries found in the selected criteria please be the first to create the <a class="btn btn-default btn-lg" style="background: #9e1461; color: white; font-weight: bold;" href="<?php echo base_url().'home/postad';?>"><i class="fa fa-paper-plane-o"></i> Normal Ad</a> or <a class="btn btn-default btn-lg" style="background: #9e1461; color: white; font-weight: bold;" href="<?php echo base_url().'home/postobituary';?>"><i class="fa fa-paper-plane-o"></i> Obituary</a>.</p>

    <?php } ?>
</div>
<?php  }else{?>
<div class="row card" style="padding:10px;"> 
  
    <?php foreach ($flist as $ob): 
         $img = explode(",", $ob->image_path);
        
        ?>
       
        <div class="col-lg-3 col-md-3 col-sm-3 product ">
          <?php if($ob->premium==='1'){?>
            <div class="ribbon"><span>PREMIUM</span></div>
            <?php }else{ ?>
            
            <?php } ?>
            <div class="product-image" >
                <a href="<?php echo base_url() . 'home/loadsingle/' . $ob->id . '/' . str_replace(" ", "-", $ob->title); ?>">
                    <img src="<?php echo base_url() . $img[0]; ?>" alt="<?php echo $ob->title; ?>" />
                </a>

            </div>

            <div class="product-info card">
                <h5><a  style="color:#000 !important;" href="<?php echo base_url() . 'home/loadsingle/' . $ob->id . '/' . str_replace(" ", "-", $ob->title); ?>"><?php echo mb_strimwidth($ob->title , 0, 16, "..."); ?></a></h5>
                <span class="price "  style="color:#9e1461 !important;">KES. <?php echo number_format($ob->price,2); ?></span>
            </div>

        </div>
    <?php endforeach; ?>
    
     <div class="col-lg-12 col-md-12 col-sm-12">
       <?php echo $pages;?> 
    </div>
</div>
<?php } ?>
