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
if (!isset($id)) {
  header("location:../login/login.php");
}
$sql = "SELECT * FROM student WHERE id = $id";
$db->sql($sql);
$res = $db->getResult();

$about = $res[0]['about'];
$category = $res[0]['category'];
$location = $res[0]['location'];
$job_type = $res[0]['job_type'];
$experience = $res[0]['experience'];
$salary_range = $res[0]['salary_range'];
$gender = $res[0]['gender'];
$age = $res[0]['age'];
$qualification = $res[0]['qualification'];
$skill = $res[0]['skill'];
$cv_file = $res[0]['cv_file'];
$cover_letter = $res[0]['cover_letter'];






$spl_qualification = $res[0]['spl_qualification'];



$pd_name = $res[0]['pd_name'];
$pd_father_name = $res[0]['pd_father_name'];
$pd_mother_name = $res[0]['pd_mother_name'];
$pd_dob = $res[0]['pd_dob'];
$pd_nationality = $res[0]['pd_nationality'];
$pd_sex = $res[0]['pd_sex'];
$pd_address = $res[0]['pd_address'];
$pd_age = $res[0]['pd_age'];

$facebook = $res[0]['facebook'];
$twitter = $res[0]['twitter'];
$google = $res[0]['google'];
$linkedin = $res[0]['linkedin'];
$pinterest = $res[0]['pinterest'];
$instagram = $res[0]['instagram'];
$behance = $res[0]['behance'];
$dribbble = $res[0]['dribbble'];
$github = $res[0]['github'];

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lewansys</title>

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
                <a href="job-listing.php"><img src="images/logo-2.png" alt=""></a>
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
                          <h5><a href="#"><?php echo $res[0]['name'] ?></a></h5>
                          <span class="mail"><?php echo $res[0]['email'] ?></span>
                        </div>
                    </div>
                    <ul class="account-item-list">
                      <li><a href="#"><span class="ti-user"></span>Account</a></li>
                      <li><a href="#"><span class="ti-settings"></span>Settings</a></li>
                      <li><a href="logout.php"><span class="ti-power-off"></span>Log Out</a></li>
                    </ul>
                  </div>
                </div>
                <!-- <select class="selectpicker select-language" data-width="fit">
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
                  <li class="menu-item active"><a title="Home" href="home-1.html">Home</a></li>
                  <!-- <li class="menu-item dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Jobs</a>
                    <ul  class="dropdown-menu">
                      <li class="menu-item"><a  href="job-listing.php">Job Listing</a></li>
                      <li class="menu-item"><a  href="job-listing-with-map.html">Job Listing With Map</a></li>
                      <li class="menu-item"><a  href="job-details.php">Job Details</a></li>
                      <li class="menu-item"><a  href="post-job.html">Post Job</a></li>
                    </ul>
                  </li> -->
                 <!--  <li class="menu-item dropdown">
                    <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Candidates</a>
                    <ul  class="dropdown-menu">
                      <li class="menu-item"><a  href="candidate.html">Candidate Listing</a></li>
                      <li class="menu-item"><a  href="candidate-details.php">Candidate Details</a></li>
                      <li class="menu-item"><a  href="add-resume.php">Add Resume</a></li>
                    </ul>
                  </li> -->
                  <!-- <li class="menu-item dropdown">
                    <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Employers</a>
                    <ul  class="dropdown-menu">
                      <li class="menu-item"><a  href="employer-listing.html">Employer Listing</a></li>
                      <li class="menu-item"><a  href="employer-details.html">Employer Details</a></li>
                      <li class="menu-item"><a  href="employer-dashboard-post-job.php">Post a Job</a></li>
                    </ul>
                  </li> -->
                   <li class="menu-item dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                    <ul class="dropdown-menu">
                          <li class="menu-item"><a  href="dashboard.php">Dashboard</a></li>
                          <li class="menu-item"><a  href="dashboard-edit-profile.php">Edit Profile</a></li>
                          <li class="menu-item"><a  href="add-resume.php">Add Resume</a></li>
                          <li class="menu-item"><a  href="resume.php">Resume</a></li>
                          <li class="menu-item"><a  href="edit-resume.php">Edit Resume</a></li>
                          <li class="menu-item"><a  href="dashboard-bookmark.php">Bookmarked</a></li>
                          <li class="menu-item"><a  href="dashboard-applied.php">Applied</a></li>
                          <li class="menu-item"><a  href="dashboard-pricing.html">Pricing</a></li>
                          <li class="menu-item"><a  href="dashboard-message.html">Message</a></li>
                          <li class="menu-item"><a  href="dashboard-alert.html">Alert</a></li>
                        </ul>
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
                 
                 <!--  <li class="menu-item dropdown">
                    <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Pages</a>
                    <ul  class="dropdown-menu">
                      <li class="menu-item"><a href="about-us.html">About Us</a></li>
                      <li class="menu-item"><a href="how-it-work.html">How It Works</a></li>
                      <li class="menu-item"><a href="pricing.html">Pricing Plan</a></li>
                      <li class="menu-item"><a href="faq.html">FAQ</a></li>
                      <li class="menu-item dropdown">
                        <a href="#" data-toggle="dropdown"  class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">News &amp; Advices</a>
                        <ul class="dropdown-menu">
                          <li class="menu-item"><a href="blog.html">News</a></li>
                          <li class="menu-item"><a href="blog-grid.html">News Grid</a></li>
                          <li class="menu-item"><a href="blog-details.html">News Details</a></li>
                        </ul>
                      </li>
                      <li class="menu-item"><a href="checkout.html">Checkout</a></li>
                      <li class="menu-item"><a href="payment-complete.html">Payment Complete</a></li>
                      <li class="menu-item"><a href="invoice.html">Invoice</a></li>
                      <li class="menu-item"><a href="terms-and-condition.html">Terms And Condition</a></li>
                      <li class="menu-item"><a href="404.html">404 Page</a></li>
                      <li class="menu-item"><a href="../login/login.php">Login</a></li>
                      <li class="menu-item"><a href="register.php">Register</a></li>
                    </ul>
                  </li> -->
                  <li class="menu-item"><a href="contact.html">Contact Us</a></li>
                  <!-- <li class="menu-item post-job"><a href="post-job.html"><i class="fas fa-plus"></i>Post a Job</a></li>
                </ul> -->
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
              <h1>Resume</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="job-listing.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Resume</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-md-6">
            <div class="breadcrumb-form">
              <!-- <form action="#">
                <input type="text" placeholder="Enter Keywords">
                <button><i data-feather="search"></i></button>
              </form> -->
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
                <div class="download-resume dashboard-section">
                  <a target="_blank" href="../<?php echo  $cv_file ?>">Download CV<i data-feather="download"></i></a>
                  <a target="_blank" href="../<?php echo  $cover_letter ?>">Download Cover Letter<i data-feather="download"></i></a>
                </div>
                
                <div class="skill-and-profile dashboard-section">
                  <div class="skill">
                    <label>Skills:</label>
                    <?php $skills = explode(",", $skill);
                    foreach($skills as $skill) {
                      $skill = trim($skill); ?>
                    
                      <a href="#"><?php echo  $skill ?></a>
                      <?php }?>

                    
                    
                    
                    
                  </div>
                  <div class="social-profile">
                    <label>Social:</label>
                    <a href="<?php echo  $facebook ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo  $twitter ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo  $google ?>" target="_blank"><i class="fab fa-google-plus"></i></a>
                    <a href="<?php echo  $linkedin ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="<?php echo  $pinterest ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                    <a href="<?php echo  $behance ?>" target="_blank"><i class="fab fa-behance"></i></a>
                    <a href="<?php echo  $dribbble ?>" target="_blank"><i class="fab fa-dribbble"></i></a>
                    <a href="<?php echo  $github ?>" target="_blank"><i class="fab fa-github"></i></a>
                    
                    
                  </div>
                </div>
                <div class="about-details details-section dashboard-section">
                  <h4><i data-feather="align-left"></i>About Me</h4>
                  <p><?php echo  $about ?></p>
                  
                  <div class="information-and-contact">
                    <div class="information">
                      <h4>Information</h4>
                      <ul>
                        <li><span>Category:</span> <?php echo  $category ?></li>
                        <li><span>Location:</span> <?php echo  $location ?></li>
                        <li><span>Job Type:</span> <?php echo  $job_type ?></li>
                        <li><span>Experience:</span> <?php echo  $experience ?> year(s)</li>
                        <li><span>Salary:</span> <?php echo  $salary_range ?></li>
                        <li><span>Gender:</span> <?php echo  $gender ?></li>
                        <li><span>Age:</span> <?php echo  $age ?> Year(s)</li>
                        <li><span>Qualification:</span> <?php echo  $qualification ?></li>
                      </ul>
                    </div>
                  </div>
                  
                  
                </div>
                
                <div class="edication-background details-section dashboard-section">
                  <h4><i data-feather="book"></i>Education Background</h4>
                  <?php
                  $sql = "SELECT * FROM stu_edu WHERE student_id = $id ";
                  $db->sql($sql);
                  $edures = $db->getResult();
                      foreach ($edures as $row) 
                      { ?>
                  <div class="education-label">
                  
                    <span class="study-year"><?php echo $row['edu_period']  ?></span>
                    <h5><?php echo $row['edu_designation']  ?><span>@ <?php echo $row['edu_institute']  ?></span></h5>
                    <p><?php echo $row['edu_description']  ?></p>
                    
                    
                  </div>
                  <?php }?>
                  
                  
                </div>
                <div class="experience dashboard-section details-section">
                  <h4><i data-feather="briefcase"></i>Work Experiance</h4>
                  <?php
                  $sql = "SELECT * FROM stu_work_exp WHERE student_id = $id ";
                  $db->sql($sql);
                  $workexpres = $db->getResult();
                      foreach ($workexpres as $row) 
                      { ?>
                  <div class="experience-section">
                    <span class="service-year"><?php echo $row['exp_period']  ?></span>
                    <h5><?php echo $row['exp_title']  ?><span>@ <?php echo $row['exp_company_name']  ?></span></h5>
                    <p><?php echo $row['exp_description']  ?></p>
                   
                  </div>
                  
                  <?php }?>
                  
                </div>
                
                <div class="professonal-skill dashboard-section details-section">
                  <h4><i data-feather="feather"></i>Professional Skill</h4>
                  <?php
                  $sql = "SELECT * FROM stu_prof WHERE student_id = $id ";
                  $db->sql($sql);
                  $profres = $db->getResult();
                      foreach ($profres as $row) 
                      { ?>
                  <p><?php echo $row['pro_designation']  ?></p>
                  <div class="progress-group">
                    <div class="progress-item">
                      <div class="progress-head">
                        <p class="progress-on"><?php echo $row['pro_title']  ?></p>
                      </div>
                      <div class="progress-body">
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $row['pro_value']  ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                        </div>
                        <p class="progress-to"><?php echo $row['pro_value']  ?>%</p>
                      </div>
                    </div>
                    
                    
                  </div>
                  <br>
                  <br>
                  <?php } ?>
                  
                </div>
                <div class="special-qualification dashboard-section details-section">
                  <h4><i data-feather="gift"></i>Special Qualification</h4>
                  <ul>
                  <?php 
                  $sql = "SELECT * FROM student WHERE id = $id";
                  $db->sql($sql);
                  $res_sql = $db->getResult();
                  $spl_quali = $res_sql[0]['spl_qualification'];
                  $spl_quali = explode(",", $spl_quali);
                    foreach($spl_quali as $spl) {
                      $spl = trim($spl); ?>
                    
                    <li><?php echo  $spl ?></li>
                      <?php }?>
                   
                    
                    <!-- <li>Skilled at any Kind Design Tools.</li>
                    <li>Passion for people-centered design, solid intuition.</li>
                    <li>Hard Worker & Quick Lerner.</li> -->
                  </ul>
                  
                </div>
                <div class="portfolio dashboard-section details-section">
                  <h4><i data-feather="gift"></i>Portfolio</h4>
                  <div class="portfolio-slider owl-carousel">
                  <?php
                  $sql = "SELECT * FROM stu_port WHERE student_id = $id ";
                  $db->sql($sql);
                  $portres = $db->getResult();
                      foreach ($portres as $row) 
                      { ?>
                    <div class="portfolio-item">
                      <img src="../<?php echo $row['port_image'] ?>" class="img-fluid" alt="">
                      <div class="overlay">
                        <!-- <a href="#"><i data-feather="eye"></i></a> -->
                        <a target="_blank" href="<?php echo $row['port_link'] ?>"><i data-feather="link"></i></a>
                      </div>
                    </div>
                    <?php }?>
                    <!-- <div class="portfolio-item">
                      <img src="images/portfolio/thumb-1.jpg" class="img-fluid" alt="">
                      <div class="overlay">
                        <a href="#"><i data-feather="eye"></i></a>
                        <a href="#"><i data-feather="link"></i></a>
                      </div>
                    </div>
                    <div class="portfolio-item">
                      <img src="images/portfolio/thumb-2.jpg" class="img-fluid" alt="">
                      <div class="overlay">
                        <a href="#"><i data-feather="eye"></i></a>
                        <a href="#"><i data-feather="link"></i></a>
                      </div>
                    </div>
                    <div class="portfolio-item">
                      <img src="images/portfolio/thumb-3.jpg" class="img-fluid" alt="">
                      <div class="overlay">
                        <a href="#"><i data-feather="eye"></i></a>
                        <a href="#"><i data-feather="link"></i></a>
                      </div>
                    </div>
                    <div class="portfolio-item">
                      <img src="images/portfolio/thumb-2.jpg" class="img-fluid" alt="">
                      <div class="overlay">
                        <a href="#"><i data-feather="eye"></i></a>
                        <a href="#"><i data-feather="link"></i></a>
                      </div>
                    </div> -->
                  </div>
                  
                </div>
                
                <div class="personal-information dashboard-section last-child details-section">
                  <h4><i data-feather="user-plus"></i>Personal Deatils</h4>
                  <ul>
                    <li><span>Full Name:</span> <?php echo  $pd_name ?></li>
                    <li><span>Father's Name:</span> <?php echo  $pd_father_name ?></li>
                    <li><span>Mother's Name:</span> <?php echo  $pd_mother_name ?></li>
                    <li><span>Date of Birth:</span> <?php echo  $pd_dob ?></li>
                    <li><span>Nationality:</span> <?php echo  $pd_nationality ?></li>
                    <li><span>Sex:</span> <?php echo  $pd_sex ?></li>
                    <li><span>Address:</span> <?php echo  $pd_address ?></li>
                  </ul>
                  
                </div>
              </div>
              <div class="dashboard-sidebar">
                <div class="user-info">
                  <div class="thumb">
                    <img src="../<?php echo $res[0]['profile'] ?>" class="img-fluid" alt="">
                  </div>
                  <div class="user-body">
                    <h5><?php echo $res[0]['name'] ?></h5>
                    <span>@<?php echo $res[0]['username'] ?></span>
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
                    <li><i class="fas fa-home"></i><a href="dashboard.php">Dashboard</a></li>
                    <li><i class="fas fa-user"></i><a href="dashboard-edit-profile.php">Edit Profile</a></li>
                    <li class="active"><i class="fas fa-file-alt"></i><a href="resume.php">Resume</a></li>
                    <li><i class="fas fa-edit"></i><a href="edit-resume.php">Edit Resume</a></li>
                    <li><i class="fas fa-heart"></i><a href="dashboard-bookmark.php">Bookmarked</a></li>
                    <li><i class="fas fa-check-square"></i><a href="dashboard-applied.php">Applied Job</a></li>
                    <li><i class="fas fa-comment"></i><a href="dashboard-message.html">Message</a></li>
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
                <h2>Find Your Dream Job or Candidate</h2>
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
                    <p class="copyright-text">Copyright Lewansys 2021, All rights reserved. <br> Designed and Developed by <a href="https://aitechnologies.co.in/" target="_blank">AiTechnologies</a>.</p>
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
  </body>
</html>