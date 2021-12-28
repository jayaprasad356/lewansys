<?php 
session_start();
ob_start();
include_once('../includes/functions.php');
$function = new functions;
include_once('../includes/crud.php');
$db = new Database();
$db->connect();
$db->sql("SET NAMES 'utf8'");

$id = $_SESSION['id'];
$type = $_SESSION['type'];
if (!isset($id)) {
  header("location:../login/login.php");
}
$sql = "SELECT * FROM college_institution WHERE id = $id AND type = '$type'";
$db->sql($sql);
$res = $db->getResult();

$username = $res[0]['username'];
$mobile = $res[0]['mobile'];
$email = $res[0]['email'];
$profile = $res[0]['profile'];
$address = $res[0]['address'];
$category = $res[0]['category'];
$about_us = $res[0]['about_us'];
$image = $res[0]['image'];
$video = $res[0]['video'];    
$college_name = $res[0]['college_institution_name'];
$password = $res[0]['password'];
$facebook = $res[0]['facebook'];
$google = $res[0]['google'];
$twitter = $res[0]['twitter'];


if (isset($_POST['btnUpdate'])) 
{
  $menu_image = $db->escapeString($_FILES['profile']['name']);
  $gal_image = $db->escapeString($_FILES['galimage']['name']);
  
  $mobile = $db->escapeString($_POST['mobile']);
  $email = $db->escapeString($_POST['email']);
  $address = $db->escapeString($_POST['address']);
  $category = $db->escapeString($_POST['category']);
  $about_us = $db->escapeString($_POST['about_us']);
  $video = $db->escapeString($_POST['video']);
  $college_name = $db->escapeString($_POST['college_name']);
  $facebook = $db->escapeString($_POST['facebook']);
  $google = $db->escapeString($_POST['google']);
  $twitter = $db->escapeString($_POST['twitter']);

  
  if (!empty($menu_image) && !empty($gal_image)) {
    $tmp = explode(".", $_FILES["profile"]["name"]);
    $extension = end($tmp);



    // create random image file name
    $string = '0123456789';
    $file = preg_replace("/\s+/", "_", $_FILES['profile']['name']);
    $menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;
  
    // upload new image
    $upload = move_uploaded_file($_FILES['profile']['tmp_name'], '../upload/images/' . $menu_image);
  
    // insert new data to menu table
    $upload_image = 'upload/images/' . $menu_image;

    $tmp = explode(".", $_FILES["galimage"]["name"]);
    $extension = end($tmp);



    // create random image file name
    $string = '0123456789';
    $file = preg_replace("/\s+/", "_", $_FILES['galimage']['name']);
    $gal_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;
  
    // upload new image
    $upload = move_uploaded_file($_FILES['galimage']['tmp_name'], '../upload/images/' . $gal_image);
  
    // insert new data to menu table
    $upload_galimage = 'upload/images/' . $gal_image;
    $data = array(
      
      'mobile' => $mobile,
      'email' => $email,
      'address' => $address,
      'profile' => $upload_image,
      'category' => $category,
      'about_us' => $about_us,
      'image' => $upload_galimage,
      'video' => $video,
      'college_institution_name' => $college_name,
      'facebook' => $facebook,
      'google' => $google,
      'twitter' => $twitter
  );
  

  }
  else if (!empty($gal_image)) {
    $tmp = explode(".", $_FILES["galimage"]["name"]);
    $extension = end($tmp);



    // create random image file name
    $string = '0123456789';
    $file = preg_replace("/\s+/", "_", $_FILES['galimage']['name']);
    $gal_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;
  
    // upload new image
    $upload = move_uploaded_file($_FILES['galimage']['tmp_name'], '../upload/images/' . $gal_image);
  
    // insert new data to menu table
    $upload_galimage = 'upload/images/' . $gal_image;
    $data = array(
      
      'mobile' => $mobile,
      'email' => $email,
      'address' => $address,
      'category' => $category,
      'about_us' => $about_us,
      'image' => $upload_galimage,
      'video' => $video,
      'college_institution_name' => $college_name,
      'facebook' => $facebook,
      'google' => $google,
      'twitter' => $twitter
  );
  }
  else if (!empty($menu_image)) {
    $tmp = explode(".", $_FILES["profile"]["name"]);
    $extension = end($tmp);



    // create random image file name
    $string = '0123456789';
    $file = preg_replace("/\s+/", "_", $_FILES['profile']['name']);
    $menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;
  
    // upload new image
    $upload = move_uploaded_file($_FILES['profile']['tmp_name'], '../upload/images/' . $menu_image);
  
    // insert new data to menu table
    $upload_image = 'upload/images/' . $menu_image;
    $data = array(
      
      'mobile' => $mobile,
      'email' => $email,
      'address' => $address,
      'profile' => $upload_image,
      'category' => $category,
      'about_us' => $about_us,
      'video' => $video,
      'college_institution_name' => $college_name,
      'facebook' => $facebook,
      'google' => $google,
      'twitter' => $twitter
  );

  }
  else {
    $data = array(
      
      'mobile' => $mobile,
      'email' => $email,
      'address' => $address,
      'category' => $category,
      'about_us' => $about_us,
      'video' => $video,
      'college_institution_name' => $college_name,
      'facebook' => $facebook,
      'google' => $google,
      'twitter' => $twitter
  );
  }

  
if($db->update('college_institution', $data, 'id=' . $id)){
  header("location: collage-dashboard.php");

}



}



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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
    <link rel="stylesheet" type="text/css" href="dashboard/css/dashboard.css">

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

   <header class="header-2">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="header-top">
              <div class="logo-area">
                <a href="collage-dashboard.php"><img src="images/logo-2.png" alt=""></a>
              </div>
              <div class="header-top-toggler">
                <div class="header-top-toggler-button"></div>
              </div>
              <div class="top-nav">
                <div class="dropdown header-top-notification">
                  <a href="#" class="notification-button">Notification</a>
                  <div class="notification-card">
                    <div class="notification-head">
                      <span>Notifications</span>
                      <a href="#">Mark all as read</a>
                    </div>
                    <div class="notification-body">
                      <a href="home-2.html" class="notification-list">
                        <i class="fas fa-bolt"></i>
                        <p>Your Resume Updated!</p>
                        <span class="time">5 hours ago</span>
                      </a>
                      <a href="#" class="notification-list">
                        <i class="fas fa-arrow-circle-down"></i>
                        <p>Someone downloaded resume</p>
                        <span class="time">11 hours ago</span>
                      </a>
                      <a href="#" class="notification-list">
                        <i class="fas fa-check-square"></i>
                        <p>You applied for Project Manager <span>@homeland</span></p>
                        <span class="time">11 hours ago</span>
                      </a>
                      <a href="#" class="notification-list">
                        <i class="fas fa-user"></i>
                        <p>You changed password</p>
                        <span class="time">5 hours ago</span>
                      </a>
                      <a href="#" class="notification-list">
                        <i class="fas fa-arrow-circle-down"></i>
                        <p>Someone downloaded resume</p>
                        <span class="time">11 hours ago</span>
                      </a>
                    </div>
                    <div class="notification-footer">
                      <a href="#">See all notification</a>
                    </div>
                  </div>
                </div>
                <div class="dropdown header-top-account">
                  <a href="#" class="account-button">My Account</a>
                  <div class="account-card">
                    <div class="header-top-account-info">
                    <a href="#" class="account-thumb">
                        <img src="../<?php echo $res[0]['profile'] ?>" class="img-fluid" alt="">
                      </a>
                      
                      <div class="account-body">
                        <h5><a href="#"><?php echo $res[0]['college_institution_name'] ?></a></h5>
                        <span class="mail"><?php echo $res[0]['email'] ?></span>
                      </div>
                    </div>
                    <ul class="account-item-list">
                      <li><a href="#"><span class="ti-user"></span>Account</a></li>
                      <li><a href="#"><span class="ti-settings"></span>Settings</a></li>
                      <li><a href="#"><span class="ti-power-off"></span>Log Out</a></li>
                    </ul>
                  </div>
                </div>
               <!--  <select class="selectpicker select-language" data-width="fit">
                  <option data-content='<span class="flag-icon flag-icon-us"></span> English'>English</option>
                  <option  data-content='<span class="flag-icon flag-icon-mx"></span> Español'>Español</option>
                </select> -->
              </div>
            </div>
            <nav class="navbar navbar-expand-lg cp-nav-2">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                  <li class="menu-item active"><a title="Home" href="collage-dashboard.php">Home</a></li>
                
                  
                 <!--  <li class="menu-item dropdown">
                    <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Employers</a>
                    <ul  class="dropdown-menu">
                      <li class="menu-item"><a  href="employer-listing.html">Employer Listing</a></li>
                      <li class="menu-item"><a  href="employer-details.html">Employer Details</a></li>
                      <li class="menu-item"><a  href="employer-dashboard-post-job.php">Add A Student</a></li>
                    </ul>
                  </li> -->
                 
                    <li class="menu-item dropdown">
                        <a href="#" data-toggle="dropdown"  class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                        <ul class="dropdown-menu">
                        <li class="menu-item"><a  href="collage-dashboard.php">Dashboard</a></li>
                          <li class="menu-item"><a  href="collage-dashboard-edit-profile.php">Edit Profile</a></li>
                          <li class="menu-item"><a  href="employer-dashboard-manage-candidate.php">Manage Canditates</a></li>
                          <li class="menu-item"><a  href="job-listing.php">Jobs</a></li>
                          <li class="menu-item"><a  href="dashboard-bookmark.php">Bookmarked</a></li>
                          <li class="menu-item"><a  href="add-student.php">Add Student</a></li>
                          <li class="menu-item"><a  href="dashboard-pricing.html">Pricing</a></li>
                          
                      </li>
                      
                      <!-- <li class="menu-item dropdown">
                        <a href="#" data-toggle="dropdown"  class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Employer Dashboard</a>
                        <ul class="dropdown-menu">
                          <li class="menu-item"><a href="employer-dashboard.php">Employer Dashboard</a></li>
                          <li class="menu-item"><a href="employer-dashboard-edit-profile.php">Edit Profile</a></li>
                          <li class="menu-item"><a href="employer-dashboard-manage-candidate.php">Manage Candidate</a></li>
                          <li class="menu-item"><a href="employer-dashboard-manage-job.php">Manage Job</a></li>
                          <li class="menu-item"><a href="employer-dashboard-message.html">Dashboard Message</a></li>
                          <li class="menu-item"><a href="employer-dashboard-pricing.html">Dashboard Pricing</a></li>
                          <li class="menu-item"><a href="employer-dashboard-post-job.php">Post Job</a></li>
                        </ul>
                      </li> -->
                    
                  </li>
                 
                  <li class="menu-item"><a href="contact.html">Contact Us</a></li>
                  <li class="menu-item post-job"><a href="add-student.php"><i class="fas fa-plus"></i>Add Student</a></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>

    <!-- Breadcrumb -->
    <div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Collage/Institute Dashboard</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="collage-dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-md-6">
            <div class="breadcrumb-form">
              <form action="#">
                <input type="text" placeholder="Search">
                <button><i data-feather="search"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb End -->

    <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="dashboard-container">
              <div class="dashboard-content-wrapper">
                <form method="post" enctype="multipart/form-data" class="dashboard-form">
                  <div class="dashboard-section upload-profile-photo">
                    <div class="update-photo">
                      <img class="image" src="../<?php echo  $profile ?>" alt="">
                    </div>
                    <div class="file-upload">            
                      <input name="profile" type="file" class="file-input">Change Avatar
                    </div>
                  </div>
                  <div class="dashboard-section basic-info-input">
                    <h4><i data-feather="user-check"></i>Basic Info</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">College Name</label>
                      <div class="col-sm-9">
                        <input name="college_name" type="text" class="form-control" placeholder="College Name" value="<?php echo $college_name ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input name="username" type="text" class="form-control" placeholder="@username" value="<?php echo $username ?>" disabled> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email Address</label>
                      <div class="col-sm-9">
                        <input name="email" type="text" class="form-control" placeholder="email@example.com" value="<?php echo $email ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input name="mobile" type="text" class="form-control" placeholder="+55 123 4563 4643" value="<?php echo $mobile ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input name="address" type="text" class="form-control" placeholder="Washington D.C" value="<?php echo $address ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Category</label>
                      <div class="col-sm-9">
                        <input name="category" type="text" class="form-control" placeholder="UI & UX Designer" value="<?php echo $category ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">About Us</label>
                      <div class="col-sm-9">
                        <textarea name="about_us" class="form-control" placeholder="" value="<?php echo $about_us ?>"><?php echo $about_us ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="dashboard-section media-inputs">
                    <h4><i data-feather="image"></i>Photo &amp; Video</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Intro Video</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Link</div>
                          </div>
                          <input name="video" type="text" class="form-control" value="<?php echo $video ?>" placeholder="https://www.youtube.com/watch?v=ZRkdyjJ_489M">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gallery</label>
                      <div class="col-sm-9">
                      <div class="dashboard-section upload-profile-photo">
                      <div class="update-photo">
                        <img class="image" src="../<?php echo  $image ?>" alt="">
                      </div>
                      <div class="file-upload">            
                        <input name="galimage" type="file" class="file-input">Change Image
                      </div>
                    </div>
                        <!-- <div class="input-group image-upload-input">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Image</div>
                          </div>
                          <div class="active">
                            <div class="upload-images">
                              <div class="pic">
                                <span class="ti-plus"></span>
                              </div>
                            </div>
                          </div>
                        </div> -->
                      </div>
                    </div>
                  </div>
                  <div class="dashboard-section social-inputs">
                    <h4><i data-feather="cast"></i>Social Networks</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Social Links</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-facebook-f"></i></div>
                          </div>
                          <input name="facebook" type="text" class="form-control" placeholder="facebook.com/username" value="<?php echo $facebook ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-twitter"></i></div>
                          </div>
                          <input name="twitter" type="text" class="form-control" placeholder="twitter.com/username" value="<?php echo $twitter ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-google-plus"></i></div>
                          </div>
                          <input name="google" type="text" class="form-control" placeholder="google.com/username" value="<?php echo $google ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-9">
                        <button  name="btnUpdate" type="submit" class="button">Save Change</button>
                        
                      </div>
                    <!-- <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                        <div class="input-group add-new">
                          <div class="input-group-prepend">
                            <div class="input-group-text dropdown-label">
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option>Select</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select><i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control" placeholder="Input Profile Link">
                        </div>
                      </div>
                    </div> -->
                  </div>
                  
                </form>
                <br>
                <br>
                <form method="post" enctype="multipart/form-data" class="dashboard-form">
                  
                  <div class="dashboard-section basic-info-input">
                    <h4><i data-feather="lock"></i>Change Password</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Current Password</label>
                      <div class="col-sm-9">
                        <input  id="oldpassword" name="oldpassword" type="password" class="form-control" placeholder="Current Password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">New Password</label>
                      <div class="col-sm-9">
                        <input id="newpassword" name="newpassword" type="password" class="form-control" placeholder="New Password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Retype Password</label>
                      <div class="col-sm-9">
                        <input id="retypepassword" name="retypepassword" type="password" class="form-control" placeholder="Retype Password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input id="btnChangePwd" type="button" class="button" value="Change Password" />
                
                      
                        <!-- <button  name="btnChangePwd" type="submit" class="button">Change Password</button> -->
                        
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="dashboard-sidebar">
                <div class="company-info">
                  <div class="thumb">
                    <img src="<?php echo $profile ?>" class="img-fluid" alt="">
                  </div>
                  <div class="company-body">
                    <h5><?php echo $college_name ?></h5>
                    <span>@<?php echo $username ?></span>
                  </div>
                </div>
                <div class="profile-progress">
                  <div class="progress-item">
                    <div class="progress-head">
                      <p class="progress-on">Profile</p>
                    </div>
                    <div class="progress-body">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                      </div>
                      <p class="progress-to">70%</p>
                    </div>
                  </div>
                </div>
                <div class="dashboard-menu">
                  <ul>
                  <li ><i class="fas fa-home"></i><a href="collage-dashboard.php">Dashboard</a></li>
                    <li class="active"><i class="fas fa-user"></i><a href="collage-dashboard-edit-profile.php">Edit Profile</a></li>
                     <li><i class="fas fa-users"></i><a href="employer-dashboard-manage-candidate.php">Manage Candidates</a></li>
                    <li><i class="fas fa-briefcase"></i><a href="job-listing.php">Jobs</a></li>
                     <li><i class="fas fa-heart"></i><a href="dashboard-bookmark.php">Bookmarked</a></li>
                    <li><i class="fas fa-plus-square"></i><a href="add-student.php">Add Student</a></li>
                    <!-- <li><i class="fas fa-comment"></i><a href="employer-dashboard-message.html">Message</a></li> -->
                    <li><i class="fas fa-calculator"></i><a href="dashboard-pricing.html">Pricing Plans</a></li>


                   
                  </ul>
                  <ul class="delete">
                    <li><i class="fas fa-power-off"></i><a href="#">Logout</a></li>
                    <li><i class="fas fa-trash-alt"></i><a href="#" data-toggle="modal" data-target="#modal-delete">Delete Profile</a></li>
                  </ul>
                  <!-- Modal -->
                  <div class="modal fade modal-delete" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          <h4><i data-feather="trash-2"></i>Delete Account</h4>
                          <p>Are you sure! You want to delete your profile. This can't be undone!</p>
                          <form action="#">
                            <div class="form-group">
                              <input type="password" class="form-control" placeholder="Enter password">
                            </div>
                            <div class="buttons">
                              <button class="delete-button">Save Update</button>
                              <button class="">Cancel</button>
                            </div>
                            <div class="form-group form-check">
                              <input type="checkbox" class="form-check-input" checked="">
                              <label class="form-check-label">You accepts our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></label>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Call to Action -->
    <div class="call-to-action-bg padding-top-90 padding-bottom-90">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="call-to-action-2">
              <div class="call-to-action-content">
                <h2>For Find Your Dream Job or Candidate</h2>
                <p>Add resume or post a job.</p>
              </div>
              <div class="call-to-action-button">
                <a href="add-resume.php" class="button">Add Resume</a>
                <span>Or</span>
                <a href="post-job.html" class="button">Post A Job</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Call to Action End -->

    <!-- Footer -->
    <footer class="footer-bg">
      <div class="footer-top border-bottom section-padding-top padding-bottom-40">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="footer-logo">
                <a href="#">
                  <img src="images/footer-logo.png" class="img-fluid" alt="">
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="footer-social">
                <ul class="social-icons">
                  <li><a href="#"><i data-feather="facebook"></i></a></li>
                  <li><a href="#"><i data-feather="twitter"></i></a></li>
                  <li><a href="#"><i data-feather="linkedin"></i></a></li>
                  <li><a href="#"><i data-feather="instagram"></i></a></li>
                  <li><a href="#"><i data-feather="youtube"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-widget-wrapper padding-bottom-60 padding-top-80">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 col-sm-6">
              <div class="footer-widget footer-shortcut-link">
                <h4>Information</h4>
                <div class="widget-inner">
                  <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-sm-6">
              <div class="footer-widget footer-shortcut-link">
                <h4>Job Seekers</h4>
                <div class="widget-inner">
                  <ul>
                    <li><a href="#">Create Account</a></li>
                    <li><a href="#">Career Counseling</a></li>
                    <li><a href="#">My Oficiona</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Video Guides</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-sm-6">
              <div class="footer-widget footer-shortcut-link">
                <h4>Employers</h4>
                <div class="widget-inner">
                  <ul>
                    <li><a href="#">Create Account</a></li>
                    <li><a href="#">Products/Service</a></li>
                    <li><a href="#">Post a Job</a></li>
                    <li><a href="#">FAQ</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-sm-6">
              <div class="footer-widget footer-newsletter">
                <h4>Newsletter</h4>
                <p>Get e-mail updates about our latest news and Special offers.</p>
                <form action="#" class="newsletter-form form-inline">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email address...">
                  </div>
                  <button class="btn button primary-bg">Submit<i class="fas fa-caret-right"></i></button>
                  <p class="newsletter-error">0 - Please enter a value</p>
                  <p class="newsletter-success">Thank you for subscribing!</p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom-area">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="footer-bottom border-top">
                <div class="row">
                  <div class="col-xl-4 col-lg-5 order-lg-2">
                    <div class="footer-app-download">
                      <a href="#" class="apple-app">Apple Store</a>
                      <a href="#" class="android-app">Google Play</a>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 order-lg-1">
                    <p class="copyright-text">Copyright Lewansys 2021, All right reserved.<br> Designed and Developed by <a href="https://aitechnologies.co.in/" target="_blank">AiTechnologies</a></p>
                  </div>
                  <div class="col-xl-4 col-lg-3 order-lg-3">
                    <div class="back-to-top">
                      <a href="#">Back to top<i class="fas fa-angle-up"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer End -->

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
    <script src="dashboard/js/dashboard.js"></script>
    <script src="dashboard/js/datePicker.js"></script>
    <script src="dashboard/js/upload-input.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="js/map.js"></script>
    <script>
      $(document).ready(function() {
      
      $("#btnChangePwd").click(function() {
        var retypepassword = $("#retypepassword").val();
        var newpassword = $("#newpassword").val();
        var oldpassword = $("#oldpassword").val();
        var id='<?php echo $id;?>';
        var password='<?php echo $password;?>';
        
      
         
        
        $.ajax({
          type: "POST",
          url: "changepassword.php",
          data: {
          
          currentpwd: oldpassword,
          newpwd: newpassword,
          retypepwd: retypepassword,
          password: password,
          id: id
          },
          cache: false,
          success: function(response) {
          alert(response.message);
          if(response.success == true){
            window.location.replace("collage-dashboard-edit-profile.php");
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