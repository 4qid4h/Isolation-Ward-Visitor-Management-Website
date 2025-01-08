<?php
//UNTUK SECURITY SYSTEM
session_start();
include("inc/db.php");

if(!isset($_SESSION['username'])){
	header("Location: index.php");
	exit();
} 

if(isset($_POST['register'])){
	
	$vname = mysqli_real_escape_string($con,$_POST['vname']);
	$pname = mysqli_real_escape_string($con,$_POST['pname']);
	$ic = mysqli_real_escape_string($con,$_POST['ic']);
	$contno = trim(htmlentities(mysqli_real_escape_string($con,$_POST['contno'])));
	$emailid = mysqli_real_escape_string($con,$_POST['emailid']);
	$time = mysqli_real_escape_string($con,$_POST['time']);
	$date = mysqli_real_escape_string($con,$_POST['date']);
  $addin = mysqli_real_escape_string($con,$_POST['addin']);

	
	if(empty($vname) or empty($pname) or empty($ic) or empty($contno) or empty($emailid) or empty($time) or empty($date) or empty($addin)){
		$error = "Please, fill all the fields.";
	}
	else{
		$new_visitor_query = "insert into `visitor` (`vname`,`pname`,`ic`,`contno`,`email`,`time`,`date`,`addin`) VALUES ('$vname','$pname','$ic','$contno','$emailid','$time','$date','$addin')";
		$visitor_query_run = mysqli_query($con,$new_visitor_query);
		if($visitor_query_run){
			
			header("Location: home.php?register_msg=Records saved successfully.");
			exit();
		}else{
			
			header("Location: home.php?register_error=Unable to register, please try after some time.");
			exit();
		}
	}	
}
?>

<!-- BAHAGIAN FORM REGISTER VISITOR -->
<?php include('inc/header.php'); ?>  

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark scroll_auto">
  	  <h4 class="display-6 font-italic">Register New Visitor</h4><hr style='background:white;'>
      <p class="lead my-3">Please fill in this form to register new visitor.</p>
    <div class="col-md-6 px-0 fleft">      
      <form action="register.php" method="post" style="border:1px solid #ccc;">
         
        <div class="container"><br>
        	
            <div class="form-label-group"> 
            <input type="text" class="form-control" placeholder="Visitor Name" name="vname" id="vname" value="<?php if(isset($vname)){echo $vname;}?>" required autofocus>
            <label for="vname">Visitor Name</label>
            </div>
            
            <div class="form-label-group">
            <input type="text" placeholder="Patient Name" class="form-control" name="pname" id="pname"  value="<?php if(isset($pname)){echo $pname;}?>" required>
            <label for="pname">Patient Name</label>
            </div>
            
            <div class="form-label-group">
            <input type="tel" placeholder="IC" name="ic" class="form-control" id="ic"  value="<?php if(isset($ic)){echo $ic;}?>" required>
            <label for="ic">IC Visitor</label>
            </div>
            
            <div class="form-label-group">
            <textarea placeholder="Contact No" name="contno" class="form-control" id="contno" rows="4" cols="30" required><?php if(isset($contno)){echo htmlspecialchars($contno);}?></textarea>            
            <label for="contno">Contact No. Visitor</label>
            </div>
            
            <div class="form-label-group">
            <input type="email" placeholder="Email" name="emailid" id="emailid" class="form-control"  value="<?php if(isset($emailid)){echo $emailid;}?>" required>            
            <label for="emailid">Email Visitor</label>
            </div>
            
            
           <div class="form-label-group">
           <input type="time" placeholder="Time" class="form-control" name="time" id="time"  value="<?php if(isset($time)){echo $time;}?>" required>
           <label for="time">Time</label>
           </div>
            
            
            <div class="form-label-group">
            <input type="Date" placeholder="Date" class="form-control" name="date" id="date"  value="<?php if(isset($date)){echo $date;}?>" required>
            <label for="date">Date</label>
            </div>

            <div class="form-label-group">
            <input type="text" placeholder="Add Info" class="form-control" name="addin" id="addin"  value="<?php if(isset($addin)){echo $addin;}?>" required>
            <label for="addin">Add Info</label>
            </div>
            
           
        
            <div class="clearfix" style="text-align:center;">
              <button type="reset" class="cancelbtn btn btn-light">Cancel</button>&nbsp;&nbsp;&nbsp;
              <button type="submit" name="register" class="signupbtn btn btn-light">Register</button><br><br>
            </div>
          </div>
        </form>
    </div>
    
    <div class="col-md-5 px-0 fright mtop">
     <img src="img/2W.png" alt="" class="img-thumbnail" width="100%" height="auto">
    </div>
       
  
  </div>  
</div>

<!-- BAHAGIAN FOOTER -->

<?php include('inc/footer.php'); ?>
