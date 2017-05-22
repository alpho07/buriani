<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="category-heading">
            <span>BIBLE VERSES</span>

        </div>
    </div>


    <div class="row"> 
<?php foreach($featured as $f):?>
         <div class="col-md-12  ">
                    <div class="panel" style="border:1px solid #ca89ae;">
              <div class="panel-heading"><strong><?php echo $f->link;?></strong></div>
      <div class="panel-body"><?php echo $f->body;?></div>
    </div>

        </div>
        <?php endforeach;?>







    </div>
</div>