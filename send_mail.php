<?php

session_start();


if (isset($_POST['send_mail'])) {

	require("config/json_db.php");

        $email = $_POST["email"];
        $key = md5(uniqid(2418*2+$email));
        
        $data = getJSON("SELECT * FROM genuser ");
        $result = json_decode($data, true);


        foreach($result as $user)
    {

        if ($email==$user['Email']) {
        	
        	$database = new Database\Database;
        	$connection = $database->connect();


        	$Query = "INSERT INTO password_reset_temp 
                    SET 
                        `email` = '{$email}',
                        `token` = '{$key}'
                      
                      
                ";

        $send_mail = $connection->query($Query);



        $output='<p>Dear user,</p>';
				$output.='<p>Please click on the following link to reset your password.</p>';
				$output.='<p>-------------------------------------------------------------</p>';
				$output.='<p><a href="http://localhost/contractor_database_row/reset_pass.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">http://localhost/contractor_database_row/reset_pass.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
				$output.='<p>-------------------------------------------------------------</p>';
			
				$output.='<p>If you did not request this forgotten password email, no action 
				is needed, your password will not be reset. However, you may want to log into 
				your account and change your security password as someone may have guessed it.</p>';   	
				$output.='<p>Thanks,</p>';
				$output.='<p>Contractor Database & Management System</p>';
				$body = $output;

        $subject = "Password Recovery - PWD";

		$email_to = $email;
		$fromserver = "iamdeepta@gmail.com"; 
		require("PHPMailer/PHPMailerAutoload.php");
		/*$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host = "smtp.gmail.com"; // Enter your host here
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "iamdeepta@gmail.com"; // Enter your email here
		$mail->Password = "iamdeeptabarua"; //Enter your passwrod here
		$mail->Port = 587;
		$mail->IsHTML(true);
		$mail->From = "iamdeepta@gmail.com";
		$mail->FromName = "PWD Database Contractor";
		$mail->Sender = $fromserver; // indicates ReturnPath header
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->AddAddress($email_to);*/


		$mail = new PHPMailer();
		try{

      $mail->SMTPDebug = false;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'iamdeepta@gmail.com';
      $mail->Password = 'xxxxxxxxxxx';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;


      $mail->setFrom('iamdeepta@gmail.com', 'PWD Contractor Database');  //mail from
      $mail->AddAddress($email, 'User');  //mail to


      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body = $body;
      $mail->AltBody = strip_tags($body);

      $mail->send();


      echo 'Message has been sent';
    } catch(Exception $e){
      echo 'Message could not be sent, Mailer Error:', $mail->ErrorInfo;
    }


		/*if(!$mail->send()) {
    echo 'Message could not be sent. ';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    exit;

        }*/

        $msg = "Please check your mail!";

    header('Location: recover_email.php?msg='.$msg);

    }else{

    	$msg = "This email is not registered!";

    	header('Location: recover_email.php?msg1='.$msg);
    }
    

}

}


?>