<?php

session_start();

if (isset($_POST['report_search']) && $_SESSION["flag"] == "ok") {
  

require("config/connection.php");

        $project_name = $_POST["project_name"];
        
        $contractor_name = $_POST["contractor_name"];

        $pro_name = strlen($project_name);

        $con_name = strlen($contractor_name);


        if ($project_name!='' && $contractor_name!='') {
       
        
        $search_report_result = mysqli_query($conn,"SELECT tpd.id, tpd.ProjectName, tc.tender_no, SUBSTR(tc.contractor_id, INSTR(tc.contractor_id,'$contractor_name'),$con_name) as contractor_id, tc.TenderName, tc.official_estimate,tcr.ID,(SELECT ContractorName from tbl_contractor WHERE ID=$contractor_name) as ContractorName, tc.contract_amount, ta.AuthorityName, DATE_FORMAT(tc.DOA, '%d/%m/%Y') as doa, DATE_FORMAT(tc.NOA, '%d/%m/%Y') as noa, DATE_FORMAT(tc.DOCS, '%d/%m/%Y') as docs, DATE_FORMAT(tc.WCD, '%d/%m/%Y') as wcd, tc.bill_paid, tc.financial_progress, tc.physical_progress, tc.remarks FROM tbl_project_division as tpd,  tbl_contract AS tc, tbl_contractor AS tcr, tbl_approveauth AS ta WHERE tpd.id = tc.ProjectID AND tc.contractor_id = tcr.ID AND tc.approveauth_id = ta.ID AND tc.ProjectID = $project_name AND FIND_IN_SET('$contractor_name', tc.contractor_id) AND tc.Remove_Status = 0 ")  or die(mysqli_error($conn));

        //$search_report_result = json_decode($search_report, true);

        //foreach($search_report_result as $report){

          //$report_id1 = $report['id'];

          //$report_id2 = $report['contractor_id'];

          $project_result = mysqli_query($conn,"SELECT DISTINCT ProjectID, SUBSTR(contractor_id, INSTR(contractor_id,'$contractor_name'),$con_name) as contractor_id from tbl_contract where ProjectID=$project_name AND FIND_IN_SET('$contractor_name', contractor_id)")  or die(mysqli_error($conn));

          //$project_result = json_decode($project, true);
        //}


      }elseif ($project_name!='' && $contractor_name=='') {

        $search_report_result = mysqli_query($conn,"SELECT tpd.id,tpd.ProjectName, tc.tender_no, tc.TenderName, tc.official_estimate,tcr.ID,tcr.ContractorName, tc.contract_amount, ta.AuthorityName, DATE_FORMAT(tc.DOA, '%d/%m/%Y') as doa, DATE_FORMAT(tc.NOA, '%d/%m/%Y') as noa, DATE_FORMAT(tc.DOCS, '%d/%m/%Y') as docs, DATE_FORMAT(tc.WCD, '%d/%m/%Y') as wcd, tc.bill_paid, tc.financial_progress, tc.physical_progress, tc.remarks FROM tbl_project_division as tpd,  tbl_contract AS tc, tbl_contractor AS tcr, tbl_approveauth AS ta WHERE tpd.id = tc.ProjectID AND tc.contractor_id = tcr.ID AND tc.approveauth_id = ta.ID AND tc.ProjectID = $project_name AND tc.Remove_Status = 0 ") or die(mysqli_error($conn));

        //$search_report_result = json_decode($search_report, true);

        //foreach($search_report_result as $report){

          //$report_id1 = $report['id'];

          //$report_id2 = $report['ID'];

          $project_result = mysqli_query($conn,"SELECT DISTINCT ProjectID from tbl_contract where ProjectID=$project_name") or die(mysqli_error($conn));

          //$project_result = json_decode($project, true);
        //}

      }elseif ($contractor_name!='' && $project_name=='') {
        
        $search_report_result = mysqli_query($conn,"SELECT tpd.id,tpd.ProjectName, SUBSTR(tc.contractor_id, INSTR(tc.contractor_id,'$contractor_name'),$con_name) as contractor_id, tc.tender_no, tc.TenderName, tc.official_estimate,tcr.ID, (SELECT ContractorName from tbl_contractor WHERE ID=$contractor_name) as ContractorName, tc.contract_amount, ta.AuthorityName, DATE_FORMAT(tc.DOA, '%d/%m/%Y') as doa, DATE_FORMAT(tc.NOA, '%d/%m/%Y') as noa, DATE_FORMAT(tc.DOCS, '%d/%m/%Y') as docs, DATE_FORMAT(tc.WCD, '%d/%m/%Y') as wcd, tc.bill_paid, tc.financial_progress, tc.physical_progress, tc.remarks FROM tbl_project_division as tpd,  tbl_contract AS tc, tbl_contractor AS tcr, tbl_approveauth AS ta WHERE tpd.id = tc.ProjectID AND tc.contractor_id = tcr.ID AND tc.approveauth_id = ta.ID AND FIND_IN_SET('$contractor_name', tc.contractor_id) AND tc.Remove_Status = 0 ") or die(mysqli_error($conn));

        //$search_report_result = json_decode($search_report, true);

        //foreach($search_report_result as $report){        //tcr.ContractorName

          //$report_id1 = $report['id'];

          //$report_id2 = $report['contractor_id'];

          $project_result = mysqli_query($conn,"SELECT distinct SUBSTR(contractor_id, INSTR(contractor_id,'$contractor_name'),$con_name) as contractor_id from tbl_contract where FIND_IN_SET('$contractor_name', contractor_id)") or die(mysqli_error($conn));

          //$project_result = json_decode($project, true);


          /*$project = getJSON("SELECT distinct id from tbl_contractor where id='$contractor_name'");

          $project_result = json_decode($project, true);*/

        //}

      }elseif($project_name=='' && $contractor_name==''){

        $msg = "Please select at least one option!";

        header('Location:report.php?msg='.$msg);
      }



        /*$office_name = getJSON("SELECT OfficeID, OfficeName FROM hrtoffice WHERE OfficeID = '$msg' ");
        $office_name_result = json_decode($office_name, true);*/




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

 <style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
  border-radius: 4px;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

</style>
  <!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --> 

<!--Optional theme--> 
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

  
</head>

<body>

            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Report</h4>
                  </div>
                  <div class="row" >

                    <?php
                    if ($project_name!='' && $contractor_name!='') {
                    while($result=mysqli_fetch_array($project_result)){ ?>
                    <form action="create_report_pdf.php?msg=<?=$result['ProjectID']?>&msg_contractor=<?=$result['contractor_id']?>" method="post">
                    <button class="button button1" type="submit" name="report_pdf_btn" style="float: right">Create PDF</button></form>
                    <?php
                  }
                  }elseif($contractor_name!='' && $project_name==''){
                    while($result=mysqli_fetch_array($project_result)){?>

                      <form action="create_report_contractor_pdf.php?msg_contractor=<?=$result['contractor_id']?>" method="post">
                    <button class="button button1" type="submit" name="report_pdf_btn" style="float: right">Create PDF</button></form>

                  <?php } }elseif ($project_name!='' && $contractor_name=='') {
                    while($result=mysqli_fetch_array($project_result)){?>

                      <form action="create_report_project_pdf.php?msg=<?=$result['ProjectID']?>" method="post">
                    <button class="button button1" type="submit" name="report_pdf_btn" style="float: right">Create PDF</button></form>

                  <?php }}?>
                    
                    <!-- <p style="font-weight: bold;">Name of Office: <?php foreach($office_name_result as $result){ echo $result['OfficeName'];}?></p> -->
                    
                      
                   
                  </div>
                  <div class="row" >
                    <p style="font-weight: bold;">Report Date: <?php echo date('d/m/yy');?></p><!-- <p style="margin-left: 5px;"><?php echo date('d/m/yy');?></p> -->
                  </div>
                  <div class="">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-bordered" style="width:100%;">

                        <?php if ($search_report_result) {
                          
                         ?>
                      
                        <thead>
                          <tr style="background-color: #CCCDC6">
                            <th>Project Name</th>
                            <!-- <th>Office ID</th> -->
                            <th>Tender No.</th>
                            <th>Description of Work</th>
                            <th>Official Cost Estimate (In Lac)</th>
                            <th>Name of Contractor</th>
                            <th>Contract Amount (In Lac)</th>
                            <th>Approving Authority</th>
                            <th>Approval Date</th>
                            <th>NOA Date</th>
                            <th>Contract Signing Date</th>
                            <th>Completion Date</th>
                            <th>Bill Paid</th>
                            <th>Financial Progress</th>
                            <th>Physical Progress</th>
                            <th>Remarks</th>
          
                          </tr>
                        </thead>
                        <tbody>

                          <?php 

                          $sl = 0;

                          while($search_result=mysqli_fetch_array($search_report_result)){

                            $sl++;

                            /*$orgDate = $contract_result['DOA'];
                            echo $orgDate;  
    $date = str_replace('-"', '/', $orgDate);  
    $newDate = date("Y/m/d", $date); */ 
    

                            if ($sl%2 == 0) {

                          ?>

                          <tr style="background-color: #E8E9EB">
                            <?php 
                              }else{
                            ?>
                            <tr>
                            <?php } ?>

                            <td><?=$search_result['ProjectName'];?></td>
                            <td><?=$search_result['tender_no'];?></td>
                            <td><?=$search_result['TenderName'];?></td>
                            <td><?=$search_result['official_estimate'];?></td>
                            <td><?=$search_result['ContractorName'];?></td>
                            <td><?=$search_result['contract_amount'];?></td>
                            <td><?=$search_result['AuthorityName'];?></td>
                            <td><?=$search_result['doa'];?></td>
                            <td><?=$search_result['noa'];?></td>
                            <td><?=$search_result['docs'];?></td>
                            <td><?=$search_result['wcd'];?></td>
                            <td><?=$search_result['bill_paid'];?></td>
                            <td><?=$search_result['financial_progress'];?></td>
                            <td><?=$search_result['physical_progress'];?></td>
                            <td><?=$search_result['remarks'];?></td>
                          
                          </tr>
                         
                          <?php
                            }
                          ?>
                          
                        </tbody>

                      <?php }else{



                         ?>

                              <thead>
                          <tr style="background-color: #CCCDC6">
                            <th>Project Name</th>
                            <!-- <th>Office ID</th> -->
                            <th>Tender No.</th>
                            <th>Description of Work</th>
                            <th>Official Cost Estimate (In Lac)</th>
                            <th>Name of Contractor</th>
                            <th>Contract Amount (In Lac)</th>
                            <th>Approving Authority</th>
                            <th>Approval Date</th>
                            <th>NOA Date</th>
                            <th>Contract Signing Date</th>
                            <th>Completion Date</th>
                            <th>Bill Paid</th>
                            <th>Financial Progress</th>
                            <th>Physical Progress</th>
                            <th>Remarks</th>
          
                          </tr>
                        </thead>
                        <tbody>

                        
                


                          <tr>
                           
                            <td colspan="15" style="text-align: center; height: 60px;">No Data Available!</td>
                          
                          </tr>
                         
                          
                        </tbody>

                      <?php } ?>

                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <style type="text/css">
              td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
}
            </style>

      

      <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
  
</body>


<!-- Mirrored from www.radixtouch.in/templates/logicswave/jiva/source/light/datatables.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 13 May 2020 10:16:48 GMT -->
</html>

<?php
}
?>