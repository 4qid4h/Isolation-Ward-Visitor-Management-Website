<?php
//UNTUK SECURITY SYSTEM
session_start();
include('inc/db.php');

if(!isset($_SESSION['username'])){
	header('Location: index.php');
	exit();
}
?>

<?php include('inc/header.php'); ?>  

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark scroll_auto">
  	  <h4 class="display-6 font-italic">Update Visitor</h4><hr style='background:white;'>
      <p class="lead my-3">Please, search visitor by IC visitor to update record.</p>
    <div class="col-md-6 px-0 fleft">      
      <form method="post" action="update.php" style="border:1px solid #ccc;">
          <div class="container"><br>
        	
            <div class="form-label-group">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="visinfo" aria-label="Search" autofocus>
            <label for="visinfo">IC Visitor</label>
            </div>
                    
            <div class="clearfix" style="text-align:center;">
              <button type="submit" name="searchvis" class="signupbtn btn btn-light">Search</button><br><br>
            </div>
          </div>
        </form>
	</div>
    

	<div class="col-md-12 px-0 fleft"><br><br>
		<?php
			if(isset($_POST['searchvis'])){
				$visinfo = trim(mysqli_real_escape_string($con,$_POST['visinfo']));
				
				if(empty($visinfo)){
					echo $error = 'Please, fill the Visitor\'s IC.';
				}else{
					$visinfo_query = "select * from visitor where ic='$visinfo'";
					$visinfo_query_run = mysqli_query($con,$visinfo_query);
					if(mysqli_num_rows($visinfo_query_run)>0){
						?>
							<h3>List of matching visitor</h3>
							<div class="table-wrapper-scroll-y my-custom-scrollbar"> 
							<table class='table table-striped table-responsive-md wht_txt'>
								<thead>
								<tr>
								<td>Sr. No.</td>
								<td>Visitor Name</td>
								<td>Patient Name</td>
								<td>IC Visitor</td>
								<td>Contact No</td>
								<td>Email</td>
								<td>Time</td>
								<td>Date</td>
								<td>Add Info</td>
								<td>Action</td>
							  </tr></thead><tbody>
						<?php
						$srno = 0;
						while($visrows = mysqli_fetch_array($visinfo_query_run)){
						$srno++;	
						$visid = $visrows['v_id'];
						$visname = $visrows['vname'];
						$patname = $visrows['pname'];
						$visic = $visrows['ic'];
						$viscontno = $visrows['contno'];
						$visemail = $visrows['email'];
						$vistime = $visrows['time'];
						$visdate = $visrows['date'];
						$visaddin = $visrows['addin'];
						
						echo "<tr>
								<td>$srno</td>
								<td>$visname</td>
								<td>$patname</td>
								<td>$visic</td>
								<td>$viscontno</td>
								<td>$visemail</td>
								<td>$vistime</td>
								<td>$visdate</td>
								<td>$visaddin</td>
								<td><a href='update_current.php?upcid=$visid' class='btn btn-light'>Edit</a></td>
							  </tr>
							  ";
						}
						?>
							</tbody></table>
						<?php
						
					}
					else{ 
							
							echo $error = 'Sorry, no records found.';
						}			
				}
			}
			?>		
		</div>
	</div>	
       
  
  </div>  
</div>

<!-- BAHAGIAN FOOTER -->
<?php include('inc/footer.php'); ?>
