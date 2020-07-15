<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Accueil</title>
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
                                <li><a href="index.php">accueil</a></li>
                                <li><a href="listing.php">Liste des évènements</a></li>
                                <li><a href="admin.php">Membres BDE</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="inner2">
        <div class="formulaire_event1">
            <div class="temoignage-content2">
                <h2 class="titre1">Bienvenue sur le BDE EPSI Bordeaux</h2>
                <br><br><br>
                <div class="resume">Sur le site vous trouverez tous les évènements à venir ainsi que la possibilité de vous y inscrire. En vous inscrivant aux évènements vous pourrez recevoir des mails pour être informé(e) de leurs avancements.<br><br><br><br> Vous pouvez aussi nous retrouvez sur notre page Facebook.<br><br><a href="https://www.facebook.com/bdeswipe/"><img src="facebook.png"></a>
                    <form method="post" action="">
                        <br><br> Entrer votre adresse mail EPSI pour recevoir des newsletters : <br><br>
                        <input type="email" name="email" placeholder="Adresse mail" pattern=".+@epsi.fr" required> <br>
                        <button type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
			<?php
      if (!empty($_POST)) {
        require("dbconnect.php");
				if(isset($_POST['email'])){
					$email = $_POST['email'];
          $SQLQuery = "SELECT * FROM newsletters WHERE email='$email'";
          $SQLResult = $dbConn->query($SQLQuery);
            if ($SQLResult->rowCount() == 0) {
              $SQLQuery = 'INSERT INTO newsletters(email)';
              $SQLQuery .= "VALUES('$email')";
              $dbConn->query($SQLQuery);
            }
				}
        if(isset($_POST['remove'])){
          $remove=$_POST['remove'];
          $SQLQuery = "DELETE FROM newsletters WHERE email='$remove'";
        }
        $SQLResult->closeCursor();
      }
      ?>
        </div>
    </div>
</body>
</html>
