<div class="row card ">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="category-heading">
            <span>POEM</span>

        </div>
    </div>


    <div class="row" style="padding: 30px;" > 
        <div class="title" >
            <p style="margin-left: 30px; font-weight: bolder; font-size: 24px; text-decoration: underline;"><?php echo $featured[0]->link;?></p>
        </div>
        
        <div class="title">
            <p style="margin-left: 30px; "><em><?php echo $featured[0]->body;?></em></p>
        </div>
        
        <p style="margin-left: 30px; "  class="pull-left"><a style="background: #000;" class="btn btn-sm btn-primary" href="<?php echo base_url();?>home/poems"><< Back to poems</a></p>
  
    </div>
</div>