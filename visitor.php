<?php
session_start();
include('inc/db.php');

if(!isset($_SESSION['username'])){
	header('Location: index.php');
	exit();
}
?>
<!-- BAHAGIAN DISPLAY LIST VISITOR -->
<?php include('inc/header.php'); ?>  

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark scroll_auto">
  	  <h4 class="display-6 font-italic">List of Visitor</h4><hr style='background:white;'>

    <button><a target = "_blank" href=print.php>Print</a></button>   
	  
	<div class="col-md-12 px-0 fleft"><br><br>
		<?php
			{
				{
					$visinfo_query = "select * from visitor";
					$visinfo_query_run = mysqli_query($con,$visinfo_query);
					if(mysqli_num_rows($visinfo_query_run)>0){
						?>
							<div class="table-wrapper-scroll-y my-custom-scrollbar">
							<table class='table table-striped table-responsive-md wht_txt'>
								<thead>
								<tr>
								<td>No.</td>
								<td>Visitor Name</td>
								<td>Patient Name</td>
								<td>IC Visitor</td>
								<td>Contact No. Visitor</td>
								<td>Email Visitor</td>
								<td>Time</td>
								<td>Date</td>
								<td>Add Info</td>
							  </tr>
							  </thead><tbody>
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
							  </tr>
							  ";
						}
						?>
							</tbody></table>
						<?php
						
					}
					else{ 
							//echo mysqli_error($con);
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
