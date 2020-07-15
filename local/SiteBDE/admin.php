<!DOCTYPE html>
<?php
session_start()
?>
<html>
<meta charset="utf-8">
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Création d'évènement</title>
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
                <li><a href="admin.php">Créer événement</a></li>
                <li><a href="newsletter.php">Envoyer mail</a></li>
                <li><a href="listeInscript.php">Inscription</a></li>
                <li><a href="userAccount.php?logoutSubmit=1">Logout</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php
 if ($_SESSION['sessData']['status']['type'] != 'success')
 {
  header("Location: connexion.php");
}
?>
    <div class="inner1">
      <div class="formulaire_event">
        <div class="temoignage-content1">
          <h2 class="titre1">Créer évènement</h2>
          <div class="resume">
            <p>
              <form method="post" action="">
                <label>Nom de l'évènement : </label>
                <input type="text" name="nom_event" required><br>
                <label>Lieu de l'évènement : </label>
                <input type="text" name="lieu_event" required><br>
                <label>Date de l'évènement :</label>
                <input type=date name="date_event" required><br>
                <p>Description évènement : </p>
                <textarea name="description_event" rows="5" cols="40"></textarea><br><br>
                <input type="submit" name="envoyer" value="Envoyer">
              </form>
            </p>
          </div>
        </div>
      </div>
    </div>
        <?php
        require("dbconnect.php");
        if (isset($_POST['envoyer'])) {
          if (!empty($_POST)) {
            $nom_event = (isset($_POST['nom_event'])? $_POST['nom_event']:'');
            $lieu_event = (isset($_POST['lieu_event'])? $_POST['lieu_event']:'');
            $date_event = (isset($_POST['date_event'])? $_POST['date_event']:'');
            $description_event = (isset($_POST['description_event'])? $_POST['description_event']:'');
            $SQLQuery = 'INSERT INTO evenement(nom_event,lieu_event,date_event,description_event) ';
            $SQLQuery .= "VALUES('$nom_event', '$lieu_event', '$date_event', '$description_event'); ";
            $dbConn->query($SQLQuery);
          }
        }
        ?>
</body>
</html>
