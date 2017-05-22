<style>
    ul{
        list-style: none;
        vertical-align: middle !important;
    }
#resources ul {
    list-style: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
   
}

#resources li {
    float: left;
}

#resources li a {
    display: block;
   
    text-align: center;
    padding: 40px;
    text-decoration: none;
}

#resources li a:hover {
    background-color: #111111;
    color:white;
}
</style>
<div class="row ">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="category-heading">
            <span>RESOURCES</span>

        </div>
    </div>


    <div class="row"> 

        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <ul id="resources">
                <li class="card">
                    <a href="<?php echo base_url();?>home/fpt"> <i class="fa fa-file-word-o fa-3x"></i> Funeral program templates</a>
                </li >
                <li class="card">
                    <a href="<?php echo base_url();?>home/digres"> <i class="fa fa-file-text-o fa-3x"></i> Digres</a>
                </li>
                <li class="card">
                    <a href="<?php echo base_url();?>home/verses"> <i class="fa fa-book fa-3x"></i> Bible Verses</a>
                </li>
                <li class="card">
                    <a href="<?php echo base_url();?>home/poems">    <i class="fa fa-commenting fa-3x"></i> Poems</a>
                </li>
            </ul>

        </div>







    </div>
</div>