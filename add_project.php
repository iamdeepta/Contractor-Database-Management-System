<?php session_start();

if ($_SESSION["flag"] == "ok"){ 

require("config/connection.php");
        
        $result = mysqli_query($conn,"SELECT DISTINCT MinistryId, MinistryName FROM ".DBPMS.".pmsministry order by MinistryName asc") or die(mysqli_error($conn));
        //$result = json_decode($data, true);

        $result1 = mysqli_query($conn,"SELECT DISTINCT OrgID, OrgName FROM ".DBPMS.".pmsorg order by OrgName asc") or die(mysqli_error($conn));
        //$result1 = json_decode($data1, true);

        $result2 = mysqli_query($conn,"SELECT DISTINCT ID, FundingType FROM tbl_fundingtype order by FundingType asc") or die(mysqli_error($conn));
        //$result2 = json_decode($data2, true);

        $result3 = mysqli_query($conn,"SELECT DISTINCT ID, Name FROM tbl_project_status order by Name asc") or die(mysqli_error($conn));
        //$result3 = json_decode($data3, true);

       $result4 = mysqli_query($conn,"SELECT OfficeName, OfficeID FROM ".DBHR.".hrtoffice WHERE OfficeName <> '' order by OfficeName asc") or die(mysqli_error($conn));
        //$result4 = json_decode($data4, true);

       /* $data3 = getJSON("SELECT DISTINCT ID, ProcTypeName FROM tbl_proctype order by ProcTypeName asc");
        $result3 = json_decode($data3, true);*/
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Contractor Database & Management System</title>

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
              <h4 class="page-title m-b-0">Add New Project</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home.php">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Project</li>
            <!-- <li class="breadcrumb-item">Basic Form</li> -->
          </ul>

          <?php if(isset($_GET['msg'])){ ?>
          <div class="card">
          <div class="card-body" style="background-color: #DFF0D8; height: 60px;">
          <label style="margin-top: 0px; ">
            <?php 
          
              echo $_GET['msg'];
          
          ?>
            
          </label>
        </div>
      </div>

    <?php }

        ?>

          <form class="form-horizontal" action="insert.php" method="post" data-parsley-validate>
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
                      <input type="text" class="form-control" name="project_code">
                    </div>

                    <div class="form-group">
                      <label>Name of Project</label><label style="color: red; margin-left: 4px;">*</label>
                      <textarea class="form-control" id="project_name" name="project_name" required></textarea>
                    </div>

                    <div class="form-group">
                      <label>Ministry Name</label>
                      <select class="custom-select" id="ministry_id" name="ministry_id">
                        <?php
                      while($ministry_name=mysqli_fetch_array($result)){
                        ?>
                      
                     <option value="<?=$ministry_name['MinistryId']?>"><?=$ministry_name['MinistryName']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Organization Name</label>
                      <select class="custom-select" id="org_id" name="org_id">
                        <?php
                      while($org_name=mysqli_fetch_array($result1)){
                        ?>
                      
                     <option value="<?=$org_name['OrgID']?>"><?=$org_name['OrgName']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>

                 
                    <div class="form-group">
                    <label for="degree">Division Office</label>
                    <div class="input-group" id="input-group[]">
                      
                    <select class="custom-select" id="division_id[]" name="division_id[]" >   
                      <?php
                      while($div_id=mysqli_fetch_array($result4)){
                        ?>
                      
                     <option value="<?=$div_id['OfficeID']?>"><?=$div_id['OfficeName']?></option> 
                    
                      <?php } ?>
                    </select><button type="button" id="removeButton[]" name="removeButton" class="btn btn-danger btn-sm removeButton" style="display: none;">x</button>
                     
                  </div>

                  <button type="button" name="add" id="add" class="btn btn-success btn-sm add">+</button>

                  </div>

                  <!-- <script type="text/javascript">
  
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

                   $("#removeButton").click(function () {
                            if(count==1){
                                  alert("No more textbox to remove");
                                  return false;
                               }   

                            counter--;

                                $(".input-group:last" + counter).remove();

                             });

                  });


                  </script> -->

                  <script type="text/javascript">
  
                    $(document).ready(function(){
                      var count=0;

                   $('#add').click(function(){

                    // Create clone of <div class='input-form'>
                    
                    var newel2 = $('.input-group:last').clone(true);
                    //newel2.find('select').val('69');
                    //newel2.find('input').val('');

                    var newel = $('.custom-select:last');
                    //var newel1 = $('.form-control.input:last');

                   // newel.setAttribute("id", "test"+count);

                    // Add after last <div class='input-form'>
                    $(newel2).insertAfter(".input-group:last").prop('id', 'input-group[' + count+']');
                
                    //(newel2).find('select').prop('id', 'contractor_id[' +count+']').prop('name', 'contractor_id[' +count+']');
                    //(newel2).find('input').prop('id', 'contractor_share[' +count+']').prop('name', 'contractor_share[' +count+']');

                    $(newel).prop('id', 'division_id[' +count+']').prop('name', 'division_id[' +count+']');
                    //$(newel1).prop('id', 'contractor_share[' +count+']').prop('name', 'contractor_share[' +count+']');

                    //$(newel1).insertAfter("#contractor_id:last");
                    //newel.setAttribute("id", "test"+count);
                    count++;

                    if (count!="") {
                      $(".removeButton").show();

                    }

                   });
                  

                   $(".input-group").on('click', '.removeButton', function(e){
        e.preventDefault();
        if (count!="") {
        $(this).parent('div').remove(); //Remove field html
      

        count--;
      }else{

        $(".removeButton").hide();
      }

        
         //Decrement field counter
    });
                 

                   /*$("#removeButton").click(function () {


                            if(count==1){
                                  alert("No more textbox to remove");
                                  return false;
                                  
                               }   

                            count--;

                                $("#input-group[" + count+"]").remove();

                             });*/

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
                      
                     <option value="<?=$funding_type['ID']?>"><?=$funding_type['FundingType']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Project Cost (In Lakh)</label>
                      <input data-parsley-type="number" class="form-control" name="project_cost">
                    </div>


                    <div class="form-group">
                      <label>Project Duration</label>
                      <div class="input-group-append">
                        <label class="label1">Start Date</label>
                      <input type="date" name="duration_start" class="form-control input1" style="width: 150px;">
                      <label class="label2" style="margin-left: 25px;">End Date</label>
                      <input type="date" name="duration_end" class="form-control input2" style="width: 150px;">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Project Status</label>
                      <select class="custom-select" id="project_status" name="project_status">
                        <?php
                      while($project_status=mysqli_fetch_array($result3)){
                        ?>
                      
                     <option value="<?=$project_status['Name']?>"><?=$project_status['Name']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>

                   
                  </div>
                  <div class="card-footer text-right" style="margin-top: 58px;">
                    <button class="btn btn-primary mr-1" name="project_submit" type="submit" id="btn">Submit</button>
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



