<?php
session_start();
include("inc/db.php");

if(isset($_SESSION['username'])){
	header("Location: home.php");
	exit();
}

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con,strtolower($_POST['uname']));
    $password = mysqli_real_escape_string($con,$_POST['psw']);
	
	if(empty($username) or empty($password)){
		$error = "Empty Username or Password !!!";
	}else{
		
    $check_username_query = "SELECT * FROM login WHERE username = '$username'";
    $check_username_run = mysqli_query($con,$check_username_query);
    
    if(mysqli_num_rows($check_username_run) > 0){
        $row = mysqli_fetch_array($check_username_run);
        
        $db_username = $row['username'];
        $db_password = $row['passwd'];
        
        
        if($username == $db_username && $password == $db_password){
            header('Location: home.php');
            $_SESSION['username'] = $db_username;
            exit();
        }else{
        $error = "Invalid username or password. Please try again.";    
        }
    }else{
        $error = "Invalid username or password. Please try again.";
    }
	}
}
?>

 <!-- BAHAGIAN LOGIN SYSTEM (USERNAME: admin, PASSWORD: 12345abc)-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Isolation Ward Sytem</title>

    <!-- BAHAGIAN LINK STYLE-->
	  <link rel="icon" type="image/png" href="img/logo3.jpg">
	  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/floating-labels.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
  </head>

   <!-- BAHAGIAN LOGIN-->
  <body class='login_bg'>
	<?php
		if(isset($_GET['logout_msg'])){
		echo "<script type='text/javascript'>window.onload = function(){ alert('".$_GET['logout_msg']."');}</script>";
		}
		if(isset($error)){
			 echo "<script type='text/javascript'>window.onload = function(){ alert('$error !!'); }</script>";
		}
	?>
    <form class="form-signin" action="index.php" method="post">
  <div class="text-center mb-4 wht_txt">
    <h1 class="h3 mb-3 font-weight-normal">Isolation Ward System</h1>
    <p>Please sign in</p>
  </div>

  <div class="form-label-group">
    <input type="text" id="uname" name="uname" class="form-control" placeholder="Enter Username" required autofocus>
    <label for="uname">Username</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="psw" name="psw" class="form-control" placeholder="Enter Password" required>
    <label for="psw">Password</label>
  </div>

  <button class="btn btn-lg btn-primary btn-block" style='background:white;color:black;' type="submit" name="submit">Sign in</button>
    <br>
	<div class="form-label-group wht_txt">
	<?php //if(isset($error)){echo "$error";} ?>
  </div>
	
 
  <!-- BAHAGIAN FOOTER -->
<?php include('inc/footer.php'); ?>

</form>

</body>
</html>
