<!DOCTYPE html>
	<html>
		<head>
			<title></title>
			<meta charset="utf-8">

		</head>
		<body>
			<form method="post" action="reception.php" enctype="multipart/form-data">
				<label for="icone">Icône du fichier (JPG, PNG OU GIF/ max. 20 Ko) </label><br>
				<input type="file" name="icone" id="icone"><br>

				<label for="mon_ficier">Fichier (tous les formats/ max. 1Mo)</label><br>
				<input type="hidden" name="MAX_FILE8_SIZE" value="1048576">
				<input type="file" name="mon_fichier" id="mon_fichier"><br>
				

				<label for="titre">Titre du fichier (max. 50 caractères):</label><br>
				<input type="text" name="titre" id="titre" value="Titre du ficher"><br>

				<label for="description">Description de votre fichier (max. 255 caractères):</label><br>
				<textarea name="description" id="description"></textarea><br>

				<input type="submit" name="submit"  value="Envoyer"><br>


				
			</form>

		</body>
	</html>