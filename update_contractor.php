<?php session_start(); 
if (isset($_POST['update']) && $_SESSION["flag"] == "ok"){

  require("config/connection.php");

  $msg = $_GET['msg'];

        $result = mysqli_query($conn,"SELECT * FROM tbl_contractor WHERE ID = $msg") or die(mysqli_error($conn));
        //$result = json_decode($data, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>PWD Contractor Database</title>
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
              <h4 class="page-title m-b-0">Update Contractor Information</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home.php">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Contractor Information</li>
            <!-- <li class="breadcrumb-item">Basic Form</li> -->
          </ul>

          <?php if(isset($_GET['msg_success'])){ ?>
         <div class="card">
          <div class="card-body" style="background-color: #DFF0D8; height: 60px;">
          <label style="margin-top: -10px; "> 
            <?php 
          
              echo $_GET['msg'];
          
          ?>
            
          </label>
        </div>
      </div> 

        <?php }

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
                      <label>Name of Organization</label><label style="color: red; margin-left: 4px;">*</label>
                      <?php 
                        while($contractor_name=mysqli_fetch_array($result)){
                     ?>
                      <input type="text" class="form-control" name="contractor_name" value="<?=$contractor_name['ContractorName']?>" required>
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>Name of Proprietor/Managing Director</label><label style="color: red; margin-left: 4px;">*</label>
                      <?php 
                        //while($contract_md=mysqli_fetch_array($result)){
                     ?>
                      <input type="text" class="form-control" name="contractor_md" value="<?=$contractor_name['ContractorMD']?>" required>
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>Year of Establishment</label><label style="color: red; margin-left: 4px;">*</label>
                      <?php 
                        //while($year_of_establishment=mysqli_fetch_array($result)){
                     ?>
                      <input data-parsley-type="number" class="form-control" name="year_of_establishment" value="<?=$contractor_name['YearOfEstablishment']?>" required>
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>Business Identification Number (BIN) / VAT No.</label><label style="color: red; margin-left: 4px;">*</label>
                      <?php 
                        //while($bin=mysqli_fetch_array($result)){
                     ?>
                      <input data-parsley-type="number" class="form-control" name="bin" value="<?=$contractor_name['BIN']?>" required>
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>TIN Certificate No.</label><label style="color: red; margin-left: 4px;">*</label>
                      <?php 
                        //while($tin=mysqli_fetch_array($result)){
                     ?>
                      <input data-parsley-type="number" class="form-control" name="tin" value="<?=$contractor_name['TIN']?>" required>
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>Nature of Business</label>
                      <?php 
                        //while($nature_of_business=mysqli_fetch_array($result)){
                     ?>
                      <input type="text" class="form-control" name="nature_of_business" value="<?=$contractor_name['NatureOfBusiness']?>">
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>License Category</label>
                      <?php 
                        //while($license_category=mysqli_fetch_array($result)){
                     ?>
                      <input type="text" class="form-control" name="license_category" value="<?=$contractor_name['LicenseCategory']?>">
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>Office Address</label>
                      <?php 
                       //while($office_address=mysqli_fetch_array($result)){
                     ?>
                      <input type="text" class="form-control" name="office_address" value="<?=$contractor_name['OfficeAddress']?>">
                      <?php //}
                     ?>
                    </div>

                  

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
                      <label>Phone</label>
                      <?php 
                        //while($phone=mysqli_fetch_array($result)){
                     ?>
                      <input data-parsley-type="number" class="form-control" maxlength="9" name="phone" value="<?=$contractor_name['Phone']?>">
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>Mobile</label>
                      <?php 
                        //while($mobile=mysqli_fetch_array($result)){
                     ?>
                      <input data-parsley-type="number" class="form-control" maxlength="11" name="mobile" value="<?=$contractor_name['Mobile']?>">
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>Email Address</label>
                      <?php 
                        //while($email_address=mysqli_fetch_array($result)){
                     ?>
                      <input data-parsley-type="email" class="form-control" name="email_address" value="<?=$contractor_name['EmailAddress']?>">
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>License Serial Number</label>
                      <?php 
                       //while($license_slno=mysqli_fetch_array($result)){
                     ?>
                      <input data-parsley-type="number" class="form-control" name="license_slno" value="<?=$contractor_name['LicenseSLNO']?>">
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>License Under Which Division</label>
                      <?php 
                        //while($license_under_div=mysqli_fetch_array($result)){
                     ?>
                      <input type="text" class="form-control" name="license_under_div" value="<?=$contractor_name['LicenseUnderDiv']?>">
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>Year of Enlishment</label>
                      <?php 
                        //while($year_of_enlishment=mysqli_fetch_array($result)){
                     ?>
                      <input data-parsley-type="number" class="form-control" name="year_of_enlishment" value="<?=$contractor_name['YearOfEnlishment']?>">
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>Year of Work Experience</label>
                      <?php 
                        //while($work_experience=mysqli_fetch_array($result)){
                     ?>
                      <input data-parsley-type="number" class="form-control" name="work_experience" value="<?=$contractor_name['WorkExperience']?>">
                      <?php //}
                     ?>
                    </div>

                    <div class="form-group">
                      <label>Contractor Experience Certificate</label>
                      <?php 
                        //while($experience_certificate=mysqli_fetch_array($result)){
                     ?>
                      <input type="text" class="form-control" name="file" disabled>
                      <?php }
                     ?>
                    </div>

            

                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" name="update_contractor" type="submit">Update</button>
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

