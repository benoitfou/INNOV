<!DOCTYPE html>
<html>
<head>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
	<title>INNOV'UP</title>
</head>
<body>
<?php 

if (isset($_GET['logo'])) {
    $logo= $_GET['logo'];
}else{
    $logo=0;
}
 ?>
<div id="acceuilext">
<h1 id="titreEntreprise">Pick-up</h1>
<?php include 'acceuil.php'; ?>
<input id="divlogo" value="<?php echo $logo?>"></input>
 <center id="score">Score : <span id="info">0</span></center>
  <div id="jeu">

    <img id="fond1" class="fond" src="image/route.png">
    <img id="fond2" class="fond" src="image/route.png">
    <img id="lapin" src="image/lapin1.gif">

    <div id="vr" value=>
      <img id="vr1" src="image/logo1.png">
    </div>
  </div>
  <audio preload="auto" id="son"><source src="son/manger.mp3" type="audio/mp3"><source src="son/manger.ogg" type="audio/ogg"></audio>
  <center><audio controls loop preload="auto" id="musique"><source src="son/musique.mp3" type="audio/mp3"><source src="son/musique.ogg" type="audio/ogg"></audio></center><script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>






<script src="js/script.js">
  showJeu();
    $(function() {
      var ok = 1;
      function deplace()
      {
        var rdm = Math.floor((Math.random()*5)+1);
        document.getElementById('vr1').src="image/logo"+rdm+".png";
        $('#vr').animate({left: '-=1200'}, 2000, 'linear', function(){ //on peut augmenter la difficulté avec cette variable (2em)
          var vrX = Math.floor(Math.random()*450)+50;
          var vrY = 1100;
          $('#vr').css('left',vrY);
          $('#vr').css('top',vrX);
          ok = 1;
        });

        $('.fond').animate({left: '-=0'}, 2000, 'linear', function(){
          $('.fond').css('left',0);
          deplace();
        });
      };
	   
      $(document).keydown(function(e){
        if (e.which == 40)
        {
          vjX = parseInt($('#lapin').css('top'));
          if (vjX < 400)
          $('#lapin').css('top', vjX+30);
        }
        if (e.which == 38)
        {
          vjX = parseInt($('#lapin').css('top'));
          if (vjX > 20)
            $('#lapin').css('top', vjX-30);
        }
      });
      function collision()
      {
        vjX = parseInt($('#lapin').css('top'));
        vrX = parseInt($('#vr').css('top'));
        vjY = 10;
        vrY = parseInt($('#vr').css('left'));
        if (((vrX > vjX) && (vrX < (vjX+180)) && (vrY > vjY) && (vrY < (vjY+150)) && (ok == 1)) 
        || ((vjX > vrX) && (vjX < (vrX+66)) && (vrY > vjY) && (vrY < (vjY+150)) && (ok == 1)))
        {
          $('#son')[0].play();
          collision = parseInt($('#info').text()) + 1;
          $('#info').text(collision);
	  ok = 0;
        }
      }
      deplace();
      $('#musique')[0].play();
      setInterval(collision, 20);
    });
  </script>

    
</div>
<footer id="footer">Mentions legales</footer>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
</body>


</html>