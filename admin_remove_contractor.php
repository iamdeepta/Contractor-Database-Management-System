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
$contractor_info = mysqli_query($conn,"SELECT * FROM tbl_contractor WHERE Remove_Status=1") or die(mysqli_error($conn));

$contractor_info1 = mysqli_query($conn,"SELECT contractor.OfficeID,hrt.OfficeName,hrt.OfficeID FROM tbl_contractor as contractor,hrtoffice as hrt WHERE contractor.OfficeID = hrt.OfficeID and contractor.Remove_Status=1") or die(mysqli_error($conn));
?> 


        <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List of Deleted Contractors</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>

                            <th style="width: 15% !important;">Name of Organization</th>
                            <th style="width: 10% !important;">Year of Establishment</th>
                            <th style="width: 10% !important;">(BIN) / VAT NO</th>
                            <th style="width: 22% !important;">License Serial Number</th>
                            <th style="width: 10% !important;">Year of Enlishment</th>
                            <th style="width: 10% !important;">Work Experience</th>
                            <th style="width: 10% !important;">Mobile</th>
                            <th style="width: 10% !important;">Office Address</th>
                            <th style="width: 10% !important;">Removed By</th>
                            <th style="width: 3% !important;">Action</th>
                            <!-- <th style="width: 3% !important;"></th> -->
          
                          </tr>
                        </thead>
                        <tbody>

                          <?php 

                          $sl = 0;
               while($contractor_result=mysqli_fetch_array($contractor_info)){
                            $sl++;

                            ?>
                      
                             <tr>
                             
                            <td><?=$contractor_result['ContractorName']?></td>
                            <td><?=$contractor_result['YearOfEstablishment']?></td>
                            <td><?=$contractor_result['BIN']?></td>
                            <td><?=$contractor_result['LicenseSLNO']?></td>
                            <td><?=$contractor_result['YearOfEnlishment']?></td>
                            <td><?=$contractor_result['WorkExperience']?></td>
                            <td><?=$contractor_result['Mobile']?></td>
                            <td><?=$contractor_result['OfficeAddress']?></td>

                            <?php foreach($contractor_info1 as $contractor){?>
                            <td><?=$contractor['OfficeName']?></td>
                          <?php }?>
                            <!-- <form action="update_contractor.php?msg=<?=$contractor_result['ID']?>" method="post"> -->
                            <td><!-- <form action="update_contractor.php?msg=<?=$contractor_result['ID']?>" method="post"><button type="submit" class="btn btn-success" name="update[]" style="font-size: 14px; width: 15px; height: 20px;"><p style="color: white; margin-top: -10px;margin-left: -6px;">✐</p></button></form> --><form action="" method="post"><button type="button" class="btn btn-danger" name="remove_contractor[]" style="font-size: 14px; width: 15px; height: 20px; margin-top: 5px;" data-toggle="modal" data-target="#exampleModalCenter<?=$contractor_result['ID']?>"><p style="color: white; margin-top: -10px;margin-left: -6px;">✖</p></button></form></td>



                            <div class="modal fade" id="exampleModalCenter<?=$contractor_result['ID']?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to remove this contractor?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms">Once you remove this contractor you won't be able to see this!</p>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            <form action="update_remove.php?msg=<?=$contractor_result['ID']?>" method="post">

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="yes_admin_contractor[]">Yes</button>
              </form>
            <?php //}
              ?>
                <button type="button" style="background-color: red" class="btn btn-secondary" name="no[]" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
                          <!-- </form> -->
                          <!-- <form action="update_remove.php?msg=<?=$contractor_result['ID']?>" method="post">
                            <td><button type="submit" class="btn btn-danger" name="remove_contractor[]" style="font-size: 14px; width: 35px; height: 35px;">✖</button></td>
                          </form> -->
                            
                          </tr>
                          
                      <?php }  ?>
                          
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

