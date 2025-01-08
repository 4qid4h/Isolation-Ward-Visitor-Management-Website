<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="img/logo3.jpg">
    <title>Isolation Ward System</title>

    <!-- Bootstrap CSS -->
	<link rel="icon" type="image/png" href="img/logo3.jpg">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- BAHAGIAN STYLE -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
   

    <!-- BAHAGIAN STYLE -->
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body class="login_bg">  
  
  <!-- BAHAGIAN HEADER -->
  <div class="container">
  <header class="blog-header py-3">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">

    <!-- BAHAGIAN LOGO HEADER -->
  <div class="container">
    <a class="navbar-brand" href="home.php">
          <img src="" alt="">
        </a>


    <!-- BAHAGIAN BUTTON HEADER -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'home.php')? 'active' : ''; ?>">
          <a class="nav-link" href="home.php">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'register.php')? 'active' : ''; ?>" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'update.php' || basename($_SERVER['PHP_SELF']) =='update_current.php')? 'active' : ''; ?>" href="update.php">Update</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'delete.php')? 'active' : ''; ?>" href="delete.php">Delete</a>
        </li>
         <li class="nav-item">
          <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'search.php')? 'active' : ''; ?>" href="search.php">Search</a>
        </li>
		<li class="nav-item">
          <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'visitor.php')? 'active' : ''; ?>" href="visitor.php">Visitor</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>