<?php

session_start();

//$email = $_GET['email'];


if (isset($_POST['reset_pass'])) {

	require("config/json_db.php");

        $pass1 = $_POST["pass1"];
        $pass2 = $_POST["pass2"];

        $password1 = md5($pass1);
        $password2 = md5($pass2);

        $data = getJSON("SELECT id,email FROM password_reset_temp order by id desc limit 1");
        $result = json_decode($data, true);
        

        foreach($result as $user)
    {

      $email = $user['email'];

    }

        if ($pass1==$pass2) {
        	
        	$database = new Database\Database;
        	$connection = $database->connect();


        	$passQuery = "UPDATE genuser 
                    SET 
                        GenPassword = '{$password1}'
                        WHERE Email = '$email'
                      
                      
                ";

        $pass_change = $connection->query($passQuery);



        $delete_query = "DELETE FROM password_reset_temp WHERE email = '$email'";

        $delete_row = $connection->query($delete_query);


//echo $passQuery;

        $msg = "Password has been successfully reset.";

    header('Location: index.php?msg_pass='.$msg);

    }else{

      //echo "Cannot be updated";

    	$msg = "Passwords are not matched! Please try again.";

    	header('Location: reset_pass.php?msg_pass_error='.$msg);
    }
    

}


?>