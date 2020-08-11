<?php
session_start();
include("config/connection.php");

    if ($_SESSION["flag"] == "ok")
    {

    $querycontract="select count(id) as noofcontracts from tbl_contract where ".$where;
        
    $resultcontract=mysqli_query($conn,$querycontract) or die(mysqli_error($conn));
    $no_of_contract=mysqli_fetch_array($resultcontract);
    
    $querycontractor="select count(ID) as noofcontractors from tbl_contractor where ".$where;
    $resultcontractor=mysqli_query($conn,$querycontractor) or die(mysqli_error($conn));
    $no_of_contractor=mysqli_fetch_array($resultcontractor);

    $queryprojects="select count(id) as noofprojects from tbl_project_division where ".$whereproject;
    $resultprojects=mysqli_query($conn,$queryprojects) or die(mysqli_error($conn));
    $no_of_project=mysqli_fetch_array($resultprojects);

    $querycontractstoday="SELECT count(id) as noofcontractstoday FROM tbl_contract WHERE DATE(publish_date) = DATE(NOW()) and ".$where;
    $resultcontractstoday=mysqli_query($conn,$querycontractstoday) or die(mysqli_error($conn));
    $no_of_contract_today=mysqli_fetch_array($resultcontractstoday);
    
/*$msg = $no_of_project['noofprojects'];
$msg1 = $no_of_contract['noofcontracts'];
$msg2 = $no_of_contractor['noofcontractors'];
$msg3 = $no_of_contract_today['noofcontractstoday'];*/

$msg = "noofprojects";
$msg1 = "noofcontracts";
$msg2 = "noofcontractors";
$msg3 = "noofcontractstoday";


?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">


<head>

  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Contractor Database & Management System</title>
  <!-- General CSS Files -->
  <?php include 'css_master.php';?>

  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />

  <style type="text/css">
  @media only screen and (min-width: 320px){
        
      .div1{

        margin-left: 0px;

      }

      .revenue{

        margin-left: 20px !important;
      }

      .progress2{

        margin-left: 170px !important;
        margin-top: -8px !important;
      }
      

        }

        @media only screen and (min-width: 480px){

          .div1{

               margin-left: 0px;
          }

          .revenue{

        margin-left: 20px !important;
      }

      .progress2{

        margin-left: 170px !important;
        margin-top: -8px !important;
      }
          

        }

        @media only screen and (min-width: 767px){

          .div1{
               margin-left: 0px;

          }

          .revenue{

        margin-left: 20px !important;
      }

      .progress2{

        margin-left: 170px !important;
        margin-top: -8px !important;
      }
        

        }

        @media only screen and (min-width: 991px){

          .div1{

               margin-left: 0px;
          }

          .revenue{

        margin-left: 0px !important;
      }

      .progress2{

        margin-left: 40px !important;
        margin-top: 4px !important;
      }
          

        }

        @media only screen and (min-width: 1200px){
         .div1{
             margin-left: 0px;

         }

         .revenue{

        margin-left: 0px !important;
      }

      .progress2{

        margin-left: 40px !important;
        margin-top: 4px !important;
      }
          

        }

</style>

</head>


<body>

<?php
//include 'modal_remove.php';
?>

  
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
  

      
      <?php include 'nav_bar.php';  ?>  

      <?php include 'sidebar.php';?>

      <!-- Main Content -->
      <div class="main-content">

        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 class="page-title m-b-0">Dashboard</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home.php">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ul>

          <?php include 'admin_menu.php';?>
          
        <!-- </form> -->

        <?php
$contract_info = mysqli_query($conn,"SELECT DISTINCT contract.id, office.OfficeID, office.OfficeName, count(contract.id) as count_contract FROM hrtoffice as office, tbl_contract as contract WHERE contract.Remove_Status=1 AND office.OfficeID = contract.OfficeID GROUP BY office.OfficeID") or die(mysqli_error($conn));
?>


        <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List of Deleted Contracts By Division</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                            <th>SL</th>
                            <!-- <th>Office ID</th> -->
                            <th>Office Name</th>
                            <th>No. Of Contracts</th>
                            <th>Last Update</th>
                            <th>Action</th>
          
                          </tr>
                        </thead>
                        <tbody>

                          <?php 
                          $sl = 0;
              while($result=mysqli_fetch_array($contract_info)){
                          $sl++;
                          ?>


                            <tr>

                        
                            <form action="contract_report.php?msg=<?php echo $result['OfficeID']?>" target="_blank" method="post">
                            <td><?php echo $sl;?></td>
                            
                            <td><a style="color: black;" href="admin_remove_contract_info.php?msg=<?php echo $result['OfficeID']?>" ><u><?php echo $result['OfficeName'];?></u></a></td>
                          
                            <td><?php echo $result['count_contract'];?></td>
                            <td></td>
                            <td><button type="submit" name="view_btn[]" class="btn btn-success">View</button></td>
                            </form>
                          </tr>
                        
                         
                          <?php
                            }
                          ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          <?php
  
switch(isset($_POST))
        {
            case isset($_POST['no_of_contracts']):
              include 'contracts_info_by_div.php';
              include 'contracts_info.php';
            break;

            case isset($_POST['no_of_contractors']):
              include 'contractors_info.php';
            break;

            case isset($_POST['no_of_projects']):
              include 'projects_info.php';
            break;
            
            case isset($_POST['contracts_today']):
              include 'contracts_info_by_div.php';
            break;
      
        }
    ?>
        
       
         
     
      <?php include 'footer.php';?>
    </div>
  </div>
  <?php include 'javascript.php';?>
</body>

</html>

<?php 


  ?>
  <!-- <script type="text/javascript">
    alert("Wrong Captcha!");
    window.location.href = "index.php";
  </script>
 -->
  <?php

  //header("location:index.php");
//}

?>
<?php }elseif($_SESSION["flag"] == "error_pass")
    {
      $msg = "The password is incorrect!";
        header("Location: index.php?msg=".$msg);

    }elseif ($_SESSION["flag"] == "captcha") {
     $msg = "Your given number is incorrect!";
        header("Location: index.php?msg=".$msg);

    }elseif ($_SESSION["flag"] == "error_username") {
     $msg = "The username is incorrect!";
        header("Location: index.php?msg=".$msg);

      }else {
        header("Location: index.php");
      } ?>

