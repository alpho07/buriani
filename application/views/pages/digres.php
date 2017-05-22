<div class="row card">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="category-heading">
            <span>DIGRES</span>

        </div>
    </div>


    <div class="row"> 

        <div class="row"> 
            <?php foreach ($featured as $ad): ?>
                <div class="col-md-10 col-md-offset-1 ">
                    <div class="panel" style="border:1px solid #ca89ae;">

                        <div class="panel-body">
                            <strong><?php echo $ad->body; ?></strong><br>
                            <?php if (strpos($ad->link, 'uploads') !== false) { ?>
                                <a href="<?php echo base_url() . $ad->link; ?>" class="btn btn-primary">Download Template</a>
                                <?php
                            } else {
                                echo $ad->link;
                            }
                            ?></div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>