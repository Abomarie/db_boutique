<?php include('connexion.php');
 ?>
 <center>
	<form action="addimage.php" method="post" >
	 	<label>lien de l'image</label>
	 	<input type="text" name="lienimage">
	 	<input type="submit" name="Envoyer image">
 	
 	</form>
 </center>
 <?php 
 	$require="SELECT * FROM images"
 	$reponse=mysqli_query($requete);
 	while $ligne=mysqli_fetch_array($reponse);
 	{
 ?>
 		<img src="<php echo $ligne['lien'] ?>"/>
 <?php 
 	}
 ?>
 		