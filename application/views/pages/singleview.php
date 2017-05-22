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
<!-- Product -->
<div class="product-single card">

    <div class="row">

        <!-- Product Images Carousel -->
        <div class="col-lg-4 col-md-4 col-sm-4 product-single-image" >

            <section class="sidebar-slider">
                <div class="sidebar-flexslider">
                    <ul class="slides ">

                        <!--                        <li>
                                                    <a href="#"><img src="<?php echo base_url(); ?>img/products/avatar.png" alt="Slide1"/></a>
                                                </li>
                        
                                                <li>
                                                    <a href="#"><img src="<?php echo base_url(); ?>img/products/avatar.png" alt="Slide1"/></a>
                                                </li>-->
                        <li>
                            <a href="#"><img class="img-thumbnail" src="<?php echo base_url() . $info[0]->image_path; ?>" alt="Slide1" height="500px;"/></a>
                        </li>
                    </ul>
                </div>
                <div class="slider-nav"></div>
            </section>
        </div>

        <!-- /Product Images Carousel -->

        <div class="col-lg-8 col-md-8 col-sm-8 product-single-info full-size">
            <?php if ($this->session->userdata('user_id') == TRUE && $ver > 0) { ?>
                <a class="btn btn-success pull-right" style="margin: 20px;" href="<?php echo base_url() . 'home/editpf/' . $info[0]->id . '/' . str_replace(" ", "-", $info[0]->obtitle); ?>"><i class="fa fa-edit"></i> Edit</a>
                <?php
            } else {
                echo '';
            }
            ?>            
            <h2><?php echo $info[0]->title; ?></h2>
            <br>
            <div class="rating-box">             
                <?php echo $views; ?> Visitors(s)
            </div>
            <table>
                <tr>
                    <td>Name</td>
                    <td><?php echo $info[0]->obtitle; ?></td>
                </tr>
                <tr>
                    <td>Dates of Birth</td>
                    <td><?php echo $info[0]->dob; ?></td>
                </tr>
                <tr>
                    <td>Date Passed On</td>
                    <td><?php echo $info[0]->dod; ?></td>
                </tr>
            </table>


            <div class="product-actions">


            </div>



        </div>

    </div>

</div>
<!-- /Product -->


<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 ">

        <!-- Accordion -->
        <div class="accordion card">

            <ul>
                <!-- Item -->
                <li>

                    <div class="accordion-header">
                        <h4>Biography</h4>
                        <span class="accordion-button">
                            <i class="icons icon-plus-1"></i>
                        </span>
                    </div>
                    <div class="accordion-content page-content">
                        <p><?php echo $info[0]->description; ?></p>             
                    </div>

                </li>

                <li>

                    <div class="accordion-header">
                        <h4>More Information</h4>
                        <span class="accordion-button">
                            <i class="icons icon-plus-1"></i>
                        </span>
                    </div>
                    <div class="accordion-content page-content">
                        <p style="color:black !important;">
                            <?php echo $info[0]->more_info; ?>

                        </p>             
                    </div>

                </li>



                <li>
                    <div class="accordion-header">
                        <h4>Condolence Book</h4>
                        <span class="accordion-button">
                            <i class="icons icon-plus-1"></i>
                        </span>
                    </div>
                    <div class="accordion-content page-content">

                        <form method="POST" action="<?php echo base_url() . 'home/addcomment/' . $blogid . '/' . $pe; ?>">
                            <div class="row">

                                <?php if (($this->session->flashdata('message_success')) == TRUE) { ?>
                                    <div style="background: green; color:white; border: 1px solid green; border-radius: 3px; padding: 5px;" ><i class="fa fa-check"></i> <?php echo $this->session->flashdata('message_success'); ?></div>

                                <?php } ?>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4>CONDOLENCE MESSAGES . <?php echo count($comments); ?></h4>
                                    <?php if ($this->session->userdata('user_id') == TRUE): ?>
                                        <label>Name </label>
                                        <input type="text" name="name" required readonly value="  <?php
                                        if ($this->session->userdata('user_id') == TRUE):
                                            echo $this->session->userdata('username');
                                        else :
                                            echo '';
                                        endif;
                                        ?>">
                                        <br><br>


                                        <label>Message </label>
                                        <textarea style="height: 80px !important;" name="comment" required ></textarea>
                                        <br>

                                        <input type="submit" value="SIGN BOOK" class="btn btn-sm btn-primary pull-right">

                                    <?php else : ?>
                                        <input type="button" value="SIGN BOOK" id="SignBook" class="btn btn-sm btn-warning pull-right">

<?php endif; ?>

                                </div>

                            </div>
                        </form>
                        <?php if (empty($comments)): ?>
                            <span class="price">No Condolence Message, Be the first to pass message</span>
                            <?php else: ?>

                            <ul class="comments ">
    <?php foreach ($comments as $com): ?>
                                    <li class="well">
                                        <p><strong><a href="#"><?php echo $com->author; ?></a></strong></p>
                                        <span class="date"><?php echo $com->date; ?></span>
        <!--                                <i class="icons icon-reply"></i>-->
                                        <p><?php echo $com->body; ?></p>
                                    </li>
                            <?php endforeach; ?>

                            </ul>
<?php endif; ?>

                        <br/><br/>

                    </div>
                </li>
                <!-- /Item -->

            </ul>
            <!-- /Accordion -->
        </div>


    </div>

</div>

<hr>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 ">

        <div class="carousel-heading no-margin">
            <h4>Other Obituaries</h4>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 " style="margin-top:5px !important;">
        <div class="row subcategories " style="margin-left: 2px !important;">
<?php foreach ($similar as $ob): ?>

                <!-- Subcategory -->
                <div class="col-lg-fifth col-md-fifth col-sm-fifth subcategory" style="width:143px;" >

                    <a class="product-image" href="<?php echo base_url() . 'home/loadProfile/' . $ob->id . '/' . str_replace(" ", "-", $ob->obtitle); ?>">
                        <img src="<?php echo base_url() . $ob->image_path; ?>" alt="<?php echo $ob->obtitle; ?>"  style="height:150px !important;"  /></a>
                    <div class="product-info card">
                        <h5><a href="<?php echo base_url() . 'home/loadProfile/' . $ob->id . '/' . str_replace(" ", "-", $ob->title); ?>"><?php echo mb_strimwidth($ob->obtitle, 0, 10, "..."); ?></a></h5>
                    </div>

                </div>
<?php endforeach; ?>

        </div>
    </div>
</div>
<script>
    $(function () {
        current_url = "<?php echo current_url(); ?>";
        $('#SignBook').click(function () {
            $.Zebra_Dialog("Hello <strong>Guest</strong> due to the highly sensitive nature of your comment to the condolence book, you are required to login to sign the condolence book. \n\
If you are already registered login or register to submit your comment. Click <strong>Okey</strong> to login or Register..", {
                'type': 'info',
                'title': 'Authentication Required',
                'buttons': [
                    {caption: 'Okey', callback: function () {

                            $.post("<?php echo base_url() ?>home/setUrl", {url: current_url}, function () {
                                window.location.href = base_url + "auth/authorize/";
                            });

                        }}
                ]
            });
        });
    });
</script>
