<!DOCTYPE html>
<html>
<head>

    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
	<title></title>
</head>
<body>
 Collisions : <span id="info">0</span>
  <div id="jeu">
    <img id="fond1" class="fond" src="image/route.png">
    <img id="fond2" class="fond" src="image/route.png">
    <img id="lapin" src="image/lapin1.gif">
    <img id="vr" src="image/vr.png">
  </div>
  <audio preload="auto" id="son"><source src="son/manger.mp3" type="audio/mp3"><source src="son/manger.ogg" type="audio/ogg"></audio>
  <audio preload="auto" id="musique"><source src="son/musique.mp3" type="audio/mp3"><source src="son/musique.ogg" type="audio/ogg"></audio>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>
    $(function() {
      var ok = 1;
      function deplace()
      {
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
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>