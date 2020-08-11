<?php

session_start();

/*insert into contract*/
if (isset($_POST['contract_submit']) && $_SESSION["flag"] == "ok") {

	require("config/connection.php");

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
    
    //for ($n=0;$n<count($_POST['contractor_id']);$n++){

    	 //$c_id = $_POST['contractor_id'][$n];
            //$c_share = $_POST['contractor_share'][$n];

         //$c_id = implode(",",$contractor_name);

         /*for ($i=0; $i <count($_POST['contractor_id']) ; $i++) { 
            $co_name[] = $_POST['contractor_id'][$i];
             $co_share[] = $_POST['contractor_share'][$i];


         }*/
         $c_id = implode(",",$contractor_name);
         $c_share = implode(",",$contractor_share);
         

          




        $contractQuery = "INSERT INTO tbl_contract 
                    SET 
                        `tender_no` = '{$tender_no}',
                        `ProjectID` = '{$project_name}',
                        `user_id` = '{$user_id}',
                        `OfficeID` = '{$OfficeID}',
                        `TenderName` = '{$tender_name}',
                        `official_estimate` = '{$official_cost}',
                        `contractor_id` = '{$c_id}',
                        `contractor_share` = '{$c_share}',
                        `contract_amount` = '{$contract_amount}',
                        `approveauth_id` = '{$approving_authority}',
                        `procurement_method` = '{$procurement_method}',
                        `procurement_category` = '{$procurement_type}',
                        `bill_paid` = '{$bill_paid}',
                        `financial_progress` = '{$financial_progress}',
                        `physical_progress` = '{$physical_progress}',
                        `DOA` = '{$approval_date}',
                        `NOA` = '{$noa_date}',
                        `DOCS` = '{$contract_signing_date}',
                        `WCD` = '{$completion_date}'
                      
                ";

        $contract = mysqli_query($conn, $contractQuery);


    //}



        /*$lastID = $connection->lastInsertID();
        $contract_id=$lastID;*/


	$msg_contract = "The contract has been added successfully!";
    //echo 'Inser successfully';
	header("Location: add_contract.php?msg=".$msg_contract);

}


/*insert into contractor*/
if (isset($_POST['contractor_submit']) && $_SESSION["flag"] == "ok") {


    require("config/connection.php");

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
        //$experience_certificate = $_POST["experience_certificate"];


        /*$database = new Database\Database;
        $connection = $database->connect();*/

        $user_id = $_SESSION["UserID"];
        $OfficeID = $_SESSION["OfficeID"];


         $img = '';

       
        //if (count($_FILES['student_image']['tmp_name'])>0) {
          if(is_array($_FILES)){
        
        //foreach ($_FILES['student_image']['tmp_name'] as $key => $image) {
        //for($n=0;$n<count($_FILES['student_image']['tmp_name']);$n++){
            $imageName1 = $_FILES['file']['name'];
            
            $imageTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];

            $fileExt = explode('.', $imageName1);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('pdf','jpeg','jpg');

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 9999999999999999999) {
                        $img .= $imageName1;

                        $directory = 'assets/pdf/';

                        $directory1 = 'assets/pdf/'.$img;

                        $result = move_uploaded_file($imageTmpName, $directory.$imageName1);


                        $contractorQuery = "INSERT INTO tbl_contractor 
                    SET 
                        `ContractorName` = '{$contractor_name}',
                        `ContractorMD` = '{$contractor_md}',
                        `BIN` = '{$bin}',
                        `OfficeID` = '{$OfficeID}',
                        `YearOfEstablishment` = '{$year_of_establishment}',
                        `TIN` = '{$tin}',
                        `NatureOfBusiness` = '{$nature_of_business}',
                        `LicenseCategory` = '{$license_category}',
                        `OfficeAddress` = '{$office_address}',
                        `Phone` = '{$phone}',
                        `Mobile` = '{$mobile}',
                        `EmailAddress` = '{$email_address}',
                        `LicenseSLNO` = '{$license_slno}',
                        `LicenseUnderDiv` = '{$license_under_div}',
                        `YearOfEnlishment` = '{$year_of_enlishment}',
                        `WorkExperience` = '{$work_experience}',
                        `ExperienceCertificate` = '{$directory1}'
                        
                ";

        //$contractor = $connection->query($contractorQuery);

        $contractor = mysqli_query($conn, $contractorQuery);


        $msg_contractor = "The contractor has been added successfully!";
    header("Location: add_contractor.php?msg=".$msg_contractor);

                        /*$lastID2 = $connection->lastInsertID();
                        $file_id=$lastID2;*/

                    } else{
                       
                    
                        $msg_file = "Your file is too large!";
                        header("Location: add_contractor.php?msg_error=".$msg_file);

                      
                    }
                } else{

                
            
                    $msg_file1 = "There was an error uploading file!";
                        header("Location: add_contractor.php?msg_error=".$msg_file1);

                   
                }
                
            } else{
               
            
                $msg_file2 = "You cannot upload this type of file!";
                header("Location: add_contractor.php?msg_error=".$msg_file2);

            
            }

        }
    //}
  


        /*$contractorQuery = "INSERT INTO tbl_contractor 
                    SET 
                        `ContractorName` = '{$contractor_name}',
                        `ContractorMD` = '{$contractor_md}',
                        `BIN` = '{$bin}',
                        `OfficeID` = '{$OfficeID}',
                        `YearOfEstablishment` = '{$year_of_establishment}',
                        `TIN` = '{$tin}',
                        `NatureOfBusiness` = '{$nature_of_business}',
                        `LicenseCategory` = '{$license_category}',
                        `OfficeAddress` = '{$office_address}',
                        `Phone` = '{$phone}',
                        `Mobile` = '{$mobile}',
                        `EmailAddress` = '{$email_address}',
                        `LicenseSLNO` = '{$license_slno}',
                        `LicenseUnderDiv` = '{$license_under_div}',
                        `YearOfEnlishment` = '{$year_of_enlishment}',
                        `WorkExperience` = '{$work_experience}',
                        `ExperienceCertificate` = '{$experience_certificate}'
                        
                ";


        $contractor = mysqli_query($conn, $contractorQuery);*/


	/*$msg_contractor = "The contractor has been added successfully!";
	header("Location: add_contractor.php?msg=".$msg_contractor);*/
}


/*insert into project*/
if (isset($_POST['project_submit']) && $_SESSION["flag"] == "ok") {

	require("config/connection.php");

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

        //$user_id = $_SESSION["UserID"];
        $OfficeID = $_SESSION["OfficeID"];

        //for ($n=0;$n<count($_POST['division_id']);$n++){

         //$div_id = $_POST['division_id'][$n];

        $div_id = implode(",",$division_id);

        $projectQuery = "INSERT INTO tbl_project_division 
                    SET 
                        `ProjectCode` = '{$project_code}',
                        `OfficeID` = '{$OfficeID}',
                        `ProjectName` = '{$project_name}',
                        `ProjectCost` = '{$project_cost}',
                        `MinistryID` = '{$ministry_name}',
                        `OrganizationID` = '{$org_name}',
                        `DurationStartDate` = '{$duration_start}',
                        `DurationEndDate` = '{$duration_end}',
                        `FundingTypeID` = '{$funding_type}',
                        `Status` = '{$project_status}',
                        `DivisionID` = '{$div_id}'
                       
                      
                ";

        //$project = $connection->query($projectQuery);

        $project = mysqli_query($conn, $projectQuery);

    //}


	$msg = "The project has been added successfully!";
	header("Location: add_project.php?msg=".$msg);
}

?>