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


        $(document).ajaxStart(function () {
            $(".LOADERONE").css("display", "block");
        });

        $(document).ajaxComplete(function () {
            $(".LOADERONE").css("display", "none");
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
        OERROR = '<div class="alert alert danger" style="margin-left:30px;" id="ERROR_FINDER">No <strong><em>"<span id="KEY"><span><em></strong> found in the OBITUARY CATEGORY refine your search or <a class="btn btn-default btn-lg" style="background: #9e1461; color: white; font-weight: bold;" href="<?php echo base_url() . 'search/main/1/ORBITUARIES'; ?>"><i class="fa fa-paper-plane-o"></i> EXPLORE OBITUARIES</a>.</div>';
        ADERROR = '<div class="alert alert danger" style="margin-left:30px;" id="ERROR_FINDER">No <strong><em>"<span id="KEY"><span><em></strong> found in the NORMAL LISTING CATEGORY refine your search or <a class="btn btn-default btn-lg" style="background: #9e1461; color: white; font-weight: bold;" href="<?php echo base_url() . 'search/main/19/PROVIDERS'; ?>"><i class="fa fa-paper-plane-o"></i> EXPLORE ADS</a>.</div>';

        $(document).on('click', '.SEARCHER', function () {
            if ("<?php $this->uri->segment(2) ?>" === '') {
                $(".CATEGORIES").empty();
            }

            $(".MAIN_CONTENT").empty();
            var HTML = '<div class="row card" style="margin-top:10px; padding:10px;"><div class="col-lg-12 col-md-12 col-sm-12"><div class="carousel-heading"><h4>SEARCH RESULT FOR : <span id="search1">Type your search above...</span></h4></div></div><div class="row DATASEARCH">\n\
        <div style="margin-left:30px; display:none; class="row LOADER"><img src=' + base_url + 'img/buriani-loader.gif alt="Loading Please Wait...."/></div></div></div>';


            $('.MAIN_CONTENT').append(HTML);

        });


        $(document).on('focusout', '.SEARCHER', function () {
            $('#search1').text($(this).val());

            $('.DATASEARCH').empty();
            if ($('.SEARCHER').val() === '') {
                $('.DATASEARCH').empty();
                $(".CATEGORIES").append($y);
                $('.MAIN_CONTENT').append($k);
            }


        });

        $('.SELECT_SEARCH').change(function () {
            $('#ERROR_FINDER').empty();
            keyword = $('.SEARCHER').val();
            location2 = $('.LOCALITY').val();
            min = $('.MIN').val();
            max = $('.MAX').val();
            if ($('.SELECT_SEARCH').val() === 'normal_ad') {
                $('.MIN').show();
                $('.MAX').show();
                $('#search1').text($('.SEARCHER').val() + ' in NORMAL LISTING');
                getSearchData(keyword, location2, min, max);
            } else {
                $('.MIN').hide();
                $('.MAX').hide();
                $('#search1').text($('.SEARCHER').val() + ' in OBITUARIES');
                getSearchObData(keyword, location2);
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


        $('.SEARCHER').keydown(function (e) {
            if ($(this).val() === '') {
                $('#search1').text('NO SEARCH QUERY TO SEARCH FOR..');
            } else {
                if (e.keyCode === 13) {
                    keyword = $('.SEARCHER').val();
                    location2 = $('.LOCALITY').val();
                    min = $('.MIN').val();
                    max = $('.MAX').val();

                    $('#ERROR_FINDER').empty();
                    $('#search1').text($(this).val());
                    if ($('.SELECT_SEARCH').val() === 'normal_ad') {
                        $('#search1').text($('.SEARCHER').val() + ' in NORMAL LISTING');
                        getSearchData(keyword, location2, min, max);
                    } else {
                        $('#search1').text($('.SEARCHER').val() + ' in OBITUARIES');
                        getSearchObData(keyword, location2);
                    }
                }
            }
        });

        $('.BTSEARCHER_2').click(function () {

            if ($('.SEARCHER2').val() === '') {
                $('#search1').text('NO SEARCH QUERY TO SEARCH FOR..');
            } else {
                keyword = $('.SEARCHER').val();
                location2 = $('.LOCALITY').val();
                min = $('.MIN').val();
                max = $('.MAX').val();

                $('#ERROR_FINDER').empty();

                if ($('.SELECT_SEARCH').val() === 'normal_ad') {
                    $('#search1').text($('.SEARCHER').val() + ' in NORMAL LISTING');
                    getSearchData(keyword, location2, min, max);
                    return false;
                } else {
                    $('#search1').text($('.SEARCHER').val() + ' in OBITUARIES');
                    getSearchObData(keyword, location2);
                }
                return false;
            }

        });



        setInterval('swapImages()', 5000);
        setInterval('swapImages1()', 7000);


    });

    function swapImages() {
        var $active = $('#myGallery .active');

        var $next = ($('#myGallery .active').next().length > 0) ? $('#myGallery .active').next() : $('#myGallery img:first');

        $active.fadeOut(function () {
            $active.removeClass('active');
            $next.fadeIn().addClass('active');

        });
    }
    function swapImages1() {
        var $active = $('#myGallery2 .active');

        var $next = ($('#myGallery2 .active').next().length > 0) ? $('#myGallery2 .active').next() : $('#myGallery2 img:first');

        $active.fadeOut(function () {
            $active.removeClass('active');
            $next.fadeIn().addClass('active');

        });
    }

    function getSearchData(keyword, location2, min, max) {
        var HTML = '';
        $.getJSON(base_url + 'home/search', {keyword: keyword, thelocation: location2, min: min, max: max}, function (resp) {
            if (resp.hits.length === 0) {
                $('.DATASEARCH').empty();
                $(".DATASEARCH").append(ADERROR);
                $('#KEY').text($('.SEARCHER').val());
            } else {
                $('.DATASEARCH').empty();
                $.each(resp.hits, function (i, res) {
                    HTML += '<div class="col-lg-3 col-md-3 col-sm-3 product lid' + res.id + '"><div class="product-image "><a href="' + base_url + 'home/loadsingle/' + res.id + '/' + res.title + '"><img src="' + base_url + res.image_path + '" width="160px" height="160px"/></a></div><div class="product-info card"><h5><a style="color:black;" href="' + base_url + 'home/loadsingle/' + res.id + '/' + res.title + '">' + text_truncate(res.title, 22, '...') + '</a></h5><h7>(<a style="color:black;" title=' + res.category + ' href="' + base_url + 'search/category/' + res.catid + '/' + res.category + '">' + text_truncate(res.category, 10, '...') + '</a>)</h7>  <span class="price" style="color:#9e1461 !important;">KES.' + res.price + '</span></div></div>';
                    $(".DATASEARCH").append(HTML);

                });

                var seen = {}

                $('.DATASEARCH div').each(function () {
                    var classes = $(this).attr('class').split(' ');
                    var lid = classes.find(e => e.startsWith('lid'))

                    if (lid)
                        seen[lid] ? $(this).remove() : seen[lid] = 1;
                });
            }



        });
    }

    function getSearchObData(keyword, location2) {
        var HTML = '';
        $.getJSON(base_url + 'home/searchob/', {keyword: keyword, thelocation: location2}, function (resp) {
            if (resp.hits.length === 0) {
                $('.DATASEARCH').empty();
                $(".DATASEARCH").append(OERROR);
                $('#KEY').text($('.SEARCHER').val());
            } else {
                $('.DATASEARCH').empty();
                $.each(resp.hits, function (i, res) {
                    HTML += '<div class="col-lg-3 col-md-3 col-sm-3 product lid' + res.id + '"><div class="product-image "><a href="' + base_url + 'home/loadprofile/' + res.id + '/' + res.title + '"><img src="' + base_url + res.image_path + '" width="160px" height="160px"/></a></div><div class="product-info card"><h4><a style="color:#9e1461" href="#">' + text_truncate(res.title, 15, '...') + '</a></h4><h5><a style="color:#9e1461" href="#">' + text_truncate(res.obtitle, 15, '...') + '</a></h5><span class="" style="color:black; !important;"> Born:' + res.dob + '  Died:' + res.dod + '</span></div></div>';
                    $(".DATASEARCH").append(HTML);
                });


                var seen = {}

                $('.DATASEARCH div').each(function () {
                    var classes = $(this).attr('class').split(' ');
                    var lid = classes.find(e => e.startsWith('lid'))

                    if (lid)
                        seen[lid] ? $(this).remove() : seen[lid] = 1;
                });
            }



        });
    }
    ;


    text_truncate = function (str, length, ending) {
        if (length == null) {
            length = 100;
        }
        if (ending == null) {
            ending = '...';
        }
        if (str.length > length) {
            return str.substring(0, length - ending.length) + ending;
        } else {
            return str;
        }
    };


    $(function () {

        $(".LOCALITY").geocomplete({

        })
                .bind("geocode:result", function (event, result) {
                    $.log("Result: " + result.formatted_address);
                })
                .bind("geocode:error", function (event, status) {
                    $.log("ERROR: " + status);
                })
                .bind("geocode:multiple", function (event, results) {
                    $.log("Multiple: " + results.length + " results found");
                });

        $("#find").click(function () {
            $("#geocomplete").trigger("geocode");
        });


        $("#examples a").click(function () {
            $("#geocomplete").val($(this).text()).trigger("geocode");
            return false;
        });

    });



    $(document).ready(function () {

        $(".imgLiquid").imgLiquid();

    });
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

    #myGallery img,#myGallery2 img{
        display:none;
        position:absolute;
        top:0;
        left:0;
    }
    #myGallery img.active,#myGallery2 img.active{
        display:block;
    }


    .SEARCHER_LIST {list-style: none; margin: 0; padding: 0; float:left; display: inline; background: #FFF;}
    .SEARCHER_LIST li {float:left; display: inline; margin: 0 0px; padding: 1px; border-color: #fff;}
    .SEARCHER_LIST input[type=text]{border-color: #FFF;}


    .Helper{
        position:absolute;

        margin-top: 20px;
        margin-left:500px;

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
        <div class="Helper">
            <ul class="nav navbar-nav">

                <li class="dropdown" style="margin-right: 5px;">
                    <a href="#BurianiAgent" class="dropdown-toggle" data-toggle="dropdown">                      
                        <p><img src="<?php echo base_url(); ?>img/helper.png" alt="Need Help?"/></p>
                    </a>
                    <ul class="dropdown-menu">
                        <li data-toggle="modal" data-target="#createModal"><a href="#HowToPostAListing-listings-helper"><i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                <strong>Show me how to Post a Listing</strong></a></li>
                        <!--                        <li class="divider"></li>
                                                <li data-toggle="modal" data-target="#payModal"><a href="#HowToMakePayments-Payments-Helper"><i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                                        Show me how to make listing payments</a></li>-->
                    </ul>
                </li>
            </ul>
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
                            <p>Post Listing</p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>home/postobituarya/"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    Post Obituary</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>home/postada/"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    Post Listing</a></li>
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
            <span class="contacts">TILL NO. 716 647</span>
        </div>

    </nav>
    <!--  end navbar --> 
    <div class="container card searchxlass " id="searchxlass" style="margin-top:120px; padding: 30px; background: #000; border: 1px solid #9e1461;" >
        <div class="col-md-12">
            <ul class="SEARCHER_LIST ">
                <li>
                    <select class="chosen-select-search SELECT_SEARCH" name="category" >
                        <option value="normal_ad">IN NORMAL LISTING</option>
                        <option value="obituary">IN OBITUARIES</option>

                    </select>
                </li>

                <li>
                    <input type="text" class="form-control SEARCHER" name="keywords" style="width:400px;border-radius: 0px !important;" placeholder="What are you looking for?"/>
                </li>
                <li>
                    <input type="text" class="form-control  LOCALITY " placeholder="All Locations" style="width:260px;border-radius: 0px !important;"  /> 

                </li>
                <li class="LISTT">
                    <input type="text" class="form-control  MIN" name="min" style="width:120px;border-radius: 0px !important;" placeholder="MIN"/>
                </li>
                <li>
                    <input type="text" class="form-control MAX" name="keywords" style="width:120px;border-radius: 0px !important;" placeholder="MAX"/>
                </li>
                <li>
                    <button class="btn btn-primary BTSEARCHER_2" type="button" style="height:40px; border-radius: 0px !important;  background: #9e1461;"><i class="fa fa-search-plus"></i> Search</button>
                </li>
            </ul>
        </div>

    </div>



</header>



<?php if ($this->uri->segment(2) == ''): ?>
    <div class="container CATEGORIES card" style=" padding: 5px;">
        <div class="row col-xs-12  " style="margin-top: 0px; margin-left: 1px; margin-bottom: 10px;  padding: 3px; height: 260px;"   >
            <?php $this->load->view('partials/premium'); ?>

        </div>
        <div class="row" style="margin-top:360px;">
            <div class="row col-xs-2">

                <div id="myGallery">
                    <img src="<?php echo base_url(); ?>img/worship.jpg"  width="250px" height="400px" class="active" onclick="window.location.href = '#as1'" />
                    <img src="<?php echo base_url(); ?>img/2.jpg"  width="250px" height="400px " onclick="window.location.href = '#as2'"/>
                    <img src="<?php echo base_url(); ?>img/3.jpg" width="250px" height="400px" onclick="window.location.href = '#as3'" />
                </div>

                                <!--                <a href="#worship-0"> <img src="<?php echo base_url(); ?>img/worship.jpg" width="250px" height="400px"/></a>-->
            </div>
            <div class="row col-lg-2 categ card">
                <div class="row col-lg-12 categ">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h6 class="panel-title TITLE pull-left">OBITUARIES</h6>
                            <div class="btn-group pull-right">
                                <span><i class="glyphicon glyphicon-blackboard"></i><i class="glyphicon glyphicon-cloud-download"></i> </span>
                            </div>
                        </div>
                        <div class="modal-body MBODY">
                            <ul class="list-group" style="color:red">

                                <?php foreach ($obs as $o): ?>
                                    <li class="list-group-item"> <a href="<?php echo base_url() . 'search/category/' . $o->id . '/' . $ci->sanitizeData($o->name); ?>"><?php echo $o->name; ?></a></li>
                                <?php endforeach; ?>
                                <li class="list-group-item"><a class="btn btn-sm btn-default" style="background: #000; color:white; font-weight: bolder;" href="<?php echo base_url(); ?>search/main/1/ORBITUARIES"><i class="fa fa-eye"></i> SEE ALL <i class="fa fa-sign-out"></i></a></li>
                            </ul>
                        </div>

                    </div>

                </div>

                <div class="row col-lg-12 categ">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title TITLE pull-left">COMMUNE/SUPPORT</h3>
                            <div class="btn-group pull-right">
                                <i class="fa fa-meetup"></i> 
                                <i class="fa fa-users" aria-hidden="true"></i>

                            </div>
                        </div>
                        <div class="modal-body MBODY">
                            <?php foreach ($cos as $o): ?>
                                <li class="list-group-item"> <a href="<?php echo base_url() . 'search/category/' . $o->id . '/' . $ci->sanitizeData($o->name); ?>"><?php echo $o->name; ?></a></li>
                            <?php endforeach; ?>
                            <li class="list-group-item"><a class="btn btn-sm btn-default" style="background: #000; color:white; font-weight: bolder;" href="<?php echo base_url(); ?>search/main/25/COMMUNE/SUPPORT"><i class="fa fa-eye"></i> SEE ALL <i class="fa fa-sign-out"></i></a></li>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row col-lg-2 categ card">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title TITLE pull-left">PROVIDERS</h3>
                        <div class="btn-group pull-right">
                            <i class="fa fa-hospital-o"></i> 
                            <i class="fa fa-car"></i>
                            <i class="fa fa-medkit"></i>
                        </div>
                    </div>
                    <div class="modal-body MBODY">
                        <?php foreach ($pro as $o): ?>
                            <li class="list-group-item"> <a href="<?php echo base_url() . 'search/category/' . $o->id . '/' . $ci->sanitizeData($o->name); ?>"><?php echo $o->name; ?></a></li>
                        <?php endforeach; ?>
                        <li class="list-group-item">&nbsp;</li>
                        <li class="list-group-item">&nbsp;</li>
                        <li class="list-group-item"><a class="btn btn-sm btn-default" style="background: #000; color:white; font-weight: bolder;" href="<?php echo base_url(); ?>search/main/19/PROVIDERS"><i class="fa fa-eye"></i> SEE ALL <i class="fa fa-sign-out"></i></a></li>

                    </div>

                </div>
            </div>
            <div class="row col-lg-2 categ card">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title TITLE pull-left">COMPLIMENTARY SERVICES</h3>
                        <div class="btn-group pull-right">
                            <i class="glyphicon glyphicon-facetime-video"></i>
                            <i class="fa fa-cutlery"></i>
                            <i class="fa fa-microphone"></i> 
                        </div>
                    </div>
                    <div class="modal-body MBODY">
                        <?php foreach ($cs as $o): ?>
                            <li class="list-group-item"> <a href="<?php echo base_url() . 'search/category/' . $o->id . '/' . $ci->sanitizeData($o->name); ?>"><?php echo $o->name; ?></a></li>
                        <?php endforeach; ?>
                        <li class="list-group-item">&nbsp;</li>
                        <li class="list-group-item">&nbsp;</li>
                        <li class="list-group-item"><a class="btn btn-sm btn-default" style="background: #000; color:white; font-weight: bolder;" href="<?php echo base_url(); ?>search/main/20/SERVICES"><i class="fa fa-eye"></i> SEE ALL <i class="fa fa-sign-out"></i></a></li>

                    </div>

                </div>
            </div>


            <div class="row col-xs-2" style="margin-top:30px;">

                <div id="myGallery2">
                    <img src="<?php echo base_url(); ?>img/worship2.jpg"  width="450px" height="400px" class="active" onclick="window.location.href = '#as1'" />
                    <img src="<?php echo base_url(); ?>img/rainbow.jpg"  width="450px" height="400px " onclick="window.location.href = '#as2'"/>
                    <img src="<?php echo base_url(); ?>img/invest.jpg" width="450px" height="400px" onclick="window.location.href = '#as3'" />
                    <img src="<?php echo base_url(); ?>img/makegood.jpg" width="450px" height="400px" onclick="window.location.href = '#as3'" />
                </div>

            </div>
        </div>
    </div>

    <!--    <div class="row col-xs-12 card " style="margin-top: 5px; margin-left: 1px; margin-bottom: 20px; background: gainsboro; padding: 10px;"  >
            <center>
                <img src="https://cdl.ucf.edu/files/2016/08/Banner_Example-6.png" alt="" height="90" border="0" width="728">

                </div>-->
<?php else : ?>

<?php endif; ?>
