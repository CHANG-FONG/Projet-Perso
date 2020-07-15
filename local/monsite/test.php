<?php
		$dbConn = null;
		try{
			/*
			 * Ouverture de la connexion à la base de données
			 */
			$dbConn = new PDO('mysql:host=localhost;port=3306;charset=utf8;dbname=lol3', 'root', 'root');
		}catch (PDOException $ex){
			/*
			 * En cas d'erreur, gestion d'une exception (à voir plus tard)
			 */
			print($ex->getMessage('error'));
		}
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';

	$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
	$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
	$mail->SMTPDebug = 2;
//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "thierry.changf@gmail.com";
//Password to use for SMTP authentication
	$mail->Password = "lordTango974";
//Set who the message is to be sent from
	$mail->setFrom("thierry.changf@gmail.com");
	$mail->addAddress('thierry.changfong@epsi.fr');
//Set the subject line
	$mail->Subject = 'PHPMailer GMail SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

	$mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Here is the subject';
 	    $mail->Body   = 'This is the HTML message body <b>in bold!</b>';
 	    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

 	foreach ($SQLResult as $row) {
 		/*$mail->setFrom("thierry.changf@gmail.com");*/
    	$mail->addAddress($row['email']);
    		}

	if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
    echo "Message sent!";

	}
?>