<?php
		$querycontract="SELECT count(id) as noofcontracts from tbl_contract where Remove_Status=0 AND ".$where;
		$resultcontract=mysqli_query($conn,$querycontract) or die(mysqli_error($conn));
		$no_of_contract=mysqli_fetch_array($resultcontract);
		
		$querycontractor="SELECT count(ID) as noofcontractors from tbl_contractor where Remove_Status=0 AND ".$where;
		$resultcontractor=mysqli_query($conn,$querycontractor) or die(mysqli_error($conn));
		$no_of_contractor=mysqli_fetch_array($resultcontractor);

		$queryprojects="SELECT count(id) as noofprojects from tbl_project_division where Remove_Status=0 AND ".$whereproject;
		$resultprojects=mysqli_query($conn,$queryprojects) or die(mysqli_error($conn));
		$no_of_project=mysqli_fetch_array($resultprojects);

		$querycontractstoday="SELECT count(id) as noofcontractstoday FROM tbl_contract WHERE Remove_Status=0 AND DATE(publish_date) = DATE(NOW()) AND ".$where;
		$resultcontractstoday=mysqli_query($conn,$querycontractstoday) or die(mysqli_error($conn));
		$no_of_contract_today=mysqli_fetch_array($resultcontractstoday);
		
$msg = "noofprojects";
$msg1 = "noofcontracts";
$msg2 = "noofcontractors";
$msg3 = "noofcontractstoday";

?>


<div class="row ">


            <div class="col-xl-3 col-lg-6">
              <!-- <button type="submit" name="no_of_projects" style="height: 10px;border:none;background:none;"> -->
                <form action="home.php?msg=<?php echo $msg;?>" method="post">
              <div class="card l-bg-green-dark">
                <button type="submit" name="no_of_projects" style="border:none; background: none"><div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                  <div class="mb-4">
                    <h5 class="card-title mb-0">No. of Projects</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      <h2 class="d-flex align-items-center mb-0">
                        <?php echo $no_of_project['noofprojects'];?>
                      </h2>
                    </div>
                    <div class="col-4 text-right">
                      <span>10% <i class="fa fa-arrow-up"></i></span>
                    </div>
                  </div>
                  <div class="progress mt-1 " data-height="8">
                    <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div></button>
              </div>
            </form>
            <!-- </button> -->
            </div>
            
            <div class="col-xl-3 col-lg-6">
              <!-- <button type="submit" name="no_of_contracts" style="height: 10px;border:none;background:none;"> --> 
                <form action="home.php?msg=<?php echo $msg1;?>" method="post">
              <div class="card l-bg-cherry">
                <!-- <a href="home.php" class="submit"> -->
                <button type="submit" name="no_of_contracts" style="border:none; background: none"><div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                  <!-- <div class="col-4 text-left">
                      <span>Development <i class="fa fa-arrow-up"></i></span>
                    </div> -->
                  <div class="mb-4">

                    <h5 class="card-title mb-0">No. Of Contracts</h5>
                  
                  </div>
                  <div class="row align-items-center mb-2 d-flex">

                    <div class="col-8" style="margin-top: -30px;">
                      <p class="d-flex" style="font-size: 12px; margin-left: -10px;">Development</p>
                      
                      <h2 class="d-flex align-items-center mb-0" style="margin-top: -25px;">
                        
                        
                         <?php echo$no_of_contract['noofcontracts']?>
                      
                      </h2>
                  
                    </div>


                    <div class="col-4 text-right d-flex div1" style="margin-top: -23px;">
                      <p class="d-flex revenue" style="font-size: 12px; margin-left: 0px;">Revenue</p>
                      <p class="d-flex percent" style="margin-top: 20px; margin-left: -45px;">12.5% <i class="fa fa-arrow-up d-flex" style="margin-top: 4px; margin-left: 0px;"></i></p>
                      <!-- <i class="fa fa-arrow-up d-flex" style="margin-top: 42px; margin-left: -18px;"></i> -->
                    </div>
                  </div>
                  <div class="row" style="margin-top: -4px;">
                  <div class="progress mt-1 d-flex" data-height="8" style="width: 40%">
                    <div class="progress-bar l-bg-cyan d-flex" role="progressbar" data-width="50%" aria-valuenow="0"
                      aria-valuemin="0" aria-valuemax="20" style="margin-top: -75px;width: 20px;"></div>
                      <!-- <div class="progress-bar l-bg-cyan d-flex" role="progressbar" data-width="50%" aria-valuenow="25"
                      aria-valuemin="60" aria-valuemax="100" style="margin-top: -75px; width: 20px;"></div> -->

                  </div>
                  <div class="progress mt-1 d-flex progress2" data-height="8" style="width: 40%; margin-left: 40px;">
                    <div class="progress-bar l-bg-cyan d-flex" role="progressbar" data-width="50%" aria-valuenow="0"
                      aria-valuemin="0" aria-valuemax="20" style="margin-top: -75px;width: 20px;"></div>
                      <!-- <div class="progress-bar l-bg-cyan d-flex" role="progressbar" data-width="50%" aria-valuenow="25"
                      aria-valuemin="60" aria-valuemax="100" style="margin-top: -75px; width: 20px;"></div> -->
                  </div>
                </div>

                </div></button>
              <!-- </a> -->
              </div>
            </form>
              <!-- </button> -->
            </div>
          
            <div class="col-xl-3 col-lg-6">
              <!-- <button type="submit" name="no_of_contractors" style="height: 10px;border:none;background:none;"> -->
                <form action="home.php?msg=<?php echo$msg2?>" method="post">
              <div class="card l-bg-blue-dark">
                <button type="submit" name="no_of_contractors" style="border:none; background: none"><div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                  <div class="mb-4">
                    <h5 class="card-title mb-0">No. Of Contractors</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      
                      <h2 class="d-flex align-items-center mb-0">
                        <?php echo$no_of_contractor['noofcontractors']?>
                      </h2>
                    
                    </div>
                    <div class="col-4 text-right">
                      <span>9.23% <i class="fa fa-arrow-up"></i></span>
                    </div>
                  </div>
                  <div class="progress mt-1 " data-height="8">
                    <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div></button>
              </div>
            </form>
            <!-- </button> -->
            </div>

            <div class="col-xl-3 col-lg-6">
             <!--  <button type="submit" name="contracts_today" style="height: 10px;border:none;background:none;"> -->
              <form action="home.php?msg=<?php echo$msg3?>" method="post">
              <div class="card l-bg-orange-dark">
                <button type="submit" name="contracts_today" style="border:none; background: none"><div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                  <div class="mb-4">
                    <h5 class="card-title mb-0">Contracts Today</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      
                      <h2 class="d-flex align-items-center mb-0">
                        <?php echo$no_of_contract_today['noofcontractstoday']?>
                      </h2>
                    
                    </div>
                    <div class="col-4 text-right">
                      <span>2.5% <i class="fa fa-arrow-up"></i></span>
                    </div>
                  </div>
                  <div class="progress mt-1 " data-height="8">
                    <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div></button>
              </div>
            </form>
            <!-- </button> -->
            </div>
          </div>