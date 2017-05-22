<?php
$ci = & get_instance();
$this->load->view('partials/header');
?>

<style type="text/css">
    .error{
        padding: 0em !important;
        margin: 0px !important;
        color:red !important;
        font-weight: normal !important;
        border: red !important;
        -webkit-border: red !important;
    }
    div.error{
        display:none !important;
    }
    input.error,select.error,textArea.error {
        border: 1px solid red !important ;
    }
</style>
<title>Home - Register</title>
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
                        <a href="<?php echo base_url(); ?>home/resources" >
                            <i class="fa fa-cubes" aria-hidden="true"></i>

                            <p>Resources</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>auth/authorize" data-toggle="search">
                            <i class="fa fa-lock"></i>
                            <p>Login</p>
                        </a>
                    </li>                
                    <li class="dropdown" style="margin-right: 5px;">
                        <a href="<?php echo base_url(); ?>auth/register" class="dropdown-toggle" data-toggle="dropdown" onclick='window.location.href = "<?php echo base_url() . 'auth/register' ?>"'>
                            <i class="fa fa-paper-plane-o"></i>
                            <p>Post Listing</p>
                        </a>

                    </li>
                    <!--                     <ul class="dropdown-menu">
                                                <li><a href="<?php echo base_url(); ?>auth/register"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                        Post Obituary</a></li>
                                                <li class="divider"></li>
                                                <li><a href="<?php echo base_url(); ?>auth/register"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                        Post Listing</a></li>
                    
                    
                                            </ul>-->
                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="contacts pull-right"> <span class="contacts"><i class="fa fa-phone-square" aria-hidden="true"></i>
                    07237837648</span> |
                <span class="contacts"><i class="fa fa-skype" aria-hidden="true"></i> 07237837648</span> |
                <span class="contacts">TILL NO: 716 647</span>
            </div>

        </nav>
        <!--  end navbar --> 

    </header>


    <!-- Content -->
    <div class="row content">



        <!-- Main Content -->
        <section class="main-content col-lg-12 col-md-12 col-sm-12">


            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-3 card" style="margin-left:320px; margin-top: 100px; margin-bottom: 25px;">
                    <form id="Registration" method="GET" action="<?php echo base_url(); ?>register/newuser/">
                        <div class="carousel-heading no-margin">
                            <h4>Register</h4>
                        </div>

                        <div class="page-content">

                            <?php if ($this->session->flashdata('msg')) { ?>
                                <div class="" style="background: lightcoral; border: 1px solid black;  text-align: center; "><i class="fa fa-exclamation-circle"></i> <span id=""><?php echo $this->session->flashdata('msg'); ?></span></div>

                            <?php } else { ?>

                            <?php } ?>
                            <div class="alert align-center alert-danger"><i class="fa fa-exclamation-circle"></i> <span id="error_message"> </span></div>

                            <div class="box-wrapper" style="margin-top: 5px;">
                                <div class="iconic-input">
                                    <input type="text" placeholder="Name" id="fullname" name="fullname" />
                                    <i class="icons icon-user-3"></i>
                                </div>

                                <div class="iconic-input">
                                    <input type="text" placeholder="Email" id="email" name="email"/>
                                    <i class="icons icon-mail"></i>
                                </div>

                                <div class="iconic-input">
                                    <input type="text" placeholder="Phone e.g. 0700 000 000" id="phone" name="phone"/>
                                    <i class="icons icon-phone"></i>
                                </div>
                                <div class="iconic-input" style="margin-top: 5px;">
                                    <input type="checkbox"  id="sendSms" name="sendsms" checked value="1" > Send me sms notification
                                </div> 
                                <div class="iconic-input">
                                    <?php $this->load->view('partials/captcha'); ?>                             
                                </div>



                                <br>
                                <div class="pull-left">
                                    <input type="button" class="btn btn-warning btn-lg" id="Register" value="Register"> Or 
                                    <a href="<?php echo base_url(); ?>auth/authorize/">Login</a>
                                </div>


                            </div>
                            <br class="clearfix">
                        </div>
                    </form>
                </div>

            </div>

    </div>


</section>
<!-- /Main Content -->




</div>
<!-- /Content -->
<div id="back-to-top">
    <i class="icon-up-dir"></i>
</div>
<?php $this->load->view('partials/top-footer'); ?>
<?php $this->load->view('partials/footer'); ?>
</div>
<!-- Container -->

<script>
    $(function () {
        error_message = '';
        error = '';
        base_url = "<?php echo base_url(); ?>";
        settings = $.localStorage;

        $('#fullname').val(settings.get('fullname'));
        $('#email').val(settings.get('email'));
        $('#phone').val(settings.get('phone'));
        $('.alert').hide();
        $('#Register').click(function () {
            error_message = $('#error_message');
            error = $('.alert-danger');
            user = $('#fullname').val();
            email = $('#email').val();
            phone = $('#phone').val();
            code = $('#code').val();
            // password = $('#upass').val();
            // cpassword = $('#cpass').val();

            if (user === '') {
                error_message.text('Please enter your name');
                error.show();
            }  else if (phone === '') {
                error_message.text('Please enter your phone');
                error.show();
            } else if (code === '') {
                error_message.text('Captcha field cannot be left empty');
                error.show();
            } else if (!$.isNumeric(phone)) {
                error_message.text('Please enter digits for Phone Number');
                error.show();
            }  else {
                settings.set('fullname', $('#fullname').val());
                settings.set('email', $('#email').val());
                settings.set('phone', $('#phone').val());
                document.getElementById("Registration").submit();
            
            }
        });

        function Register() {
            $.post(base_url + "register/newuser", $('#Registration').serialize(), function (resp) {

                $.Zebra_Dialog("Hello <strong>" + $('#fullname').val() + "</strong> You have been successfully registered, redirecting to Login page...", {
                    'type': 'info',
                    'title': 'Registration Successfull',
                    'buttons': [
                        {caption: 'Okey', callback: function () {
                                window.location.href = base_url + "auth/authorize/";

                            }}
                    ]
                });
            }).fail(function () {
                error_message.text('An error occured while registering, try later!');
                error.show();
            });



        }

        function captch() {
            var x = document.getElementById("ran")
            x.value = Math.floor((Math.random() * 10000) + 1);
        }


        function validateEmail($email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            return emailReg.test($email);
        }
    });

</script>


