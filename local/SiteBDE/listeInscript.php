<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<?php
session_start();
?>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Liste des inscrits</title>
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
  <div style="margin-top: 1%">
    <form method="get">
      <label>Trier par:</label>
      <label>Date:</label>
      <input type="radio" name="quoi" value="date">
      <label>Nom:</label>
      <input type="radio" name="quoi" value="nom">
      <label>Lieu:</label>
      <input type="radio" name="quoi" value="lieu">
      <label>Montant:</label>
      <input type="radio" name="comment" value="asc">
      <label>Descendant:</label>
      <input type="radio" name="comment" value="desc">
      <label>Tout ?:</label>
      <input type="checkbox" name="afficher" value="tout">
      <button type="submit">Trier</button>
    </form>
  </div>
    <?php
		require("dbconnect.php");
    if(!empty($_GET)){
      $SQLQuery = 'SELECT id, nom_event, lieu_event, date_event FROM evenement ';
      if(isset($_GET['afficher'])){
        if($_GET['afficher']!='tout'){
          $SQLQuery .= 'WHERE date_event > NOW() ';

        }
      }
      if(isset($_GET['quoi'])){
        if($_GET['quoi']=='date'){
          $SQLQuery .= 'ORDER BY date_event ';
        }elseif ($_GET['quoi']=='nom') {
          $SQLQuery .= 'ORDER BY nom_event ';
        }elseif ($_GET['quoi']=='lieu') {
          $SQLQuery .= 'ORDER BY lieu_event ';}
      }else {
        $SQLQuery .= 'ORDER BY date_event ';}

      if(isset($_GET['comment'])){
        if($_GET['comment']=='asc'){
          $SQLQuery .= 'DESC';}
        elseif ($_GET['comment']=='desc') {
          $SQLQuery .= 'ASC';}
      }else{
        $SQLQuery .= 'DESC';}


    }else{
    $SQLQuery='SELECT id, nom_event, lieu_event, date_event, description_event FROM evenement WHERE date_event > NOW() ORDER BY date_event DESC';
    }
    $SQLResult = $dbConn->query($SQLQuery);
    //Lecture du résultat renvoyé par l'exécution précédente
    if ($SQLResult->rowCount() == 0) {
      print('<tr><td colspan="4">Aucun enregistrement ne correspond à la demande</td></tr>');
    } else {
      $script = '';
      while ($SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC)) {
        $SQLResult2 = $dbConn->query('SELECT email FROM inscrit WHERE id_event='.$SQLRow['id'].';');
        $emails='';

        foreach($SQLResult2 as $email){ $emails.= ' '.$email[0].' <b>|</b> '; }

        $script .= '<div class="inner">
        <div class="temoignage">
        <div class="temoignage-content">
        <h2 class="titre">'.$SQLRow['nom_event'].'</h2>
        <h3 class="titre sous-titre">'.$SQLRow['lieu_event'].'</h3>
        <h3 class="titre sous-titre">'.$SQLRow['date_event'].'</h3>
        <div class="resume"><p>'.$emails.'</p>';
        $script.='</form></div></div></div></div>';
      }
      print($script);
      //Fermeture de la requête pour libérer les ressources
      $SQLResult->closeCursor();
    }
    ?>
</body>
</html>
