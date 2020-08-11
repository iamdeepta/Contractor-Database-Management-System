<?php session_start(); 
if ($_SESSION["flag"] == "ok"){
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Contractor Database & Management System</title>
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
              <h4 class="page-title m-b-0">Add New Contractor Information</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home.php">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Contractor Information</li>
            <!-- <li class="breadcrumb-item">Basic Form</li> -->
          </ul>

          <?php if(isset($_GET['msg'])){ ?>
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

        <?php if(isset($_GET['msg_error'])){ ?>
          <div class="card">
          <div class="card-body" style="background-color: #e0aeb5; height: 60px;">
          <label style="margin-top: -10px; ">
            <?php 
          
              echo $_GET['msg_error'];
          
          ?>
            
          </label>
        </div>
      </div>

        <?php }

        ?>

          <form class="form-horizontal" action="insert.php" method="post" enctype="multipart/form-data" data-parsley-validate>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <!-- <div class="card-header">
                    <h4>HTML5 Form Basic</h4>
                  </div> -->
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label>Name of Tenderer(As Per Trade License)</label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="contractor_name" required>
                    </div>

                    <div class="form-group">
                      <label>Name of Proprietor/Managing Director</label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="contractor_md" required>
                    </div>

                    <div class="form-group">
                      <label>Year of Establishment</label><label style="color: red; margin-left: 4px;">*</label>
                      <input data-parsley-type="number" class="form-control" name="year_of_establishment" required>
                    </div>

                    <div class="form-group">
                      <label>Business Identification Number (BIN) / VAT No.</label><label style="color: red; margin-left: 4px;">*</label>
                      <input data-parsley-type="number" class="form-control" name="bin" required>
                    </div>

                    <div class="form-group">
                      <label>TIN Certificate No.</label><label style="color: red; margin-left: 4px;">*</label>
                      <input data-parsley-type="number" class="form-control" name="tin" required>
                    </div>

                    <div class="form-group">
                      <label>Nature of Business</label>
                      <input type="text" class="form-control" name="nature_of_business">
                    </div>

                    <div class="form-group">
                      <label>License Category</label>
                      <input type="text" class="form-control" name="license_category">
                    </div>

                    <div class="form-group">
                      <label>Office Address</label>
                      <input type="text" class="form-control" name="office_address">
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
                      <input data-parsley-type="number" class="form-control" maxlength="9" name="phone">
                    </div>

                    <div class="form-group">
                      <label>Mobile</label>
                      <input data-parsley-type="number" class="form-control" maxlength="11" name="mobile">
                    </div>

                    <div class="form-group">
                      <label>Email Address</label>
                      <input data-parsley-type="email" class="form-control" name="email_address">
                    </div>

                    <div class="form-group">
                      <label>License Serial Number</label>
                      <input data-parsley-type="number" class="form-control" name="license_slno">
                    </div>

                    <div class="form-group">
                      <label>License Under Which PWD Division</label>
                      <input type="text" class="form-control" name="license_under_div">
                    </div>

                    <div class="form-group">
                      <label>Year of Enlishment in PWD</label>
                      <input data-parsley-type="number" class="form-control" name="year_of_enlishment">
                    </div>

                    <div class="form-group">
                      <label>Year of Work Experience</label>
                      <input data-parsley-type="number" class="form-control" name="work_experience">
                    </div>

                    <div class="form-group">
                      <label>Contractor Experience Certificate</label>
                      <input type="file" class="form-control" name="file" required>
                    </div>

            

                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" name="contractor_submit" type="submit">Submit</button>
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

