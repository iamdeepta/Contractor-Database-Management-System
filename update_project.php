<?php session_start();

//$msg = $_GET['msg'];

if (isset($_POST['update']) && $_SESSION["flag"] == "ok"){ 

require("config/connection.php");

$msg = $_GET['msg'];


        $result = mysqli_query($conn, "SELECT DISTINCT MinistryId, MinistryName FROM ".DBPMS.".pmsministry order by MinistryName asc") or die(mysqli_error($conn));
        //$result = json_decode($data, true);

        $result1 = mysqli_query($conn,"SELECT DISTINCT OrgID, OrgName FROM ".DBPMS.".pmsorg order by OrgName asc") or die(mysqli_error($conn));
        //$result1 = json_decode($data1, true);

        $result2 = mysqli_query($conn,"SELECT DISTINCT ID, FundingType FROM tbl_fundingtype order by FundingType asc") or die(mysqli_error($conn));
        //$result2 = json_decode($data2, true);

        $result3 = mysqli_query($conn,"SELECT DISTINCT ID, Name FROM tbl_project_status order by Name asc") or die(mysqli_error($conn));
        //$result3 = json_decode($data3, true);

        $result4 = mysqli_query($conn,"SELECT OfficeName, OfficeID FROM ".DBHR.".hrtoffice WHERE OfficeName <> '' order by OfficeName asc") or die(mysqli_error($conn));
        //$result4 = json_decode($data4, true);
        
        /*$data5 = getJSON("SELECT * FROM tbl_project_division AS project, pmsministry AS ministry, pmsorg AS org, hrtoffice AS office, tbl_fundingtype AS fund, tbl_project_status AS status WHERE project.Remove_Status =0 AND project.MinistryID = ministry.MinistryId AND project.OrganizationID = org.OrgID AND office.OfficeID = project.OfficeID AND project.Status = status.Name AND project.FundingTypeID=fund.ID AND project.ProjectCode=$msg");
        $result5 = json_decode($data5, true);*/

       $result6 = mysqli_query($conn,"SELECT * FROM tbl_project_division WHERE id = $msg") or die(mysqli_error($conn));
        //$result6 = json_decode($data6, true);

       /* $data3 = getJSON("SELECT DISTINCT ID, ProcTypeName FROM tbl_proctype order by ProcTypeName asc");
        $result3 = json_decode($data3, true);*/
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>PWD Contractor Database</title>

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
              <h4 class="page-title m-b-0">Update Project</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home.php">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Project</li>
            <!-- <li class="breadcrumb-item">Basic Form</li> -->
          </ul>

          <?php //if(isset($_GET['msg'])){ ?>
          <!-- <div class="card">
          <div class="card-body" style="background-color: #DFF0D8; height: 60px;">
          <label style="margin-top: 0px; "> --> 
            <?php 
          
              //echo $_GET['msg'];
          
          ?>
            
          <!-- </label>
        </div>
      </div> -->

    <?php //}

        ?>

          <form class="form-horizontal" action="update_remove.php?msg=<?=$msg?>" method="post" data-parsley-validate>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <!-- <div class="card-header">
                    <h4>HTML5 Form Basic</h4>
                  </div> -->
                  <div class="card-body">

                    <div class="form-group">
                      <label>Project Code (As Per IBAS)</label>
                      <?php 
                        while($project_code=mysqli_fetch_array($result6)){

                          $project_cost=$project_code['ProjectCost'];
                          $start_date=$project_code['DurationStartDate'];
                          $end_date=$project_code['DurationEndDate'];

                     ?>
                      <input type="text" class="form-control" name="project_code" value="<?=$project_code['ProjectCode']?>">

                    <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>Name of Project</label><label style="color: red; margin-left: 4px;">*</label>

                      <?php 
                      //while($project_code){  
                        ?>
                      <textarea class="form-control" id="project_name" name="project_name" required><?=$project_code['ProjectName']?></textarea>
                    <?php } ?>
                    </div>

                    <div class="form-group">
                      <label>Ministry Name</label>
                      <select class="custom-select" id="ministry_id" name="ministry_id">
                        <?php
                        while($ministry_name=mysqli_fetch_array($result)){
                        
                        ?>
                      
                     <option value="<?=$ministry_name['MinistryId']?>" <?php foreach($result6 as $ministry_name1) echo $ministry_name1['MinistryID']==$ministry_name['MinistryId'] ? 'selected' : '' ?>><?=$ministry_name['MinistryName']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Organization Name</label>
                      <select class="form-control" id="org_id" name="org_id">
                        <?php
                      while($org_name=mysqli_fetch_array($result1)){
                        ?>
                      
                     <option value="<?=$org_name['OrgID']?>" <?php while($org_name1=mysqli_fetch_array($result6)) echo $org_name1['OrganizationID']==$org_name['OrgID'] ? 'selected' : '' ?>><?=$org_name['OrgName']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>

                 
                    <div class="form-group">
                    <label for="degree">Division Office</label>
                    <div class="input-group">
                      
                    <select class="custom-select" id="division_id[]" name="division_id[]" >   
                      <?php
                      while($div_id=mysqli_fetch_array($result4)){
                        ?>
                      
                     <option value="<?=$div_id['OfficeID']?>" <?php while($div_id1=mysqli_fetch_array($result6)) echo $div_id1['DivisionID']==$div_id['OfficeID'] ? 'selected' : '' ?>><?=$div_id['OfficeName']?></option> 
                    
                      <?php } ?>
                    </select>
                     
                  </div>

                  <button type="button" name="add" id="add" class="btn btn-success btn-sm add">+</button>

                  </div>

                  <script type="text/javascript">
  
                    $(document).ready(function(){
                      var count=0;

                   $('#add').click(function(){

                    // Create clone of <div class='input-form'>
                    var newel = $('.input-group:last').clone(true);
                   // newel.setAttribute("id", "test"+count);

                    // Add after last <div class='input-form'>
                    $(newel).insertAfter(".input-group:last");
                    newel.setAttribute("id", "test"+count);
                    count++;
                   });

                  });


                  </script>

    
                    
                  </div>
                  
                </div>  
 
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <!-- <div class="card-header">
                    <h4>Sizing</h4>
                  </div> -->

              

                  <div class="card-body">

                    <div class="form-group">
                      <label>Funding Type</label>
                      <select class="custom-select" id="funding_id" name="funding_id">
                        <?php
                      while($funding_type=mysqli_fetch_array($result2)){
                        ?>
                      
                     <option value="<?=$funding_type['ID']?>" <?php while($funding_type1=mysqli_fetch_array($result6)) echo $funding_type1['FundingTypeID']==$funding_type['ID'] ? 'selected' : '' ?>><?=$funding_type['FundingType']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Project Cost (In Lakh)</label>
                      <?php 
                        //while($project_code){

                     ?>

                      <input data-parsley-type="number" class="form-control" value="<?=$project_cost?>" name="project_cost">

                    <?php //} ?>
                    </div>


                    <div class="form-group">
                      <label>Project Duration</label>
                      <div class="input-group-append">
                        <label class="label1">Start Date</label>

                        <?php //while($start_date=mysqli_fetch_array($result6)){?>
                      <input type="date" value="<?=$start_date?>" name="duration_start" class="form-control input1" style="width: 150px;">
                    <?php //}?>
                      <label class="label2" style="margin-left: 25px;">End Date</label>
                      <?php //while($end_date=mysqli_fetch_array($result6)){?>
                      <input type="date" value="<?=$end_date?>" name="duration_end" class="form-control input2" style="width: 150px;">
                      <?php //}?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Project Status</label>
                      <select class="custom-select" id="project_status" name="project_status">
                        <?php
                      while($project_status=mysqli_fetch_array($result3)){
                        ?>
                      
                     <option value="<?=$project_status['Name']?>" <?php while($project_status1=mysqli_fetch_array($result6)) echo $project_status1['Status']==$project_status['Name'] ? 'selected' : '' ?>><?=$project_status['Name']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>

                   
                  </div>
                  <div class="card-footer text-right" style="margin-top: 58px;">
                    <button class="btn btn-primary mr-1" name="update_project" type="submit" id="btn_update">Update</button>
                    <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
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

<!-- <script type="text/javascript">
  
  $("#btn").click(function(){

    var project_name = $("#project_name").val();

if (project_name!='') {

  swal({
        title: "Success!",
        text: "The form is submitted!",
        icon: "success",
});

}

  });
</script> -->

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



