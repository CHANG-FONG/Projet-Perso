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

			
		$mail->addAddress($_SESSION['email']);
		
		$mail->isHTML(true);
		$mail->Subject = "Confirmation d'email";
		$mail->Body    = '<html>
							<body>
								<div>
									<a href="maildevalidation.php">Confirmer les données</a>
								</div>
							</body>
						</html>';

		if (!$mail->send()) {
		    echo "Mailer Error ";
		} else {
			header("Location: inscription.php");
		    echo "Message sent!";
			}
		
?>