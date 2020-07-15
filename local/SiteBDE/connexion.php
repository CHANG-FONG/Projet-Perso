<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Connexion</title>
</head>
<body>
<header>
  <div class="inner">
    <div class="flex">
      <a class="logo" href="index.php"></a>
      <div class="bloc-menu">
        <span id="slogan">BDE EPSI BORDEAUX !</span>
        <div id="btn-menu"></div>
        <div id="zone-menu">
          <nav id="menu-h" class="menu-menu-principal-container">
            <ul id="menu-menu-principal" class="menu">
              <li><a href="index.php">Accueil</a></li>
              <li><a href="listing.php">Liste des évènements</a></li>
              <li><a href="admin.php">Membres BDE</a></li>
            <ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
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
    <?php
    if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
        include 'user.php';
        $user = new User();
        $conditions['where'] = array(
            'id' => $sessData['userID'],
        );
        $conditions['return_type'] = 'single';
        $userData = $user->getRows($conditions);
    ?>

    <a href="userAccount.php?logoutSubmit=1" class="logout">Logout</a>
    <div class="regisFrm">
    </div>

    <?php }else{ ?>
    <h2>Connectez-vous à votre compte</h2>
    <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
    <div class="regisFrm">
      <form action="userAccount.php" method="post">
        <input type="email" name="email" placeholder="EMAIL" required="">
        <input type="password" name="password" placeholder="MOT DE PASSE" required="">
        <div class="send-button">
          <input type="submit" name="loginSubmit" value="S'IDENTIFIER">
        </div>
      </form>
    </div>
    <?php } ?>
</div>
</body>
</html>
