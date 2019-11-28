<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	 <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="header">
	<header class="top">
		<nav class="navbar navbar-expand-md navbar-dark fixed-top" id="banner">
			<div class="container">
			  <!-- Brand -->
			  <a class="navbar-brand" <?php if(isset($_SESSION['userId'])){ ?>href="/phpmessage/profile.php" <?php }else{  ?> href="/phpmessage/" <?php } ?> ><span>Logo</span> Here</a>

			  <!-- Toggler/collapsibe Button -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <!-- Navbar links -->
			  <div class="collapse navbar-collapse" id="collapsibleNavbar">
				  <ul class="navbar-nav ml-auto">
					  <?php if(isset($_SESSION['userId'])){ ?>

					  <li class="nav-item">
					  	<a href="/phpmessage/profile.php" class="nav-link">Profile</a>
					  </li>

					  <li class="nav-item">
					  	<a href="postView.php" class="nav-link">Posts</a>
					  </li>


					  <li class="nav-item">
					  	<a href="assets/logout.php" class="nav-link">Logout</a>
					  </li>


					  <?php } else{ ?>
					  <li class="nav-item">
					  	<a href="loginView.php" class="nav-link">Login</a>
					  </li>
					  <li class="nav-item">
					  	<a href="registerView.php" class="nav-link">Register</a>
					  </li>
					  <?php } ?>
				  </ul>
			  </div>
			</div>
		</nav>
	</header>