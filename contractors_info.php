<?php
$contractor_info = mysqli_query($conn,"SELECT * FROM tbl_contractor WHERE Remove_Status=0 AND ".$where) or die(mysqli_error($conn));
?>   

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">


  <?php //include 'css_master.php'?>
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />
</head>

<body>
  
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List of Contractors</h4>
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
                            <!-- <form action="update_contractor.php?msg=<?=$contractor_result['ID']?>" method="post"> -->
                            <td><form action="update_contractor.php?msg=<?=$contractor_result['ID']?>" method="post"><button type="submit" class="btn btn-success" name="update[]" style="font-size: 14px; width: 15px; height: 20px;"><p style="color: white; margin-top: -10px;margin-left: -6px;">✐</p></button></form><form action="" method="post"><button type="button" class="btn btn-danger" name="remove_contractor[]" style="font-size: 14px; width: 15px; height: 20px; margin-top: 5px;" data-toggle="modal" data-target="#exampleModalCenter<?=$contractor_result['ID']?>"><p style="color: white; margin-top: -10px;margin-left: -6px;">✖</p></button></form></td>



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
                
                <button type="submit" class="btn btn-primary" name="yes_contractor[]">Yes</button>
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

      
  
</body>


<!-- Mirrored from www.radixtouch.in/templates/logicswave/jiva/source/light/datatables.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 13 May 2020 10:16:48 GMT -->
</html>