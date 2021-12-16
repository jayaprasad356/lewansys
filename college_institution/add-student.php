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
  header("location:login.php");
}
$sql = "SELECT * FROM college_institution WHERE id = $id";
$db->sql($sql);
$res = $db->getResult();

if (isset($_POST['btnAddStudent'])){
  
  $student_name = $db->escapeString($_POST['student_name']);
  $category = $db->escapeString($_POST['category']);
  $location = $db->escapeString($_POST['location']);
  $job_type = $db->escapeString($_POST['job_type']);
  $experience = $db->escapeString($_POST['experience']);
  $salary_range = $db->escapeString($_POST['salary_range']);
  $qualification = $db->escapeString($_POST['qualification']);
  $gender = $db->escapeString($_POST['gender']);
  $dob = $db->escapeString($_POST['dob']);
  $skill = $db->escapeString($_POST['skill']);
  $about = $db->escapeString($_POST['about']);

  $spl_qualification = $db->escapeString($_POST['spl_qualification']);
  $cover_letter = $db->escapeString($_POST['cover_letter']);


  $pd_name = $db->escapeString($_POST['pd_name']);
  $pd_father_name = $db->escapeString($_POST['pd_father_name']);
  $pd_mother_name = $db->escapeString($_POST['pd_mother_name']);
  $pd_dob = $db->escapeString($_POST['pd_dob']);
  $pd_nationality = $db->escapeString($_POST['pd_nationality']);
  $pd_sex = $db->escapeString($_POST['pd_sex']);
  $pd_address = $db->escapeString($_POST['pd_address']);

  $facebook = $db->escapeString($_POST['facebook']);
  $twitter = $db->escapeString($_POST['twitter']);
  $google = $db->escapeString($_POST['google']);
  $linkedin = $db->escapeString($_POST['linkedin']);
  $pinterest = $db->escapeString($_POST['pinterest']);
  $instagram = $db->escapeString($_POST['instagram']);
  $behance = $db->escapeString($_POST['behance']);
  $dribbble = $db->escapeString($_POST['dribbble']);
  $github = $db->escapeString($_POST['github']);




  $tmp = explode(".", $_FILES["cv_file"]["name"]);
    $extension = end($tmp);



    // create random image file name
    $string = '0123456789';
    $file = preg_replace("/\s+/", "_", $_FILES['cv_file']['name']);
    $menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;
  
    // upload new image
    $upload = move_uploaded_file($_FILES['cv_file']['tmp_name'], '../upload/images/' . $menu_image);
  
    // insert new data to menu table
    $upload_image = 'upload/images/' . $menu_image;
    



$sql = "INSERT INTO student (name,college_institution,category,location,job_type,experience,salary_range,qualification,gender,dob,skill,about,spl_qualification,cv_file,cover_letter,pd_name,pd_father_name,pd_mother_name,pd_dob,pd_nationality,pd_sex,pd_address,facebook,twitter,google,linkedin,pinterest,instagram,behance,dribbble,github) VALUES('$student_name','$id','$category','$location','$job_type','$experience','$salary_range','$qualification','$gender','$dob','$skill','$about','$spl_qualification','$upload_image','$cover_letter','$pd_name','$pd_father_name','$pd_mother_name','$pd_dob','$pd_nationality','$pd_sex','$pd_address','$facebook','$twitter','$google','$linkedin','$pinterest','$instagram','$behance','$dribbble','$github')";
$db->sql($sql);
$student_result = $db->getResult();
if (!empty($student_result)) {
    $student_result = 0;
} else {
    $student_result = 1;
}
if ($student_result == 1) {
  $sql = "SELECT id from student ORDER BY id DESC";
  $db->sql($sql);
  $res_stu = $db->getResult();
  $stuid = $db->escapeString($res_stu[0]['id']);

  for ($i = 0; $i < count($_POST['edu_institute']); $i++) {
    $edu_designation = $db->escapeString($_POST['edu_designation'][$i]);
    $edu_institute = $db->escapeString($_POST['edu_institute'][$i]);
    $edu_period = $db->escapeString($_POST['edu_period'][$i]);
    $edu_description = $db->escapeString($_POST['edu_description'][$i]);
    $sql = "INSERT INTO stu_edu (student_id,edu_designation,edu_institute,edu_period,edu_description) VALUES($stuid,'$edu_designation','$edu_institute','$edu_period','$edu_description')";
    $db->sql($sql);
  }
  for ($i = 0; $i < count($_POST['exp_company_name']); $i++) {
    $exp_title = $db->escapeString($_POST['exp_title'][$i]);
    $exp_company_name = $db->escapeString($_POST['exp_company_name'][$i]);
    $exp_period = $db->escapeString($_POST['exp_period'][$i]);
    $exp_description = $db->escapeString($_POST['exp_description'][$i]);
    $sql = "INSERT INTO stu_work_exp (student_id,exp_title,exp_company_name,exp_period,exp_description) VALUES($stuid,'$exp_title','$exp_company_name','$exp_period','$exp_description')";
    $db->sql($sql);
  }
  for ($i = 0; $i < count($_POST['pro_title']); $i++) {
    $pro_designation = $db->escapeString($_POST['pro_designation'][$i]);
    $pro_title = $db->escapeString($_POST['pro_title'][$i]);
    $pro_value = $db->escapeString($_POST['pro_value'][$i]);
    $sql = "INSERT INTO stu_prof (student_id,pro_title,pro_designation,pro_value) VALUES($stuid,'$pro_title','$pro_designation','$pro_value')";
    $db->sql($sql);
  }
  for ($i = 0; $i < count($_POST['port_title']); $i++) {
    $port_title = $db->escapeString($_POST['port_title'][$i]);
    $menu_image = $db->escapeString($_FILES['port_image']['name'][$i]);
    $port_link = $db->escapeString($_POST['port_link'][$i]);

    //$extension = end(explode(".", $_FILES["port_image"]["name"]));
    $filename = $_FILES["port_image"]["name"][$i];
    $temp = explode('.', $filename);
    $extension = end($temp);

    // create random image file name
    $string = '0123456789';
    $file = preg_replace("/\s+/", "_", $_FILES['port_image']['name'][$i]);
    $menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;
  
    // upload new image
    $upload = move_uploaded_file($_FILES['port_image']['tmp_name'][$i], '../upload/images/' . $menu_image);
  
    // insert new data to menu table
    $upload_image = 'upload/images/' . $menu_image;
    $sql = "INSERT INTO stu_port (student_id,port_title,port_image,port_link) VALUES($stuid,'$port_title','$upload_image','$port_link')";
    $db->sql($sql);
  }

  

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
    <link rel="stylesheet" href="assets/css/html5-simple-date-input-polyfill.css" />

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
                          <li class="menu-item"><a  href="dashboard-edit-profile.php">Edit Profile</a></li>
                          <li class="menu-item"><a  href="employer-dashboard-manage-candidate.php">Manage Canditates</a></li>
                          <li class="menu-item"><a  href="job-listing.php">Jobs</a></li>
                          <li class="menu-item"><a  href="dashboard-bookmark.php">Bookmarked</a></li>
                          <li class="menu-item"><a  href="add-student.php">Add Student</a></li>
                          <li class="menu-item"><a  href="dashboard-pricing.html">Pricing</a></li>
                        </ul>
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
              <h1>Add Student</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Student</li>
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
            <div class="post-container">
              <div class="post-content-wrapper">
                <form method="post" enctype="multipart/form-data" action="#" class="job-post-form">
                  <div class="basic-info-input">
                    <h4><i data-feather="plus-circle"></i>Add Student</h4>
                    <div id="full-name" class="form-group row">
                      <label class="col-md-3 col-form-label">Full Name</label>
                      <div class="col-md-9">
                        <input name="student_name" type="text" class="form-control" placeholder="Your Name">
                      </div>
                    </div>
                    <div id="information" class="row">
                      <label class="col-md-3 col-form-label">Information</label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <select name="category" class="form-control">
                                <option>Select Category</option>
                                <option>Accounting / Finance</option>
                                <option>Health Care</option>
                                <option>Garments / Textile</option>
                                <option>Telecommunication</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input name="location" type="text" class="form-control" placeholder="Your Location">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select name="job_type" class="form-control">
                                <option>Job Type</option>
                                <option>Part Time</option>
                                <option>Full Time</option>
                                <option>Temperory</option>
                                <option>Permanent</option>
                                <option>Freelance</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select name="experience" class="form-control">
                                <option>Experience (Optional)</option>
                                <option>Less than 1 Year</option>
                                <option>2 Year</option>
                                <option>3 Year</option>
                                <option>4 Year</option>
                                <option>Over 5 Year</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input name="salary_range" type="text" class="form-control" placeholder="Salary Range">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select name="qualification" class="form-control">
                                <option>Qualification</option>
                                <option>Matriculation</option>
                                <option>Intermidiate</option>
                                <option>Gradute</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select name="gender" class="form-control">
                                <option>Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input name="dob" type="date" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group datepicker">
                              <input name="skill" type="text" class="form-control" placeholder="Your Skill">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="about" class="row">
                      <label class="col-md-3 col-form-label">About You</label>
                      <div class="col-md-9">
                        <textarea name="about" class="tinymce-editor-1" placeholder="Description text here"></textarea>
                      </div>
                    </div>
                    
                    <div class="row">
                    <label class="col-md-3 col-form-label">Education</label>
                      <div class="col-md-9">
                        <div class="form-group">
                          <input name="edu_designation[]" type="text" class="form-control" placeholder="Designation">
                        </div>
                        <div class="form-group">
                          <input name="edu_institute[]" type="text" class="form-control" placeholder="Institute">
                        </div>
                        <div class="form-group">
                          <input name="edu_period[]" type="text" class="form-control" placeholder="Period">
                        </div>
                        <div class="form-group">
                          <textarea name="edu_description[]" class="form-control" placeholder="Description (Optional)"></textarea>
                        </div>
                        
                        <div id="variations">
                        </div>
                        <a id="add_education" class="add-new-field" title="Add education" style="cursor: pointer;">+ Add Education</a>
                         
                      </div>
                    </div>
                    
                    
                    <div class="row">
                      <label class="col-md-3 col-form-label">Work Experience</label>
                      
                      <div class="col-md-9">
                        <div class="form-group">
                          <input name="exp_title[]" type="text" class="form-control" placeholder="Work Title">
                        </div>
                      
                        <div class="form-group">
                          <input name="exp_company_name[]" type="text" class="form-control" placeholder="Company Name">
                        </div>
                        <div class="form-group">
                          <input name="exp_period[]" type="text" class="form-control" placeholder="Period">
                        </div>
                        <div class="form-group">
                          <textarea name="exp_description[]" class="form-control" placeholder="Description (Optional)"></textarea>
                        </div>
                        <div id="experience_list">
                        </div>
                        <a id="add_experience" class="add-new-field" title="Add Experience" style="cursor: pointer;">+ Add Experience</a>
                         
                      </div>
                    </div>
                    
                    <div class="row">
                      <label class="col-md-3 col-form-label">Professional Skill</label>
                      <div class="col-md-9">
                        <div class="form-group">
                          <input name="pro_designation[]" type="text" class="form-control" placeholder="Designation">
                        </div>
                        <div class="form-group">
                          <input name="pro_title[]" type="text" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                          <input name="pro_value[]" type="number" class="form-control" placeholder="value (Percent)">
                        </div>
                        <div id="skill_list">
                        </div>
                        <a id="add_skill" class="add-new-field" title="Add Skill" style="cursor: pointer;">+ Add Skill</a>
                        
                      </div>
                    </div>
                    <div id="qualification" class="row">
                      <label class="col-md-3 col-form-label">Special Qualification</label>
                      <div class="col-md-9">
                        <textarea name="spl_qualification" id="tiny" class="tinymce-editor-2" placeholder="Description text here"></textarea>
                      </div>
                    </div>
                  
                    <div class="row">
                      <label class="col-md-3 col-form-label">PORTFOLIO</label>
                      <div class="col-md-9">
                        <div class="form-group">
                          <input name="port_title[]" type="text" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">Image</div>
                            </div>
                            <div class="upload-portfolio-image">
                              <div class="update-photo">
                                <img class="image" src="images/portfolio/thumb-1.jpg" alt="">
                              </div>
                              <div class="file-upload">
                                <input name="port_image[]" type="file" class="file-input">
                                <i data-feather="plus"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <input name="port_link[]" type="text" class="form-control" placeholder="Portfolio Link (Optional)">
                        </div>
                        <div id="port_list">
                        </div>
                        <a id="add_port" class="add-new-field" title="Add Portfolio" style="cursor: pointer;">+ Add Portfolio</a>
                        
                      </div>
                    </div>
                    <div id="cv" class="row form-group">
                      <label class="col-md-3 col-form-label">Upload CV</label>
                      <div class="col-md-9">
                      <input name="cv_file" type="file"></i>
                      </div>
                    </div>
                    <div id="cover" class="row">
                      <label class="col-md-3 col-form-label">Cover Letter</label>
                      <div class="col-md-9">
                        <textarea name="cover_letter" class="tinymce-editor-1" placeholder="Description text here"></textarea>
                      </div>
                    </div>
                    <div id="profile" class="row">
                      <label class="col-md-3 col-form-label">Social Profile</label>
                      <button type="button" class="btn btn-primary edit-button" data-toggle="modal" data-target="#modal-social">
                      <i data-feather="edit-2"></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modal-social" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="title">
                              <h4><i data-feather="git-branch"></i>Social Networks</h4>
                              <!-- <a href="#" class="add-more">+ Add Social</a> -->
                            </div>
                            <div class="content">
                              <form method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Social Links</label>
                                  <div class="col-sm-9">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fab fa-facebook-f"></i></div>
                                      </div>
                                      <input name="facebook" type="text" class="form-control"  placeholder="facebook.com/username" value="">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-sm-3 col-sm-9">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fab fa-twitter"></i></div>
                                      </div>
                                      <input name="twitter" type="text" class="form-control"  placeholder="twitter.com/username" value="">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-sm-3 col-sm-9">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fab fa-google-plus"></i></div>
                                      </div>
                                      <input name="google" type="text" class="form-control"  placeholder="google.com/username" value="">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-sm-3 col-sm-9">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fab fa-linkedin-in"></i></div>
                                      </div>
                                      <input name="linkedin" type="text" class="form-control"  placeholder="linkedin.com/username" value="">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-sm-3 col-sm-9">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fab fa-pinterest-p"></i></div>
                                      </div>
                                      <input name="pinterest" type="text" class="form-control"  placeholder="pinterest.com/username" value="">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-sm-3 col-sm-9">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fab fa-instagram"></i></div>
                                      </div>
                                      <input name="instagram" type="text" class="form-control"  placeholder="instagram.com/username" value="">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-sm-3 col-sm-9">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fab fa-behance"></i></div>
                                      </div>
                                      <input name="behance" type="text" class="form-control"  placeholder="behance.com/username" value="">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-sm-3 col-sm-9">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fab fa-dribbble"></i></div>
                                      </div>
                                      <input name="dribbble" type="text" class="form-control"  placeholder="dribbble.com/username" value="">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-sm-3 col-sm-9">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fab fa-github"></i></div>
                                      </div>
                                      <input name="github" type="text" class="form-control"  placeholder="github.com/username" value="">
                                    </div>
                                  </div>
                                </div>
                                <!-- <div class="form-group row">
                                  <div class="offset-sm-3 col-sm-9">
                                    <div class="input-group">
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
                                      <input type="text" class="form-control"  placeholder="Input Profile Link">
                                    </div>
                                  </div>
                                </div> -->
                                <div class="row">
                                  <div class="offset-sm-3 col-sm-9">
                                    <div class="buttons">
                                      
                                      <button  name="btnUpdateSocLink" type="submit" class="primary-bg">Save Update</button>
                                      <button class="" data-dismiss="modal">Cancel</button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                      <!-- <div class="col-md-9">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text dropdown-label">
                                <select  class="form-control">
                                  <option>Select</option>
                                  <option>Facebook</option>
                                  <option>Twitter</option>
                                  <option>Linkedin</option>
                                  <option>Instagram</option>
                                </select><i class="fa fa-caret-down"></i>
                              </div>
                            </div>
                            <input name="social_portfolio" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Input Profile Link">
                          </div>
                        </div>
                        <div id="social_list">
                        </div>
                        <a id="add_social" class="add-new-field" title="Add Social" style="cursor: pointer;">+ Add Social</a>
                        
                      </div> -->
                    </div>
                    <br>
                    <br>
                    <div id="details" class="row">
                      <label class="col-md-3 col-form-label">Personal Details</label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <input name="pd_name" type="text" class="form-control" placeholder="Your Name">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input name="pd_father_name" type="text" class="form-control" placeholder="Father's Name">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input name="pd_mother_name" type="text" class="form-control" placeholder="Mother's Name">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input name="pd_dob" type="date" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input name="pd_nationality" type="text" class="form-control" placeholder="Nationality">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select  name="pd_sex" class="form-control">
                                <option>Sex</option>
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <input name="pd_address" type="text" class="form-control" placeholder="Your Address">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9 offset-md-3">
                        <div class="form-group mt-0 terms">
                          <input class="custom-radio" type="checkbox" id="radio-4" name="termsandcondition">
                          <label for="radio-4">
                            <span class="dot"></span> You accepts our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"></label>
                      <div class="col-md-9">
                       
                        <button  name="btnAddStudent" type="submit" class="button">Add Student</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="post-sidebar">
                <h5><i data-feather="arrow-down-circle"></i>Navigation</h5>
                <ul class="sidebar-menu">
                  <li><a href="#full-name">Full Name</a></li>
                  <li><a href="#information">Informations</a></li>
                  <li><a href="#about">About You</a></li>
                  <li><a href="#education">Education</a></li>
                  <li><a href="#experience">Work Experiance</a></li>
                  <li><a href="#skill">Professional Skill</a></li>
                  <li><a href="#qualification">Special Qualification</a></li>
                  <li><a href="#portfolio">Portfolio</a></li>
                  <li><a href="#cv">Upload CV</a></li>
                  <li><a href="#cover">Cover Letter</a></li>
                  <li><a href="#profile">Social Profile</a></li>
                  <li><a href="#details">Personal Details</a></li>
                </ul>
                <!-- <div class="signin-option">
                  <p>Have an Account ? Before submit job you need to sign in !</p>
                  <div class="buttons">
                    <a href="#" class="signin">Sign in</a>
                    <a href="#" class="register">Register</a>
                  </div>
                </div> -->
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
                <a href="#" class="button">Add Resume</a>
                <span>Or</span>
                <a href="#" class="button">Post A Job</a>
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
    <script src="assets/js/html5-simple-date-input-polyfill.min.js"></script>

    <script src="js/custom.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="js/map.js"></script>
    <script>
    
    $('#add_education').on('click', function() {
        html = '<div class="form-group"><input name="edu_designation[]" type="text" class="form-control" placeholder="Designation"></div><div class="form-group"><input name="edu_institute[]" type="text" class="form-control" placeholder="Institute"></div><div class="form-group"><input name="edu_period[]" type="text" class="form-control" placeholder="Period"></div><div class="form-group"><textarea name="edu_description[]" class="form-control" placeholder="Description (Optional)"></textarea></div>'

        $('#variations').append(html);
        
    });

    
  </script>
  <script>
    
    $('#add_experience').on('click', function() {
        html = '<div class="form-group"><input name="exp_title[]" type="text" class="form-control" placeholder="Work Title"></div><div class="form-group"><input name="exp_company_name[]" type="text" class="form-control" placeholder="Company Name"></div><div class="form-group"><input name="exp_period[]" type="text" class="form-control" placeholder="Period"></div><div class="form-group"><textarea name="exp_description[]" class="form-control" placeholder="Description (Optional)"></textarea></div>'

        $('#experience_list').append(html);
        
    });

    
  </script>
  <script>
    
    $('#add_skill').on('click', function() {
        html = '<div class="form-group"><input name="pro_designation[]" type="text" class="form-control" placeholder="Designation"></div><div class="form-group"><input name="pro_title[]" type="text" class="form-control" placeholder="Title"></div><div class="form-group"><input name="pro_value[]" type="number" class="form-control" placeholder="value (Percent)"></div>'

        $('#skill_list').append(html);
        
    });

    
  </script>
  <script>
    
    $('#add_port').on('click', function() {
        html = '<div class="form-group"><input name="port_title[]" type="text" class="form-control" placeholder="Title"></div><div class="form-group"><div class="input-group"><div class="input-group-prepend"><div class="input-group-text">Image</div></div><div class="upload-portfolio-image"><div class="update-photo"><img class="image" src="images/portfolio/thumb-1.jpg" alt=""></div><div class="file-upload"><input name="port_image[]" type="file" class="file-input"><i data-feather="plus"></i></div></div></div></div><div class="form-group"><input name="port_link[]" type="text" class="form-control" placeholder="Portfolio Link (Optional)"></div>'

        $('#port_list').append(html);
        
    });

    
  </script>
    <script>
    
    $('#add_port').on('click', function() {
        html = '<div class="form-group"><input name="port_title[]" type="text" class="form-control" placeholder="Title"></div><div class="form-group"><div class="input-group"><div class="input-group-prepend"><div class="input-group-text">Image</div></div><div class="upload-portfolio-image"><div class="update-photo"><img class="image" src="images/portfolio/thumb-1.jpg" alt=""></div><div class="file-upload"><input name="port_image[]" type="file" class="file-input"><i data-feather="plus"></i></div></div></div></div><div class="form-group"><input name="port_link[]" type="text" class="form-control" placeholder="Portfolio Link (Optional)"></div>'

        $('#port_list').append(html);
        
    });

    
  </script>

  </body>
</html>