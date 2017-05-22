<?php $ci = &get_instance(); ?>
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
            $.post(base_url + "auth/authenticate", {username: u, password: p}, function (resp) {
                if (resp === 'success') {
                    window.location.href = base_url + "home/userdashboard/";
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







        $k = $(".MAIN_CONTENT").html();
        $y = $(".CATEGORIES").html();
        $(document).on('click', '.SEARCHER', function () {
            if ("<?php $this->uri->segment(2) ?>" === '') {
                $(".CATEGORIES").empty();
            }

            $(".MAIN_CONTENT").empty();
            var HTML = '<div class="row card" > <div class="col-lg-12 col-md-12 col-sm-12"> <div class="carousel-heading"><h4>SEARCH RESULT FOR : <span id="search1">Type your search above...</span></h4></div></div><div class="col-lg-12 col-md-12 col-sm-12"><div class="row subcategories DATASEARCH" >';
            HTML += '</div></div>';
            $('.MAIN_CONTENT').append(HTML);
        });


        $(document).on('focusout', '.SEARCHER', function () {
            $('#search1').text($(this).val());
           $('.DATASEARCH').empty();
              if ($('.SEARCHER').val() === '') {
                    $(".CATEGORIES").append($y);
                    $('.MAIN_CONTENT').append($k);
                }else{
                   getSearchData($(this).val()); 
                     
                }
                 
                
            });

            $('.SEARCHER').click(function () {
                if ($('.SEARCHER').val() === '') {
                    $(".CATEGORIES").append($y);
                    $('.MAIN_CONTENT').append($k);
                } else {
                    $('.MAIN_CONTENT').empty();
                }
            });




        });

        function getSearchData(data) {
            var HTML = '';
            $.getJSON(base_url + 'home/search/' + data, function (resp) {
                $.each(resp.hits, function (i, res) {
                    HTML += '<div class="col-lg-fifth col-md-sixth col-sm-sixth subcategory" ><a class="product-image" href="#"><img src="'+base_url+res.image_path+'" alt="#"  style="height:180px !important;"  /></a><div class="product-info card"><h6><a href="#"><span class="price" style="color:#9e1461 !important;">'+res.title+'</span></a></h6></div></div></div>';
                     $(".DATASEARCH").append(HTML);
                });

               
               
            });
        }
        ;







</script>
<style>

    .providers:hover{
        color:#9e1461;
        text-decoration: none;
    }
    .info{
        list-style: none;
        font-weight: bolder;
        font-size: 18px;
    }

    .panel-body ul{
        text-decoration: none;

    }

    .flex, .flex > div[class*='col-'] {  
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        flex:1 0 auto;
    }

    .panel {
        display: flex;
        flex-direction:column;
        align-content:stretch; 
        flex:1 0 70%;
    }

    .panel-body {
        display: flex;
        flex-grow:1;
    }


</style>
<header >
    <?php $ci = & get_instance(); ?>

    <nav class="navbar navbar-ct-white navbar-fixed-top" role="navigation" style="  box-shadow: 0px 1px 3px #888888; ">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand navbar-brand-logo" href="<?php echo base_url(); ?>" style="position:absolute;">
                <div class="">
                    <img src="<?php echo base_url(); ?>/img/mainlogo1.png" alt="Logo" width="250px">
                </div>

            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php if ($this->session->userdata('user_id') == TRUE) { ?> 
                <ul class="nav navbar-nav navbar-right" style="font-weight:bolder;">
                    <li>
                        <a href="<?php echo base_url(); ?>" >
                            <i class="fa fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
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
                                    Post Ad</a></li>




                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>home/resources" >
                            <i class="fa fa-cubes" aria-hidden="true"></i>

                            <p>Resources</p>
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
                    <li>
                        <a href="<?php echo base_url(); ?>home/userdashboard" >
                            <i class="fa fa-dashboard"></i>
                            <p>My Dashboard</p>
                        </a>
                    </li>




                    <li>
                        <a href="#<?php echo $this->session->userdata('username'); ?>">
                            <i class="fa fa-user"></i>
                            <p>Hello <?php echo $this->session->userdata('username'); ?></p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>home/logout" >
                            <i class="fa fa-power-off"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="nav navbar-nav navbar-right" style="font-weight:bolder;">
                    <li>
                        <a href="<?php echo base_url(); ?>" >
                            <i class="fa fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>    <li class="dropdown" style="margin-right: 5px;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-paper-plane-o"></i>
                            <p>Post Ad</p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>home/postobituary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    Post Obituary</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>home/postad"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    Post Ad</a></li>




                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>home/resources" >
                            <i class="fa fa-cubes" aria-hidden="true"></i>

                            <p>Resources</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>auth/authorize" >
                            <i class="fa fa-lock"></i>
                            <p>Login</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>auth/register" >
                            <i class="fa fa-book"></i>
                            <p>Register</p>
                        </a>
                    </li>

                </ul>
            <?php } ?>

        </div><!-- /.navbar-collapse -->
        <div class="contacts pull-right" style="margin-right:10px;"> <span class="contacts"><i class="fa fa-phone-square" aria-hidden="true"></i>
                072378376483</span> |
            <span class="contacts"><i class="fa fa-skype" aria-hidden="true"></i> 072378376483</span> |
            <span class="contacts">PAYBILL: 123456</span>
        </div>

    </nav>
    <!--  end navbar --> 
    <div class="container card searchxlass " id="searchxlass" style="margin-top:120px; padding: 30px; background: #000; border: 1px solid #9e1461;" >
        <form id="search" method="post" action="<?php echo base_url(); ?>search/query">
            <div class="col-md-12">
                <!--                <div class="row col-md-2" style="margin-right: 1px;">
                                    <select class="chosen-select-search" name="category" >
                                        <option value="">Search All Categories</option>
                <?php foreach ($categories as $c): ?>
                                                        <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
                <?php endforeach; ?>
                                    </select>
                                </div> -->
                <div class=" col-md-10">
                    <input type="text" class="form-control SEARCHER" name="keywords" style="width:1140px;border-radius: 0px !important;" placeholder="What are you looking for?"/>
                </div> 
                <div class="col-md-2">
                    <button class="btn btn-primary" type="submit" style="height:40px; border-radius: 0px !important; margin-left: 30px; background: #9e1461;"><i class="fa fa-search-plus"></i> Search</button>
                </div>
            </div>
        </form>
    </div>



</header>
<?php if ($this->uri->segment(2) == ''): ?>
    <div class="container CATEGORIES" style="margin-top: 30px;">
        <div class="row">
            <div class="row col-xs-2">
                <a href="#worship-0"> <img src="<?php echo base_url(); ?>img/worship.jpg" width="250px" height="400px"/></a>
            </div>
            <div class="row col-lg-2 categ card">
                <div class="row col-lg-12 categ">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title pull-left">OBITUARIES</h3>
                            <div class="btn-group pull-right">
                                <span><i class="glyphicon glyphicon-blackboard"></i><i class="glyphicon glyphicon-cloud-download"></i> </span>
                            </div>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group" style="color:red">

                                <?php foreach ($obs as $o): ?>
                                    <li class="list-group-item"> <a href="<?php echo base_url() . 'search/category/' . $o->id . '/' . $ci->sanitizeData($o->name); ?>"><?php echo $o->name; ?></a></li>
                                <?php endforeach; ?>

                            </ul>
                        </div>

                    </div>
                </div>

                <div class="row col-lg-12 categ">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title pull-left">COMMUNE/SUPPORT</h3>
                            <div class="btn-group pull-right">
                                <i class="fa fa-meetup"></i> 
                                <i class="fa fa-users" aria-hidden="true"></i>

                            </div>
                        </div>
                        <div class="modal-body">
                            <?php foreach ($cos as $o): ?>
                                <li class="list-group-item"> <a href="<?php echo base_url() . 'search/category/' . $o->id . '/' . $ci->sanitizeData($o->name); ?>"><?php echo $o->name; ?></a></li>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row col-lg-2 categ card">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">PROVIDERS</h3>
                        <div class="btn-group pull-right">
                            <i class="fa fa-hospital-o"></i> 
                            <i class="fa fa-car"></i>
                            <i class="fa fa-medkit"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <?php foreach ($pro as $o): ?>
                            <li class="list-group-item"> <a href="<?php echo base_url() . 'search/category/' . $o->id . '/' . $ci->sanitizeData($o->name); ?>"><?php echo $o->name; ?></a></li>
                        <?php endforeach; ?>
                        <li class="list-group-item">&nbsp;</li>
                    </div>

                </div>
            </div>
            <div class="row col-lg-2 categ card">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">COMPLIMENTARY SERVICES</h3>
                        <div class="btn-group pull-right">
                            <i class="glyphicon glyphicon-facetime-video"></i>
                            <i class="fa fa-cutlery"></i>
                            <i class="fa fa-microphone"></i> 
                        </div>
                    </div>
                    <div class="modal-body">
                        <?php foreach ($cs as $o): ?>
                            <li class="list-group-item"> <a href="<?php echo base_url() . 'search/category/' . $o->id . '/' . $ci->sanitizeData($o->name); ?>"><?php echo $o->name; ?></a></li>
                        <?php endforeach; ?>
                        <br>
                    </div>

                </div>
            </div>


            <div class="row col-xs-2">
                <a href="#worship-0"> <img src="<?php echo base_url(); ?>img/worship2.jpg" width="450px" height="400px"/></a>
            </div>
        </div>
    </div>

    <div class="row col-xs-12 card " style="margin-top: 5px; margin-left: 1px; margin-bottom: 20px; background: gainsboro; padding: 10px;"  >
        <center>
            <img src="https://cdl.ucf.edu/files/2016/08/Banner_Example-6.png" alt="" height="90" border="0" width="728">

            </div>
        <?php else : ?>

        <?php endif; ?>
