<!DOCTYPE html>
	<html>
		<head>
			<title>Envoyer une image</title>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<style type="text/css">
				label{
						display: block;
						width: 150px;
						float: left;
				}
			</style>
		</head>
		<body>
				
			<?php

				if (isset($_POST['validation'])) {
						if (! is_uploaded_file($_FILES['image']['tmp_name'])) 
							echo 'un problème est survenu durant l opération. Veuillez réessayer!';
							else{
								$extensions = array('/png', '/gif', '/jpg', '/jpeg');
								$extension = strrchr($_FILES['image']['type'], '/');
								if (!in_array($extension, $extensions)) 
									echo 'vous devez uploader un fichier de type png, gif, jpg, jpeg.';
								else{
									define('MAXSIZE', 300000);
									if ($_FILES['image']['size'] > MAXSIZE) 
										echo'Votre image est supérieure à la taille maximale de '.MAXSIZE.' octets';
									else{
										try{
											$bdd = new PDO('mysqli:host; dbname=test', 'root', '');
										} catch(Exception $e) {
												exit('Erreur : ' .$e->getMessage());
											}
										$image = file_get_contents($FILES['image']['tmp_name']);
										$req = $bdd->prepare ("INSERT INTO images(nom, description,img, extension) VALUES(:nom, :description, :image, :type)");
										$req->execute(array(
											'nom'=>$_POST['nom'],
											'description'=>$_POST['description'],
											'image'=>$image,
											'type'=>$_FILES['image']['type']
										));
										echo 'L\'insertion s est bien déroulée!';
									}	
								}
							}
				}
			  ?>



				<h1>Envoyer une image</h1>
				<form enctype="multipart/form-data" action="traitement.php" method="post">
					<p>
						<label for="nom">Nom:</label><input type="text" name="nom" id="nom"><br>
						<label for="description">Description:</label><textarea name="description" id="description" rows="10" cols="50"></textarea><br>
						<label for="image">Image:</label><input type="file" name="image" id="image"><br>
						<label for="validation">Valider :</label><input type="submit" name="validation" id="validation" value="Envoyer">
					</p>
					
				</form>
		</body>
	</html>