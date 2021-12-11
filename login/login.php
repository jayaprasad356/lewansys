<?php
session_start();
ob_start();
include_once('../includes/crud.php');
$db = new Database();
$db->connect();
if (isset($_POST['btnLogin'])) {
  $email = $db->escapeString($_POST['email']);
  $password = $db->escapeString($_POST['password']);
  $type = $db->escapeString($_POST['register']);

  if(($type == 'college') || ($type == 'institution')){
    $sql = "SELECT * FROM college_institution WHERE email = '" . $email . "' AND password = '" . $password . "' AND type = '" . $type . "'";
    $db->sql($sql);

  }
  else {
    $sql = "SELECT * FROM $type WHERE email = '" . $email . "' AND password = '" . $password . "'";
    $db->sql($sql);
  }
  
  $res = $db->getResult();
  $num = $db->numRows($res);
  $error = array();

  if ($num == 1) {
    $_SESSION['id'] = $res[0]['id'];
    $_SESSION['type'] = $res[0]['type'];
    if(($type == 'company') ){
      header("location: ../company/employer-dashboard.php");

    }
    else if(($type == 'college') || ($type == 'institution')){
      header("location: ../college_institution/collage-dashboard.php");

    }
    else if(($type == 'student')){
      header("location: ../student/dashboard.php");

    }
    

  }
  else{
    $error['failed'] =  "invalid email or password";

  }
  
  
  // create array variable to handle error
  


  
  //header("location: ../company/employer-dashboard.php");
}
?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lewansys</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css" />
    <link rel="stylesheet" href="assets/css/et-line.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/css/plyr.css" />
    <link rel="stylesheet" href="assets/css/flag.css" />
    <link rel="stylesheet" href="assets/css/slick.css" /> 
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.nstSlider.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icon-114x114.png">


    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <header class="header-2 access-page-nav">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="header-top">
              <div class="logo-area">
                <a href="index.html"><img src="images/logo-2.png" alt=""></a>
              </div>
              <div class="top-nav">
                <a href="register.php" class="account-page-link">Register</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="padding-top-90 padding-bottom-90 access-page-bg">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-md-6">
            <div class="access-form">
              <div class="form-header">
                <h5><i data-feather="user"></i>Login</h5>
              </div>
              
              <center>
                    <div class="text-danger"><?php echo isset($error['failed']) ? $error['failed'] : ''; ?></div>
                </center>
              <form method="post" enctype="multipart/form-data">
                <div class="account-type">
                  <label for="idRegisterCan">
                    <input id="idRegisterCan" type="radio" name="register" value="student" checked="checked">
                    <span>Candidate</span>
                  </label>
                  <label for="idRegisterEmp">
                    <input id="idRegisterEmp" type="radio" name="register" value="company" >
                    <span>Company</span>
                  </label>
                </div>
                <div class="account-type">
                  <label for="idRegisterColl">
                    <input id="idRegisterColl" type="radio" name="register" value="college" >
                    <span>College</span>
                  </label>
                  <label for="idRegisterIns">
                    <input id="idRegisterIns" type="radio" name="register" value="institution"  >
                    <span>Institution</span>
                  </label>
                </div>
                <div class="form-group">
                  <input id="email" type="email" name="email" placeholder="Email Address" class="form-control" required>
                </div>
                <div class="form-group">
                  <input id="pwd" name="password" type="password" placeholder="Password" class="form-control" required>
                </div>
                <div class="more-option">
                  <div class="mt-0 terms">
                    <input class="custom-radio" type="checkbox" id="radio-4" name="termsandcondition">
                    <label for="radio-4">
                      <span class="dot"></span> Remember Me
                    </label>
                  </div>
                  <a href="#">Forget Password?</a>
                </div>
                      
                
                <button  name="btnLogin" type="submit" class="button primary-bg btn-block">Login</button>
                
              </form>
              <div class="shortcut-login">
                <span>Or connect with</span>
                <div class="buttons">
                  <a href="#" class="facebook"><i class="fab fa-facebook-f"></i>Facebook</a>
                  <a href="#" class="google"><i class="fab fa-google"></i>Google</a>
                </div>
                <p>Don't have an account? <a href="register.php">Register</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/jquery.nstSlider.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/visible.js"></script>
    <script src="assets/js/jquery.countTo.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/plyr.js"></script>
    <script src="assets/js/tinymce.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="js/custom.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="js/map.js"></script>
    <script>
      $(document).ready(function() {
      
      $("#subit").click(function() {
        
        var email = $("#email").val();
        var pwd = $("#pwd").val();
        var type = "";
        if(document.getElementById('idRegisterCan').checked == true) {   
          type = "student";
            
        }else if(document.getElementById('idRegisterEmp').checked == true) {   
          type = "company";
          
           
        }
        else if(document.getElementById('idRegisterColl').checked == true) {   
          type = "college";
          
           
        }
        else if(document.getElementById('idRegisterIns').checked == true) {   
          type = "institution";
          
           
        }
         
        
        $.ajax({
          type: "POST",
          url: "../api/login.php",
          data: {
          
         
          email: email,
          password: pwd,
          type: type
          },
          cache: false,
          success: function(response) {
          alert(response.message);
          if(response.success){
            sessionStorage.setItem("id", "1");
            window.location.replace("../company/employer-dashboard.php");
          }
          },
          error: function(xhr, status, error) {
          console.error(xhr);
          }
          });
      
      
      
      });
      
      });
    </script>
  </body>
</html>