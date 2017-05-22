
<!DOCTYPE html>

<html>

    <head>

        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title -->
        <title>Home - <?php echo $title;?></title>

      

    </head>


    <body>
  <?php $this->load->view('partials/header'); ?>
        <!-- Container -->
        <div class="container card " style="width:100% !important;">

            <!-- Header -->
            <?php $this->load->view('partials/top-header'); ?>
            <!-- /Header -->


            <!-- Content -->
            <div class="row content MAIN_AREA">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumbs">
                        <p>
                              <?php if ($this->session->userdata('user_id') == TRUE && $this->session->userdata('type') > 0) { ?>
                         
                            <a href="<?php echo base_url(); ?>admin/obituaries/" >
                               
                               &Lt; Obituaries Dashboard |
                            </a>
                       
                            <?php
                        } else {
                            echo '';
                        };
                        ?>
                            
                            <a href="<?php echo base_url();?>">Home</a> <i class="icons icon-right-dir"></i><?php echo $ptitle;?> </p>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="row col-md-12"><center><img style="margin:10px; display:none;" class="LOADERONE" src="<?php echo base_url();?>img/buriani-loader.gif" alt="Loading Search Data...." width="300px;"/></center></div>
                <section class="main-content col-lg-8 col-md-8 col-sm-8 col-lg-push-2 col-md-push-2 col-sm-push-2 MAIN_CONTENT">


                    <?php $this->load->view($content); ?>


                </section>
                <!-- /Main Content -->
                 



                <!-- Sidebar -->
                <?php $this->load->view('partials/categories'); ?>
                <!-- /Sidebar -->
             
            </div>
            <!-- /Content -->
              


            <!-- Banner -->
              <?php //$this->load->view('partials/bads'); ?>

            <!-- /Banner -->


            <!-- Footer -->
            <?php $this->load->view('partials/top-footer'); ?>

            <!-- Footer -->


            <div id="back-to-top">
                <i class="icon-up-dir"></i>
            </div>

        </div>
        <!-- Container -->



        <?php $this->load->view('partials/footer'); ?>
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/58c91f6c78d62074c0a1f206/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    </body>

</html>

