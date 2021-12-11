<?php

 include_once('../includes/crud.php');
  $db = new Database();
  $db->connect();

  
  
  $sql = "SELECT * FROM jobs WHERE company_id = $id ";
  $db->sql($sql);
  $res = $db->getResult();
?>
<div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="dashboard-container">
              <div class="dashboard-content-wrapper">
                <div class="manage-job-container">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Job Title</th>
                        <th>Applications</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th class="action">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($res as $row) 
                      { ?>
                      <tr class="job-items">
                        <td class="title">
                          <h5><a href="#"><?php echo $row['job_title']  ?></a></h5>
                          <div class="info">
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i><?php echo $row['job_location']  ?></a></span>
                            <span class="job-type full-time"><a href="#"><i data-feather="clock"></i><?php echo $row['job_type']  ?></a></span>
                          </div>
                        </td>
                        <td class="application"><a href="#">6 Application(s)</a></td>
                        <td class="deadline"><?php echo $row['job_last_date']  ?></td>
                        <td class="status active"><?php echo $row['status']  ?></td>
                        <td class="action">
                          <a href="#" class="preview" title="Preview"><i data-feather="eye"></i></a>
                          <a href="#" class="edit" title="Edit"><i data-feather="edit"></i></a>
                          <a href="#" class="remove" title="Delete"><i data-feather="trash-2"></i></a>
                        </td>
                      </tr>
                      <?php } ?>
                      
                    </tbody>
                  </table>
                  <div class="pagination-list text-center">
                    <nav class="navigation pagination">
                      <div class="nav-links">
                        <a class="prev page-numbers" href="#"><i class="fas fa-angle-left"></i></a>
                        <a class="page-numbers" href="#">1</a>
                        <span aria-current="page" class="page-numbers current">2</span>
                        <a class="page-numbers" href="#">3</a>
                        <a class="page-numbers" href="#">4</a>
                        <a class="next page-numbers" href="#"><i class="fas fa-angle-right"></i></a>
                      </div>
                    </nav>                
                  </div>
                </div>
              </div>
              <div class="dashboard-sidebar">
                <div class="company-info">
                  <div class="thumb">
                    <img src="dashboard/images/company-logo.png" class="img-fluid" alt="">
                  </div>
                  <div class="company-body">
                    <h5>Degoin</h5>
                    <span>@username</span>
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
                    <li><i class="fas fa-home"></i><a href="employer-dashboard.php">Dashboard</a></li>
                    <li><i class="fas fa-user"></i><a href="employer-dashboard-edit-profile.php">Edit Profile</a></li>
                    <li class="active"><i class="fas fa-briefcase"></i><a href="employer-dashboard-manage-job.php">Manage Jobs</a></li>
                    <li><i class="fas fa-users"></i><a href="employer-dashboard-manage-candidate.php">Manage Candidates</a></li>
                    <li><i class="fas fa-heart"></i><a href="#">Shortlisted Resumes</a></li>
                    <li><i class="fas fa-plus-square"></i><a href="employer-dashboard-post-job.php">Post New Job</a></li>
                    <li><i class="fas fa-comment"></i><a href="employer-dashboard-message.html">Message</a></li>
                    <li><i class="fas fa-calculator"></i><a href="employer-dashboard-pricing.html">Pricing Plans</a></li>
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