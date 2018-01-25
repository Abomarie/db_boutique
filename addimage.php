<?php include('connexion.php');

$lienimg=$_POST['lienImage'];

$requete="INSERT INTO images(img) VALUES ('".$_POST['img']."')";
$reponse=mysql_query($requete);
 ?>