<style>

    footer{
        font-size: 12px;
    }

    p.copyright{
        font-size: 12px !important;

    }
    footer li a{
        color: white !important;
        list-style: none;
        margin-right: 15px;
    }
    footer li a:hover{
        color: #9e1461 !important;
        text-decoration: none;
    }
    footer ul li{
        display: inline-block;
    }
</style>
<!-- Footer -->
<footer id="footer" class="row" style="margin-top: 5px;" >
    <!-- Main Footer -->
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div id="main-footer">

            <div class="row">







                <!-- Information -->
                <div class="col-lg-6 col-md-6 col-sm-6">

                    <ul>
                        <li><a href="<?php echo base_url(); ?>home/about/" ><i class="icons icon-right-dir"></i> About Buriani</a></li>
                        <li><a href="<?php echo base_url(); ?>home/products" ><i class="icons icon-right-dir"></i> Buriani Products</a></li>
                        <li><a href="<?php echo base_url(); ?>home/contact" ><i class="icons icon-right-dir"></i> Contact Us</a></li>
                        <li><a href="<?php echo base_url(); ?>home/faqs" ><i class="icons icon-right-dir"></i> FAQs</a></li>
                        <li><a href="<?php echo base_url(); ?>home/tandc" ><i class="icons icon-right-dir"></i> Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <!-- /Information -->
                <div class="col-lg-6">
                    <div class="pull-right">
                        <a href="https://play.google.com/store/apps/details?id=com.buriani.poxy.burianiswift" target="_blank"><img src="<?php echo base_url(); ?>img/gp.png" style="height:40px;"/></a>
                    </div>
                </div>



            </div>

        </div>

    </div>
    <!-- /Main Footer -->



    <!-- Lower Footer -->
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div id="lower-footer"  style="background: #9e1461; color: white;">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <p class="copyright"  style="color: white;">Copyright &copy; <?php echo date('Y') ?> <a href="#"> DIGISTEPS INFORMATION TECHNOLOGY SOLUTIONS</a>. All Rights Reserved.</p>
                </div>



            </div>

        </div>

    </div>
    <!-- /Lower Footer -->

</footer>
<!-- Footer -->

<div id="createModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <!--        <button type="button" class="close" data-dismiss="modal">&times;</button>-->
                <h4 class="modal-title"><strong>How to post a listing on buriani.co.ke</strong></h4>
            </div>
            <div class="modal-body">
                <p><img src="<?php echo base_url(); ?>img/obituarylisting.PNG" alt="obituarylisting"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Thank You</button>
            </div>
        </div>

    </div>
</div>

<div id="payModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <!--        <button type="button" class="close" data-dismiss="modal">&times;</button>-->
                <h4 class="modal-title">How to make Payments</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Thank you</button>
            </div>
        </div>

    </div>
</div>