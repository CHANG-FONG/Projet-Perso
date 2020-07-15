<?php

$dbconn = new PDO('mysql:host=localhost;port=3309;charset=utf8;dbname=inscription', 'root', 'root');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
		
		$mail = new PHPMailer;
		$mail->CharSet = 'UTF-8';
		$mail->isSMTP();
		$mail->SMTPDebug = 2;
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;


		//------------------------------------------
		//Votre adresse gmail
		$mail->Username = "thierry.changf@gmail.com";

		//Votre mot de passe Google
		$mail->Password = "lordTango974";

		//Que voyent les destinataires
		$mail->setFrom('thierry.changfong@epsi.fr','Thierry');
		//------------------------------------------
		$SQLQuery = 'SELECT id, email, recunews FROM detail WHERE recunews = 1';
		$SQLResult = $dbConn->query($SQLQuery);

			while ($SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC)) {
				$mail->addAddress($SQLRow['email']);
			}

		$mail->isHTML(true);
		$mail->Subject = $sujet;
		$mail->Body    = $corp;

		if (!$mail->send()) {
		    echo "Mailer Error ";
		} else {
			header("Location: envoinews.php");
		    echo "Message sent!";
			}
		
?>


	
