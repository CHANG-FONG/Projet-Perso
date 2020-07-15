<?php
$subject='Newsletter';
$message='Venez sur le site !!!';
$subject = $_POST['subject'];
$message = $_POST['msg'];

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
$mail->Username = "xxx@gmail.com";

//Votre mot de passe Google
$mail->Password = "password";

//Que voyent les destinataires
$mail->setFrom('xxx@gmail.com','votre_nom');
//------------------------------------------

require("dbconnect.php");
$SQLQuery = 'SELECT email, id FROM newsletters';
$SQLResult = $dbConn->query($SQLQuery);

while ($SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC)) {
  $mail->addAddress($SQLRow['email']);
}
$SQLResult->closeCursor();

// adresse de test
//$mail->addAddress('yoann.thebault@epsi.fr');


$message.='<br><form action="index.php" method="post"><label>Votre Email :</label><input type="text" name="remove"><button type="submit">Résilier</button></form>';

$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body    = $message;
$mail->AltBody = 'INSTALL CHROME !!!!!!!'; //Format non supporté
$envoi='';
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    $envoi='error';
} else {
    echo "Message sent!";
    $envoi='ok';
};
print('<html><script>location.href="newsletter.php?envoi='.$envoi.'";</script></html>');
?>
