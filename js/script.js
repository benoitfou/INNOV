 $("#acceuil").show();
 $("#jeu").hide();
  $("#divlogo").hide();
$("#footer").show();
$("#titreEntreprise").show();
$("#musique").hide();
$("#score").hide();

var logo = document.getElementById('divlogo').value;
 if ((logo==1) || (logo==2) || (logo==3) || (logo==4) || (logo==5))
 	{
        $("#acceuil").hide();
$("#jeu").show();
$("#footer").hide();
$("#titreEntreprise").hide();
$("#musique").show();
$("#score").show();
}