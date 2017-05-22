<style>
    .fix-search {
        position: fixed;
        top: 10px;

    }

</style>
<aside class="sidebar col-lg-2 col-md-2 col-sm-2  col-lg-pull-8 col-md-pull-8 col-sm-pull-8">

    <!-- Categories -->
    <?php if ($this->uri->segment(2) == ''):else: ?>
        <div class="row sidebar-box purple">

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="sidebar-box-heading">
                    <i class="icons icon-folder-open-empty"></i>
                    <h4>Categories</h4>
                </div>

                <div class="sidebar-box-content">
                    <?php
                    $menu = & get_instance();
                    $menu->menuBuilder();
                    ;
                    ?>
                </div>
            

            </div>
             <?php if ($this->uri->segment(2) == 'postobituary' || 
                     $this->uri->segment(2) == 'postobituarya' || 
                     $this->uri->segment(2) == 'postad' || 
                     $this->uri->segment(2) == 'postada'|| 
                     $this->uri->segment(2) == 'loadprofile' ||
                     $this->uri->segment(2) == 'loadProfile' ||
                     $this->uri->segment(2) == 'digres' ||
                     $this->uri->segment(2) == 'fpt'  ||
                     $this->uri->segment(2) == 'poems'  ||
                     $this->uri->segment(2) == 'poem'  ||
                     $this->uri->segment(2) == 'resources'  ||
                     $this->uri->segment(2) == 'all'  ||
                     $this->uri->segment(4) == 'ORBITUARIES'  ||
                     $this->uri->segment(2) == 'verses' ||
                     $this->uri->segment(2) == 'about' ||
                     $this->uri->segment(2) == 'allobs' ||
                     $this->uri->segment(2) == 'user' ||
                     $this->uri->segment(2) == 'products' ||
                     $this->uri->segment(2) == 'faqs' ||
                     $this->uri->segment(2) == 'policy'||
                     $this->uri->segment(2) == 'uploadIdScan'||
                     $this->uri->segment(2) == 'contact'||
                     $this->uri->segment(2) == 'pricing'||
                     $this->uri->segment(2) == 'edits'||
                     $this->uri->segment(2) == 'tandc'
                     
                     
                     )
                 
                 :else: ?>
                <div class="col-lg-12 col-md-12 col-sm-12">
      
                    <ul class="list-group">
                         <li style="margin:10px;"><p><strong><u>LOCATION</u></strong></p></li>
                     <?php foreach($region_count as $c):?>
                        <li class="list-group-item" style="font-size:15px;">        
                            <a href="<?php echo base_url().$url.$c->region;?>">                               
                                <span><?php echo $c->region;?></span>
                                <span class="pull-right-container">
                                    <span class="label label-primary pull-right" style="background: black; font-size: 10px"><?php echo $c->number;?></span>
                                </span>
                            </a>
                        </li>
                        <?php endforeach;?>
                        <li style="margin:10px;"><p><strong><u>PRICE</u></strong></p></li>
                        <li style="margin-top:30px;">
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="number" name="down" placeholder="MIN" class="form-control" value="<?php echo @$down;?>"> 
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" name="up" placeholder="MAX" class="form-control" value="<?php echo @$up;?>"> 
                                    </div>
                                    <br><p></p>
                                    <div class="row col-md-10 col-md-offset-1">
                                        
                                        <button type="submit"  class="form-control btn btn-primary" style="background: #9e1461; margin-top: 20px;"><i class="fa fa-search"></i> FIND ADVERT</button> 

                                    </div>
                                </div>
                                    
                            </form>
                            
                        </li>
                      </ul>


                </div>
            <?php endif;?>
        <?php endif; ?>
        <!-- /Categories -->


        <?php $this->load->view('partials/ads_left'); ?>

</aside>

<!-- Sidebar -->
<aside class="sidebar right-sidebar col-lg-2 col-md-2 col-sm-2">
    <?php $this->load->view('partials/ads_right'); ?>

</aside>
<!-- /Sidebar -->

<script>
    $(function () {
        /*
         var $sidebar   = $(".sidebar-box-content1"), 
         $window    = $(window),
         offset     = $sidebar.offset(),
         topPadding = 25;
         
         $window.scroll(function() {
         if ($window.scrollTop() > offset.top) {
         $sidebar.stop().animate({
         marginTop: $window.scrollTop() - offset.top + topPadding
         });
         } else {
         $sidebar.stop().animate({
         marginTop: 0
         });
         }
         });
         
         */



    });
</script>