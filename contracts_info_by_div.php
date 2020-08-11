<?php

if ($_SESSION['OfficeID']=="") {
 
$contract_info = mysqli_query($conn,"SELECT DISTINCT contract.id, office.OfficeID, office.OfficeName, count(contract.id) as count_contract FROM hrtoffice as office, tbl_contract as contract WHERE contract.Remove_Status=0 AND office.OfficeID = contract.OfficeID GROUP BY office.OfficeID") or die(mysqli_error($conn));
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
                    <h4>Contracts Information By Division</h4>
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
                            
                            <td><a style="color: black;" href="contracts_info.php?msg=<?php echo $result['OfficeID']?>" ><u><?php echo $result['OfficeName'];?></u></a></td>
                          
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
      
  
</body>

</html>

<?php }?>