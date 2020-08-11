<style type="text/css">
        
        @media only screen and (min-width: 320px){
         /*.text1{
           font-size: 12px;
          }*/
        

                    .text1 {
            visibility: hidden;
            font-size: 0px;
            
          }
          .text1:after {
            content:'CDMS';
            font-size: 12px;
            visibility: visible;

          }

          .dropdown{
           
            
           font-size: 12px;
          }

      

        }

        @media only screen and (min-width: 480px){
          .text1 {
            visibility: hidden;
            font-size: 0px;
            
          }
          .text1:after {
            content:'CDMS';
            font-size: 12px;
            visibility: visible;

          }

          .dropdown{
           
            
           font-size: 12px;
          }

        }

        @media only screen and (min-width: 767px){
          .text1 {
            visibility: visible;
            font-size: 15px;
            
          }
          .text1:after {
            content:'';
            font-size: 15px;
            visibility: hidden;

          }

          .dropdown{
            
            
           font-size: 15px;
          }

        }

        @media only screen and (min-width: 991px){
          .text1 {
            visibility: visible;
            font-size: 15px;
            
          }
          .text1:after {
            content:'';
            font-size: 15px;
            visibility: hidden;

          }

          .dropdown{
            
            
           font-size: 15px;
          }

        }

        @media only screen and (min-width: 1200px){
          .text1 {
            visibility: visible;
            font-size: 15px;
            
          }
          .text1:after {
            content:'';
            font-size: 15px;
            visibility: hidden;

          }

          .dropdown{
            
            
           font-size: 15px;
          }
          

        }
      </style>

<nav class="navbar navbar-expand-lg main-navbar sticky" style="background-color: #739cb9">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="menu"></i></a></li>
            <li class="text1" style="margin-top: 8px; color: #dfdfec; font-weight: bold;">
            Contractor Database & Management System
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <!-- <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
              <i data-feather="maximize"></i>
            </a></li> -->
            <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
              <!-- <form action="user_logout.php" method="post"> -->
              <!-- <button type="submit" name="logout_btn" style="border:none; background: none;"> --><!-- <img alt="image" src="assets/img/user.png" class="user-img-radious-style"> --><span style="color: #dfdfec; font-weight: bold;"><?=$_SESSION['GenUserName']?></span> <!-- <span class="d-sm-none d-lg-inline-block"></span> --><!-- </button></form> --></a>
            <!-- <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
                    fa-user"></i> Profile
              </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div> -->
          </li>

          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="chevron-down"></i>
              <!-- <span class="badge headerBadge1">
              </span> --> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown" style="width: 20px;">
              <!-- <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div> -->
              <div >
                <a href="change_pass.php" class="dropdown-item"> <span class="dropdown-item-avatar
                      text-white"> <!-- <i data-feather="chevron-down"></i> -->
                  </span> <!-- <span class="dropdown-item-desc"> --> <span class="message-user">Change Password</span>
                    <!-- <span class="time messege-text">Please check your mail !!</span> -->
                    <!-- <span class="time">2 Min Ago</span> -->
                  </span>
                </a> 

                <a href="user_logout.php" class="dropdown-item"> <span class="dropdown-item-avatar text-white"><!-- <i data-feather="chevron-down" style="color: black"></i> -->
                    
                  </span> <!-- <span class="dropdown-item-desc"> --> <span class="message-user">Logout</span> <!-- <span class="time messege-text">Request for leave
                      application</span>
                    <span class="time">5 Min Ago</span> -->
                  </span>
                </a>   
              </div>
              <!-- <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div> -->
            </div>
          </li>
          <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon l-bg-orange text-white"> <i class="far fa-envelope"></i>
                  </span> <span class="dropdown-item-desc"> You got new mail, please check. <span class="time">2 Min
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon l-bg-purple text-white"> <i
                      class="fas fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Meeting with <b>John Deo</b> and <b>Sarah Smith </b> at
                    10:30 am <span class="time">10 Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon l-bg-green text-white"> <i
                      class="far fa-check-circle"></i>
                  </span> <span class="dropdown-item-desc"> Sidebar Bug is fixed by Kevin <span class="time">12
                      Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i
                      class="fas fa-exclamation-triangle"></i>
                  </span> <span class="dropdown-item-desc"> Low disk space error!!!. <span class="time">17 Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
                        fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Welcome to Jiva
                    template! <span class="time">Yesterday</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li> -->
          
        </ul>
      </nav>

