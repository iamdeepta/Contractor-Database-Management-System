<?php
session_start();
include("config/connection.php");

    $username1 = $_POST["username"];

    
    $password = $_POST["pass"];
    $user_answer = $_POST["answer"];
    $pass = md5($password);
	
	

    $result = mysqli_query($conn, "SELECT ".DBPMS.".genuser.*, userofficelink.OfficeID, hrtoffice.OfficeName FROM ".DBPMS.".genuser
					LEFT join userofficelink on userofficelink.UserID=".DBPMS.".genuser.UserID 
					LEFT JOIN hrtoffice on hrtoffice.OfficeID=userofficelink.OfficeID WHERE ".DBPMS.".genuser.GenUserName='".$username1."'") or die(mysqli_error($conn));
	//$user=mysqli_fetch_array($result);

$username1 = strtolower(str_replace(' ','',$_POST["username"]));
	
    foreach ($result as $user) {

    $user['GenUserName'] = strtolower(str_replace(' ','',$user['GenUserName']));

    
        if($user['GenUserName'] == $username1 && $user['GenPassword'] == $pass && $_SESSION["answer"] == $user_answer)
        {
            $_SESSION["flag"]="ok";
			$_SESSION["UserID"] = $user['UserID'];
			$_SESSION["OfficeID"] = $user['OfficeID'];
			$_SESSION["OfficeName"] = $user['OfficeName'];
            $_SESSION["GenUserName"] = $username1;
            $_SESSION["FullName"] = $user['FullName'];
            //$_SESSION["privilege"] = $user['privilege'];
            header ("Location: home.php");

            }elseif ($user['GenUserName'] == $username1 && $user['GenPassword'] == $pass && $_SESSION["answer"] != $user_answer) {

                $_SESSION["flag"]="captcha";
           
            header ("Location: home.php");

            }elseif($user['GenUserName'] == $username1 && $user['GenPassword'] != $pass && $_SESSION["answer"] == $user_answer)  {

                $_SESSION["flag"]="error_pass";
            
            header ("Location: home.php");

            }elseif($user['GenUserName'] != $username1 && $user['GenPassword'] == $pass && $_SESSION["answer"] == $user_answer)  {

                $_SESSION["flag"]="error_username";
            
            header ("Location: home.php");

            }

        }

        

        /*else if ($user['username'] == $username && $user['password'] == $password && $user['privilege'] == "staff")
        {
            $_SESSION["flag"]="ok";
            $_SESSION["username"] = $username;
            $_SESSION["privilege"] = $user['privilege'];
            header ("Location: ../../resources/views/php/Logged_in_staff.php");
        }*/


    

     //echo "Please enter correct username or password<br/>";
     //echo "<a href='index.php'><button>Back</button></a><br/>";


    header("Location: home.php");
?>