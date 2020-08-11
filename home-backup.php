<?php

session_start();

//include("config/connection.php");

/*$answer = $_SESSION["answer"];
$user_answer = $_POST["answer"];*/
//$msg = $_GET['msg'];

    if ($_SESSION["flag"] == "ok")
    {

require("config/json_db.php");

$msg = "noofprojects";
$msg1 = "noofcontracts";
$msg2 = "noofcontractors";
$msg3 = "noofcontractstoday";


        /*$count_contract = "SELECT count(id) as noofcontract FROM tbl_contract WHERE Remove_Status=0";
        $no_of_contract = $conn->query($count_contract);*/
    
        
        $count_contract = getJSON("SELECT count(id) as noofcontract FROM tbl_contract WHERE Remove_Status=0");
        $no_of_contract = json_decode($count_contract, true);

        /*$count_contractor = "SELECT count(ID) as noofcontractor FROM tbl_contractor";
        $no_of_contractor = $conn->query($count_contractor);*/

        $count_contractor = getJSON("SELECT count(ID) as noofcontractor FROM tbl_contractor WHERE Remove_Status=0");
        $no_of_contractor = json_decode($count_contractor, true);

        /*$count_project = "SELECT count(id) as noofproject FROM tbl_project_division WHERE Remove_Status=0";
        $no_of_project = $conn->query($count_project);*/

        $count_project = getJSON("SELECT count(id) as noofproject FROM tbl_project_division WHERE Remove_Status=0");
        $no_of_project = json_decode($count_project, true);

        /*$count_contract_today = "SELECT count(id) as noofcontracttoday FROM tbl_contract WHERE DATE(publish_date) = DATE(NOW())";
        $no_of_contract_today = $conn->query($count_contract_today);*/

        $count_contract_today = getJSON("SELECT count(id) as noofcontracttoday FROM tbl_contract WHERE DATE(publish_date) = DATE(NOW())");
        $no_of_contract_today = json_decode($count_contract_today, true);





//session_start();
//$answer = $_SESSION["answer"];
//$user_answer = $_POST["answer"];

//if ($answer == $user_answer) {

?>

<!DOCTYPE html>
<html lang="en">


<head>

  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Contractor Database & Management System</title>
  <!-- General CSS Files -->
  <?php include 'css_master.php';?>

  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />

  <style type="text/css">
  @media only screen and (min-width: 320px){
        
      .div1{

        margin-left: 0px;

      }

      .revenue{

        margin-left: 20px !important;
      }

      .progress2{

        margin-left: 170px !important;
        margin-top: -8px !important;
      }
      

        }

        @media only screen and (min-width: 480px){

          .div1{

               margin-left: 0px;
          }

          .revenue{

        margin-left: 20px !important;
      }

      .progress2{

        margin-left: 170px !important;
        margin-top: -8px !important;
      }
          

        }

        @media only screen and (min-width: 767px){

          .div1{
               margin-left: 0px;

          }

          .revenue{

        margin-left: 20px !important;
      }

      .progress2{

        margin-left: 170px !important;
        margin-top: -8px !important;
      }
        

        }

        @media only screen and (min-width: 991px){

          .div1{

               margin-left: 0px;
          }

          .revenue{

        margin-left: 0px !important;
      }

      .progress2{

        margin-left: 40px !important;
        margin-top: 4px !important;
      }
          

        }

        @media only screen and (min-width: 1200px){
         .div1{
             margin-left: 0px;

         }

         .revenue{

        margin-left: 0px !important;
      }

      .progress2{

        margin-left: 40px !important;
        margin-top: 4px !important;
      }
          

        }

</style>

</head>


<body>

<?php
//include 'modal_remove.php';
?>

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
              <h4 class="page-title m-b-0">Dashboard</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home.php">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ul>
          <!-- <form action="home.php?msg=<?=$msg?>" method="post" id="myform"> -->

          <div class="row ">


            <div class="col-xl-3 col-lg-6">
              <!-- <button type="submit" name="no_of_projects" style="height: 10px;border:none;background:none;"> -->
                <form action="home.php?msg=<?=$msg?>" method="post">
              <div class="card l-bg-green-dark">
                <button type="submit" name="no_of_projects" style="border:none; background: none"><div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                  <div class="mb-4">
                    <h5 class="card-title mb-0">No. of Projects</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      <?php
                      foreach ($no_of_project as $project_no){ ?>
                      <h2 class="d-flex align-items-center mb-0">
                        <?=$project_no['noofproject']?>
                      </h2>
                    <?php } ?>
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
                <form action="home.php?msg=<?=$msg1?>" method="post">
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
                      <?php
                      foreach ($no_of_contract as $contract_no){ ?>
                      <h2 class="d-flex align-items-center mb-0" style="margin-top: -25px;">
                        
                        
                        <?=$contract_no['noofcontract']?>
                      
                      </h2>
                    <?php } ?>
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
                <form action="home.php?msg=<?=$msg2?>" method="post">
              <div class="card l-bg-blue-dark">
                <button type="submit" name="no_of_contractors" style="border:none; background: none"><div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                  <div class="mb-4">
                    <h5 class="card-title mb-0">No. Of Contractors</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      <?php
                      foreach ($no_of_contractor as $contractor_no){ ?>
                      <h2 class="d-flex align-items-center mb-0">
                        <?=$contractor_no['noofcontractor']?>
                      </h2>
                    <?php } ?>
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

            
            <!-- <div class="col-xl-3 col-lg-5">
              <button type="submit" name="no_of_projects" style="height: 10px;border:none;background:none;"> 
              <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                  <div class="mb-4">
                    <h5 class="card-title mb-0">No. of Projects</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      <h2 class="d-flex align-items-center mb-0">
                        578
                      </h2>
                    </div>
                    <div class="col-4 text-right">
                      <span>10% <i class="fa fa-arrow-up"></i></span>
                    </div>
                  </div>
                  <div class="progress mt-1 " data-height="8">
                    <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </button>
            </div> -->
            <div class="col-xl-3 col-lg-6">
             <!--  <button type="submit" name="contracts_today" style="height: 10px;border:none;background:none;"> -->
              <form action="home.php?msg=<?=$msg3?>" method="post">
              <div class="card l-bg-orange-dark">
                <button type="submit" name="contracts_today" style="border:none; background: none"><div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                  <div class="mb-4">
                    <h5 class="card-title mb-0">Contracts Today</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      <?php
                      foreach ($no_of_contract_today as $contract_no_today){ ?>
                      <h2 class="d-flex align-items-center mb-0">
                        <?=$contract_no_today['noofcontracttoday']?>
                      </h2>
                    <?php } ?>
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
          
        <!-- </form> -->



          <?php

        
         
          if (isset($_REQUEST['no_of_contracts'])) {
            
           include 'contracts_info_by_div.php';

         }elseif (isset($_REQUEST['no_of_contractors'])) {

           include 'contractors_info.php';

         }elseif (isset($_REQUEST['no_of_projects'])) {

           include 'projects_info.php';

         }elseif (isset($_REQUEST['contracts_today'])) {

           include 'contracts_info_by_div.php';
         }

         else {

          include 'projects_info.php';
         }

           ?>
         
        <!--  <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Chart</h4>
                </div>
                <div class="card-body">
                  <div id="schart1"></div>
                  <div class="row">
                    <div class="col-4">
                      <p class="text-muted font-15 text-truncate">Target</p>
                      <h5>
                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$15.3k
                      </h5>
                    </div>
                    <div class="col-4">
                      <p class="text-muted font-15 text-truncate">Last
                        week</p>
                      <h5>
                        <i class="fas fa-arrow-circle-down col-red m-r-5"></i>$2.8k
                      </h5>
                    </div>
                    <div class="col-4">
                      <p class="text-muted text-truncate">Last
                        Month</p>
                      <h5>
                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$12.5k
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Chart</h4>
                </div>
                <div class="card-body">
                  <div id="schart2"></div>
                  <div class="row">
                    <div class="col-4">
                      <p class="text-muted font-15 text-truncate">Target</p>
                      <h5>
                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$15.3k
                      </h5>
                    </div>
                    <div class="col-4">
                      <p class="text-muted font-15 text-truncate">Last
                        week</p>
                      <h5>
                        <i class="fas fa-arrow-circle-down col-red m-r-5"></i>$2.8k
                      </h5>
                    </div>
                    <div class="col-4">
                      <p class="text-muted text-truncate">Last
                        Month</p>
                      <h5>
                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$12.5k
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->

          <!-- <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
              <div class="card">
                <div class="card-header">
                  <h4>Assign Project List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive" id="proTeamScroll">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Cust.</th>
                          <th>Project</th>
                          <th>Assign Date</th>
                          <th>Team</th>
                          <th>Priority</th>
                          <th>Status</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tr>
                        <td class="table-img"><img src="assets/img/users/user-8.png" alt="">
                        </td>
                        <td>
                          <h6 class="mb-0 font-13">Wordpress Website</h6>
                          <p class="m-0 font-12">
                            Assigned to<span class="col-green font-weight-bold"> Airi Satou</span>
                          </p>
                        </td>
                        <td>20-02-2018</td>
                        <td class="text-truncate">
                          <ul class="list-unstyled order-list m-b-0">
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-8.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Wildan Ahdian"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-9.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="John Deo"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-10.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Sarah Smith"></li>
                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                          </ul>
                        </td>
                        <td>
                          <div class="badge-outline col-red">High</div>
                        </td>
                        <td class="align-middle">
                          <div class="progress-text">50%</div>
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-success" data-width="50%"></div>
                          </div>
                        </td>
                        <td>
                          <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                              class="fas fa-pencil-alt"></i></a>
                          <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                              class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td class="table-img"><img src="assets/img/users/user-1.png" alt="">
                        </td>
                        <td>
                          <h6 class="mb-0 font-13">Android Game App</h6>
                          <p class="m-0 font-12">
                            Assigned to<span class="col-green font-weight-bold"> Sarah Smith</span>
                          </p>
                        </td>
                        <td>22-05-2019</td>
                        <td class="text-truncate">
                          <ul class="list-unstyled order-list m-b-0">
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-4.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Wildan Ahdian"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-7.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="John Deo"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-2.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Sarah Smith"></li>
                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                          </ul>
                        </td>
                        <td>
                          <div class="badge-outline col-green">Low</div>
                        </td>
                        <td class="align-middle">
                          <div class="progress-text">55%</div>
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-purple" data-width="55%"></div>
                          </div>
                        </td>
                        <td>
                          <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                              class="fas fa-pencil-alt"></i></a>
                          <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                              class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td class="table-img"><img src="assets/img/users/user-5.png" alt="">
                        </td>
                        <td>
                          <h6 class="mb-0 font-13">Java Web Service</h6>
                          <p class="m-0 font-12">
                            Assigned to<span class="col-green font-weight-bold"> Cara Stevens</span>
                          </p>
                        </td>
                        <td>11-04-2019</td>
                        <td class="text-truncate">
                          <ul class="list-unstyled order-list m-b-0">
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-3.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Wildan Ahdian"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-7.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="John Deo"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-8.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Sarah Smith"></li>
                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                          </ul>
                        </td>
                        <td>
                          <div class="badge-outline col-blue">Medium</div>
                        </td>
                        <td class="align-middle">
                          <div class="progress-text">70%</div>
                          <div class="progress" data-height="6">
                            <div class="progress-bar" data-width="70%"></div>
                          </div>
                        </td>
                        <td>
                          <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                              class="fas fa-pencil-alt"></i></a>
                          <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                              class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td class="table-img"><img src="assets/img/users/user-9.png" alt="">
                        </td>
                        <td>
                          <h6 class="mb-0 font-13">Wedding IOS App</h6>
                          <p class="m-0 font-12">
                            Assigned to<span class="col-green font-weight-bold"> John Doe</span>
                          </p>
                        </td>
                        <td>19-05-2019</td>
                        <td class="text-truncate">
                          <ul class="list-unstyled order-list m-b-0">
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-2.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Wildan Ahdian"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-10.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="John Deo"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-4.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Sarah Smith"></li>
                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                          </ul>
                        </td>
                        <td>
                          <div class="badge-outline col-red">High</div>
                        </td>
                        <td class="align-middle">
                          <div class="progress-text">45%</div>
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-cyan" data-width="45%"></div>
                          </div>
                        </td>
                        <td>
                          <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                              class="fas fa-pencil-alt"></i></a>
                          <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                              class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td class="table-img"><img src="assets/img/users/user-10.png" alt="">
                        </td>
                        <td>
                          <h6 class="mb-0 font-13">Blize Admin Template</h6>
                          <p class="m-0 font-12">
                            Assigned to<span class="col-green font-weight-bold"> Ashton Cox</span>
                          </p>
                        </td>
                        <td>25-07-2019</td>
                        <td class="text-truncate">
                          <ul class="list-unstyled order-list m-b-0">
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-1.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Wildan Ahdian"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-5.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="John Deo"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-7.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Sarah Smith"></li>
                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                          </ul>
                        </td>
                        <td>
                          <div class="badge-outline col-blue">Medium</div>
                        </td>
                        <td class="align-middle">
                          <div class="progress-text">67%</div>
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-red" data-width="67%"></div>
                          </div>
                        </td>
                        <td>
                          <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                              class="fas fa-pencil-alt"></i></a>
                          <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                              class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td class="table-img"><img src="assets/img/users/user-4.png" alt="">
                        </td>
                        <td>
                          <h6 class="mb-0 font-13">React js website</h6>
                          <p class="m-0 font-12">
                            Assigned to<span class="col-green font-weight-bold"> Sarah Smith </span>
                          </p>
                        </td>
                        <td>11-08-2019</td>
                        <td class="text-truncate">
                          <ul class="list-unstyled order-list m-b-0">
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-5.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Wildan Ahdian"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-8.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="John Deo"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-3.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Sarah Smith"></li>
                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                          </ul>
                        </td>
                        <td>
                          <div class="badge-outline col-green">Low</div>
                        </td>
                        <td class="align-middle">
                          <div class="progress-text">41%</div>
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-orange" data-width="41%"></div>
                          </div>
                        </td>
                        <td>
                          <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                              class="fas fa-pencil-alt"></i></a>
                          <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                              class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td class="table-img"><img src="assets/img/users/user-10.png" alt="">
                        </td>
                        <td>
                          <h6 class="mb-0 font-13">SEO improvement</h6>
                          <p class="m-0 font-12">
                            Assigned to<span class="col-green font-weight-bold"> Janak Gandhi</span>
                          </p>
                        </td>
                        <td>22-02-2018</td>
                        <td class="text-truncate">
                          <ul class="list-unstyled order-list m-b-0">
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-3.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Wildan Ahdian"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-9.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="John Deo"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-1.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Sarah Smith"></li>
                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                          </ul>
                        </td>
                        <td>
                          <div class="badge-outline col-red">High</div>
                        </td>
                        <td class="align-middle">
                          <div class="progress-text">70%</div>
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-success" data-width="70%"></div>
                          </div>
                        </td>
                        <td>
                          <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                              class="fas fa-pencil-alt"></i></a>
                          <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                              class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td class="table-img"><img src="assets/img/users/user-6.png" alt="">
                        </td>
                        <td>
                          <h6 class="mb-0 font-13">Laravel Website</h6>
                          <p class="m-0 font-12">
                            Assigned to<span class="col-green font-weight-bold"> Mili Rain</span>
                          </p>
                        </td>
                        <td>31-03-2019</td>
                        <td class="text-truncate">
                          <ul class="list-unstyled order-list m-b-0">
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-4.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Wildan Ahdian"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-7.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="John Deo"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-2.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Sarah Smith"></li>
                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                          </ul>
                        </td>
                        <td>
                          <div class="badge-outline col-green">Low</div>
                        </td>
                        <td class="align-middle">
                          <div class="progress-text">55%</div>
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-purple" data-width="55%"></div>
                          </div>
                        </td>
                        <td>
                          <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                              class="fas fa-pencil-alt"></i></a>
                          <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                              class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
              <div class="card">
                <div class="card-header">
                  <h4>Project Team</h4>
                </div>
                <div class="card-body">
                  <div class="media-list position-relative">
                    <div class="table-responsive" id="project-team-scroll">
                      <table class="table table-hover table-xl mb-0">
                        <thead>
                          <tr>
                            <th>Project Name</th>
                            <th>Employees</th>
                            <th>Cost</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-truncate">Project X</td>
                            <td class="text-truncate">
                              <ul class="list-unstyled order-list m-b-0">
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-8.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Wildan Ahdian"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-9.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="John Deo"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-10.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Sarah Smith"></li>
                                <li class="avatar avatar-sm"><span class="badge badge-primary">+3</span></li>
                              </ul>
                            </td>
                            <td class="text-truncate">$8999</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Project AB2</td>
                            <td class="text-truncate">
                              <ul class="list-unstyled order-list m-b-0">
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-1.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Wildan Ahdian"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-3.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="John Deo"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-2.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Sarah Smith"></li>
                                <li class="avatar avatar-sm"><span class="badge badge-primary">+1</span></li>
                              </ul>
                            </td>
                            <td class="text-truncate">$5550</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Project DS3</td>
                            <td class="text-truncate">
                              <ul class="list-unstyled order-list m-b-0">
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-5.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Wildan Ahdian"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-9.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Sarah Smith"></li>
                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                              </ul>
                            </td>
                            <td class="text-truncate">$9000</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Project XCD</td>
                            <td class="text-truncate">
                              <ul class="list-unstyled order-list m-b-0">
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-8.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Wildan Ahdian"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-3.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="John Deo"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-5.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Sarah Smith"></li>
                                <li class="avatar avatar-sm"><span class="badge badge-primary">+2</span></li>
                              </ul>
                            </td>
                            <td class="text-truncate">$7500</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Project Z2</td>
                            <td class="text-truncate">
                              <ul class="list-unstyled order-list m-b-0">
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-8.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Wildan Ahdian"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-10.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Sarah Smith"></li>
                                <li class="avatar avatar-sm"><span class="badge badge-primary">+3</span></li>
                              </ul>
                            </td>
                            <td class="text-truncate">$8500</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Project GTe</td>
                            <td class="text-truncate">
                              <ul class="list-unstyled order-list m-b-0">
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-3.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Wildan Ahdian"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-5.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Sarah Smith"></li>
                                <li class="avatar avatar-sm"><span class="badge badge-primary">+3</span></li>
                              </ul>
                            </td>
                            <td class="text-truncate">$8500</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          <!-- </div> -->
          <!--<div class="row">
            <div class="col-md-12 col-lg-6 col-xl-6 ">
              <div class="card">
                <div class="card-header">
                  <h4>Revenue Chart</h4>
                </div>
                <div class="card-body">
                  <div id="barChart"></div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-6 ">
              <div class="card">
                <div class="card-header">
                  <h4>User Visit </h4>
                </div>
                <div class="card-body">
                  <div id="lineChart"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-12 col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h4>Visitors By Countries</h4>
                </div>
                <div class="card-body">
                  <div class="row ">
                    <div class="col-12 col-sm-12 col-lg-8">
                      <div id="visitorMap"></div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-4">
                      <div class="row m-b-15">
                        <div class="col-9">India</div>
                        <div class="col-3 text-right">28%</div>
                        <div class="col-12">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-success" data-width="28%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row m-b-15">
                        <div class="col-9"> Canada</div>
                        <div class="col-3 text-right">21%</div>
                        <div class="col-12">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-orange" data-width="21%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row m-b-15">
                        <div class="col-9"> Australia</div>
                        <div class="col-3 text-right">33%</div>
                        <div class="col-12">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-purple" data-width="33%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row m-b-15">
                        <div class="col-9">Egypt</div>
                        <div class="col-3 text-right">42%</div>
                        <div class="col-12">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-amber" data-width="42%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row m-b-15">
                        <div class="col-9">Thailand</div>
                        <div class="col-3 text-right">56%</div>
                        <div class="col-12">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-cyan" data-width="56%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-9">Panama</div>
                        <div class="col-3 text-right">39%</div>
                        <div class="col-12">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-pink" data-width="39%"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="card gradient-bottom">
                <div class="card-header">
                  <h4>Top 5 Products</h4>
                  <div class="card-header-action dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
                    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <li class="dropdown-title">Select Period</li>
                      <li><a href="#" class="dropdown-item">Today</a></li>
                      <li><a href="#" class="dropdown-item">Week</a></li>
                      <li><a href="#" class="dropdown-item active">Month</a></li>
                      <li><a href="#" class="dropdown-item">This Year</a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body" id="top-5-scroll">
                  <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="assets/img/products/product-3.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">112 Sales</div>
                        </div>
                        <div class="media-title">Mobile</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="61%"></div>
                            <div class="budget-price-label">$24,897</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="38%"></div>
                            <div class="budget-price-label">$18,865</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="assets/img/products/product-4.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">49 Sales</div>
                        </div>
                        <div class="media-title">Laptop</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="78%"></div>
                            <div class="budget-price-label">$74,568</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="55%"></div>
                            <div class="budget-price-label">$65,892</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="assets/img/products/product-1.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">63 Sales</div>
                        </div>
                        <div class="media-title">Headphone</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="38%"></div>
                            <div class="budget-price-label">$2,859</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="25%"></div>
                            <div class="budget-price-label">$1,872</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="assets/img/products/product-2.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">28 Sales</div>
                        </div>
                        <div class="media-title">Tablet</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="48%"></div>
                            <div class="budget-price-label">$11,238</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="33%"></div>
                            <div class="budget-price-label">$7,564</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="assets/img/products/product-5.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">19 Sales</div>
                        </div>
                        <div class="media-title">Camera</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="91%"></div>
                            <div class="budget-price-label">$7,285</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="74%"></div>
                            <div class="budget-price-label">$5,147</div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="card-footer pt-3 d-flex justify-content-center">
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-primary" data-width="20"></div>
                    <div class="budget-price-label">Selling Price</div>
                  </div>
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-danger" data-width="20"></div>
                    <div class="budget-price-label">Product Cost</div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div> 
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" >
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black" class="active">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <?php include 'footer.php';?>
    </div>
  </div>
  <?php include 'javascript.php';?>
</body>

</html>

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
<?php }elseif($_SESSION["flag"] == "error_pass")
    {
      $msg = "The password is incorrect!";
        header("Location: index.php?msg=".$msg);

    }elseif ($_SESSION["flag"] == "captcha") {
     $msg = "Your given number is incorrect!";
        header("Location: index.php?msg=".$msg);

    }elseif ($_SESSION["flag"] == "error_username") {
     $msg = "The username is incorrect!";
        header("Location: index.php?msg=".$msg);

      }else {

        header("Location: index.php");
      } ?>

