<?php session_start();

if ($_SESSION["flag"] == "ok"){ 

require("config/connection.php");
        
        $result = mysqli_query($conn,"SELECT DISTINCT contractor.ContractorName, contractor.ID FROM tbl_contractor as contractor where Remove_Status=0 order by contractor.ContractorName asc") or die(mysqli_error($conn));
        //$result = json_decode($data, true);

        $result4 = mysqli_query($conn,"SELECT id, ProjectName from tbl_project_division where Remove_Status=0 order by ProjectName asc") or die(mysqli_error($conn));
        //$result4 = json_decode($data4, true);

        
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Contractor Database & Management System</title>

  <style type="text/css">
        
        @media only screen and (min-width: 320px){
         /*.text1{
           font-size: 12px;
          }*/
        

                    .form-control.input1 {
            width: 100px !important;
            margin-left: 0px !important;
            
            
          }

          .form-control.input2{

            width: 100px !important;
            margin-left: 0px !important;

          }
      
      

        }

        @media only screen and (min-width: 480px){
          .form-control.input1 {
            width: 100px !important;
            margin-left: 0px !important;
            
            
          }

          .form-control.input2{

            width: 100px !important;
            margin-left: 0px !important;

          }

        }

        @media only screen and (min-width: 767px){
          .form-control.input1 {
            width: 150px !important;
            margin-left: 5px !important;
            
          }

          .form-control.input2{

            width: 150px !important;
            margin-left: 5px !important;
          }

        }

        @media only screen and (min-width: 991px){
          .form-control.input1 {
            width: 150px !important;
            margin-left: 5px !important;
            
          }

          .form-control.input2{

            width: 150px !important;
            margin-left: 5px !important;
          }

        }

        @media only screen and (min-width: 1200px){

          /*.input-group-append{

          width: 100px;
        }*/
    
         .form-control.input1 {
            width: 150px !important;
            margin-left: 5px !important;
            
          }

          .form-control.input2{

            width: 150px !important;
            margin-left: 5px !important;
          }
          

        }
      </style>
  <!-- General CSS Files -->
  <?php include 'css_master.php';?>
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include 'nav_bar.php';?>
      <?php include 'sidebar.php';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 class="page-title m-b-0">Search Report</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home.php">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Report</li>
            <!-- <li class="breadcrumb-item">Basic Form</li> -->
          </ul>

          <?php if(isset($_GET['msg'])){ ?>
          <div class="card">
          <div class="card-body" style="background-color: #e0aeb5; height: 60px;">
          <label style="margin-top: 0px; color: black">
            <?php 
          
              echo $_GET['msg'];
          
          ?>
            
          </label>
        </div>
      </div>

    <?php }

        ?>

          <form class="form-horizontal" action="report_search.php" method="post" target="_blank" data-parsley-validate>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- <div class="card-header">
                    <h4>HTML5 Form Basic</h4>
                  </div> -->
                  <div class="card-body">

                

                    <div class="form-group">
                      <label>Select Project</label>
                      <select class="custom-select" id="project_name" name="project_name">

                        <option value="" selected>Choose Project</option>
                        <?php
                      while($project_name=mysqli_fetch_array($result4)){
                        ?>


                      
                     <option value="<?=$project_name['id']?>"><?=$project_name['ProjectName']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Select Contractor (Winner)</label>
                      <select class="custom-select" id="contractor_name" name="contractor_name">
                        <option value="" selected>Choose Contractor</option>
                        <?php
                      while($contractor_name=mysqli_fetch_array($result)){
                        ?>
                      
                     <option value="<?=$contractor_name['ID']?>"><?=$contractor_name['ContractorName']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>

                 
                 <div class="card-footer text-right"">
                    <button class="btn btn-primary mr-1" name="report_search" type="submit" id="report_search">Search</button>
                    <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
                  </div>


    
                    
                  </div>
                  
                </div>  
 
              </div>
              
            </div>
          </div>
        </form>

        </section>
      </div>

      <?php include 'footer.php';?>
      
    </div>
  </div>
  
  <?php include 'javascript.php';?>
      
</body>


</html>

<?php }else{
  header("Location: index.php"); }
  ?>




