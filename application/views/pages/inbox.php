<!DOCTYPE>
<html>

    <title><?php echo $title; ?></title>

    <?php $this->load->view('partials/header'); ?>
    <style type="text/css">
        #exTab1 .tab-content {

            padding : 5px 15px;
        }

        td{
            vertical-align: middle !important;
            text-align: center !important;
            padding: 0px !important;
        }

        table-hover td{
            text-align: left;
        }

    </style>
    <body>

        <!-- Container -->
        <div class="container ">

            <!-- Header -->
            <header class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- Top Header -->
                    <div id="top-header">

                        <div class="row">

                            <nav id="top-navigation" class="col-lg-7 col-md-7 col-sm-7">
                                <ul class="pull-left">
                                    <li><a class="btn btn-primary" href="<?php echo base_url(); ?>">Home</a></li>
                                    <li><a class="btn btn-primary" href="<?php echo base_url(); ?>">About</a></li>
                                    <li><a class="btn btn-primary" href="<?php echo base_url(); ?>">Contact</a></li>
                                    <?php if ($this->session->userdata('user_id') == TRUE && $this->session->userdata('type') > 0) { ?>
                                        <li><a class="btn btn-primary" href="<?php echo base_url(); ?>admin/admindashboard"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
                                        <?php
                                    } else {
                                        echo '';
                                    };
                                    ?>

                                </ul>
                            </nav>

                            <nav class="col-lg-5 col-md-5 col-sm-5">
                                <ul class="pull-right">
                                    <li style="width:150px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></li>
                                    <li><a href="#" ><i class="icons icon-user-3"></i> <?php echo $this->session->userdata('username'); ?></a></li>
                                    <li><a href="<?php echo base_url(); ?>home/logout" class="btn btn-danger pull-right"><i class="fa fa-power-off"></i> Logout</a></li>

                                    <li><a href="<?php echo base_url(); ?>home/postada" class="btn btn-primary"><i class="icons icon-plus-1"></i> Post Ad</a></li>
                                    <li><a href="<?php echo base_url(); ?>home/postobituarya" class="btn btn-primary"><i class="icons icon-plus-1"></i> Post Obituary</a></li>
                                </ul>
                            </nav>

                        </div>

                    </div>
                    <!-- /Top Header -->





                </div>

            </header>
            <!-- /Header -->


            <!-- Content -->
            <div class="row content">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumbs">
                        <p><a href="<?php echo base_url(); ?>">Home</a> <i class="icons icon-right-dir"></i> User &#187; <a href="<?php echo base_url() . 'home/userdashboard/'; ?>">Dashboard</a> &#187; Inbox &#187; Messages</p>
                    </div>
                </div>

                <!-- Main Content -->
                <section class="main-content col-lg-12 col-md-12 col-sm-12">

                    <div class="row">

                        <!-- Heading -->
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <div class="carousel-heading">
                                <h4>Inbox &#187; Message &#187; Read</h4>
                                <div class="carousel-arrows">
                                    <a href="#"><i class="icons icon-reply"></i></a>
                                </div>
                            </div>

                        </div>
                        <!-- /Heading -->

                    </div>	


                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">   

                            <div class="col-lg-12 col-md-12 col-sm-12 ">


                                <div class="page-content contact-form">


                                        <label>From</label>
                                        <input type="text" readonly value="<?php echo $ads[0]->name .'('.$ads[0]->email.')';?>">

                                        <label>Subject</label>
                                        <input type="text" readonly value='<?php echo $ads[0]->subject .' ( AD ID: '.$ads[0]->ad_id.')';?>'>
                                        
                                        <label>Date & Time Sent</label>
                                        <input type="text" readonly value='<?php echo $ads[0]->date_time ;?>'>

                                        <label>Message</label>
                                        <textarea readonly ><?php echo $ads[0]->message ;?>'</textarea>

                                        <input type="submit" value="Back to Inbox" class="big" onclick="back()">


                                </div>

                            </div>

                        </div>

                    </div>


                </section>
                <!-- /Main Content -->

            </div>
            <!-- /Content -->

            <script>
                  
                    function back(){
                        window.location.href=base_url+'home/userdashboard/';
                    }
                $(document).ready(function () {
                    base_url = "<?php echo base_url(); ?>";
                    loadTitles();
                    function loadTitles() {
                        $('.display1234').dataTable();
                    }
                    $('#Save').click(function () {
                        $.post(base_url + 'home/updateUserDetails', $('#user_update').serialize(), function () {
                            $.Zebra_Dialog("Your Update successfully Updated!", {
                                'type': 'success',
                                'title': 'Update Status',
                                'buttons': [
                                    {caption: 'Okey', callback: function () {


                                        }}
                                ]
                            });
                            return false;
                        }).fail(function () {
                            console.log('An error occured');
                        });
                        return false;
                    });
                  

                    $('#Delete').click(function () {

                        $.Zebra_Dialog("You are about to delete this account completely and all its ad references, this action is <strong>permanent</strong> and cannot be undone. Do you want to continue?", {
                            'type': 'warning',
                            'title': 'Deleting Account',
                            'buttons': [
                                {caption: 'Yes', callback: function () {
                                        $.post(base_url + 'home/removeUserAccounts', function () {
                                            window.location.href = base_url;
                                        }).fail(function () {
                                            console.log('An error occured');
                                        });

                                    }},
                                {caption: 'No', callback: function () {


                                    }}
                            ]
                        });



                    });
                });
            </script>

            <div id="back-to-top">
                <i class="icon-up-dir"></i>
            </div>

        </div>
        <?php $this->load->view('partials/footer'); ?>


    </body>

</html>