<?php 
include('inc/header.php'); ?>

<?php 
	if(isset($_GET['update_msg'])){
		echo "<script type='text/javascript'>window.onload = function(){ alert('".$_GET['update_msg']."');}</script>";
	}elseif(isset($_GET['register_msg'])){
		echo "<script type='text/javascript'>window.onload = function(){ alert('".$_GET['register_msg']."');}</script>";
	}elseif(isset($_GET['register_error'])){
		echo "<script type='text/javascript'>window.onload = function(){ alert('".$_GET['register_error']."');}</script>";
	}
?>

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark scroll_auto">
    <div class="col-md-6 px-0 fleft">
    <p class="lead my-3" style="font-family:OpenSans-Bold;font-size:155%;text-shadow: 2px 2px #000000;">
	  Welcome to Isolation Ward System.<br>This systems are used by the hospital to register visitors before they visit patients in the isolation ward.
	</p>
    </div>
	<!--GAMBAR LOGO KKM -->
	<div class="col-md-5 px-0 fright">
     <img src="img/logo3.jpg" alt="" class="img-thumbnail" width="100%" height="auto">
    </div>
   

  
  </div>  
</div>


<!-- BAHAGIAN FOOTER -->
<?php include('inc/footer.php'); ?>