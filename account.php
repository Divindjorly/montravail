

<?php
session_start();
require'config.php';

if(isset($_GET['id']) AND $_GET['id'] > 0 ) 
{
     $getid = intval($_GET['id']);
     $requser = $conn->prepare('SELECT * FROM users WHERE id= ?');
     $requser->execute(array($getid));
     $userinfo = $requser->fetch();

?>



<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/sign up.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->

<!-- //web font -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css"/>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&amp;display=swap" rel="stylesheet"/>
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet"/>
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet"/>

  
</head>
<body>
	<!-- main -->

	

	<header class="header_section">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8">
              <nav class="navbar navbar-expand-lg custom_nav-container ">
                <img src="images/logo.png" height="50px" width="60px">
                <a class="navbar-brand" href="index.html">
                  <span>
                    startroc
                  </span>
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
  
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <div class="d-flex  flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav  ">
                      <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="about.html">About </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="service.html">Services </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="sign up.php"> Sign up</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="login.php"> Login</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="account.php"> Compte</a>
                      </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                      <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                    </form>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </header>



	<div class="main-w3layouts wrapper">
		<h1>
            Bienvenue sur mon Compte
        </h1>
        <p>Mail <?php echo $userinfo['email']; ?></p>
              <?php
                include('message.php'); 
                ?>

		<div class="main-agileinfo">
			<div class="agileits-top">
                <a class="nav-link" href="">Consulter mes historiques de trocs</a>
                <a class="nav-link" href="">Nous contacter </a>
                <a class="nav-link" href="">Faire un Don </a>
                <form action="modif_compte.php" method="post">
                    <a class="nav-link" name="maj" href="modif_compte.php?id=<?=$getid;?>">Mettre à jour mon Compte </a>
                </form>
                <a class="nav-link" href="deconnexion.php">Se Doconnecter </a>
				<p></p>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>
<?php 
}
else {

}
?>