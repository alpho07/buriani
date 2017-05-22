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
                                <h4>Admin Dashboard &#187 Reported Ads</h4>
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
                            <?php $this->load->view('pages/admin/admin_menu');?>

                                <div class="tab-content clearfix">
                                    <div class="tab-pane active" id="1a">
                                        <table id="example myTable" class="display1234" cellspacing="0" width="100%">
                                            <thead>
                                                                      <tr><td colspan="9">
                                                <?php if (($this->session->flashdata('message_success')) == TRUE) { ?>
                                                            <div class="alert alert-success" ><i class="fa fa-check"></i> <?php echo $this->session->flashdata('message_success'); ?></div>

                                                        <?php } ?></td></tr>
                                                <tr>
                                                    <th>No.</th>
                                                    <th style="width:10px !important;"><input type="checkbox" value="" style="display:inline-block"/></th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>AD_ID</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                
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
                                                        <td><b><?php echo $ad->subject; ?></b></td>
                                                        <td><?php echo $ad->message; ?></td>
                                                        <td><a target="_blank" class="btn btn-primary" title="Edit and Correct Ad Complaint" href="<?php echo base_url().'home/edits/'.$ad->ad_id.'/'.  str_replace(" ", "-",$ad->subject);?>"><i class="fa fa-edit"> <?php echo $ad->ad_id; ?></i></a></td>
                                                        <td><?php echo $ad->name; ?></td>
                                                        <td><?php echo $ad->phone; ?></td>
                                                        <td><?php echo $ad->email; ?></td>
                                                         <td>
                                                    <?php if ($ad->solved == '0') { ?>
                                                             <a class="btn btn-warning" tititle="Click to Mark report as taken care of" href="<?php echo base_url() . 'admin/solved/' . $ad->id . '/' ;?>"><i class="fa fa-times-circle-o"></i> Mark as Solved</a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-success" href="<?php echo base_url() . 'admin/solved/' . $ad->id . '/' ; ?>"><i class="fa fa-check-circle-o"></i> Solved</a>

                                                    <?php } ?> </td>
                 
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
    });
</script>






<div id="back-to-top">
    <i class="icon-up-dir"></i>
</div>

</div>
<?php $this->load->view('partials/footer'); ?>


</body>

</html>