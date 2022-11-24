<?php
session_start();
require "config.php";

if(isset($_POST['maj']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];
    $code = $_POST['code'];
    

    $query="UPDATE users SET  name='$name' , email='$email' , phone='$phone', adress='$adress' , code='$code'
             WHERE id=$id  ";
    $query_run = $conn->query($query);

    if($query_run)
    {
        $_SESSION['message']=" information mise à jour ";
        header("Location: account.php?id=".$id);
        exit(0);
    }
    else
    {
        $_SESSION['message']="Erreur";
        header("Location: account.php");
        exit(0);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet"/>
    <link href="css/rendez  vous.css" rel="stylesheet"/>
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css"/>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&amp;display=swap" rel="stylesheet"/>
  <!-- Custom styles for this template -->
  
  <!-- responsive style -->
  
    
</head>
<body>
  
   
    
  
     <!-- header section strats -->
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
      <!-- end header section -->
    <main>

    <?php
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $query = "SELECT * FROM users WHERE id='$id'";
        $query_run = $conn->query($query);
        $query_count = "SELECT COUNT(*) FROM users WHERE id='$id'";
        $res = $conn->query($query_count);
        $count = $res->fetchColumn();

        if($count>0)
        {
           $users = $query_run->fetch(PDO::FETCH_BOTH); 
           ?>

        <form id="login_form" class="form_class" action="" method="post">
          
            <div class="form_div">
              
                <div class="alert">

                </div>


                <?php
                include('message.php'); 
                ?>
                <input type='hidden'  class="field_class" name="id" value="<?=$users['id'];?>"   required>
                <label>Name</label>
                <input  class="field_class" name="name" value="<?=$users['name'];?>" type="text"  required>
                <label>Email</label>
                <input  class="field_class" name="email" value="<?=$users['email'];?>"  type="text"  required>
                <label>Phone Number</label>
                <input  class="field_class" name="phone" value="<?=$users['phone'];?>"  type="text"  required>
                <label>Adress</label>
                <input class="field_class" name="adress"  value="<?=$users['adress'];?>" type="text" placeholder="" autofocus>
                <label>password</label>
                <input class="field_class" name="code"  value="<?=$users['code'];?>" type="text" placeholder="" autofocus>
              
                <button class="submit_class" type="submit" name="maj" form="login_form" onclick="return validarLogin()">Update</button>

                <!--<button class="submit_class"   onclick="validarLogin()">Submit</button>-->
             
            </div>
           
        </form>
        <?php
        }
        else 
        {
            echo"No such id found";
        }
    }
    ?>
    </main>
    <script  src="js/rendez vous.js"></script>
</body>
</html>