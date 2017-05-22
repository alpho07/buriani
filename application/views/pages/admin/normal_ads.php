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
        <header >


            <nav class="navbar navbar-ct-white navbar-fixed-top" role="navigation">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand navbar-brand-logo" href="<?php echo base_url(); ?>" style="position:absolute;">
                        <div class="">
                            <img src="<?php echo base_url(); ?>/img/logo3.png" alt="Logo" width="250px">
                        </div>

                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo base_url(); ?>" >
                                <i class="fa fa-home"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li>
                            <a href="#<?php echo $this->session->userdata('username'); ?>">
                                <i class="fa fa-user"></i>
                                <p>Hello <?php echo $this->session->userdata('username'); ?></p>
                            </a>
                        </li>

                        <?php if ($this->session->userdata('user_id') == TRUE && $this->session->userdata('type') > 0) { ?>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/admindashboard" >
                                    <i class="fa fa-dashboard"></i>
                                    <p>Admin Dashboard</p>
                                </a>
                            </li>
                            <?php
                        } else {
                            echo '';
                        };
                        ?>

                        <li class="dropdown" style="margin-right: 5px;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-paper-plane-o"></i>
                                <p>Post Ad</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>home/postobituarya"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        Post Obituary</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>home/postada"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        Post Ad</a></li></ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>home/logout" >
                                <i class="fa fa-power-off"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->

            </nav>
            <!--  end navbar --> 

        </header>
        <!-- Container -->
        <div class="container" style="width:100% !important;">




            <!-- Content -->
            <div class="row content">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumbs">
                        <p><a href="<?php echo base_url(); ?>">Home</a> <i class="icons icon-right-dir"></i> <?php echo $ptitle; ?></p>
                    </div>
                </div>

                <!-- Main Content -->
                <section class="main-content col-lg-12 col-md-12 col-sm-12" style="margin-top:60px;">

                    <div class="row">

                        <!-- Heading -->
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <div class="carousel-heading">
                                <h4>Admin Dashboard &#187 Normal Ads</h4>
                                <div class="carousel-arrows">
                                    <a href="#"><i class="icons icon-reply"></i></a>
                                </div>
                            </div>

                        </div>
                        <!-- /Heading -->

                    </div>	


                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">


                            <div id="exTab1">	
                                <?php $this->load->view('pages/admin/admin_menu'); ?>

                                <div class="tab-content clearfix">
                                    <div class="tab-pane active" id="1a">
                                        <table id="example myTable" class="display1234" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th style="width:10px !important;"><input type="checkbox" value="" style="display:inline-block"/></th>
                                                    <th>Screenshot</th>
                                                    <th>Title</th>
                                                    <th>Listing ID</th>                                                  
                                                    <th>Category</th>
                                                    <th>Premium</th>
                                                    <th>Make</th>
                                                    <th>User</th>                                               
                                                    <th>Date_Posted</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($ads as $ad):
                                                    ?>
                                                    <tr >
                                                        <td ><?php echo $i; ?></td>
                                                        <td><input style="display: inline-table !important" type="checkbox" value=""/></td>
                                                        <td style="width:80px !important;">
                                                            <?php $img = explode(',',$ad->image_path);?>
                                                            <img src="<?php echo base_url() .  $img[0]; ?>" alt="Listing Image" width="79px" height="50px;"/>
                                                            
                                                            </td>
                                                        <td><?php echo $ad->title; ?></td>
                                                        <td><?php echo $ad->id; ?></td>
                                                        <td><?php echo $ad->name; ?></td>
                                                        <td> 
                                                            <?php if ($ad->premium_type == '0') { ?>
                                                                <span class="btn btn-sm btn-success">Free</span>

                                                            <?php } else if ($ad->premium_type == '1') { ?>
                                                                <span class="btn btn-sm btn-warning">7 Days</span>

                                                            <?php } else if ($ad->premium_type == '2') { ?>
                                                                <span class="btn btn-sm btn-warning">14 Days</span>

                                                            <?php } else if ($ad->premium_type == '3') { ?>
                                                                <span class="btn btn-sm btn-warning">30 Days</span>
                                                            <?php } ?> 

                                                        </td> 
                                                        <td>                                                 
                                                            <?php if ($ad->premium == '0') { ?>
                                                                <a class="btn btn-warning" href="<?php echo base_url() . 'admin/preactivate/' . $ad->id; ?>" title="Mark Ad as Premium ad"><i class="fa fa-arrow-up"></i> </a>     


                                                            <?php } else { ?>
                                                                <a class="btn btn-success" href="<?php echo base_url() . 'admin/predeactivate/' . $ad->id; ?>" title="Mark Ad as Normal Ad"><i class="fa fa-arrow-down"></i></a>

                                                            <?php } ?> 
                                                        </td>
                                                        <td><?php echo $ad->user; ?></td>
                                                        <td><?php echo $ad->date_posted; ?></td>
                                                        <td> 
                                                            <a class="btn btn-primary"  href="<?php echo base_url() . 'home/edits/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>" title="Edit"><i class="fa fa-edit"></i> </a>

                                                        </td>
                                                        <td>


                                                            <a class="btn btn-danger deletead" data-id="<?php echo $ad->id; ?>" href="#delete-normal-ad" title="Delete"><i class="fa fa-trash"></i> </a></td>



                                                        <td> 
                                                            <?php if ($ad->admin_status == '1') { ?>
                                                                <a class="btn btn-warning" href="<?php echo base_url() . 'admin/adeactivate/' . $ad->id; ?>" title="Invalidate"><i class="fa fa-power-off"></i> </a>     


                                                            <?php } else { ?>
                                                                <a class="btn btn-success" href="<?php echo base_url() . 'admin/adactivate/' . $ad->id; ?>" title="Approve"><i class="fa fa-arrow-up"></i> </a>

                                                            <?php } ?> 

                                                        </td>  
                                                        <td>

                                                            <a class="btn btn-default" href="<?php echo base_url() . 'home/loadsingle/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>" title="Preview"><i class="fa fa-binoculars"></i> </a>

                                                        </td>

                                                        <td><?php if ($ad->admin_status == '0') { ?>
                                                                <span class="btn btn-warning" title="Admin status: Pending Approval"><i class="fa fa-exclamation-circle"></i></span>                                                       

                                                            <?php } else if ($ad->admin_status == '1') { ?>
                                                                <span class="btn btn-success" title="Ad is Live"><i class="fa fa-check-circle-o"></i></span>                                                       

                                                            <?php } else { ?>
                                                                <span class="btn btn-danger" title="Admin status: Not Live/Approved"><i class="fa fa-times-circle-o"></i></span>                                                       

                                                            <?php } ?>
                                                        </td>  
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>              





                                </div>
                            </div>



                        </div>

                    </div>


                </section>
                <!-- /Main Content -->

            </div>
            <!-- /Content -->

            <script>
                $(document).ready(function () {
                    base_url = "<?php echo base_url(); ?>";
                    loadTitles();
                    function loadTitles() {
                        $('.display1234').dataTable();
                    }


                    $(document).on('click', '.deletead', function () {
                        var id = $(this).attr('data-id');

                        $.Zebra_Dialog("You are about to delete this Normal Ad, do you want to continue?", {
                            'type': 'warning',
                            'title': 'Delete Normal Ad',
                            'buttons': [
                                {caption: 'Yes', callback: function () {
                                        $.post(base_url + 'admin/adelete/' + id, function () {
                                            window.location.href = base_url + 'admin/ads/';
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