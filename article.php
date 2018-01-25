<?php include('connexion.php');
	$msg="";
	if (isset($_POST['btnValider'])) {
	 	$sql= "INSERT INTO article (titre,prix,stock,image,description,id_categories) VALUES ('".$_POST['titre']."','".$_POST['prix']."','".$_POST['stock']."','".$_POST['description']."','".$_POST['titre']."')";
	 	$result=mysqli_query($link,$sql);
	 	if ($result) {
	 		$msg='Insertion reussie';
	 	}else{
	 		$msg='mysqli_error($link)';
	 	}

	 }

		
	  ?>

<!DOCTYPE html>;
	<html lang="fr">
		<head>
			<title>Article</title>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="css/bootstrap.css">
		</head>

		<body>
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<form action="" method="post" role="form" enctype="multipart/form-data">
							<legend><center>Formulaire d'article</center></legend>
							<span><?php echo $msg ?></span>
							<div class="form-group">
								<label for="">Titre:</label><br> 
								<input type="text" id="titre" name="titre" class="form-control" placeholder="le titre ici" id="titre">
							</div><br>
							<div class="form-group">
								<label for="">Prix:</label><br> 
								<input type="text" id="prix" name="prix" class="form-control" placeholder="le prix ici" id="prix">
							</div><br> 
							<div class="form-group">
								<label for="">Stock:</label><br> 
								<input type="text" id="stock" name="stock" class="form-control" placeholder="le stock ici" id="stock">
							</div><br>
							<div class="form-group">
								<label for="mon_ficier">Image(JPG, PNG OU GIF/ max. 20 Ko):</label><br> 
								<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
								<input type="file" id="image" name="image" class="form-control" placeholder="l'image' ici" id="image">

							</div><br>
							<div class="form-group">
								<label for="">Description: </label><br>
								<input type="text" name="description" class="form-control" placeholder="la description ici" id="description">
							</div><br>
								
							<button type="submit" class="form-control btn btn-success" name="btnValider">VALIDER</button>
										
						</form>
					</div>
				</div><br><br><br><br><br>
				<div class="row">
					<table class="table">
						<thead>
							<tr>
								<th>Numero</th>
								<th>Titre</th>
								<th>Prix</th>
								<th>Stock</th>
								<th>Image</th>
								<th>Description</th>
								<th>Numéro_catégorie</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							<?php 
								$n=1;
								$list="SELECT *FROM article";
								$res=mysqli_query($link,$list);
								while ($data = mysqli_fetch_array($res)){ 
							 ?>
							<tr>
								<td> <?php echo $n; ?></td>
								<td><?php echo $data['titre']; ?></td>
								<td><?php echo $data['prix']; ?></td>
								<td><?php echo $data['stock']; ?></td>
								<td><?php echo $data['image']; ?></td>
								<td><?php echo $data['description']; ?></td>
								<td></td>
								<td></td>
							</tr>
							<?php $n++; } ?>
						</tbody>
					</table>
	
				</div>
			</div>
			
		</body>
	</html>

	