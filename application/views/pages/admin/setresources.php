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
                                <h4>Admin Dashboard &#187 Resources</h4>
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
                                        <a href="<?php echo base_url(); ?>admin/addresource" class="btn btn-primary pull-right" style="margin: 10px;">+Add New Resource</a>
                                        <div class="row col-md-7 col-md-offset-3">
                                            <h2>Add A New Resource</h2>
                                            <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/addresource" enctype="multipart/form-data">
                                                <div style="color:red;font-weight: bold;"><?php echo @$error;?></div>
                                                <div class="form-group">
                                                <label class="control-label col-sm-2" for="email">Resource </label>
                                                <div class="col-sm-10">
                                                    <select  class="form-control" id="type" required name="type" >
                                                        <option value="">-Select Type-</option>
                                                        <?php foreach ($ads as $ad):?>
                                                          <option value="<?php echo $ad->id;?>"><?php echo $ad->r_type;?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="email">Title:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="title" placeholder="Bible verse reference e.g. 2 Peter 1:3-9 or resource title" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="pwd">Description:</label>
                                                <div class="col-sm-10">
                                                    <textarea name="description" class="form-control" placeholder="Bible verse itself or small description of the resource" required></textarea>
                                                </div>
                                            </div>
                                            
                                               <div class="form-group">
                                                <label class="control-label col-sm-2" for="email">Upload :</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="file" >
                                                </div>
                                            </div>
                                         
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success btn-lg">Submit</button>
                                                </div>
                                            </div>
                                        </form>
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
                });
            </script>






            <div id="back-to-top">
                <i class="icon-up-dir"></i>
            </div>

        </div>
<?php $this->load->view('partials/footer'); ?>


    </body>

</html>