<?php 
include ('connexionBDDstage.php');
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- css bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Bloc de compétences</title>

	<link rel="stylesheet" type="text/css" href="evalSEP.css">
  <style type="text/css">
    
.legende{
  color: white;
  font-family: fantasy;
  letter-spacing: 1px;
}

  </style>
</head>
<body>
	<div id="top">
		<div class="header">
			<header class="h1">Partie 2 : Compétences
			</header><br>
    <p class="legende">Niveau 0 : Compétence non démontrée</p>
    <p class="legende">Niveau 1 : Niveau de base / Compétence dont la connaissance est partielle - Pratique superficielle</p>
    <p class="legende">Niveau 2 : Niveau intermédiaire / Pratique correcte - Maitrise de l'attitude</p>
    <p class="legende">Niveau 3 : Niveau plus élevé / Pratique approfondie - Possibilité de pouvoir transmettre cette compétence à d'autres</p>
			<button name="verif" id="headerRight" type="button" class="btn btn-primary btn-lg">Valider</button>
			<a href="evalSEP.php?id=<?php print($_SESSION['id']); ?>">
			<button id="headerRight" type="button" class="btn btn-primary btn-lg">Retour</button>
			</a>
		</div>
	</div>
 <form name="formgeneral" method="post" action="envoiEvalComp.php?id=<?php print($_SESSION['id']); ?>&idstagiaire=<?php print($_SESSION['idstagiaire']); ?>">
	<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Bloc de compétence 1 - Développement d'applications informatiques</th>
      <th scope="col">0</th>
      <th scope="col">1</th>
      <th scope="col">2</th>
      <th scope="col">3</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">C11-Concevoir une solution algorithmique</th>
      	<td><input type="radio" id="11" name="Bl1_1" value="1"></td>
      	<td><input type="radio" id="12" name="Bl1_1" value="2"></td>
      	<td><input type="radio" id="13" name="Bl1_1" value="3"></td>
      	<td><input type="radio" id="14" name="Bl1_1" value="4"></td>
    </tr>
    <tr>
      <th scope="row">C12-Concevoir et développer une solution applicative objet</th>
        <td><input type="radio" id="21" name="Bl1_2" value="1"></td>
        <td><input type="radio" id="22" name="Bl1_2" value="2"></td>
        <td><input type="radio" id="23" name="Bl1_2" value="3"></td>
        <td><input type="radio" id="24" name="Bl1_2" value="4"></td>
    </tr>
    <tr>
      <th scope="row">C13-Créer du code avec l'intégration et la livraison continues</th>
        <td><input type="radio" id="31" name="Bl1_3" value="1"></td>
        <td><input type="radio" id="32" name="Bl1_3" value="2"></td>
        <td><input type="radio" id="33" name="Bl1_3" value="3"></td>
        <td><input type="radio" id="34" name="Bl1_3" value="4"></td>
    </tr>
  </tbody>
</table>
<!-- Responsabilité -->
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Bloc de compétence 2 - Administration Système & Réseau</th>
      <th scope="col">0</th>
      <th scope="col">1</th>
      <th scope="col">2</th>
      <th scope="col">3</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">C21-Administrer une infrastructure</th>
        <td><input type="radio" id="41" name="Bl2_1" value="1"></td>
        <td><input type="radio" id="42" name="Bl2_1" value="2"></td>
        <td><input type="radio" id="43" name="Bl2_1" value="3"></td>
        <td><input type="radio" id="44" name="Bl2_1" value="4"></td>
    </tr>
    
    <tr>
      <th scope="row">C22-Tester et mettre en production des ressources afin d'améliorer une solution d'infrastructure</th>
        <td><input type="radio" id="51" name="Bl2_2" value="1"></td>
        <td><input type="radio" id="52" name="Bl2_2" value="2"></td>
        <td><input type="radio" id="53" name="Bl2_2" value="3"></td>
        <td><input type="radio" id="54" name="Bl2_2" value="4"></td>
    </tr>
    
    <tr>
      <th scope="row">C23-Assurer le support aux utilisateurs et aux équipes techniques</th>
        <td><input type="radio" id="61" name="Bl2_3" value="1"></td>
        <td><input type="radio" id="62" name="Bl2_3" value="2"></td>
        <td><input type="radio" id="63" name="Bl2_3" value="3"></td>
        <td><input type="radio" id="64" name="Bl2_3" value="4"></td>
    </tr>
    
  </tbody>
</table>
<!-- Relation -->
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Bloc de compétence 3 - Gestion de données</th>
      <th scope="col">0</th>
      <th scope="col">1</th>
      <th scope="col">2</th>
      <th scope="col">3</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">C31-Concevoir une base de données et améliorer une base de données existante (via la rétro-conception)</th>
        <td><input type="radio" id="71" name="Bl3_1" value="1"></td>
        <td><input type="radio" id="72" name="Bl3_1" value="2"></td>
        <td><input type="radio" id="73" name="Bl3_1" value="3"></td>
        <td><input type="radio" id="74" name="Bl3_1" value="4"></td>
    </tr>
    <tr>
      <th scope="row">C32-Exploiter une base de données dans un environnement client serveur</th>
        <td><input type="radio" id="81" name="Bl3_2" value="1"></td>
        <td><input type="radio" id="82" name="Bl3_2" value="2"></td>
        <td><input type="radio" id="83" name="Bl3_2" value="3"></td>
        <td><input type="radio" id="84" name="Bl3_2" value="4"></td>
    </tr>
    <tr>
      <th scope="row">C33-Déployer, administer et sécuriser une base de données</th>
        <td><input type="radio" id="91" name="Bl3_3" value="1"></td>
        <td><input type="radio" id="92" name="Bl3_3" value="2"></td>
        <td><input type="radio" id="93" name="Bl3_3" value="3"></td>
        <td><input type="radio" id="94" name="Bl3_3" value="4"></td>
    </tr>
  </tbody>
</table>
<!-- Action -->
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Bloc de compétence 4 - Méthodes & projet</th>
      <th scope="col">0</th>
      <th scope="col">1</th>
      <th scope="col">2</th>
      <th scope="col">3</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">C41-Analyser les besoins clients et/ou utilisateurs</th>
        <td><input type="radio" id="101" name="Bl4_1" value="1"></td>
        <td><input type="radio" id="102" name="Bl4_1" value="2"></td>
        <td><input type="radio" id="103" name="Bl4_1" value="3"></td>
        <td><input type="radio" id="104" name="Bl4_1" value="4"></td>
    </tr>
    <tr>
      <th scope="row">C42-Planifier et suivre un projet informatique</th>
        <td><input type="radio" id="111" name="Bl4_2" value="1"></td>
        <td><input type="radio" id="112" name="Bl4_2" value="2"></td>
        <td><input type="radio" id="113" name="Bl4_2" value="3"></td>
        <td><input type="radio" id="114" name="Bl4_2" value="4"></td>
    </tr>
    <tr>
      <th scope="row">C43-identifier et exploiter les indicateurs financiers et législatifs pour mener à bien un projet informatique</th>
        <td><input type="radio" id="121" name="Bl4_3" value="1"></td>
        <td><input type="radio" id="122" name="Bl4_3" value="2"></td>
        <td><input type="radio" id="123" name="Bl4_3" value="3"></td>
        <td><input type="radio" id="124" name="Bl4_3" value="4"></td>
    </tr>
  </tbody>
</table>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Bloc de compétence 5 - Communication & veille technologipue</th>
      <th scope="col">0</th>
      <th scope="col">1</th>
      <th scope="col">2</th>
      <th scope="col">3</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">C51-Assurer une veille technologique pour garantir l'évolution de l'infrastructure et des applications</th>
        <td><input type="radio" id="131" name="Bl5_1" value="1"></td>
        <td><input type="radio" id="132" name="Bl5_1" value="2"></td>
        <td><input type="radio" id="133" name="Bl5_1" value="3"></td>
        <td><input type="radio" id="134" name="Bl5_1" value="4"></td>
    </tr>
    <tr>
      <th scope="row">C52-Communiquer à l'oral et par écrit en français et en anglais</th>
        <td><input type="radio" id="141" name="Bl5_2" value="1"></td>
        <td><input type="radio" id="142" name="Bl5_2" value="2"></td>
        <td><input type="radio" id="143" name="Bl5_2" value="3"></td>
        <td><input type="radio" id="144" name="Bl5_2" value="4"></td>
    </tr>
    <tr>
      <th scope="row">C53-Analyser et produire de la documentation technique en français</th>
        <td><input type="radio" id="151" name="Bl5_3" value="1"></td>
        <td><input type="radio" id="152" name="Bl5_3" value="2"></td>
        <td><input type="radio" id="153" name="Bl5_3" value="3"></td>
        <td><input type="radio" id="154" name="Bl5_3" value="4"></td>
    </tr>
  </tbody>
</form>
</table>
<div id="confirm">
  <p>Attention une fois envoyer vous ne pourez plus revenir en arrière, vérifiez donc bien</p>
  <button name="non_ok">Retour</button>
</div>
<?php
include ('jqueryVersion/script341.js');
?>

<script>
      function test(){
        var radios1 = document.getElementsByName('Bl1_1');
        for (i = 0; i < radios1.length; i++){
          if (radios1[i].checked){
            console.log(radios1[i].value);
          }
        }
      }

      $(document).ready(function(){
        $("#confirm").hide();

        $("#headerRight").click(function(){
          $("input[name=Bl1_1]:checked").add("input[name=Bl1_2]:checked").add("input[name=Bl1_3]:checked").add("input[name=Bl2_1]:checked").add("input[name=Bl2_2]:checked").add("input[name=Bl2_3]:checked").add("input[name=Bl3_1]:checked").add("input[name=Bl3_2]:checked").add("input[name=Bl3_3]:checked").add("input[name=Bl4_1]:checked").add("input[name=Bl4_2]:checked").add("input[name=Bl4_3]:checked").add("input[name=Bl5_1]:checked").add("input[name=Bl5_2]:checked").add("input[name=Bl5_3]:checked").each(function(){console.log($(this).attr('value'))
          });
          
var nbBl1 = $("input[name=Bl1_1]:checked").length;
var nbBl2 = $("input[name=Bl1_2]:checked").length;
var nbBl3 = $("input[name=Bl1_3]:checked").length;
var nbBl4 = $("input[name=Bl2_1]:checked").length;
var nbBl5 = $("input[name=Bl2_2]:checked").length;
var nbBl6 = $("input[name=Bl2_3]:checked").length;
var nbBl7 = $("input[name=Bl3_1]:checked").length;
var nbBl8 = $("input[name=Bl3_2]:checked").length;
var nbBl9 = $("input[name=Bl3_3]:checked").length;
var nbBl10 = $("input[name=Bl4_1]:checked").length;
var nbBl11 = $("input[name=Bl4_2]:checked").length;
var nbBl12 = $("input[name=Bl4_3]:checked").length;
var nbBl13 = $("input[name=Bl5_1]:checked").length;
var nbBl14 = $("input[name=Bl5_2]:checked").length;
var nbBl15 = $("input[name=Bl5_3]:checked").length;

          if (nbBl1 == 0 || nbBl2 == 0 || nbBl3 == 0 || nbBl4 == 0 || nbBl5 == 0 || nbBl6 == 0 || nbBl7 == 0 || nbBl8 == 0 || nbBl9 == 0 || nbBl10 == 0 || nbBl11 == 0 || nbBl12 == 0 || nbBl13 == 0 || nbBl14 == 0 || nbBl15 == 0){
            alert('Veillez cocher chaque ligne.');
          }else{
              //$("#confirm").show();
            $("form[name=formgeneral]").submit();
          }

          //Envoyer les données
          //$("form[name=formgeneral]").submit();
        });
      });

    </script>
</body>
</html>