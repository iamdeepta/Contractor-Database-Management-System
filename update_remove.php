<?php

session_start();
require("config/connection.php");

if (isset($_POST['yes_project']) && $_SESSION["flag"] == "ok") {
	
$msg = $_GET['msg'];
	//$getID = $_GET["id"];
	$remove_status = 1;
	//$status = $_GET["Remove_Status"];
    //$data = getJSON("SELECT * FROM tbl_project_division WHERE id = $getID");
    //$result = json_decode($data, true);


    /*$database = new Database\Database;
        $connection = $database->connect();*/

        //$query = "DELETE FROM staff WHERE id = $getID";

        $query = "UPDATE tbl_project_division
                 SET Remove_Status = '{$remove_status}'
        
                     WHERE id = $msg " ;

        //$remove_project = $connection->query($query);
        $remove_project = mysqli_query($conn, $query);

                     /*if (mysqli_query($conn, $query)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/


        header("Location: home.php?msg=noofprojects");

    }


    if (isset($_POST['yes_admin_project']) && $_SESSION["flag"] == "ok") {
    
$msg = $_GET['msg'];
    //$getID = $_GET["id"];
    $remove_status = 2;
    //$status = $_GET["Remove_Status"];
    //$data = getJSON("SELECT * FROM tbl_project_division WHERE id = $getID");
    //$result = json_decode($data, true);


    /*$database = new Database\Database;
        $connection = $database->connect();*/

        //$query = "DELETE FROM staff WHERE id = $getID";

        $query = "UPDATE tbl_project_division
                 SET Remove_Status = '{$remove_status}'
        
                     WHERE id = $msg " ;

        //$remove_project = $connection->query($query);
        $remove_project = mysqli_query($conn, $query);

                     /*if (mysqli_query($conn, $query)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/


        header("Location: admin_remove_project.php");

    }




    if (isset($_POST['yes_contract']) && $_SESSION["flag"] == "ok") {
	
$msg2 = $_GET['msg'];

$msg_success = "The contract has been removed successfully";
	//$getID = $_GET["id"];
	$remove_status1 = 1;
	//$status = $_GET["Remove_Status"];
    //$data = getJSON("SELECT * FROM tbl_project_division WHERE id = $getID");
    //$result = json_decode($data, true);


    /*$database = new Database\Database;
        $connection = $database->connect();*/

        //$query = "DELETE FROM staff WHERE id = $getID";

        $query_remove_contract = "UPDATE tbl_contract
                 SET Remove_Status = '{$remove_status1}'
        
                     WHERE id = $msg2 " ;
         

        $remove_contract = mysqli_query($conn, $query_remove_contract);

        if($_SESSION['OfficeID']==0){

        header("Location: contracts_info.php?msg=".$msg2);
    }else{

        header("Location: home.php?msg=noofcontracts");
    }

    }

    if (isset($_POST['yes_admin_contract']) && $_SESSION["flag"] == "ok") {
    
$msg2 = $_GET['msg'];

$msg_success = "The contract has been removed successfully";
    //$getID = $_GET["id"];
    $remove_status1 = 2;
    //$status = $_GET["Remove_Status"];
    //$data = getJSON("SELECT * FROM tbl_project_division WHERE id = $getID");
    //$result = json_decode($data, true);


    /*$database = new Database\Database;
        $connection = $database->connect();*/

        //$query = "DELETE FROM staff WHERE id = $getID";

        $query_remove_contract = "UPDATE tbl_contract
                 SET Remove_Status = '{$remove_status1}'
        
                     WHERE id = $msg2 " ;

        $remove_contract = mysqli_query($conn, $query_remove_contract);

        header("Location: admin_remove_contract_info.php?msg=".$msg2);

    }

    if (isset($_POST['yes_contractor']) && $_SESSION["flag"] == "ok") {
	
$msg4 = $_GET['msg'];

	//$getID = $_GET["id"];
	$remove_status2 = 1;
	//$status = $_GET["Remove_Status"];
    //$data = getJSON("SELECT * FROM tbl_project_division WHERE id = $getID");
    //$result = json_decode($data, true);


    /*$database = new Database\Database;
        $connection = $database->connect();*/

        //$query = "DELETE FROM staff WHERE id = $getID";

        $query_remove_contractor = "UPDATE tbl_contractor
                 SET Remove_Status = '{$remove_status2}'
        
                     WHERE ID = $msg4 " ;

        $remove_contractor =  mysqli_query($conn, $query_remove_contractor);

        header("Location: home.php?msg=noofcontractors");

    }


    if (isset($_POST['yes_admin_contractor']) && $_SESSION["flag"] == "ok") {
    
$msg4 = $_GET['msg'];

    //$getID = $_GET["id"];
    $remove_status2 = 2;
    //$status = $_GET["Remove_Status"];
    //$data = getJSON("SELECT * FROM tbl_project_division WHERE id = $getID");
    //$result = json_decode($data, true);


    /*$database = new Database\Database;
        $connection = $database->connect();*/

        //$query = "DELETE FROM staff WHERE id = $getID";

        $query_remove_contractor = "UPDATE tbl_contractor
                 SET Remove_Status = '{$remove_status2}'
        
                     WHERE ID = $msg4 " ;

        $remove_contractor =  mysqli_query($conn, $query_remove_contractor);

        header("Location: admin_remove_contractor.php");

    }


    if (isset($_POST['update_project']) && $_SESSION["flag"] == "ok") {

    	$msg1 = $_GET['msg'];

    	$project_code = $_POST["project_code"];
        $project_name = $_POST["project_name"];
        $ministry_name = $_POST["ministry_id"];
        $org_name = $_POST["org_id"];
        $project_cost = $_POST["project_cost"];
        $duration_start = $_POST["duration_start"];
        $duration_end = $_POST["duration_end"];
        $funding_type = $_POST["funding_id"];
        $project_status = $_POST["project_status"];
        $division_id = $_POST["division_id"];


        /*$database = new Database\Database;
        $connection = $database->connect();*/

        $OfficeID = $_SESSION["OfficeID"];

        $div_id = implode(",",$division_id);

        $query_update_project = "UPDATE tbl_project_division
                 SET ProjectCode = '{$project_code}',
                        OfficeID = '{$OfficeID}',
                        ProjectName = '{$project_name}',
                        ProjectCost = '{$project_cost}',
                        MinistryID = '{$ministry_name}',
                        OrganizationID = '{$org_name}',
                        DurationStartDate = '{$duration_start}',
                        DurationEndDate = '{$duration_end}',
                        FundingTypeID = '{$funding_type}',
                        Status = '{$project_status}',
                        DivisionID = '{$div_id}'
                     WHERE id = $msg1" ;


        $update_project =  mysqli_query($conn, $query_update_project);

        header("Location: home.php");

    }



    if (isset($_POST['update_contract']) && $_SESSION["flag"] == "ok") {

    	$msg3 = $_GET['msg'];

    	$project_name = $_POST["project_id"];
        $tender_no = $_POST["tender_no"];
        $tender_name = $_POST["tender_name"];
        $official_cost = $_POST["official_cost"];
        $contractor_name = $_POST["contractor_id"];
        $contractor_share = $_POST["contractor_share"];
        $contract_amount = $_POST["contract_amount"];
        $approving_authority = $_POST["authority_id"];
        $procurement_method = $_POST["proccat_id"];
        $procurement_type = $_POST["proctype_id"];
        $bill_paid = $_POST["bill_paid"];
        $financial_progress = $_POST["financial_progress"];
        $physical_progress = $_POST["physical_progress"];
        $approval_date = $_POST["approval_date"];
        $noa_date = $_POST["noa_date"];
        $contract_signing_date = $_POST["contract_signing_date"];
        $completion_date = $_POST["completion_date"];
        //$image1 = $_POST["student_image"];
        //$degree_id = (int)$degree_id;
        $division = $_POST["division"];

        /*$database = new Database\Database;
        $connection = $database->connect();*/

        $user_id = $_SESSION["UserID"];
        $OfficeID = $_SESSION["OfficeID"];

        $c_id = implode(",",$contractor_name);
        $c_share = implode(",",$contractor_share);


        $query_update_contract = "UPDATE tbl_contract
                 SET tender_no = '{$tender_no}',
                        ProjectID = '{$project_name}',
                        user_id = '{$user_id}',
                        OfficeID = '{$OfficeID}',
                        TenderName = '{$tender_name}',
                        official_estimate = '{$official_cost}',
                        contractor_id = '{$c_id}',
                        contractor_share = '{$c_share}',
                        contract_amount = '{$contract_amount}',
                        approveauth_id = '{$approving_authority}',
                        procurement_method = '{$procurement_method}',
                        procurement_category = '{$procurement_type}',
                        bill_paid = '{$bill_paid}',
                        financial_progress = '{$financial_progress}',
                        physical_progress = '{$physical_progress}',
                        DOA = '{$approval_date}',
                        NOA = '{$noa_date}',
                        DOCS = '{$contract_signing_date}',
                        WCD = '{$completion_date}'
                     WHERE id = $msg3" ;


        $update_contract = mysqli_query($conn, $query_update_contract);

        header("Location: home.php");

    }



    if (isset($_POST['update_contractor']) && $_SESSION["flag"] == "ok") {

    	$msg5 = $_GET['msg'];

    	$contractor_name = $_POST["contractor_name"];
        $contractor_md = $_POST["contractor_md"];
        $bin = $_POST["bin"];
        $year_of_establishment = $_POST["year_of_establishment"];
        $tin = $_POST["tin"];
        $nature_of_business = $_POST["nature_of_business"];
        $license_category = $_POST["license_category"];
        $office_address = $_POST["office_address"];
        $phone = $_POST["phone"];
        $mobile = $_POST["mobile"];
        $email_address = $_POST["email_address"];
        $license_slno = $_POST["license_slno"];
        $license_under_div = $_POST["license_under_div"];
        $year_of_enlishment = $_POST["year_of_enlishment"];
        $work_experience = $_POST["work_experience"];
        $experience_certificate = $_POST["file"];


        /*$database = new Database\Database;
        $connection = $database->connect();*/

        $user_id = $_SESSION["UserID"];
        $OfficeID = $_SESSION["OfficeID"];



        $query_update_contractor = "UPDATE tbl_contractor
                 SET ContractorName = '{$contractor_name}',
                        ContractorMD = '{$contractor_md}',
                        BIN = '{$bin}',
                        OfficeID = '{$OfficeID}',
                        YearOfEstablishment = '{$year_of_establishment}',
                        TIN = '{$tin}',
                        NatureOfBusiness = '{$nature_of_business}',
                        LicenseCategory = '{$license_category}',
                        OfficeAddress = '{$office_address}',
                        Phone = '{$phone}',
                        Mobile = '{$mobile}',
                        EmailAddress = '{$email_address}',
                        LicenseSLNO = '{$license_slno}',
                        LicenseUnderDiv = '{$license_under_div}',
                        YearOfEnlishment = '{$year_of_enlishment}',
                        WorkExperience = '{$work_experience}',
                        ExperienceCertificate = '{$experience_certificate}'
                     WHERE id = $msg5" ;


        $update_contractor = mysqli_query($conn, $query_update_contractor);

        header("Location: home.php?msg=noofcontractors");

    }

?>


  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <?php
            //foreach($result as $project)
            //{
        ?>

  <!-- Modal -->
  <!-- <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog"> -->
    
      <!-- Modal content-->
      <!-- <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> -->
  


<?php //} 

 ?>