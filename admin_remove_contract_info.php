<?php
session_start();

$msg = $_GET['msg'];

if ($_SESSION["flag"] == "ok")
    {
if (isset($msg)) {

require("config/connection.php");

    //if ($_SESSION['OfficeID']==0) {
  
        
        $contract_report_result = mysqli_query($conn,"SELECT tpd.ProjectName, tc.id, tc.tender_no, tc.TenderName, tc.official_estimate,tcr.ContractorName, tc.contract_amount, ta.AuthorityName, DATE_FORMAT(tc.DOA, '%d/%m/%Y') as doa, DATE_FORMAT(tc.NOA, '%d/%m/%Y') as noa, DATE_FORMAT(tc.DOCS, '%d/%m/%Y') as docs, DATE_FORMAT(tc.WCD, '%d/%m/%Y') as wcd, tc.bill_paid, tc.financial_progress, tc.physical_progress, tc.remarks FROM tbl_project_division as tpd,  tbl_contract AS tc, tbl_contractor AS tcr, tbl_approveauth AS ta WHERE tpd.id = tc.ProjectID AND tc.contractor_id = tcr.ID AND tc.approveauth_id = ta.ID AND tc.OfficeID = '$msg' AND tc.Remove_Status = 1 ") or die(mysql_error($conn));

        //$contract_report_result = json_decode($contract_report, true);


         $office_name_result = mysqli_query($conn,"SELECT OfficeID, OfficeName FROM hrtoffice WHERE OfficeID = '$msg' ") or die(mysqli_error($conn));
        //$office_name_result = json_decode($office_name, true);

       //}


?>


<?php

//session_start();

//include("config/connection.php");

/*$answer = $_SESSION["answer"];
$user_answer = $_POST["answer"];*/
//$msg = $_GET['msg'];

    /*if ($_SESSION["flag"] == "ok")
    {*/

//require("config/json_db.php");

$msg = "noofprojects";
$msg1 = "noofcontracts";
$msg2 = "noofcontractors";
$msg3 = "noofcontractstoday";


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


        /*$count_contract = "SELECT count(id) as noofcontract FROM tbl_contract WHERE Remove_Status=0";
        $no_of_contract = $conn->query($count_contract);*/
    
        
        /*$no_of_contract = mysqli_query($conn, "SELECT count(id) as noofcontract FROM tbl_contract WHERE Remove_Status=0") or die(mysqli_error($conn));*/
        //$no_of_contract = json_decode($count_contract, true);

        /*$count_contractor = "SELECT count(ID) as noofcontractor FROM tbl_contractor";
        $no_of_contractor = $conn->query($count_contractor);*/

        /*$no_of_contractor = mysqli_query($conn,"SELECT count(ID) as noofcontractor FROM tbl_contractor WHERE Remove_Status=0") or die(mysqli_error($conn));*/
        //$no_of_contractor = json_decode($count_contractor, true);

        /*$count_project = "SELECT count(id) as noofproject FROM tbl_project_division WHERE Remove_Status=0";
        $no_of_project = $conn->query($count_project);*/

        /*$no_of_project= mysqli_query($conn,"SELECT count(id) as noofproject FROM tbl_project_division WHERE Remove_Status=0") or die(mysqli_error($conn));*/
        //$no_of_project = json_decode($count_project, true);

        /*$count_contract_today = "SELECT count(id) as noofcontracttoday FROM tbl_contract WHERE DATE(publish_date) = DATE(NOW())";
        $no_of_contract_today = $conn->query($count_contract_today);*/

       /*$no_of_contract_today = mysqli_query($conn,"SELECT count(id) as noofcontracttoday FROM tbl_contract WHERE DATE(publish_date) = DATE(NOW())") or die(mysqli_error($conn));*/
        //$no_of_contract_today = json_decode($count_contract_today, true);





//session_start();
//$answer = $_SESSION["answer"];
//$user_answer = $_POST["answer"];

//if ($answer == $user_answer) {

?>

<!DOCTYPE html>
<html lang="en">


<head>

  <!-- <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport"> -->
  <title>PWD Contractor Database</title>
  <!-- General CSS Files -->
  <?php include 'css_master.php';?>

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
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />
</head>


<body>

<?php
//include 'modal_remove.php';
?>

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
              <h4 class="page-title m-b-0">Dashboard</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home.php">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ul>
          <!-- <form action="home.php?msg=<?=$msg?>" method="post" id="myform"> -->

          <?php include 'admin_menu.php';?>
          
        <!-- </form> -->



            
            <!-- <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Contracts Report</h4>
                  </div>
                  <div class="card-header" style="margin-top: -10px;">
                    <label>Name of Office: <?php while($result=mysqli_fetch_array($office_name_result)){ echo $result['OfficeName'];}?></label>
                  </div>
                  <div class="card-header" style="margin-top: -20px;">
                    <label>Report Date: <?php echo date('d/m/yy');?></label>
                  </div>
                  
                  
                  <div class="card-body" style="margin-top: -25px;">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                      
                        <thead>
                          <tr>
                            <th style="font-size: 13px !important; width: 15%">Project Name</th>
                           
                            <th style="font-size: 13px !important; width: 10%;">Tender No.</th>
                            <th style="font-size: 13px !important; width: 25%">Description of Work</th>
                           
                            <th style="font-size: 13px !important; width: 15%">Name of Contractor</th>
                            
                            <th style="font-size: 13px !important;">NOA Date</th>
                          
                            <th style="font-size: 13px !important; width: 15%">Completion Date</th>
                          
                            <th colspan="2" style="font-size: 13px !important; width: 3%">Action</th>
          
                          </tr>
                        </thead>
                        <tbody>

                          <?php 

                          $sl = 0;

                          while($contract_result=mysqli_fetch_array($contract_report_result)){

                            $sl++;

                            
    

                            if ($sl%2 == 0) {

                          ?>

                          <tr style="background-color: #ECECEC;">
                            <?php 
                              }else{
                            ?>
                            <tr >
                            <?php } ?>

                            <td style="font-size: 13px !important;"><?=$contract_result['ProjectName'];?></td>
                            <td style="font-size: 13px !important;"><?=$contract_result['tender_no'];?></td>
                            <td style="font-size: 13px !important;"><?=$contract_result['TenderName'];?></td>
                          
                            <td style="font-size: 13px !important;"><?=$contract_result['ContractorName'];?></td>
                            
                            <td style="font-size: 13px !important;"><?=$contract_result['noa'];?></td>
                          
                            <td style="font-size: 13px !important;"><?=$contract_result['wcd'];?></td>
                            
                            <form action="update_contract.php?msg=<?=$contract_result['id']?>" method="post">
                            <td><button type="submit" class="btn btn-success" name="update[]" style="width: 35px;height: 35px;" >✐</button></td>
                          </form>

                          <form action="update_remove.php?msg=<?=$contract_result['id']?>" method="post">
                            <td><button type="submit" class="btn btn-danger" name="remove_contract[]" style="width: 35px;height: 35px;">✖</p></button></td>
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
            </div> -->







            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Contracts Report</h4>
                  </div>
                  <div class="card-header" style="margin-top: -10px;">
                    <label>Name of Office: <?php 
                    foreach($office_name_result as $result){ 
                      echo $result['OfficeName'];
                    }?></label>
                  </div>
                  <div class="card-header" style="margin-top: -20px;">
                    <label>Report Date: <?php echo date('d/m/yy');?></label>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                            <th style="font-size: 13px !important; width: 15%">Project Name</th>
                           
                            <th style="font-size: 13px !important; width: 10%;">Tender No.</th>
                            <th style="font-size: 13px !important; width: 25%">Description of Work</th>
                           
                            <th style="font-size: 13px !important; width: 15%">Name of Contractor</th>
                            
                            <th style="font-size: 13px !important;">NOA Date</th>
                          
                            <th style="font-size: 13px !important; width: 15%">Completion Date</th>
                            <th style="font-size: 13px !important; width: 15%">Removed By</th>
                          
                            <th style="font-size: 13px !important; width: 3%">Action</th>
                            <!-- <th></th> -->
          
                          </tr>
                        </thead>
                        <tbody>

                          <?php 
                          $sl = 0;
              //while($contract_result=mysqli_fetch_array($contract_report_result)){
                          foreach($contract_report_result as $contract_result){
                          $sl++;
                          ?>


                            <tr>

                        
                            <td style="font-size: 13px !important;"><?=$contract_result['ProjectName'];?></td>
                            <td style="font-size: 13px !important;"><?=$contract_result['tender_no'];?></td>
                            <td style="font-size: 13px !important;"><?=$contract_result['TenderName'];?></td>
                          
                            <td style="font-size: 13px !important;"><?=$contract_result['ContractorName'];?></td>
                            
                            <td style="font-size: 13px !important;"><?=$contract_result['noa'];?></td>
                          
                            <td style="font-size: 13px !important;"><?=$contract_result['wcd'];?></td>
                            <?php foreach($office_name_result as $office_name){?>
                            <td style="font-size: 13px !important;"><?=$office_name['OfficeName'];?></td>
                          <?php }?>
                            
                            <!-- <form action="update_contract.php?msg=<?=$contract_result['id']?>" method="post"> -->
                            <td><!-- <form action="update_contract.php?msg=<?=$contract_result['id']?>" method="post"><button type="submit" class="btn btn-success" name="update[]" style="width: 10px;height: 20px;" ><p style="margin-top: -10px;margin-left: -5px;color: white">✐</p></button></form> --><form action="" method="post"><button type="button" class="btn btn-danger" name="remove_contract[]" style="width: 10px;height: 20px;" data-toggle="modal" data-target="#exampleModalCenter<?=$contract_result['id']?>"><p style="margin-top: -10px;margin-left: -5px;color: white">✖</p></button></form></td>
                          <!-- </form> -->



                          <div class="modal fade" id="exampleModalCenter<?=$contract_result['id']?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to remove this contract?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms">Once you remove this contract you won't be able to see this!</p>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            <form action="update_remove.php?msg=<?=$contract_result['id']?>" method="post">

                           
                
                <button type="submit" class="btn btn-primary" name="yes_admin_contract[]">Yes</button>
              </form>
            <?php //}
              ?>
                <button type="button" style="background-color: red" class="btn btn-secondary" name="no[]" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>

                          <!-- <form action="update_remove.php?msg=<?=$contract_result['id']?>" method="post">
                            <td><button type="submit" class="btn btn-danger" name="remove_contract[]" style="width: 35px;height: 35px;">✖</p></button></td>
                          </form> -->
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


            

            <!-- <style type="text/css">
              td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
}
            </style> -->

      

 


          <?php


        
         
          if (isset($_REQUEST['no_of_contracts'])) {
            
           include 'contracts_info_by_div.php';

         }elseif (isset($_REQUEST['no_of_contractors'])) {

           include 'contractors_info.php';

         }elseif (isset($_REQUEST['no_of_projects'])) {

           include 'projects_info.php';

         }elseif (isset($_REQUEST['contracts_today'])) {

           include 'contracts_info_by_div.php';
         }

        

           ?>
         
        
      </div>
      <?php include 'footer.php';?>
    </div>
  </div>
  <?php include 'javascript.php';?>
</body>

</html>

<?php 

//}//else{
  //echo "Wrong Captcha!";

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

<?php
}
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

      


