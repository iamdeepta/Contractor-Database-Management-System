<?php

$msg = $_GET['msg'];

if (isset($msg)) {
  

require("config/connection.php");
        
       $contract_report_result = mysqli_query($conn,"SELECT tpd.ProjectName, tc.tender_no, tc.TenderName, tc.official_estimate,tcr.ContractorName, tc.contract_amount, ta.AuthorityName, DATE_FORMAT(tc.DOA, '%d/%m/%Y') as doa, DATE_FORMAT(tc.NOA, '%d/%m/%Y') as noa, DATE_FORMAT(tc.DOCS, '%d/%m/%Y') as docs, DATE_FORMAT(tc.WCD, '%d/%m/%Y') as wcd, tc.bill_paid, tc.financial_progress, tc.physical_progress, tc.remarks FROM tbl_project_division as tpd,  tbl_contract AS tc, tbl_contractor AS tcr, tbl_approveauth AS ta WHERE tpd.id = tc.ProjectID AND tc.contractor_id = tcr.ID AND tc.approveauth_id = ta.ID AND tc.OfficeID = '$msg' AND tc.Remove_Status = 0 ") or die(mysqli_error($conn));

        //$contract_report_result = json_decode($contract_report, true);


        $office_name_result = mysqli_query($conn,"SELECT OfficeID, OfficeName FROM hrtoffice WHERE OfficeID = '$msg' ") or die(mysqli_error($conn));
        //$office_name_result = json_decode($office_name, true);


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
                    <h4>Contracts Report</h4>
                  </div>
                  <div class="row" >
                    <?php
                    while($result=mysqli_fetch_array($office_name_result)){ ?>
                    <form action="create_pdf.php?msg=<?=$result['OfficeID']?>" method="post">
                    <button class="button button1" type="submit" name="pdf_btn" style="float: right">Create PDF</button></form>
                    <?php
                  }?>
                    <p style="font-weight: bold;">Name of Office: <?php foreach($office_name_result as $result){ echo $result['OfficeName'];}?></p>
                    
                      
                   
                  </div>
                  <div class="row" >
                    <p style="font-weight: bold;">Report Date: <?php echo date('d/m/yy');?></p><!-- <p style="margin-left: 5px;"><?php echo date('d/m/yy');?></p> -->
                  </div>
                  <div class="">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-bordered" style="width:100%;">
                      
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

                          while($contract_result=mysqli_fetch_array($contract_report_result)){

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

                            <td><?=$contract_result['ProjectName'];?></td>
                            <td><?=$contract_result['tender_no'];?></td>
                            <td><?=$contract_result['TenderName'];?></td>
                            <td><?=$contract_result['official_estimate'];?></td>
                            <td><?=$contract_result['ContractorName'];?></td>
                            <td><?=$contract_result['contract_amount'];?></td>
                            <td><?=$contract_result['AuthorityName'];?></td>
                            <td><?=$contract_result['doa'];?></td>
                            <td><?=$contract_result['noa'];?></td>
                            <td><?=$contract_result['docs'];?></td>
                            <td><?=$contract_result['wcd'];?></td>
                            <td><?=$contract_result['bill_paid'];?></td>
                            <td><?=$contract_result['financial_progress'];?></td>
                            <td><?=$contract_result['physical_progress'];?></td>
                            <td><?=$contract_result['remarks'];?></td>
                          
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