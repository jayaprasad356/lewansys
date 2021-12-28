<?php
session_start();
ob_start();
include_once('../includes/crud.php');
$db = new Database();
$db->connect();
$id = $_SESSION['student_id'];
$job_id = $_GET['job_id'];
$sql = "SELECT *,jobs.id AS id
FROM jobs
LEFT JOIN company
ON jobs.company_id = company.id WHERE jobs.id = $job_id ";
$db->sql($sql);
$res = $db->getResult();

  
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
                        <img src="images/account/thumb-1.jpg" class="img-fluid" alt="">
                      </a>
                      <div class="account-body">
                        <h5><a href="#">Robert Chavez</a></h5>
                        <span class="mail">chavez@domain.com</span>
                      </div>
                    </div>
                    <ul class="account-item-list">
                      <li><a href="#"><span class="ti-user"></span>Account</a></li>
                      <li><a href="#"><span class="ti-settings"></span>Settings</a></li>
                      <li><a href="logout.php"><span class="ti-power-off"></span>Log Out</a></li>
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
                  <li class="menu-item active"><a title="Home" href="job-listing.php">Home</a></li>
                 <!--  <li class="menu-item dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Jobs</a>
                    <ul  class="dropdown-menu">
                      <li class="menu-item"><a  href="job-listing.php">Job Listing</a></li>
                      <li class="menu-item"><a  href="job-listing-with-map.html">Job Listing With Map</a></li>
                      <li class="menu-item"><a  href="job-details.php">Job Details</a></li>
                      <li class="menu-item"><a  href="employer-dashboard-post-job.php">Post Job</a></li>
                    </ul>
                  </li> -->
                 <!--  <li class="menu-item dropdown">
                    <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Candidates</a>
                    <ul  class="dropdown-menu">
                      <li class="menu-item"><a  href="candidate.html">Candidate Listing</a></li>
                      <li class="menu-item"><a  href="candidate-details.php">Candidate Details</a></li>
                      <li class="menu-item"><a  href="add-resume.php">Add Resume</a></li>
                    </ul>
                  </li>
                  <li class="menu-item dropdown">
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
                     <!--  <li class="menu-item dropdown">
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
                      </li> -->
                    <!--   <li class="menu-item"><a href="checkout.html">Checkout</a></li>
                      <li class="menu-item"><a href="payment-complete.html">Payment Complete</a></li>
                      <li class="menu-item"><a href="invoice.html">Invoice</a></li>
                      <li class="menu-item"><a href="terms-and-condition.html">Terms And Condition</a></li>
                      <li class="menu-item"><a href="404.html">404 Page</a></li>
                      <li class="menu-item"><a href="../login/login.php">Login</a></li>
                      <li class="menu-item"><a href="register.php">Register</a></li>
                    </ul>
                  </li> -->
                  <li class="menu-item"><a href="contact.html">Contact Us</a></li>
                <!--   <li class="menu-item post-job"><a href="employer-dashboard-post-job.php"><i class="fas fa-plus"></i>Post a Job</a></li> -->
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>

    <!-- Candidates Details -->
    <div class="alice-bg padding-top-60 section-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="job-listing-details">
              <div class="job-title-and-info">
                <div class="title">
                  <div class="thumb">
                    <img src="images/job/company-logo-1.png" class="img-fluid" alt="">
                  </div>
                  <div class="title-body">
                    <h4><?php echo $res[0]['job_title'] ?></h4>
                    <div class="info">
                      <span class="company"><a href="#"><i data-feather="briefcase"></i><?php echo $res[0]['job_location']  ?></a></span>
                      <span class="office-location"><a href="#"><i data-feather="map-pin"></i><?php echo $res[0]['job_location']  ?></a></span>
                      <span class="job-type full-time"><a href="#"><i data-feather="clock"></i><?php echo $res[0]['company_name']  ?></a></span>
                    </div>
                  </div>
                </div>
                <div class="buttons">
                  <a class="save" href="#"><i data-feather="heart"></i>Save Job</a>
                  <a class="apply" href="#" data-toggle="modal" data-target="#apply-popup-id">Apply Online</a>
                </div>
              </div>
              <div class="details-information section-padding-60">
                <div class="row">
                  <div class="col-xl-7 col-lg-8">
                    <div class="description details-section">
                      <h4><i data-feather="align-left"></i>Job Description</h4>
                      <p><?php echo $res[0]['job_description'] ?></p>
                    </div>
                    <div class="responsibilities details-section">
                      <h4><i data-feather="zap"></i>Responsibilities</h4>
                      <p><?php echo $res[0]['job_description'] ?></p>
                      <!-- <ul>
                        <li>The applicants should have experience in the following areas</li>
                        <li>Skills on M.S Word, Excel, and Integrated Accounting package i.e. Software</li>
                        <li>Have sound knowledge of commercial activities.</li>
                        <li>Should have vast knowledge in IAS/ IFRS, Company Act, Income Tax, VAT.</li>
                        <li>Good verbal and written communication skills.</li>
                        <li>Leadership, analytical, and problem-solving abilities.</li>
                      </ul> -->
                    </div>
                    <div class="edication-and-experience details-section">
                      <h4><i data-feather="book"></i>Education</h4>
                      <p><?php echo $res[0]['education'] ?></p>
                      <!-- <ul>
                        <li>M.Com (Accounting) / M.B.S / M.B.A under National University with CA course complete.</li>
                        <li>M.S (Statistics) any Public University / National University.</li>
                        <li>Masters of library science any Public University.</li>
                        <li>2 to 3 year(s) Experiance</li>
                        <li>Females candidate are discourage to apply.</li>
                      </ul> -->
                    </div>
                    <div class="edication-and-experience details-section">
                      <h4><i data-feather="book"></i>Experience</h4>
                      <p><?php echo $res[0]['job_experience'] ?></p>
                      <!-- <ul>
                        <li>M.Com (Accounting) / M.B.S / M.B.A under National University with CA course complete.</li>
                        <li>M.S (Statistics) any Public University / National University.</li>
                        <li>Masters of library science any Public University.</li>
                        <li>2 to 3 year(s) Experiance</li>
                        <li>Females candidate are discourage to apply.</li>
                      </ul> -->
                    </div>
                    <div class="other-benifit details-section">
                      <h4><i data-feather="gift"></i>Other Benefits</h4>
                      <p><?php echo $res[0]['other_benefits'] ?></p>
                    </div>
                    <div class="job-apply-buttons">
                      <a href="#" class="apply"  data-toggle="modal" data-target="#apply-popup-id">Apply Online</a>
                      <a href="#" class="email"><i data-feather="mail"></i>Email Job</a>
                    </div>
                  </div>
                  <div class="col-xl-4 offset-xl-1 col-lg-4">
                    <div class="information-and-share">
                      <div class="job-summary">
                        <h4>Job Summary</h4>
                        <ul>
                          <!-- <li><span>Published on:</span> Oct 6,  2020</li> -->
                          <li><span>Vacancy:</span> <?php echo $res[0]['job_vacancy'] ?></li>
                          <li><span>Employment Status:</span> <?php echo $res[0]['job_type'] ?></li>
                          <li><span>Experience:</span> <?php echo $res[0]['job_experience'] ?></li>
                          <li><span>Job Location:</span> <?php echo $res[0]['job_location'] ?></li>
                          <li><span>Salary:</span> <?php echo $res[0]['job_salary_range'] ?></li>
                          <li><span>Gender:</span> <?php echo $res[0]['job_gender'] ?></li>
                          <li><span>Application Deadline:</span> <?php echo $res[0]['job_last_date'] ?></li>
                        </ul>
                      </div>
                      <div class="share-job-post">
                        <span class="share"><i class="fas fa-share-alt"></i>Share:</span>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#" class="add-more"><span class="ti-plus"></span></a>
                      </div>
                      <div class="buttons">
                        <a href="#" class="button print"><i data-feather="printer"></i>Print Job</a>
                        <a href="#" class="button report"><i data-feather="flag"></i>Report Job</a>
                      </div>
                      <div class="job-location">
                        <h4>Job Location</h4>
                        <div id="map-area">
                          <div class="cp-map" id="location" data-lat="40.713355" data-lng="-74.005535" data-zoom="10"></div>
                          <!-- <div class="cp-map" id="location" data-lat="40.713355" data-lng="-74.005535" data-zoom="10"></div> -->
                        </div>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-7 col-lg-8">
                  <div class="company-information details-section">
                    <h4><i data-feather="briefcase"></i>About the Company</h4>
                    <ul>
                      <li><span>Company Name:</span> <?php echo $res[0]['company_name'] ?></li>
                      <li><span>Address:</span> <?php echo $res[0]['address'] ?></li>
                      <li><span>Website:</span> <a href="#"><?php echo $res[0]['google'] ?></a></li>
                      <li><span>Company Profile:</span></li>
                      <li><?php echo $res[0]['about_us'] ?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Candidates Details End -->

    <div class="apply-popup">
      <div class="modal fade" id="apply-popup-id" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i data-feather="edit"></i>APPLY FOR THIS JOB</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="#">
                <div class="form-group">
                  <input type="text" placeholder="Full Name" class="form-control">
                </div>
                <div class="form-group">
                  <input type="email" placeholder="Email Address" class="form-control">
                </div>
                <div class="form-group">
                  <textarea class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="form-group file-input-wrap">
                  <label for="up-cv">
                    <input id="up-cv" type="file">
                    <i data-feather="upload-cloud"></i>
                    <span>Upload your resume <span>(pdf,zip,doc,docx)</span></span>
                  </label>
                </div>
                <div class="more-option">
                  <input class="custom-radio" type="checkbox" id="radio-4" name="termsandcondition">
                  <label for="radio-4">
                    <span class="dot"></span> I accept the <a href="#">terms & conditions</a>
                  </label>
                </div>
                <button class="button primary-bg btn-block">Apply Now</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Jobs -->
    <div class="section-padding-bottom alice-bg">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section-header section-header-2 section-header-with-right-content">
              <h2>Simillar Jobs</h2>
              <a href="#" class="header-right">+ Browse All Jobs</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="job-list">
              <div class="thumb">
                <a href="#">
                  <img src="images/job/company-logo-1.png" class="img-fluid" alt="">
                </a>
              </div>
              <div class="body">
                <div class="content">
                  <h4><a href="job-details.php">Designer Required</a></h4>
                  <div class="info">
                    <span class="company"><a href="#"><i data-feather="briefcase"></i>Theoreo</a></span>
                    <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New York City</a></span>
                    <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>Full Time</a></span>
                  </div>
                </div>
                <div class="more">
                  <div class="buttons">
                    <a href="#" class="button">Apply Now</a>
                    <a href="#" class="favourite"><i data-feather="heart"></i></a>
                  </div>
                  <p class="deadline">Deadline: Oct 31,  2020</p>
                </div>
              </div>
            </div>
            <div class="job-list">
              <div class="thumb">
                <a href="#">
                  <img src="images/job/company-logo-2.png" class="img-fluid" alt="">
                </a>
              </div>
              <div class="body">
                <div class="content">
                  <h4><a href="job-details.php">Project Manager</a></h4>
                  <div class="info">
                    <span class="company"><a href="#"><i data-feather="briefcase"></i>Degoin</a></span>
                    <span class="office-location"><a href="#"><i data-feather="map-pin"></i>San Francisco</a></span>
                    <span class="job-type part-time"><a href="#"><i data-feather="clock"></i>Part Time</a></span>
                  </div>
                </div>
                <div class="more">
                  <div class="buttons">
                    <a href="#" class="button">Apply Now</a>
                    <a href="#" class="favourite"><i data-feather="heart"></i></a>
                  </div>
                  <p class="deadline">Deadline: Oct 31,  2020</p>
                </div>
              </div>
            </div>
            <div class="job-list">
              <div class="thumb">
                <a href="#">
                  <img src="images/job/company-logo-8.png" class="img-fluid" alt="">
                </a>
              </div>
              <div class="body">
                <div class="content">
                  <h4><a href="job-details.php">Restaurant Team Member - Crew </a></h4>
                  <div class="info">
                    <span class="company"><a href="#"><i data-feather="briefcase"></i>Geologitic</a></span>
                    <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New Orleans</a></span>
                    <span class="job-type temporary"><a href="#"><i data-feather="clock"></i>Temporary</a></span>
                  </div>
                </div>
                <div class="more">
                  <div class="buttons">
                    <a href="#" class="button">Apply Now</a>
                    <a href="#" class="favourite"><i data-feather="heart"></i></a>
                  </div>
                  <p class="deadline">Deadline: Oct 31,  2020</p>
                </div>
              </div>
            </div>
            <div class="job-list">
              <div class="thumb">
                <a href="#">
                  <img src="images/job/company-logo-9.png" class="img-fluid" alt="">
                </a>
              </div>
              <div class="body">
                <div class="content">
                  <h4><a href="job-details.php">Nutrition Advisor</a></h4>
                  <div class="info">
                    <span class="company"><a href="#"><i data-feather="briefcase"></i>Theoreo</a></span>
                    <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New York City</a></span>
                    <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>Full Time</a></span>
                  </div>
                </div>
                <div class="more">
                  <div class="buttons">
                    <a href="#" class="button">Apply Now</a>
                    <a href="#" class="favourite"><i data-feather="heart"></i></a>
                  </div>
                  <p class="deadline">Deadline: Oct 31,  2020</p>
                </div>
              </div>
            </div>
            <div class="job-list">
              <div class="thumb">
                <a href="#">
                  <img src="images/job/company-logo-3.png" class="img-fluid" alt="">
                </a>
              </div>
              <div class="body">
                <div class="content">
                  <h4><a href="job-details.php">Land Development Marketer</a></h4>
                  <div class="info">
                    <span class="company"><a href="#"><i data-feather="briefcase"></i>Realouse</a></span>
                    <span class="office-location"><a href="#"><i data-feather="map-pin"></i>Washington, D.C.</a></span>
                    <span class="job-type freelance"><a href="#"><i data-feather="clock"></i>Freelance</a></span>
                  </div>
                </div>
                <div class="more">
                  <div class="buttons">
                    <a href="#" class="button">Apply Now</a>
                    <a href="#" class="favourite"><i data-feather="heart"></i></a>
                  </div>
                  <p class="deadline">Deadline: Oct 31,  2020</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jobs End -->

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
                <a href="employer-dashboard-post-job.php" class="button">Post A Job</a>
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
                    <p class="copyright-text">Copyright Lewnasys 2021, All right reserved. <br> Designed and Developed By <a href="https://aitechnologies.co.in/" target="_blank">AiTechnologies</a></p>
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="js/map.js"></script>

  </body>
</html>