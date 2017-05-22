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
                                <p>Post Listing</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>home/postobituarya"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                         Obituary</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>home/postada"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        Normal Listing</a></li></ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>home/logout" >
                                <i class="fa fa-power-off"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
                <div class="contacts pull-right"> <span class="contacts"><i class="fa fa-phone-square" aria-hidden="true"></i>
                        07237837648 </span> |
                    <span class="contacts"><i class="fa fa-skype" aria-hidden="true"></i> 07237837648</span> |
                    <span class="contacts">PAYBILL: 716 647</span>
                </div>

            </nav>
            <!--  end navbar --> 

        </header>
        <div class="container " style="width:100% !important;">




            <!-- Content -->
            <div class="row content">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumbs">
                        <p><a href="<?php echo base_url(); ?>">Home</a> <i class="icons icon-right-dir"></i> <?php echo $ptitle; ?></p>
                    </div>
                </div>

                <!-- Main Content -->
                <section class="main-content col-lg-12 col-md-12 col-sm-12 " style="margin-top:60px; ">

                    <div class="row">

                        <!-- Heading -->
                        <div class="col-lg-12 col-md-12 col-sm-12 ">

                            <div class="carousel-heading">
                                <h4>My Dashboard </h4>
                                <div class="carousel-arrows">
                                    Last Login: <?php echo $last_login; ?> 
                                </div>
                            </div>

                        </div>
                        <!-- /Heading -->

                    </div>	


                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">


                            <div id="exTab1">	
                                <ul  class="nav nav-pills">
                                    <li class="active">
                                        <a  href="#1a" data-toggle="tab">Normal / Obituaries Listings</a>
                                    </li>
                                    <li><a href="#2a" data-toggle="tab">Inbox <?php if ($mcount > 0) { ?><span style="background: red" class="badge"><?php echo $mcount; ?></span> <?php
                                            } else {
                                                echo '';
                                            };
                                            ?></a>
                                    </li>
                                    <li><a href="#3a" data-toggle="tab">Receipts</a>
                                    </li>
                                    <li><a href="#4a" data-toggle="tab">Settings</a>
                                    </li>
                                </ul>

                                <div class="tab-content clearfix">
                                    <div class="tab-pane active" id="1a">
                                        <center>                      <?php if ($this->session->flashdata('msg')) { ?>
                                                <div class="" style="background: lightgreen; border: 1px solid black;  text-align: center; "><i class="fa fa-check-circle-o"></i> <span id=""><?php echo $this->session->flashdata('msg'); ?></span></div>

                                            <?php } else { ?>

                                            <?php } ?></center>
                                        <table id="example myTable" class="display1234" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th style="width:10px !important;"><input type="checkbox" value="" style="display:inline-block"/></th>
                                                    <th>LISTING ID</th>
                                                    <th>Screenshot</th>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Date</th>
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
                                                    $img = explode(",", $ad->image_path);
                                                    ?>
                                                    <tr >
                                                        <td ><?php echo $i; ?></td>
                                                        <td><input style="display: inline-table !important" type="checkbox" value=""/></td>
                                                        <td><?php echo $ad->id; ?></td>
                                                        <td style="width:80px !important;"><img src="<?php echo base_url() . $img[0]; ?>" alt="Ad Image" width="79px" height="50px;"/></td>
                                                        <td><?php echo $ad->title; ?></td>
                                                        <td><?php echo $ad->name; ?></td>
                                                        <td><?php echo $ad->date_posted; ?></td>
                                                        <td> <?php if ($ad->category > 28 && $ad->category < 32) { ?>
                                                            <a class="btn btn-primary" href="<?php echo base_url() . 'home/editpf/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>" title="Edit Listing"><i class="fa fa-edit"></i> </a>
                                                            <?php } else { ?>
                                                            <a class="btn btn-primary" href="<?php echo base_url() . 'home/edits/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>" title="Edit Listing"><i class="fa fa-edit"></i> </a>

                                                            <?php } ?> </td>
                                                        <td>

                                                            <?php if ($ad->category > 28 && $ad->category < 32) { ?>                                                              
                                                            <a class="btn btn-danger deleteob" data-oid="<?php echo $ad->id; ?>" href="#delete-normal-ad" title="Delete Listing"><i class="fa fa-trash"></i> </a></td>

                                                        <?php } else { ?>
                                            <a class="btn btn-danger deletead" data-id="<?php echo $ad->id; ?>" href="#delete-obituary" title="Delete Listing"><i class="fa fa-trash"></i> </a></td>


                                                <?php } ?> 

                                                <td> <?php if ($ad->category > 28 && $ad->category < 32) { ?>
                                                        <?php if ($ad->user_status == '1') { ?>
                                                    <a class="btn btn-warning" href="<?php echo base_url() . 'home/obdeactivate/' . $ad->id; ?>" title="Deactivate Listing"><i class="fa fa-power-off"></i> </a>     


                                                        <?php } else { ?>
                                                    <a class="btn btn-success" href="<?php echo base_url() . 'home/obactivate/' . $ad->id; ?>" title="Activate Listing"><i class="fa fa-arrow-up"></i> </a>

                                                        <?php } ?> 
                                                    <?php } else { ?>
                                                        <?php if ($ad->user_status == '1') { ?>
                                                    <a class="btn btn-warning" href="<?php echo base_url() . 'home/adeactivate/' . $ad->id; ?>" title="Deactivate Listing"><i class="fa fa-power-off"></i> </a>     


                                                        <?php } else { ?>
                                                    <a class="btn btn-success" href="<?php echo base_url() . 'home/adactivate/' . $ad->id; ?>" title="Activate Listing"><i class="fa fa-arrow-up"></i> </a>

                                                        <?php } ?> 
                                                    <?php } ?> 
                                                </td>                                                    

                                                <td>
                                                    <?php if ($ad->category == '29') { ?>
                                                    <a class="btn btn-default" target="_blank" href="<?php echo base_url() . 'home/loadprofile/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>" title="Preview Listing"><i class="fa fa-binoculars"></i> </a>
                                                    <?php } elseif ($ad->category == '30') { ?>
                                                        <a class="btn btn-default" target="_blank" href="<?php echo base_url() . 'home/loadprofile/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>" title="Preview Listing"><i class="fa fa-binoculars"></i> </a>
                                                    <?php } else if ($ad->category == '31') { ?>
                                                        <a class="btn btn-default" target="_blank" href="<?php echo base_url() . 'home/loadprofile/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>" title="Preview Listing"><i class="fa fa-binoculars" ></i> </a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-default" target="_blank" href="<?php echo base_url() . 'home/loadsingle/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>" title="Preview Listing"><i class="fa fa-binoculars"></i> </a>

                                                    <?php } ?> </td>

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
                                    <div class="tab-pane" id="2a">
                                        <div class="row">
                                            <div class="box-body no-padding">
                                                <div class="mailbox-controls">
                                                    <!-- Check all button -->
                                                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="glyphicon glyphicon-unchecked"></i></button>
                                                    <div class="btn-group">
                                                        <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-trash"></i></button>

                                                    </div><!-- /.btn-group -->
                                                    <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                                                    <div class="pull-right">

                                                        <div class="btn-group">
                                                            <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-arrow-left"></i></button>
                                                            <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-arrow-right"></i></button>
                                                        </div><!-- /.btn-group -->
                                                    </div><!-- /.pull-right -->
                                                </div>
                                                <hr>
                                                <div class="table-responsive mailbox-messages" >
                                                    <table class="table table-hover table-striped">
                                                        <thead>
                                                        <th><input type="checkbox"></th>
                                                        <th>Subject</th>
                                                        <th>Message</th>
                                                        <th>Time</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($messages as $m): ?>
                                                                <tr>
                                                                    <td><input type="checkbox" value="<?php echo $m->id; ?>"></td>
                                                                    <td class="mailbox-name"><b><a href="<?php echo base_url() . 'inbox/read/' . $m->id; ?>"><?php echo $m->subject; ?></b></a></td>
                                                                    <td class="mailbox-subject"><?php echo mb_strimwidth($m->message, 0, 100, "..."); ?></td>                                                               
                                                                    <td class="mailbox-date"><?php echo $m->date_time; ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>


                                                        </tbody>
                                                    </table><!-- /.table -->
                                                </div><!-- /.mail-box-messages -->
                                            </div><!-- /.box-body -->
                                            <hr>
                                            <div class="box-footer no-padding">
                                                <div class="mailbox-controls">
                                                    <!-- Check all button -->
                                                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="glyphicon glyphicon-unchecked"></i></button>
                                                    <div class="btn-group">
                                                        <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-trash"></i></button>                                                        

                                                    </div><!-- /.btn-group -->
                                                    <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                                                    <div class="pull-right">

                                                        <div class="btn-group">
                                                            <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-arrow-left"></i></button>
                                                            <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-arrow-right"></i></button>
                                                        </div><!-- /.btn-group -->
                                                    </div><!-- /.pull-right -->
                                                </div>
                                            </div>
                                        </div><!-- /. box -->
                                    </div>         



                                    <div class="tab-pane" id="3a">
                                        <h3>No Payments</h3>
                                    </div>
                                    <div class="tab-pane" id="4a">
                                        <div class="row">

                                            <div class="card col-lg-6 col-md-6 col-sm-6 col-md-offset-3" style="background: white;">

                                                <div class="carousel-heading no-margin">
                                                    <h4>UPDATE INFO</h4>
                                                </div>
                                                <form id="user_update">
                                                    <div class="page-content">

                                                        <div class="box-wrapper">
                                                            <div class="iconic-input">
                                                                <input type="text" placeholder="Name" id="name" name="name" value="<?php echo $udet[0]->name; ?>">
                                                                <i class="icons icon-user-3"></i>
                                                            </div>
                                                            <div class="iconic-input">
                                                                <input type="text" placeholder="Email" id="email" name="email" value="<?php echo $udet[0]->email; ?>">
                                                                <i class="icons icon-mail"></i>
                                                            </div>
                                                            <div class="iconic-input">
                                                                <input type="text" placeholder="Phone" id="phone1" name="phone" value="<?php echo $udet[0]->phone; ?>">
                                                                <i class="icons icon-phone"></i>
                                                            </div>

                                                            <br>
                                                            <div class="pull-left">
                                                                <input type="button" class="btn btn-success" id="Save" value="Save Update">
                                                                <input type="button" class="btn btn-danger" id="Delete" value="Delete Account">
                                                            </div>
                                                            <div class="pull-right">


                                                            </div>
                                                            <br class="clearfix">
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="card col-lg-6 col-md-6 col-sm-6 col-md-offset-3" style="background: white;">

                                                <div class="carousel-heading no-margin">
                                                    <h4>UPDATE PASSWORD</h4>
                                                </div>
                                                <form id="user_pass">
                                                    <div class="page-content">

                                                        <div class="box-wrapper">
                                                            <div class="iconic-input">
                                                                <input type="password" placeholder="New password" id="npass" name="npass" >
                                                                <i class="icons icon-user-3"></i>
                                                            </div>
                                                            <div class="iconic-input">
                                                                <input type="password" placeholder="Confirm New password" id="cnpass" name="cnpass" >
                                                                <i class="icons icon-mail"></i>
                                                            </div>


                                                            <br>
                                                            <div class="pull-left">
                                                                <input type="button" class="btn btn-success" id="SavePass" value="Update Password">
                                                            </div>
                                                            <div class="pull-right">


                                                            </div>
                                                            <br class="clearfix">
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>

                                        </div>
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
                    $('#Save').click(function (){ 
                    $(this).prop('value','Please Wait..');
                    $(this).prop('disabled',true);
                        $.post(base_url + 'home/updateUserDetails', $('#user_update').serialize(), function () {
                            $.Zebra_Dialog("Your Details successfully Updated!", {
                                'type': 'success',
                                'title': 'Update Status',
                                'buttons': [
                                    {caption: 'Okey', callback: function () {
                                           $('#Save').prop('value','Save Details');
                                   $('#Save').prop('disabled',false);

                                        }}
                                ]
                            });
                            return false;
                        }).fail(function () {
                            console.log('An error occured');
                        });
                        return false;
                    });


                    $('#SavePass').click(function () {
                         $(this).prop('value','Please Wait..');
                    $(this).prop('disabled',true);

                        $pass = $('#npass').val();
                        $cpass = $('#cnpass').val();

                        if ($pass === '') {
                            alert('Password Field cannot be left empty!');
                        } else if ($cpass === '') {
                            alert('Confirm Password Field cannot be left empty!');
                        } else if ($pass !== $cpass) {
                            alert(' Passwords do not match!');
                        } else if ($pass.length < 6) {
                            alert(' Passwords cannot be less than 6 characters!');
                        } else {

                            $.post(base_url + 'home/updateUserPassword', $('#user_pass').serialize(), function () {
                                alert(' Password Updated successfully!');
                                $('#SavePass').prop('value','Save Details');
                                   $('#SavePass').prop('disabled',false);
                                return false;
                            }).fail(function () {
                                console.log('An error occured');
                            });
                        }
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


                    $(document).on('click', '.deletead', function () {
                        var id = $(this).attr('data-id');

                        $.Zebra_Dialog("You are about to delete this Normal Ad, do you want to continue?", {
                            'type': 'warning',
                            'title': 'Delete Normal Ad',
                            'buttons': [
                                {caption: 'Yes', callback: function () {
                                        $.post(base_url + 'home/delad/' + id, function () {
                                            window.location.href = base_url + 'home/userdashboard';
                                        }).fail(function () {
                                            console.log('An error occured');
                                        });

                                    }},
                                {caption: 'No', callback: function () {


                                    }}
                            ]
                        });
                    });

                    $(document).on('click', '.deleteob', function () {
                        var id = $(this).attr('data-oid');

                        $.Zebra_Dialog("You are about to delete this Normal Ad, do you want to continue?", {
                            'type': 'warning',
                            'title': 'Delete Obituary',
                            'buttons': [
                                {caption: 'Yes', callback: function () {
                                        $.post(base_url + 'home/delob/' + id, function () {
                                            window.location.href = base_url + 'home/userdashboard';
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