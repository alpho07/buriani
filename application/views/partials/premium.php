<style>

    .swiper-container {
        width: 100%;
        height: 330px;
        margin: 10px auto;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
</style>

<script>
    $(function () {
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            slidesPerView: 5,
            paginationClickable: true,
            spaceBetween: 5,
            autoplay:5000,
            nextButton:null,
            prevButton:null,
            effect:'slide',
            loop:true,
            freeMode: true
        });
        
        
    });
</script>  
<!-- Swiper -->
<div class="swiper-container">
  
    <div class="swiper-wrapper">
        <?php
        foreach ($premium as $ob):
            $img = explode(",", $ob->image_path);
            ?>
            <div class="swiper-slide">
                <div class=" col-lg-2 product " style="width:240px !important; height: 210px !important; " >
                    <?php if ($ob->premium === '1') { ?>
                        <div class="ribbon"><span>PREMIUM</span></div>
                    <?php } else { ?>

                    <?php } ?>
                    <div class="product-image " style="-webkit-box-shadow: 3px -3px 5px -1px rgba(158,20,97,1);
                         -moz-box-shadow: 3px -3px 5px -1px rgba(158,20,97,1);
                         box-shadow: 3px -3px 5px -1px rgba(158,20,97,1);" >
                        <a href="<?php echo base_url() . 'home/loadsingle/' . $ob->id . '/' . str_replace(" ", "-", $ob->title); ?>">
                            <img src="<?php echo base_url() . $img[0]; ?>" alt="<?php echo $ob->title; ?>" style="width:240px !important; height: 200px !important;" />
                        </a>

                    </div>

                    <div class="product-info card" style="background: #ffccf2 !important; -webkit-box-shadow: 3px -3px 5px -1px rgba(158,20,97,1);
                         -moz-box-shadow: 3px -3px 5px -1px rgba(158,20,97,1);
                         box-shadow: 3px -3px 5px -1px rgba(158,20,97,1);">
                        <h5><a  style="color:#000 !important;" href="<?php echo base_url() . 'home/loadsingle/' . $ob->id . '/' . str_replace(" ", "-", $ob->title); ?>"><?php echo mb_strimwidth($ob->title, 0, 18, "..."); ?></a></h5>
                        <span class="price "  style="color:#9e1461 !important;">KES. <?php echo number_format($ob->price, 2); ?></span>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- Add Pagination -->
   
</div>



