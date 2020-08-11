<?php


/*$project_info = getJSON("SELECT project.id, project.ProjectCode, project.ProjectName, project.ProjectCost, DATE_FORMAT(project.DurationStartDate, '%b %d, %Y') as duration_start_date, DATE_FORMAT(project.DurationEndDate, '%b %d, %Y') as duration_end_date, ministry.MinistryName, org.OrgName FROM tbl_project_division AS project, pmsministry AS ministry, pmsorg AS org WHERE project.Remove_Status =0 AND project.MinistryID = ministry.MinistryId AND project.OrganizationID = org.OrgID");
        $project_info_result = json_decode($project_info, true);*/


        /*$getID = $_GET["id"];
    $data = getJSON("SELECT * FROM tbl_project_division WHERE id = $getID");
    $result = json_decode($data, true);
*/
//SELECT project.ProjectCode, project.ProjectName, project.ProjectCost FROM tbl_project_division AS project
     ?>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                <p id="rooms"><?=$project_result['ProjectName'];?>Once you remove this project the contracts under this project will also be removed!</p>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            <form action="update_remove.php?msg=<?=$project_result['id']?>" method="post">

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="yes_project">Yes</button>
              </form>
            <?php //}
              ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>

        

        