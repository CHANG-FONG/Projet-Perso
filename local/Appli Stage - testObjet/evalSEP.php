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

	<title>Evaluation savoir-être</title>

	<link rel="stylesheet" type="text/css" href="evalSEP.css">
</head>
<body>
	<div id="top">
		<div class="header">
			<header class="h1">Partie 1 : Savoir-être professionnel
			</header>
      <button name="verif" id="headerRight" type="button" class="btn btn-primary btn-lg">Page suivante</button>
    
		</div>
	</div>
<form name="formgeneral" method="post" action="envoiEvalSE.php?id=<?php print($_SESSION['id']); ?>&idstagiaire=<?php print($_SESSION['idstagiaire']); ?>">
	<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Aptitude</th>
      <th scope="col">Sans objet</th>
      <th scope="col">Insuffisant</th>
      <th scope="col">Satisfaisant</th>
      <th scope="col">Supérieur aux attentses</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Faire preuve de discernement</th>
      	<td><input type="radio" name="A_1" value="1"></td>
      	<td><input type="radio" name="A_1" value="2"></td>
      	<td><input type="radio" name="A_1" value="3"></td>
      	<td><input type="radio" name="A_1" value="4"></td>
    </tr>
    <tr>
      <th scope="row">Se remettre en cause (humilité)</th>
        <td><input type="radio" name="A_2" value="1"></td>
        <td><input type="radio" name="A_2" value="2"></td>
        <td><input type="radio" name="A_2" value="3"></td>
        <td><input type="radio" name="A_2" value="4"></td>
    </tr>
    <tr>
      <th scope="row">Rester maître de soi</th>
        <td><input type="radio" name="A_3" value="1"></td>
        <td><input type="radio" name="A_3" value="2"></td>
        <td><input type="radio" name="A_3" value="3"></td>
        <td><input type="radio" name="A_3" value="4"></td>
    </tr>
    <tr>
      <th scope="row">Être ouvert au changement</th>
        <td><input type="radio" name="A_4" value="1"></td>
        <td><input type="radio" name="A_4" value="2"></td>
        <td><input type="radio" name="A_4" value="3"></td>
        <td><input type="radio" name="A_4" value="4"></td>
    </tr>
    <tr>
      <th scope="row">Être positif</th>
        <td><input type="radio" name="A_5" value="1"></td>
        <td><input type="radio" name="A_5" value="2"></td>
        <td><input type="radio" name="A_5" value="3"></td>
        <td><input type="radio" name="A_5" value="4"></td>
    </tr>
    <tr>
      <th scope="row">Avoir une tenue et une attitude professionnelle</th>
      
        <td><input type="radio" name="A_6" value="1"></td>
        <td><input type="radio" name="A_6" value="2"></td>
        <td><input type="radio" name="A_6" value="3"></td>
        <td><input type="radio" name="A_6" value="4"></td>
      
    </tr>
  </tbody>
</table>
<!-- Responsabilité -->
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Responsabilités</th>
      <th scope="col">Sans objet</th>
      <th scope="col">Insuffisant</th>
      <th scope="col">Satisfaisant</th>
      <th scope="col">Supérieur aux attentes</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">S'organiser, gérer son temps et les priorités</th>
      
        <td><input type="radio" name="R_1" value="1"></td>
        <td><input type="radio" name="R_1" value="2"></td>
        <td><input type="radio" name="R_1" value="3"></td>
        <td><input type="radio" name="R_1" value="4"></td>
      
    </tr>
    <tr>
      <th scope="row">Atteindre ses objectifs</th>
      
        <td><input type="radio" name="R_2" value="1"></td>
        <td><input type="radio" name="R_2" value="2"></td>
        <td><input type="radio" name="R_2" value="3"></td>
        <td><input type="radio" name="R_2" value="4"></td>
      
    </tr>
    <tr>
      <th scope="row">Anticiper</th>
      
        <td><input type="radio" name="R_3" value="1"></td>
        <td><input type="radio" name="R_3" value="2"></td>
        <td><input type="radio" name="R_3" value="3"></td>
        <td><input type="radio" name="R_3" value="4"></td>
      
    </tr>
    <tr>
      <th scope="row">S'affirmer</th>
      
        <td><input type="radio" name="R_4" value="1"></td>
        <td><input type="radio" name="R_4" value="2"></td>
        <td><input type="radio" name="R_4" value="3"></td>
        <td><input type="radio" name="R_4" value="4"></td>
      
    </tr>
    <tr>
      <th scope="row">Prendre le leadership</th>
      
        <td><input type="radio" name="R_5" value="1"></td>
        <td><input type="radio" name="R_5" value="2"></td>
        <td><input type="radio" name="R_5" value="3"></td>
        <td><input type="radio" name="R_5" value="4"></td>
      
    </tr>
  </tbody>
</table>
<!-- Relation -->
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Relations</th>
      <th scope="col">Sans objet</th>
      <th scope="col">Insuffisant</th>
      <th scope="col">Satisfaisant</th>
      <th scope="col">Supérieur aux attentes</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Être à l'écoute</th>
      
        <td><input type="radio" name="Re_1" value="1"></td>
        <td><input type="radio" name="Re_1" value="2"></td>
        <td><input type="radio" name="Re_1" value="3"></td>
        <td><input type="radio" name="Re_1" value="4"></td>
      
    </tr>
    <tr>
      <th scope="row">S'intégrer, travailler en équipe</th>
    
        <td><input type="radio" name="Re_2" value="1"></td>
        <td><input type="radio" name="Re_2" value="2"></td>
        <td><input type="radio" name="Re_2" value="3"></td>
        <td><input type="radio" name="Re_2" value="4"></td>
      
    </tr>
    <tr>
      <th scope="row">Être disponible</th>
      
        <td><input type="radio" name="Re_3" value="1"></td>
        <td><input type="radio" name="Re_3" value="2"></td>
        <td><input type="radio" name="Re_3" value="3"></td>
        <td><input type="radio" name="Re_3" value="4"></td>
      
    </tr>
    <tr>
      <th scope="row">Se faire comprendre</th>
      
        <td><input type="radio" name="Re_4" value="1"></td>
        <td><input type="radio" name="Re_4" value="2"></td>
        <td><input type="radio" name="Re_4" value="3"></td>
        <td><input type="radio" name="Re_4" value="4"></td>
      
    </tr>
    <tr>
      <th scope="row">Communiquer (savoir trouver les mots)</th>
      
        <td><input type="radio" name="Re_5" value="1"></td>
        <td><input type="radio" name="Re_5" value="2"></td>
        <td><input type="radio" name="Re_5" value="3"></td>
        <td><input type="radio" name="Re_5" value="4"></td>
      
    </tr>
    <tr>
      <th scope="row">Savoir répondre</th>
      
        <td><input type="radio" name="Re_6" value="1"></td>
        <td><input type="radio" name="Re_6" value="2"></td>
        <td><input type="radio" name="Re_6" value="3"></td>
        <td><input type="radio" name="Re_6" value="4"></td>
      
    </tr>
  </tbody>
</table>
<!-- Action -->
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Action</th>
      <th scope="col">Sans objet</th>
      <th scope="col">Insuffisant</th>
      <th scope="col">Satisfaisant</th>
      <th scope="col">Supérieur aux attentes</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Analyser, comprendre</th>
        <td><input type="radio" name="Ac_1" value="1"></td>
        <td><input type="radio" name="Ac_1" value="2"></td>
        <td><input type="radio" name="Ac_1" value="3"></td>
        <td><input type="radio" name="Ac_1" value="4"></td>
    </tr>
    <tr>
      <th scope="row">Être force de proposition</th>
        <td><input type="radio" name="Ac_2" value="1"></td>
        <td><input type="radio" name="Ac_2" value="2"></td>
        <td><input type="radio" name="Ac_2" value="3"></td>
        <td><input type="radio" name="Ac_2" value="4"></td>
    </tr>
    <tr>
      <th scope="row">Agir, être réactif, proactif</th>
        <td><input type="radio" name="Ac_3" value="1"></td>
        <td><input type="radio" name="Ac_3" value="2"></td>
        <td><input type="radio" name="Ac_3" value="3"></td>
        <td><input type="radio" name="Ac_3" value="4"></td>
    </tr>

    <tr>
      <th scope="row">Être acteur de l'entreprise</th>
        <td><input type="radio" name="Ac_4" value="1"></td>
        <td><input type="radio" name="Ac_4" value="2"></td>
        <td><input type="radio" name="Ac_4" value="3"></td>
        <td><input type="radio" name="Ac_4" value="4"></td>
    </tr>
    
    <tr>
      <th scope="row">S'adapter, crée, innover</th>
      
        <td><input type="radio" name="Ac_5" value="1"></td>
        <td><input type="radio" name="Ac_5" value="2"></td>
        <td><input type="radio" name="Ac_5" value="3"></td>
        <td><input type="radio" name="Ac_5" value="4"></td>
    </tr>

    <tr>
      <th scope="row">Savoir s'organiser pour agir vite</th>
      
        <td><input type="radio" name="Ac_6" value="1"></td>
        <td><input type="radio" name="Ac_6" value="2"></td>
        <td><input type="radio" name="Ac_6" value="3"></td>
        <td><input type="radio" name="Ac_6" value="4"></td>
      
       </tr>
      </tbody>
     </table>
  </form>
<?php
include ('jqueryVersion/script341.js');
?>
  <script>
    $(document).ready(function(){
      $("#headerRight").click(function(){
        $("input[name=A_1]:checked").add("input[name=A_2]:checked").add("input[name=A_3]:checked").add("input[name=A_4]:checked").add("input[name=A_5]:checked").add("input[name=A_6]:checked").add("input[name=R_1]:checked").add("input[name=R_2]:checked").add("input[name=R_3]:checked").add("input[name=R_4]:checked").add("input[name=R_5]:checked").add("input[name=Re_1]:checked").add("input[name=Re_2]:checked").add("input[name=Re_3]:checked").add("input[name=Re_4]:checked").add("input[name=Re_5]:checked").add("input[name=Re_6]:checked").add("input[name=Ac_1]:checked").add("input[name=Ac_2]:checked").add("input[name=Ac_3]:checked").add("input[name=Ac_4]:checked").add("input[name=Ac_5]:checked").add("input[name=Ac_6]:checked").each(function(){console.log($(this).attr('value'))
          });

var a_1 = $("input[name=A_1]:checked").length;
var a_2 = $("input[name=A_2]:checked").length;
var a_3 = $("input[name=A_3]:checked").length;
var a_4 = $("input[name=A_4]:checked").length;
var a_5 = $("input[name=A_5]:checked").length;
var a_6 = $("input[name=A_6]:checked").length;

var r_1 = $("input[name=R_1]:checked").length;
var r_2 = $("input[name=R_2]:checked").length;
var r_3 = $("input[name=R_3]:checked").length;
var r_4 = $("input[name=R_4]:checked").length;
var r_5 = $("input[name=R_5]:checked").length;

var re_1 = $("input[name=Re_1]:checked").length;
var re_2 = $("input[name=Re_2]:checked").length;
var re_3 = $("input[name=Re_3]:checked").length;
var re_4 = $("input[name=Re_4]:checked").length;
var re_5 = $("input[name=Re_5]:checked").length;
var re_6 = $("input[name=Re_6]:checked").length;

var ac_1 = $("input[name=Ac_1]:checked").length;
var ac_2 = $("input[name=Ac_2]:checked").length;
var ac_3 = $("input[name=Ac_3]:checked").length;
var ac_4 = $("input[name=Ac_4]:checked").length;
var ac_5 = $("input[name=Ac_5]:checked").length;
var ac_6 = $("input[name=Ac_6]:checked").length;

  if (a_1 == 0 || a_2 == 0 || a_3 == 0 || a_4 == 0 || a_5 == 0 || a_6 == 0 || r_1 == 0 || r_2 == 0 || r_3 == 0 || r_4 == 0 || r_5 == 0 || re_1 == 0 || re_2 == 0 || re_3 == 0 || re_4 == 0 || re_5 == 0 || re_6 == 0 || ac_1 == 0 || ac_2 == 0 || ac_3 == 0 || ac_4 == 0 || ac_5 == 0 || ac_6 == 0) {
    alert("Vous n'avez pas selectionner un (ou des) élément(s)");
  }else{
    $("form[name=formgeneral]").submit();
  }
      });
    });
  </script>
</body>
</html>