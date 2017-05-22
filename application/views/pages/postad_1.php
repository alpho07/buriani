<script>
    $(function () {
        $('#AddType').change(function () {
           // alert('PREMIUM listing: You have selected premium. Kindly send the amount indicated to our Till Number: 716 647 after submitting your listing. ');
        });
    });
</script>
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
<div class="row">
    <form id="smart-form" method="POST" enctype='multipart/form-data' action="<?php echo base_url() . 'home/do_uploaad/' . base64_encode('newAdd'); ?>">

        <div class="col-lg-12 col-md-12 col-sm-12 register-account card">

            <div class="carousel-heading no-margin">
                <h4>Create new listing</h4>
            </div>


            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p><strong>Enter Listing information</strong></p>
                        <hr>
                    </div>

                </div>
                <div class="row">


                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Listing Title</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input type="text" required name="addtitle" id="addtitle" value="<?php echo isset($_POST['adtitle']) ? $_POST['adtitle'] : '' ?>">
                    </div>	

                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Selling As</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <select required class="chosen-select-search" name="business" id="business" >
                            <option value="">-Select As-</option>

                            <option value="Individual">Individual</option>
                            <option value="Business">Business</option>

                        </select>
                    </div>	

                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Listing Category</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <select required class="chosen-select-search" name="category" id="category" >
                            <option value="">-Select Category-</option>
                            <?php foreach ($categoriesad as $c): ?>
                                <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>	

                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Price</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <input  type="text" name="price" id="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>">
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <input  type="checkbox" name="negotaible" id="negotiable" value="yes" <?php echo isset($_POST['negotaible']) ? 'checked=checked' : '' ?>> Negotiable
                    </div>	

                </div>
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Description</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <textarea required name="description" name="description" id="description"  ><?php echo isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
                    </div>	

                </div>

                <hr>
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Listing Image</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="col-md-12">
                            <div style="color:red;font-weight: bold;" > <?php echo @$error; ?></div>

                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <p><input class="btn btn-sm btn-primary" required type="file" id="file"  name="file[]"/></p>
                                <p id="img"></p>
                            </div>
                            <div class="col-md-12">
                                <input required class="btn btn-sm btn-primary" type="file" id="file2"  name="file[]"/>
                                 <p id="img2"></p>
                            </div>
                            <div class="col-md-12">
                                <input required class="btn btn-sm btn-primary" type="file" id="file3"  name="file[]"/>
                                 <p id="img3"></p>
                            </div>
                        </div>

                        <p id=""></p
                    </div>	

                </div>
            </div>

            <!--div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p>Password</p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <input required type="password" name="password" id="password">
                </div>	

            </div-->




            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p>Your Region</p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <input required type="text" name="region" id="region" value="<?php echo isset($_POST['region']) ? $_POST['region'] : '' ?>">
                </div>	

            </div>
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p>Listing  Type <a href="#listingtypes" class="btn btn-sm btn-warning"  data-toggle="modal" data-target="#myModal" title="Preview Normal and Premium Sample Appearance"><i class="fa fa-binoculars"></i></a></p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <select id="AddType" name="premType">
                        <option value="0">Free</option>
                        <option value="1">PREMIUM LISTING 10 Days  </option>
                        <option value="2">PREMIUM LISTING 20 Days</option>
                        <option value="3">PREMIUM LISTING 30 Days</option>
                    </select>
                    <a class="pull-right" href="<?php echo base_url();?>home/pricing" target="_blank">See price list</a>
                </div>	

            </div>
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p></p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <span>If you selected premium, please pay the amount or your listing will be regarded as free listing and will not appear in the top  premium listing section</span>
                </div>	

            </div>
            <!--hr>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p><strong>Personal Details</strong></p>
            </div>
            <hr>

            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p>Your Name</p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <input required type="text" name="fullname" id="fullname" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>">
                </div>	

            </div>
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p>Your Phone</p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <input required type="text" name="phone" id="phone" placeholder="07xx yyyzzz" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
                                       <span><small>Please enter a valid 10 digit phone number e.g. 0700 000000</small></span>

                </div>	

            </div>
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p>your Email</p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <input required type="email" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                     <span><small>Please enter a valid email e.g. mimi@example.com</small></span>

                </div>	

            </div-->



            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:30px; ">
                <button  type="submit" style="background: #9e1461;" class="btn btn-lg btn-primary pull-right" onclick="$(this).prop('text','Posting....')"><i class="fa fa-save"></i> Submit Listing</button>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p><strong>&nbsp;</strong></p>
                </div>


            </div>

        </div>


</div>
</form>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Normal free vs Normal Premium Listing</h4>
      </div>
      <div class="modal-body">
          <img src="<?php echo base_url();?>img/preview.png" alt="NORMAL VS PREMIUM LITING"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
    $(document).ready(function () {
        $("#description,#tinymce").maxlength({max: 3072});
        $("#addtitle").maxlength({max: 48});
        $('#file').change(function () {
            if (this.files.length > 0) {

                $.each(this.files, function (i, v) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var img = new Image();
                        img.src = e.target.result;

                        img.onload = function () {

                            // CREATE A CANVAS ELEMENT AND ASSIGN THE IMAGES TO IT.
                            var canvas = document.createElement("canvas");

                            var value = 20;

                            // RESIZE THE IMAGES ONE BY ONE.
                            img.width = (img.width * value) / 100
                            img.height = (img.height * value) / 100

                            var ctx = canvas.getContext("2d");
                            ctx.clearRect(0, 0, canvas.width, canvas.height);
                            canvas.width = img.width;
                            canvas.height = img.height;
                            ctx.drawImage(img, 0, 0, img.width, img.height);
                            $('#img').empty();
                            $('#img').append(img);      // SHOW THE IMAGES OF THE BROWSER.


                        }
                    };
                    reader.readAsDataURL(this);
                });
            }
        });
        
          $('#file2').change(function () {
            if (this.files.length > 0) {

                $.each(this.files, function (i, v) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var img = new Image();
                        img.src = e.target.result;

                        img.onload = function () {

                            // CREATE A CANVAS ELEMENT AND ASSIGN THE IMAGES TO IT.
                            var canvas = document.createElement("canvas");

                            var value = 20;

                            // RESIZE THE IMAGES ONE BY ONE.
                            img.width = (img.width * value) / 100
                            img.height = (img.height * value) / 100

                            var ctx = canvas.getContext("2d");
                            ctx.clearRect(0, 0, canvas.width, canvas.height);
                            canvas.width = img.width;
                            canvas.height = img.height;
                            ctx.drawImage(img, 0, 0, img.width, img.height);
                            $('#img2').empty();
                            $('#img2').append(img);      // SHOW THE IMAGES OF THE BROWSER.


                        }
                    };
                    reader.readAsDataURL(this);
                });
            }
        });
        
           $('#file3').change(function () {
            if (this.files.length > 0) {

                $.each(this.files, function (i, v) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var img = new Image();
                        img.src = e.target.result;

                        img.onload = function () {

                            // CREATE A CANVAS ELEMENT AND ASSIGN THE IMAGES TO IT.
                            var canvas = document.createElement("canvas");

                            var value = 20;

                            // RESIZE THE IMAGES ONE BY ONE.
                            img.width = (img.width * value) / 100
                            img.height = (img.height * value) / 100

                            var ctx = canvas.getContext("2d");
                            ctx.clearRect(0, 0, canvas.width, canvas.height);
                            canvas.width = img.width;
                            canvas.height = img.height;
                            ctx.drawImage(img, 0, 0, img.width, img.height);
                            $('#img3').empty();
                            $('#img3').append(img);      // SHOW THE IMAGES OF THE BROWSER.


                        }
                    };
                    reader.readAsDataURL(this);
                });
            }
        });

        $("#smart-form").on("submit", function (e) {
            e.preventDefault();
            $registerForm;
        });

        $('#category').change(function () {
            value = $(this).val();
            if (value === '1') {
                window.location.href = "<?php echo base_url(); ?>home/postobituary"
            }
        });




        var $registerForm = $("#smart-form").validate({
            errorElement: 'div',
            rules: {
                addtitle: {
                    required: true
                },
                category: {
                    required: true
                },
                description: {
                    required: true
                },
                price: {
                    required: true,
                    number: true
                },

                file: {
                    required: true,
                },
                file1: {
                    required: true,
                },
                file2: {
                    required: true,
                },
                region: {
                    required: true,
                },
                fullname: {
                    required: true
                },

//                },
//                passwordConfirm: {
//                    required: true,
//                    minlength: 3,
//                    maxlength: 20,
//                    equalTo: '#password'
//                },
            },
            // Messages for form validation
            messages: {
                addtitle: {
                    required: 'Ad Title is required'
                },
                category: {
                    required: 'Ad Category is required'
                },
                email: {
                    required: 'Please enter your email address',
                    email: 'Please enter a VALID email address'
                },
                phone: {
                    required: 'Your phone number is required'
                },
                description: {
                    required: 'Please describe your Ad'
                },
                fullname: {
                    required: 'Your full name is required'
                },
                password: {
                    required: 'Your password is required'
                },
                price: {
                    required: 'Price is required'
                },
            },
            submitHandler: function (form) {
                form.submit();
            },
            // Do not change code below
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }, invalidHandler: function (event, validator) {
                // 'this' refers to the form
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1
                            ? 'You missed 1 field. It has been highlighted'
                            : 'You missed ' + errors + ' fields. They have been highlighted';
                    alert(message);

                } else {
                    $("div.error").hide();
                }
            }
        });


    });




</script>

