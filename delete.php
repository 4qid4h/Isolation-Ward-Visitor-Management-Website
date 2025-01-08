<?php
//UNTUK SECURITY SYSTEM
session_start();
include('inc/db.php');

if(!isset($_SESSION['username'])){
	header('Location: index.php');
	exit();
}
?>


<!-- BAHAGIAN DELETE VISITOR -->
<?php include('inc/header.php'); ?>  

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark scroll_auto">
  	  <h4 class="display-6 font-italic">Delete Visitor</h4><hr style='background:white;'>
      <p class="lead my-3">Please, search visitor by IC visitor to delete record</p>
    <div class="col-md-6 px-0 fleft">      
      <form method="post" action="delete.php" style="border:1px solid #ccc;">
          <div class="container"><br>
        	
		  <!-- BAHAGIAN SEARCH IC Visitor -->
            <div class="form-label-group">
            <input class="form-control mr-sm-2" type="text" placeholder="IC" name="visinfo" aria-label="Search" autofocus>
            <label for="visinfo">IC Visitor</label>
            </div>
                    
            <div class="clearfix" style="text-align:center;">
              <button type="submit" name="searchvis" class="signupbtn btn btn-light">Search</button><br><br>
            </div>
          </div>
        </form>
	</div>
    
	<!-- CODING DETELE VISITOR DARI DATABASE -->
	<div class="col-md-12 px-0 fleft"><br><br>
		<?php
			if(isset($_GET['delvid']) and !empty($_GET['delvid'])){
				$delvid = mysqli_real_escape_string($con,$_GET['delvid']);
				$del_qry = "delete from visitor where v_id='$delvid'";
				$del_run = mysqli_query($con,$del_qry);
				if($del_run){
					header('Location: delete.php?delmsg=Visitor records deleted successfully.');
					exit();
				}
			}

			if(isset($_GET['delmsg']) and !empty($_GET['delmsg'])){
				$delmsg = mysqli_real_escape_string($con,$_GET['delmsg']);
				echo $delmsg;
			}

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
								<td>IC </td>
								<td>Contact No</td>
								<td>Email</td>
								<td>Time</td>
								<td>Date</td>
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
						
						echo "<tr>
								<td>$srno</td>
								<td>$visname</td>
								<td>$patname</td>
								<td>$visic</td>
								<td>$viscontno</td>
								<td>$visemail</td>
								<td>$vistime</td>
								<td>$visdate</td>
								<td><a href='delete.php?delvid=$visid' class='btn btn-light'>Delete</a></td>
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



<!-- BAHAGIAN FOOTER-->
<?php include('inc/footer.php'); ?>
