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
                <h4>Admin Dashboard &#187 Obituaries</h4>
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
                        <button type="button" id="DELETE" >Delete All Selected</button>
                        <table id="example myTable" class="display1234" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th style="width:10px !important;"><input type="checkbox" value="" style="display:inline-block"/></th>

                                    <th>Screenshot</th>
                                    <th>ListingID</th>
                                    <th>Title</th>
                                    <th>Deceased </th>
                                    <th>Contact Persons</th>
                                    <th>Author</th>
                                    <th>Author ID</th>
                                    <th>Date</th>
                                    <th>Payment</th>
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
                                        <td><input style="display: inline-table !important" type="checkbox" name="IDS" value="<?php echo $ad->id; ?>" class="DELETE_ALL"/></td>
                                        <td style="width:80px !important;"><img src="<?php echo base_url() . $ad->image_path; ?>" alt="Ad Image" width="79px" height="50px;"/></td>

                                        <td><?php echo $ad->id; ?></td>
                                        <td><?php echo $ad->title; ?></td>
                                        <td><?php echo $ad->obtitle; ?></td>
                                        <td><a href='#contact-persons' data-content='<?php echo $ad->contact_persons; ?>' title='Contact Persons'  data-toggle="popover">Show </a></td>
                                        <td><?php echo $ad->user; ?></td>
                                        <td><a href="<?php echo base_url() . $ad->idcopy; ?>">View<a></td>
                                                    <td><?php echo $ad->date_posted; ?></td>
                                                    <td>

                                                        <?php if ($ad->sms_pay == '0' && $ad->admin_status == '0') { ?>
                                                        <a class="btn btn-warning confirm" data-toggle="modal" data-target="#myModal" data-name="<?php echo $ad->obtitle;?>"  id="<?php echo $ad->id; ?>" href="#?/<?php echo $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>" title="CONFIRM AND APPROVE TO GO LIVE"><i class="fa fa-check"></i> C & A</a>


                                                        <?php } else { ?>
                                                            <a class="btn btn-success "  id="<?php echo $ad->id; ?>" href="#?/<?php echo $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>"><i class="fa fa-check-circle-o"></i> Online</a>

                                                        <?php } ?> 

                                                    </td>
                                                    <td> 
                                                        <a class="btn btn-primary" href="<?php echo base_url() . 'home/editpf/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>" title="Edit Obituary Listing"><i class="fa fa-edit"></i> </a>
                                                    </td>
                                                    <td>


                                                        <a class="btn btn-danger deletead" data-id="<?php echo $ad->id; ?>" href="#delete-obituary" title="Delete Obituary Listing"><i class="fa fa-trash"></i> </a></td>



<!--                                                    <td>
                                                        <?php if ($ad->admin_status == '1') { ?>
                                                        <a class="btn btn-warning" href="<?php echo base_url() . 'admin/obdeactivate/' . $ad->id; ?>" title="Invalidate Obituary Listing"><i class="fa fa-power-off"></i> </a>     


                                                        <?php } else { ?>
                                                        <a class="btn btn-success" href="<?php echo base_url() . 'admin/obactivate/' . $ad->id; ?>" title="Approve Obituary Listing"><i class="fa fa-arrow-up"></i> </a>

                                                        <?php } ?> 


                                                    </td>                                                    -->

                                                    <td>

                                                        <a class="btn btn-default" href="<?php echo base_url() . 'home/loadprofile/' . $ad->id . '/' . str_replace(" ", "-", $ad->title); ?>" target="_blank" title="Preview Obituary Listing"><i class="fa fa-binoculars"></i></a>
                                                    </td>
                                                    <td>
                                                       <a class="btn btn-danger" href="<?php echo base_url() . 'admin/obdeactivate/' . $ad->id; ?>" title="Invalidate Obituary Listing"><i class="fa fa-times-circle-o"></i> </a>     
  
                                                    </td>

                                                    <td><?php if ($ad->admin_status == '0') { ?>
                                                            <span class="btn btn-warning" title="Admin status: Pending Approval"><i class="fa fa-exclamation-circle"></i></span>                                                       

                                                        <?php } else if ($ad->admin_status == '1') { ?>
                                                            <span class="btn btn-success" title="Obituary is Live"><i class="fa fa-check-circle-o"></i></span>                                                       

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

                                                <div id="myModal" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Bulk SMS Payment Confirmation</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>You are about to confirm receipt of payment for (OBID: <span id="OBID"></span> &#187 Deceased: <span id="NAME"></span>) obituary for bulk SMS sending. Listing will go live, SMS notification will be sent to the clients contacts and also send obituary link to the client. Do you want to continue? Enter Amount Paid by client</p>
                                                                <p><input type="text" required="" id="ampaid" placeholder="Amount paid by client"/></p>
                                                                <input type="hidden" id="paid" />

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" id="campaid" >Confirm</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

<script>
$(document).ready(function () {
    base_url = "<?php echo base_url(); ?>";
    loadTitles();
    function loadTitles() {
        $('.display1234').dataTable();
    }


    $(document).on('click', '.deletead', function () {
        var id = $(this).attr('data-id');
        $.Zebra_Dialog("You are about to delete this Obituary, do you want to continue?", {
            'type': 'warning',
            'title': 'Delete Normal Ad',
            'buttons': [
                {caption: 'Yes', callback: function () {
                        $.post(base_url + 'admin/obdelete/' + id, function () {
                            window.location.href = base_url + 'admin/obituaries/';
                        }).fail(function () {
                            console.log('An error occured');
                        });
                    }},
                {caption: 'No', callback: function () {


                    }}
            ]
        });
    });
    $(document).on('click', '.confirm', function () {
        var id = $(this).attr('id');
        $('#paid').val(id);
         var name = $(this).attr('data-name');
        $('#OBID').text(id);
        $('#NAME').text(name);

   
    });


    $(document).on('click', '#campaid', function () {
       // var id = $(this).attr('id');
       
        id = $('#paid').val();
        var r = $('#ampaid').val();
        if (r === '') {
            alert('Operation Cancelled. Reason: No payment entered');
        } else if (!$.isNumeric(r) ) {
            alert('Operation Cancelled. Reason: Not a valid figure');
        }else if (r<6 ) {
            alert('Operation Cancelled. Reason: Minimum amount Kes. 6');
        } else {
            //  alert('Success');
            window.location.href = base_url + "admin/confirmPayment/" + id + "/" + r;
        }
    });

    $('#DELETE').click(function () {
       alert($("input[name=IDS]:checked").map(function() {
    return this.value;
}).get().join(","));
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