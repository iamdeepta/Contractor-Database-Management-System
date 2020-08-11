<?php

session_start();

/*insert into contract*/
if (isset($_POST['change_pass']) && $_SESSION["flag"] == "ok") {

	require("config/json_db.php");

        $current_pass = md5($_POST["current_pass"]);
        $new_pass = md5($_POST["new_pass"]);
        $confirm_pass = md5($_POST["confirm_pass"]);

        $user_id = $_SESSION["UserID"];
        $OfficeID = $_SESSION["OfficeID"];

        $data = getJSON("SELECT * FROM genuser where UserID = $user_id");
        $result = json_decode($data, true);
        

        foreach($result as $user)
    {

        if ($current_pass == $user['GenPassword']) {

            if ($new_pass == $confirm_pass) {

                if ($new_pass != $user['GenPassword']) {
  

        $database = new Database\Database;
        $connection = $database->connect();


        $change_pass_query = "UPDATE genuser 
                    SET 
                        GenPassword = '{$new_pass}'

                        WHERE UserID = $user_id
                      
                ";

        $change_pass = $connection->query($change_pass_query);


    //}



        /*$lastID = $connection->lastInsertID();
        $contract_id=$lastID;*/
    $msg_change_pass = "Password has been changed successfully!";
    header("Location: change_pass.php?msg=".$msg_change_pass);

}else{

    $msg_old_repeat_pass = "You entered an old password as a new password.";
    header("Location: change_pass.php?msg_old_repeat_error=".$msg_old_repeat_pass);
}

}else{

    $msg_confirm_pass = "Passwords did not match! Try again.";
    header("Location: change_pass.php?msg_confirm_error=".$msg_confirm_pass);
}



}else{

    $msg_current_pass = "Current password is wrong!";
    header("Location: change_pass.php?msg_current_error=".$msg_current_pass);
}

}

}