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
<div class="row card">
    <form id="smart-form" method="POST" enctype='multipart/form-data' action="<?php echo base_url() . 'home/adedit/' . $id . '/' . $pe . '/' . base64_encode('newAdd'); ?>">

        <div class="col-lg-12 col-md-12 col-sm-12 register-account">

            <div class="carousel-heading no-margin">
                <h4>Edit Ad :  <?php echo $info[0]->title; ?></h4>
            </div>


            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p><strong>Edit Ad information </strong></p>
                        <hr>
                    </div>

                </div>
                <div class="row">


                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Ad Title</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input type="text" required name="addtitle" id="addtitle" value="<?php echo $info[0]->title; ?>">
                    </div>	

                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Category</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <select required class="chosen-select-search" name="category" id="category" >
                            <option value="<?php echo $info[0]->category; ?>"><?php echo $info[0]->name; ?></option>
                            <?php foreach ($categories as $c): ?>
                                <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>	

                </div>
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Business Type</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <select required class="chosen-select-search" name="business" id="business" >
                            <option value="<?php echo $info[0]->biz_type; ?>"><?php echo $info[0]->biz_type; ?></option>

                            <option value="Individual">Individual</option>
                            <option value="Business">Business</option>

                        </select>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Price</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <input  type="text" name="price" id="price" value="<?php echo @$info[0]->price ?>">
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <input  type="checkbox" name="negotaible" id="negotiable" value="yes" <?php if ($info[0]->nego === 'yes') {
                                echo 'checked=checked';
                            } else {
                                echo '';
                            } ?>> Negotiable
                    </div>	

                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Description</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <textarea required name="description" name="description" id="description"  ><?php echo $info[0]->description; ?></textarea>
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
                        <?php $img = explode(',', $info[0]->image_path); ?>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <p><input class="btn btn-sm btn-primary" required type="file" id="file"  name="file[]"/></p>
                                <p id="img"><img width="150px" height="150px" src="<?php echo @base_url() . $img[0]; ?>"/></p>
                            </div>
                            <div class="col-md-12">
                                <input required class="btn btn-sm btn-primary" type="file" id="file2"  name="file[]"/>
                                <p id="img2"><img width="150px" height="150px" src="<?php echo @base_url() . $img[1]; ?>"/></p>
                            </div>
                            <div class="col-md-12">
                                <input required class="btn btn-sm btn-primary" type="file" id="file3"  name="file[]"/>
                                <p id="img3"><img width="150px" height="150px" src="<?php echo @base_url() . $img[2]; ?>"/></p>
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
                    <input required type="text" name="region" id="region" value="<?php echo $info[0]->region; ?>">
                </div>	

            </div>
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p>Listing  Type </p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <script>
                        $(function(){
                           $("#AddType").children().eq("<?php echo $info[0]->premium_type;?>").attr('selected', 'selected'); 
                        });
                        </script>
                    <select id="AddType" name="premType">
                        <option value="0">Free</option>
                        <option value="1">PREMIUM LISTING 10 Days  </option>
                        <option value="2">PREMIUM LISTING 20 Days</option>
                        <option value="3">PREMIUM LISTING 30 Days</option>
                    </select>
                    <a class="pull-right" href="<?php echo base_url(); ?>home/pricing" target="_blank">See price list</a>
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



            <div class="col-lg-12 col-md-12 col-sm-12">
                <button  type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Ad Data</button>
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

                            var value = 30;

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
            }
        });


    });




</script>

