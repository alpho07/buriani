<style type="text/css">
    .product-image{
        box-shadow: -1px 4px 6px 3px #CCCED0;
    }
    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    /* On mouse-over, add a deeper shadow */
    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
</style>
<link href='//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,900,700italic,500italic' rel='stylesheet' type='text/css'>

<!-- Stylesheets -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/perfect-scrollbar.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/swiper.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/fontello.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/select.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/animation.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.theme.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/chosen.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.maxlength.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/ct-navbar.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightslider.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/pe-icon-7-stroke.css">
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>favico/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>favico/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>favico/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>favico/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>favico/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>favico/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>favico/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>favico/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>favico/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>favico/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>favico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>favico/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>favico/favicon-16x16.png">
<link rel="manifest" href="<?php echo base_url(); ?>favico/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo base_url(); ?>favico/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//cdn.materialdesignicons.com/1.8.36/css/materialdesignicons.min.css">
<link href="<?php echo base_url(); ?>css/zebra/zebra_dialog.css" rel='stylesheet' type='text/css' />
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="//ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
<script type="text/javascript" charset="utf8" src="//ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        base_url = "<?php echo base_url(); ?>";
        $.maxlength.setDefaults({showFeedback: true});

        $('#phone').focusout(function () {
            $.get(base_url + 'auth/verify/phone/' + $(this).val(), function (resp) {
                if (resp === 'success') {
                    Prompt("Phone Number <strong> (" + $("#phone").val() + ")</strong>");
                    $('#phone').val('');
                } else {

                }
            })
        });
        $('#email').focusout(function () {
            $.get(base_url + 'auth/verify/email/' + $(this).val(), function (resp) {
                if (resp === 'success') {
                    Prompt("Phone Number <strong> (" + $("#email").val() + ")</strong>");
                    $('#email').val('');
                } else {

                }
            })
        });



        function Prompt(d) {
            $.Zebra_Dialog("This " + d + " is already registerd, please login to post AD or Obituary", {
                'type': 'error',
                'title': 'Duplicate Record',
                'buttons': [
                    {caption: 'Okey', callback: function () {


                        }}
                ]
            });

        }


        $(function () {

            $("#region").geocomplete({

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


        $('[data-toggle="popover"]').popover();


    });

</script>