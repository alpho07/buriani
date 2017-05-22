<?php $this->load->view('partials/header'); ?>

<title>Home - Login</title>
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
                        <a href="<?php echo base_url(); ?>auth/register" data-toggle="search">
                            <i class="fa fa-book"></i>
                            <p>Register</p>
                        </a>
                    </li>
                    <li class="dropdown" style="margin-right: 5px;">
                        <a href="<?php echo base_url(); ?>auth/register" class="dropdown-toggle" data-toggle="dropdown" onclick='window.location.href="<?php echo base_url().'auth/register' ?>"'>
                            <i class="fa fa-paper-plane-o"></i>
                            <p>Post Ad</p>
                        </a>
                       
                    </li>
<!--                     <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>auth/register"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    Post Obituary</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>auth/register"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    Post Ad</a></li>


                        </ul>-->
          </ul>
        </div><!-- /.navbar-collapse -->
       <div class="contacts pull-right"> <span class="contacts"><i class="fa fa-phone-square" aria-hidden="true"></i>
                 072378376483 </span> |
            <span class="contacts"><i class="fa fa-skype" aria-hidden="true"></i> 072378376483</span> |
            <span class="contacts">PAYBILL: 716 647</span>
        </div>

    </nav>
<!--  end navbar --> 

</header>
    <!-- Container -->
    <div class="container">

  
	


        <!-- Content -->
        <div class="row content">

            <div class="col-lg-12 col-md-12 col-sm-12">
              
            </div>

            <!-- Main Content -->
            <section class="main-content col-lg-12 col-md-12 col-sm-12">


                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-3 card" style="margin-left:320px; margin-top: 100px; margin-bottom: 150px;">

                        <div class="carousel-heading no-margin">
                            <h4>FORGOT PASSWORD</h4>
                        </div>

                        <div class="page-content">
                            <form action="<?php echo base_url();?>auth/changepass" method="POST">
                            <div class="box-wrapper">
                                <?php if($this->session->flashdata('msg')){?>
                                <div class="" style="background: lightcoral; text-align: center; "><i class="fa fa-exclamation-circle"></i> <span id=""><?php echo  $this->session->flashdata('msg');?></span></div>

                                <?php }else{?>
                                
                                <?php }  ?>
                                <div class="iconic-input" style="margin-top: 5px;">
                                    <input type="text" placeholder="Email" id="useremail" name="email"  required>
                                    <i class="icons icon-user-3"></i>
                                </div>   
                                 <div class="iconic-input" style="margin-top: 5px;">
                                     <input type="checkbox"  id="sendSms" name="sendsms" value="1" > Send me sms notification
                                    <i class="icons icon-user-3"></i>
                                </div> 

                                <br>
                                <div class="pull-left">
                                    <input type="submit" class="orange" id="Login" value="Change"> OR
                                    <a href="<?php echo base_url();?>auth/authorize/">Login</a>
                                    
                                </div>
                                <div class="pull-right">
                                  
                                    <br>

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
            $('.alert').hide();
            $('#Login').click(function () {
                error_message = $('#error_message');
                error = $('.alert-danger');
                username = $('#uemail').val();
                password = $('#upass').val();

                if (username === '') {
                    error_message.text('Please enter your email');
                    error.show();
                } else if (password === '') {
                    error_message.text('Please enter your Password');
                    error.show();
                } else if (!validateEmail(username)) {
                    error_message.text('Please enter a valid email e.g. a@k.com');
                    error.show();
                } else {
                    login(username, password);
                }
            });

            function login(u, p) {
                 login_sess ="<?php echo $this->session->userdata('browsing_cache')?>";
                $.post(base_url + "auth/authenticate", {username: u, password: p}, function (resp) {
                   
                    if (resp === 'success') {          
                         if(login_sess!==''){
                             window.location.href ="<?php echo $this->session->userdata('browsing_cache');?>";
                         }else{
                        window.location.href = base_url + "home/userdashboard/";
                       }
                
                    } else {
                        error_message.text('Invalid Username / Password');
                        error.show();
                    }
                });
            }

            function validateEmail($email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                return emailReg.test($email);
            }
        });

    </script>


