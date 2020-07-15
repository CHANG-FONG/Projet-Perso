<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Envoi de Newsletter</title>
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
    <div class="main">
        <div id="changing1" style="">
            <form class="frmnews" action="scriptenvoi.php" method="post">
              <label for="subject" class="labtn">Sujet :</label>
              <input type="text" name="subject" id="subject" required>
              <label for="msg" class="labtn">Nouveau Message :</label>
              <textarea name="msg" id="msg"></textarea>
              <div>
                  <button type="button" onclick="lbc('msg','<b>','</b>')">Gras</button>
                  <button type="button" onclick="lbc('msg','<i>','</i>')">Italique</button>
                  <button type="button" onclick="lbc('msg','<ins>','</ins>')">Souligner</button>
                  <input type="color" id="color" onchange="lbc('msg','<font style=&quot color:'+document.getElementById('color').value+'&quot>','</font>')">
                  <button type="button" onclick="lbclien('msg','<a href=&quot http://','&quot >')">Lien</button>
                  <button type="button" onclick="lbc('msg','<br>','')">A la ligne</button>
              </div>
              <div class="labtn">
                  <button type="submit">envoyer</button>
              </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        // insert tag a before and i after, for the DOM object h, TextArea, Edit
        function lbc(h, a, i) { // helloacm.com
            var g = document.getElementById(h);
            g.focus();
            var c = g.scrollTop;
            var e = g.selectionStart;
            var f = g.selectionEnd;
            g.value = g.value.substring(0, g.selectionStart) + a + g.value.substring(g.selectionStart, g.selectionEnd) + i + g.value.substring(g.selectionEnd, g.value.length);
            g.selectionStart = e;
            g.selectionEnd = f + a.length + i.length;
            g.scrollTop = c;
        }
        function lbclien(h, a, i) {
            var g = document.getElementById(h);
            g.focus();
            var z = '</a>';
            var c = g.scrollTop;
            var e = g.selectionStart;
            var f = g.selectionEnd;
            var v = g.value.substring(g.selectionStart, g.selectionEnd)
            g.value = g.value.substring(0, g.selectionStart) + a + g.value.substring(g.selectionStart, g.selectionEnd) + i + v + z + g.value.substring(g.selectionEnd, g.value.length);
            g.selectionStart = e;
            g.selectionEnd = f + a.length + i.length + v.length;
            g.scrollTop = c;
        }
        <?php
        if(!empty($_GET)){
          if(isset($_GET['envoi'])){
            if($_GET['envoi']=='ok'){
              print('alert(\'Message envoyé !!\')');
            }else{
              print('alert(\'Une erreur est survenue !!\')');
            }
          }
        }
        ?>
    </script>
</body>

</html>
