<div class="row card">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="category-heading">
            <span>POEMS</span>

        </div>
    </div>


    <div class="row"> 

        <div class="col-lg-12 col-md-12 col-sm-12 ">
           <?php foreach($featured as $f):?>
         <div class="col-md-4 ">
                    <div class="panel" style="border:1px solid #ca89ae;">
              <div class="panel-heading"><h5><?php echo mb_strimwidth($f->link,0,28,'...');?></h5></div>
              <div class="panel-body"><a href="<?php echo base_url().'home/poem/'.$f->id;?>" class="btn btn-sm pull-right" style="background: #9e1461; color:white;">View Poem >></a></div>
    </div>

        </div>
        <?php endforeach;?>
        </div>







    </div>
</div>