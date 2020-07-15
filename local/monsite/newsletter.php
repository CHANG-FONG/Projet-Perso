<?php
		/*$dbConn = null;
		try{
			
			$dbConn = new PDO('mysql:host=localhost;port=3306;charset=utf8;dbname=lol3', 'root', 'root');
		}catch (PDOException $ex){
			
			print($ex->getMessage('error'));
		}*/
	?>

<!DOCTYPE html>
<html>
<head>
	<title>newlsetter</title>
</head>
<body>
	<ul>
		<li>Email</li>
		<input type="text" name="email">
	</ul>
		<textarea></textarea>
	<button type="ssl">send</button>


	<?php
		
		/*$SQLQuery = 'SELECT email';
		$SQLQuery .='FROM personne3';
		$SQLResult = $dbConn->query($SQLQuery);

		 while ($SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC)) {
		 	$subject = "";
		 	$to = 'thierry.changf@gmail.com';
		 	$subject = "My subject";
			$txt = "Hello world!";
			$headers = "From: fabienthierry974@gmail.com" . "\r\n" .;
				"CC:" . $SQLResult;

			mail($to,$subject,$txt);

			if (false == mail($to, $subject, $message)) {
				print("error in sendmail");
			}else{
				echo "1";
			}*/
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\Exception;

			require 'PHPMailerAutoload.php';
			require 'run.php';

			$mail = new PHPMailer;

			$mail->SMTPDebug = 3;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'Mailer');
			$mail->addAddress($_POST['email']);     // Add a recipient
			/*$mail->addAddress('ellen@example.com');*/               // Name is optional
			$mail->addReplyTo(EMAIL, 'Information');
			/*$mail->addCC('cc@example.com');
			$mail->addBCC('bcc@example.com');

			$mail->addAttachment('/var/tmp/file.tar.gz');*/         // Add attachments
			/*$mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = $_POST['subjetct'];
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = $_POST['message'];

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
		/*}*/
	?>

	
</body>
</html>
