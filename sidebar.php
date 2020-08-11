<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <!-- <a href="home.php">  <span
                class="logo-name">PWD</span>
            </a> -->
          </div>
          <div class="sidebar-user" style="margin-top: -65px;">
            <div class="sidebar-user-picture">
              <img alt="image" src="assets/img/favicon.png">
            </div>
            <div class="sidebar-user-details">
              <div class="user-name"><?php echo $_SESSION["OfficeName"]?></div>
              <div class="user-role"></div>
            </div>
          </div>
          <ul class="sidebar-menu" style="margin-top: 0px;">
            <li class="menu-header">Main</li>
            <li class="dropdown active" id="dashboard">
              <a href="home.php" class="nav-link"><i data-feather="airplay"></i><span>Dashboard</span></a>
            </li>
           
            <li class="menu-header">Data Entry Panel</li>


            <li class="dropdown" id="add_contract"><a class="nav-link" href="add_contract.php"><i data-feather="file"></i><span>Add Contract</span></a></li>
         
            <li class="dropdown" id="add_contractor"><a class="nav-link" href="add_contractor.php"><i data-feather="user"></i><span>Add Contractor</span></a></li>


            
            <?php if($_SESSION["OfficeID"]==43 || $_SESSION["OfficeID"]==44 || $_SESSION["OfficeID"]==45 || $_SESSION["OfficeID"]==46 || $_SESSION["OfficeID"]==47 ||$_SESSION["OfficeID"]==55 || $_SESSION["OfficeID"]==56 || $_SESSION["OfficeID"]==57 || $_SESSION["OfficeID"]==58 || $_SESSION["OfficeID"]=='') { ?>
            <li class="dropdown" id="add_project"><a class="nav-link" href="add_project.php"><i data-feather="command"></i><span>Add Project</span></a></li>
            <?php } ?>

            <li class="dropdown" id="add_new_experience"><a class="nav-link" href="add_new_experience.php"><i data-feather="layout"></i><span>Add New Experience</span></a></li>


            <li class="menu-header">Reports</li>

            <li class="dropdown" id="report"><a class="nav-link" href="report.php"><i data-feather="file"></i><span>Report</span></a></li>

			<?php if($_SESSION['OfficeID']=='') {?>
             <li class="menu-header">Remove Panel</li>

            <li class="dropdown" id="remove_contract"><a class="nav-link" href="admin_remove_contract.php"><i data-feather="file"></i><span>Remove Contract</span></a></li>
            <li class="dropdown" id="remove_contractor"><a class="nav-link" href="admin_remove_contractor.php"><i data-feather="user"></i><span>Remove Contractor</span></a></li>
            <li class="dropdown" id="remove_project"><a class="nav-link" href="admin_remove_project.php"><i data-feather="command"></i><span>Remove Project</span></a></li>

            <?php } ?>
           
          </ul>
        </aside>
      </div>

      

      <script type="text/javascript">
  $(function(){
    $('.sidebar-menu a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
    $('.sidebar-menu a').click(function(){
      $(this).parent().addClass('active').siblings().removeClass('active')  
    })
  })
  </script>


 


