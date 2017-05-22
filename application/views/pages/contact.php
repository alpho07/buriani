<style>
    .ABOUT li{
        font-size: 16px;
    }
</style>
<div class="row card">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="category-heading">
            <span style="font-weight: bolder;"><strong>CONTACT US</strong></span>

        </div>
    </div>


    <div class="row ABOUT" style="padding: 40px;"> 





        <div class="page-content contact-info">

            <iframe width="425" height="350" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.824002102557!2d36.87526361432534!3d-1.2791833359782183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f13f872a879a1%3A0x6c376e2006521589!2sEpren+Centre+Buruburu!5e0!3m2!1sen!2ske!4v1493056415003"  frameborder="0" style="border:0" allowfullscreen></iframe>
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="contact-item green">
                        <i class="icons icon-location-3"></i>
                        <p>BURIANI, EPREM Center Buruburu<br>

                            3<sup>rd</sup> Floor.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="contact-item blue">
                        <i class="icons icon-mail"></i>
                        <p><a href="mailto:info@buriani.co.ke">info@buriani.co.ke</a><br>
                            <a href="mailto:sales@buriani.co.ke">sales@buriani.co.ke</a>
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="contact-item orange">
                        <i class="icons icon-phone"></i>
                        <p>0705 982 415<br>
                            020-2161208
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="contact-item purple">

                    </div>
                </div>

            </div>

        </div>






        <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="carousel-heading no-margin">
                <h4>Contact Form</h4>
            </div>

            <div class="page-content contact-form">



                <form  action="<?php echo base_url(); ?>home/sendmail" method="post">
                    <?php if ($this->session->flashdata('msg')) { ?>
                    <p><div class="" style="background: lightgreen; border: 1px solid black;  text-align: center; "><i class="fa fa-check-circle-o"></i> <span id=""><?php echo $this->session->flashdata('msg'); ?></span></div></p>

                    <?php } else { ?>

                    <?php } ?>
                    <label>Name(required)</label>
                    <input name="contact-name" type="text" required>

                    <label>Email(required)</label>
                    <input name="contact-email" type="text" required="">

                    <label>Subject</label>
                    <input name="contact-subject" type="text" required>

                    <label>Message</label>
                    <textarea name="contact-message" required></textarea>

                    <input class="btn btn-lg btn-primary" type="submit" value="Send Message">

                </form>

            </div>

        </div>


    </div>





</div>
