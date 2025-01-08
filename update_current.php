<?php
//UNTUK SECURITY SYSTEM
session_start();
include("inc/db.php");

if(!isset($_SESSION['username'])){
	header("Location: index.php");
	exit();
} 

if(isset($_GET['upcid']) and !empty($_GET['upcid']) and is_numeric($_GET['upcid'])){
	$editId = $_GET['upcid'];
	$edit_qry = "select * from visitor where v_id='$editId' limit 1";
	$edit_run = mysqli_query($con,$edit_qry);
	if(mysqli_num_rows($edit_run)>0){
			$visrows = mysqli_fetch_array($edit_run);
			$visid = $visrows['v_id'];
			$visname = $visrows['vname'];
			$patname = $visrows['pname'];
			$visic = $visrows['ic'];
			$viscontno = $visrows['contno'];
			$visemail = $visrows['email'];
			$vistime = $visrows['time'];
			$visdate = $visrows['date'];
			$visaddin = $visrows['addin'];

		}else{
			echo 'Sorry No records found';
		}
}

if(isset($_POST['update'])){
	
	$update_id = mysqli_real_escape_string($con,$_POST['visid']);
	$vname = mysqli_real_escape_string($con,$_POST['vname']);
	$pname = mysqli_real_escape_string($con,$_POST['pname']);
	$ic = mysqli_real_escape_string($con,$_POST['ic']);
	$contno = trim(htmlentities(mysqli_real_escape_string($con,$_POST['contno'])));
	$emailid = mysqli_real_escape_string($con,$_POST['emailid']);
	$time = mysqli_real_escape_string($con,$_POST['time']);
	$date = mysqli_real_escape_string($con,$_POST['date']);
	$addin = mysqli_real_escape_string($con,$_POST['addin']);

	if(empty($vname) or empty($pname) or empty($ic) or empty($contno) or empty($emailid) or empty($time) or empty($date) or empty($addin)){
		$error = "Please, fill the Visitor\'s IC.";
	}
	else{
		$update_query = "update visitor set vname='$vname', pname='$pname', ic='$ic', contno='$contno', email='$emailid', time='$time', date='$date' , addin='$addin' where v_id='$update_id'";
		$update_run = mysqli_query($con,$update_query);
		if($update_run){
			
			header("Location: home.php?update_msg=Records Updated successfully");
			exit();
		}else{
			echo mysqli_error($con);
			$error = "Unable to Update, try after some time.";
		}
	}	
}
?>

<?php include('inc/header.php'); ?>

<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark scroll_auto">
  	  <h4 class="display-6 font-italic">Update Visitor</h4><hr style='background:white;'>
      <p class="lead my-3">Please edit form to update visitor.</p>
    <div class="col-md-6 px-0 fleft">      
      <form action="update_current.php" method="post" style="border:1px solid #ccc;">

	  
		<div class="container"><br>
        	
			<div class="form-label-group"> 
            <input type="text" class="form-control" placeholder="Visitor Name" name="vname" id="vname" value="<?php if(isset($visname)){echo $visname;}?>" required autofocus>
            <label for="vname">Visitor Name</label>
            </div>

			<div class="form-label-group">
            <input type="text" placeholder="Patient Name" class="form-control" name="pname" id="pname"  value="<?php if(isset($patname)){echo $patname;}?>" required>
            <label for="pname">Patient Name</label>
            </div>

			<div class="form-label-group">
            <input type="tel" placeholder="IC" name="ic" class="form-control" id="ic"  value="<?php if(isset($visic)){echo $visic;}?>" required>
            <label for="ic">IC Visitor</label>
            </div>
	
			<div class="form-label-group">
            <textarea placeholder="Contact No" name="contno" class="form-control" id="contno" rows="4" cols="30" required><?php if(isset($viscontno)){echo htmlspecialchars($viscontno);}?></textarea>            
            <label for="contno">Contact No. Visitor</label>
            </div>
	
			<div class="form-label-group">
            <input type="email" placeholder="Email" name="emailid" id="emailid" class="form-control"  value="<?php if(isset($visemail)){echo $visemail;}?>" required>            
            <label for="emailid">Email Visitor</label>
            </div>
            
			<div class="form-label-group">
           	<input type="time" placeholder="Time" class="form-control" name="time" id="time"  value="<?php if(isset($vistime)){echo $vistime;}?>" required>
           	<label for="time">Time</label>
           	</div>
	
			<div class="form-label-group">
            <input type="Date" placeholder="Date" class="form-control" name="date" id="date"  value="<?php if(isset($visdate)){echo $visdate;}?>" required>
            <label for="date">Date</label>
            </div>

			<div class="form-label-group">
            <input type="text" placeholder="Add Info" class="form-control" name="addin" id="addin"  value="<?php if(isset($visaddin)){echo $visaddin;}?>" required>
            <label for="addin">Add Info</label>
            </div>

			<input type="hidden" name="visid" value="<?php if(isset($visid)){echo $visid;}?>" required>

			<div class="clearfix" style="text-align:center;">
              <button type="reset" class="cancelbtn btn btn-light">Cancel</button>&nbsp;&nbsp;&nbsp;
              <button type="submit" name="update" class="signupbtn btn btn-light">Update</button><br><br>
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