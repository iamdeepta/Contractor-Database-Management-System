<?php session_start(); 

if ($_SESSION["flag"] == "ok"){

require("config/connection.php");
        
        $result = mysqli_query($conn,"SELECT DISTINCT contractor.ContractorName, contractor.ID FROM tbl_contractor as contractor order by contractor.ContractorName asc") or die(mysqli_error($conn));
        //$result = json_decode($data, true);

        $result1 = mysqli_query($conn,"SELECT DISTINCT ID, AuthorityName FROM tbl_approveauth order by AuthorityName asc") or die(mysqli_error($conn));
        //$result1 = json_decode($data1, true);

        $result2= mysqli_query($conn,"SELECT DISTINCT ID, ProcCatName FROM tbl_proccategory order by ProcCatName asc") or die(mysqli_error($conn));
        //$result2 = json_decode($data2, true);

        $result3  = mysqli_query($conn,"SELECT DISTINCT ID, ProcTypeName FROM tbl_proctype order by ProcTypeName asc") or die(mysqli_error($conn));
        //$result3 = json_decode($data3, true);

        $result4 = mysqli_query($conn,"SELECT * from tbl_project_division WHERE '".$whereproject."'") or die(mysqli_error($conn));
        //$result4 = json_decode($data4, true);
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Contractor Database & Management System</title>

  <!-- General CSS Files -->
  <?php include 'css_master.php'?>
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
              <h4 class="page-title m-b-0">Add New Experience</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home.php">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Experience</li>
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

          <form class="form-horizontal" action="" method="post" data-parsley-validate>
          <div class="section-body">
            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <!-- <div class="card-header">
                    <h4>HTML5 Form Basic</h4>
                  </div> -->
                  <div class="card-body">
                    <div class="form-group">
                      <label for="degree">Contractor Name</label><label style="color: red; margin-left: 4px;">*</label>
                    <div class="input-group" id="input-group[]">
                      
                    <select class="custom-select select" id="contractor_id[]" name="contractor_id[]" aria-label="Example select with button addon"  required>  
                      <?php
                      while($contractor_name=mysqli_fetch_array($result)){
                        ?>
                      
                     <option value="<?=$contractor_name['ID']?>"><?=$contractor_name['ContractorName']?></option> 
                    
              
                      <?php } ?>
                    </select><button type="button" id="removeButton[]" name="removeButton" class="btn btn-danger btn-sm removeButton" style="display: none;">x</button>

                 
                  </div>
                  <button type="button" name="add" id="add" class="btn btn-success btn-sm add">+</button>
                  
                    </div>
                    <div class="form-group">
                      <label>Tender No.</label><label style="color: red; margin-left: 4px;">*</label>
                      <input data-parsley-type="number" class="form-control" name="tender_no" required>
                    </div>

                

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

                  

                 

                    

                    <div class="form-group">
                      <label>Procurement Method</label>
                      <select class="custom-select" id="proccat_id" name="proccat_id">
                        <?php
                      while($proccat_name=mysqli_fetch_array($result2)){
                        ?>
                        <option value="<?=$proccat_name['ID']?>"><?=$proccat_name['ProcCatName']?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Contract Amount</label><label style="color: red; margin-left: 4px;">*</label>
                      <input data-parsley-type="number" class="form-control" name="contract_amount" required>
                    </div>

                    <div class="form-group">
                      <label>Remarks</label><label style="color: red; margin-left: 4px;"></label>
                      <input data-parsley-type="text" class="form-control" name="remarks">
                    </div>

                    <div class="form-group">
                      <label>Upload Experience Certificate</label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="file" class="form-control-file" name="contract_amount" required>
                    </div>

                    <div class="card-footer text-right" >
                    <button class="btn btn-primary mr-1" name="contract_submit" type="submit">Submit</button>
                    <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
                  </div>
                
    
                    
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
  
  <?php include 'javascript.php'?>
</body>

</html>

<?php }else{

  header("Location: index.php");
} ?>

