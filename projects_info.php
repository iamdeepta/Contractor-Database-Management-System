<?php
if($_SESSION['OfficeID']==''){
$project_info = mysqli_query($conn,"SELECT tbl_project_division.OfficeID, tbl_project_division.id, tbl_project_division.ProjectCode, tbl_project_division.ProjectName, tbl_project_division.ProjectCost, DATE_FORMAT(tbl_project_division.DurationStartDate, '%b %d, %Y') as duration_start_date, DATE_FORMAT(tbl_project_division.DurationEndDate, '%b %d, %Y') as duration_end_date, count(contract.id) as noofcontracts, ministry.MinistryName, org.OrgName FROM tbl_project_division left outer join tbl_contract as contract on tbl_project_division.id = contract.ProjectID left outer join ".DBPMS.".pmsministry AS ministry on tbl_project_division.MinistryID = ministry.MinistryId left outer join ".DBPMS.".pmsorg AS org on tbl_project_division.OrganizationID = org.OrgID where tbl_project_division.Remove_Status=0 AND ".$whereproject." group by tbl_project_division.id") or die(mysqli_error($conn));
}else{

  $office_id=$_SESSION['OfficeID'];

  $project_info = mysqli_query($conn,"SELECT tbl_project_division.OfficeID, tbl_project_division.id, tbl_project_division.ProjectCode, tbl_project_division.ProjectName, tbl_project_division.ProjectCost, DATE_FORMAT(tbl_project_division.DurationStartDate, '%b %d, %Y') as duration_start_date, DATE_FORMAT(tbl_project_division.DurationEndDate, '%b %d, %Y') as duration_end_date, count(contract.id) as noofcontracts, ministry.MinistryName, org.OrgName FROM tbl_project_division left outer join tbl_contract as contract on tbl_project_division.id = contract.ProjectID left outer join ".DBPMS.".pmsministry AS ministry on tbl_project_division.MinistryID = ministry.MinistryId left outer join ".DBPMS.".pmsorg AS org on tbl_project_division.OrganizationID = org.OrgID where tbl_project_division.Remove_Status=0 AND ".$whereproject." group by tbl_project_division.id") or die(mysqli_error($conn));
}

     ?>  

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <?php //include 'css_master.php';?>


  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />
</head>

<body>
  
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List of Projects</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>

                            <th style="width: 10% !important;">Project Code</th>
                            <th style="width: 10% !important;">Project Title</th>
                            <th style="width: 20% !important;">Project Cost</th>
                            <th class="duration" style="width: 10% !important;">Duration</th>
                            <th style="width: 20% !important;">No. of Contracts</th>
                            <th style="width: 10% !important;">Ministry Name</th>
                            <th style="width: 29% !important;">Organization Name</th>
                            <th style="width: 3% !important; white-space:nowrap">Action</th>
                            <!-- <th style="width: 3% !important"></th> -->
                            
                            
          
                          </tr>
                        </thead>
                        <tbody>

                          <?php

                          $sl = 0;

                         while($project_result=mysqli_fetch_array($project_info)){

                            $sl++;
                            ?>

                            <script type="text/javascript">
                                    function areYouSure() {
                                          var res = confirm("Are you sure?");
                                          return res; //true or false
                                      }
                                </script>

                               

                            <tr>
                              
                            <td><?php echo $project_result['ProjectCode']?></td>
                            <td><?php echo $project_result['ProjectName']?></td>
                            <td><?php echo $project_result['ProjectCost']?></td>
                            <td style="width: 40px;"><?php echo $project_result['duration_start_date']?><br><?php if($project_result['duration_end_date']!='Jan 01, 1970' && $project_result['duration_end_date']!='') { echo $project_result['duration_end_date']; }else { echo 'Till Date'; } ?></td>
                            <td><?php echo $project_result['noofcontracts']?></td>
                            <td><?php echo $project_result['MinistryName']?></td>
                            <td><?php echo $project_result['OrgName']?></td>
                            <td style="white-space:nowrap">
                            <?php if($_SESSION['OfficeID']==$project_result['OfficeID']) {?>
                            <form action="update_project.php?msg=<?php echo $project_result['id']?>" method="post"><button type="submit" class="btn btn-success" name="update[]" style="font-size: 14px; width: 5px; height: 20px;"><p style="color: white; margin-top: -10px;margin-left: -6px;">✐</p></button></form><form action="" method="post"><button type="button" class="btn btn-danger"  name="remove_project[]" style="font-size: 14px; width: 15px; height: 20px; margin-top: 5px;" data-toggle="modal" data-target="#exampleModalCenter<?=$project_result['id']?>"><p style="color: white; margin-top: -10px;margin-left: -6px;">✖</p></button></form><?php } ?></td>


                            <div class="modal fade" id="exampleModalCenter<?=$project_result['id']?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to remove this project?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms">Once you remove this project the contracts under this project will also be removed!</p>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            <form action="update_remove.php?msg=<?=$project_result['id']?>" method="post">

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="yes_project[]">Yes</button>
              </form>
            <?php //}
              ?>
                <button type="button" style="background-color: red" class="btn btn-secondary" name="no[]" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
                          <!-- </form> -->
                           <!-- <form action="update_remove.php?msg=<?php echo$project_result['id']?>" method="post"> 
                              
                            <td><button type="submit" class="btn btn-danger"  name="remove_project[]" style="font-size: 14px; width: 35px; height: 35px;">✖</button></td>
 -->
                            <!-- data-toggle="modal" data-target="#exampleModalCenter"  data-id="<?php echo$project_result['id']?>"-->

                             <!-- </form> -->
                             <?php //include 'modal_remove.php'; ?>





                           


                          </tr>
                        
                    <?php } ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 


        
          

            <style type="text/css">
              th.duration{
                  width: 15% !important;
                }
            </style>


</body>


</html>