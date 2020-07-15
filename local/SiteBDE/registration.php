<link rel="stylesheet" type="text/css" href="styles.css">
<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<div class="container">
    <h2>Créer un nouveau compte</h2>
    <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
    <div class="regisFrm">
        <form action="userAccount.php" method="post">
            <input type="text" name="nom" placeholder="NOM" required="">
            <input type="text" name="prenom" placeholder="PRÉNOM" required="">
            <input type="email" name="email" placeholder="EMAIL" pattern=".+@epsi.fr" size="30" required>
            <input type="password" name="password" placeholder="MOT DE PASSE" required="">
            <input type="password" name="confirm_password" placeholder="CONFIRMEZ LE MOT DE PASSE" required="">
            <div class="send-button">
              <input type="submit" name="signupSubmit" value="CRÉER UN COMPTE">
            </div>
        </form>
    </div>
</div>
