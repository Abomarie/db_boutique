<!DOCTYPE html>
	<html>
		<head>
			<title>Ma galetie d'images</title>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<style type="text/css">
				body{width: 95%;
				}
				div{
					width: 22%;
					float: left;
					text-align: center;
					border: 1px solid black;
					margin: 5px;
					padding: 5px;
				}
				p{
					text-align: left;
				}
				a{
					color: #000000;
					text-decoration: none;
				}
			</style>
		</head>
		<body>
				<h1>Ma galerie d'images</h1>
				<?php
					try{
						$bdd = new PDO ('mysqli:host=localhost; dbname=test', 'root', '');
					} catch (Exception $e) {
						exit('Erreur :' .$e->getMessage());
					}
					$reponse = $bdd->query('SELECT id_img, nom, description FROM images');
					while ($result = $reponse->fetch()) {
						echo '<div>';
						echo '<a href="apercu.php?id_img='.$result['id_img'].'"><img src="apercu.php?id_img='.$result['id_img'].'"alt="'.$result['nom'].'"title="'.$result['nom'].'"></a>';
						echo '<p>Description: '.$result["description"].'<p>';
						echo '</div>';
					}

					$reponse->closeCursor();
				?>

		</body>
	</html>