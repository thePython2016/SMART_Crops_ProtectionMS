
<style>
    /* Style for the notification badge */
    .notification-badge {
      cursor: pointer; /* Pointer cursor on hover */
    }
  </style>
      <div style="margin-right:50px !important;margin-top:5px !important ">
  <i class="fas fa-bell fs-3" style="color:white;font-size:10px important"></i>
  <span class="position-absolute translate-middle badge rounded-pill  notification-badge" 
  style="background:#FB6542;" id="notification-badge" title="Sent Messages">
    <?php
require 'connection.php';
$countMessage=mysqli_query($conn,"select count(id) as messageCount from sentsms");
foreach($countMessage as $message)
{
  $totalSMS=$message['messageCount'];
  echo $totalSMS;
}
    ?>
    <span class="visually-hidden">unread messages</span>
  </span>
  </div>
     <li class="nav-item">
    <!-- Icon with Notification Badge -->


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
<script>
  // Show alert when the notification badge is clicked
  document.getElementById("notification-badge").addEventListener("click", function() {
    alert("<?php echo 'You have'.' '. $totalSMS.' '. 'sent messages';?>");
    

  });
</script>
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown" style="margin-top:10px !important">
                  <a class="nav-link dropdown-toggle avatarBlock hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar">
                      <svg xmlns="http://www.w3.org/2000/svg" class="avatarIcon" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/></svg>
                    </div>
                 
                  <p>Hi</p>
                </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <svg xmlns="http://www.w3.org/2000/svg" class="avatarIcon1" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/></svg>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $_SESSION['username']?></span>
                           
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                  
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                    <a class="btn  d-flex" href="../index.php" >
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->