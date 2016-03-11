<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Questionnaire interactif en jQuery</title>
  </head>
  
  <body>
    <form>
    <a href="">Tester les r�ponses</a>

    <div class="question">
      <div class="texte">
        <h2>Question 1</h2>
          Le code jQuery s'ex�cute :<br>
          <input type="radio" id="r1" name="q1">Dans le navigateur<br>
          <input type="radio" id="r2" name="q1">Sur le serveur o� est stock� le code<br>
        <input type="radio" id="r3" name="q1">Tant�t dans le navigateur, tant�t sur le serveur<br>
        <br><span class="reponse" id="reponse1">Le code jQuery n'est autre que du JavaScript. � ce titre, il s'ex�cute toujours sur les clients (ordinateurs, tablettes et t�l�phones) qui font r�f�rence � ce code via une page HTML. La bonne r�ponse est donc la premi�re.</span>
      </div>  
      <img id="img1" src="question.png" />
    </div>

    <div class="question">
      <div class="texte">
        <h2>Question 2</h2>
        Lorsque l'on veut ex�cuter du code jQuery, attendre la disponibilit� du DOM est :<br>
        <input type="radio" id="r4" name="q2">Vital<br>
        <input type="radio" id="r5" name="q2">Inutile<br>
        <input type="radio" id="r6" name="q2">Parfois important, parfois sans importance<br>
        <br><span class="reponse" id="reponse2">Il est imp�ratif d'attendre la disponibilit� du DOM avant d'ex�cuter du code jQuery. Sans quoi, ce code pourrait s'appliquer � un �l�ment indisponible et provoquer un comportement inattendu, voire m�me un plantage du navigateur.</span>
      </div>
      <img id="img2" src="question.png" />
    </div>

    <div class="question">
      <div class="texte">
        <h2>Question 3</h2>
        Pour cha�ner deux m�thodes jQuery :<br>
        <input type="radio" id="r7" name="q3">Il faut les mettre l'une � la suite de l'autre en les s�parant par une virgule<br>
        <input type="radio" id="r8" name="q3">Il faut les mettre l'une � la suite de l'autre en les s�parant par un point d�cimal<br>
        <input type="radio" id="r9" name="q3">Il est impossible de cha�ner deux m�thodes jQuery<br>
        <br><span class="reponse" id="reponse3">L'ex�cution d'un s�lecteur jQuery produit un objet jQuery sur lequel il est possible d'appliquer une m�thode jQuery. Cette m�thode produit elle-m�me un objet jQuery. Il est donc possible de lui appliquer une autre m�thode en utilisant le caract�re de liaison habituel : le point d�cimal.</span>
      </div>  
      <img id="img3" src="question.png" />
    </div>
    <div class = "test">
    	<input type="radio" id="id" name="q3">Il faut les mettre l'une � la suite de l'autre en les s�parant par une virgule<br>
    </div>
    </form>
    
    <script src="jquery.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
      $(function() {
        // Dissimulation des r�ponses
        $('.reponse').hide();
        
        // Mise en forme des div du QCM
        var q = $('.question');
        q.css('background', '#9EEAE0');
        q.css('border-style', 'groove');
        q.css('border-width', '4px');
        q.css('width', '900px');
        q.css('height', '250px');
        q.css('margin', '20px');

        $('.texte').css('float', 'left');
        $('.texte').css('width', '90%');
        $('img').css('float', 'right');
        $('img').css('margin-top', '80px');

        $(".test").hide();
        //t.hide();
        
        // Action au survol du lien � Tester les r�ponses �
        $('a').hover(
          function() { 
            $('.reponse').show();
            if ($(':radio[id="r1"]:checked').val()) {
              $('#img1').attr('src', 'bon.png'); 
              $('#reponse1').css('color', 'green');
            }  
            else {
              $('#img1').attr('src', 'mauvais.png');
              $('#reponse1').css('color', 'red');
            } 
            if ($(':radio[id="r4"]:checked').val()) {
              $('#img2').attr('src', 'bon.png');
              $('#reponse2').css('color', 'green');
            }
            else {
              $('#img2').attr('src', 'mauvais.png');
              $('#reponse2').css('color', 'red');
            } 
            if ($(':radio[id="r8"]:checked').val()) {
              $('#img3').attr('src', 'bon.png'); 
              $('#reponse3').css('color', 'green');
            }
            else {
              $('#img3').attr('src', 'mauvais.png');
              $('#reponse3').css('color', 'red');
            }
          },
          function() { 
            $('.reponse').hide(); 
            $('img').each(function() {
              $(this).attr('src', 'question.png');
          });
}

        );  
      }); 
    </script>    
  </body>
</html>