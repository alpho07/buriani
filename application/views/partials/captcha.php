<?php
$rand=substr(rand(),0,6);

?>
<style>
    
</style>
<input type="text" name="code" required placeholder="Enter captcha Below" id="code">
<input type="text" value="<?=$rand?>" id="ran" readonly="readonly" style="width:100px; font-size:18px;  background: url(<?php echo base_url().'img/cat.png';?>)" >
<input type="hidden" name="chk" id="CHECK" value="<?=$rand?>">
<img  onclick="captch()" src="<?php echo base_url().'img/red.png';?>" width="40px" height="40px"/>


<script type="text/javascript">



function captch() {
    var x = document.getElementById("ran")
    x.value = Math.floor((Math.random() * 10000) + 1);
}

</script>