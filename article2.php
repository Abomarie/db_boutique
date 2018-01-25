<?php include('connexion.php');
	$msg="";
	if (isset($_POST['btnValider'])) {
		/*echo '<pre>';
		print_r($_FILES['image']);die();*/

		if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/' .$_FILES['image']['name'])) {
				$sql="INSERT INTO article(titre,prix,stock,image,description,id_categories) 
				VALUES ('".$_POST['titre']."',
						'".$_POST['prix']."',
						'".$_POST['stock']."',
						'".$_FILES['image']['name']."',
						'".$_POST['description']."',
						'".$_POST['id_categories']."')";
		 	$result=mysqli_query($link,$sql);
		 	if ($result) {
		 		$msg='Insertion reussie';
		 	}else{
		 		$msg='mysqli_error($link)';
			//echo "image uploader";		
	 	}
	 }

	}	
?>

<!DOCTYPE html>
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
								<label>Image:</label><br> 
								<input type="file" id="image" name="image" class="form-control" placeholder="l'image' ici" id="image">
							</div><br>
							<div class="form-group">
								<label for="">Description: </label><br>
								<input type="text" name="description" class="form-control" placeholder="la description ici" id="description">
							</div><br>
							<div class="form-group">
								<label for="">id_categories</label>
								<select name="id_categories" class="form-control">
						<?php 
						$sqlcategorie="SELECT * FROM categories";
						$repcategorie=mysqli_query($link,$sqlcategorie);
						while($datacat=mysqli_fetch_array($repcategorie)){
						?>
							<option value="<?php echo $datacat['id']; ?>">
								<?php echo $datacat['id'].'-'.$datacat['libelle']; ?>
							</option>
						<?php 
						}
						?>
										
							</select>
							</div><br>
								
							<button type="submit" class="form-control btn btn-success" name="btnValider">VALIDER</button>
										
						</form>
					</div>
				</div>
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
								$list="SELECT 
											titre,
											prix,
											stock,
											image,
											article.description,
											libelle
											FROM article
											INNER JOIN categories 
											ON categories.id=article.id_categories";
											//die($list);
								$res=mysqli_query($link,$list);
								while ($data = mysqli_fetch_array($res)){ 
							 ?>
							<tr>
								<td> <?php echo $n; ?></td>
								<td><?php echo $data['titre']; ?></td>
								<td><?php echo $data['prix']; ?></td>
								<td><?php echo $data['stock']; ?></td>
								<td><img src="upload/<?php echo $data['image']; ?>" width="25px" height="20px"></td>
								<td><?php echo $data['description']; ?></td>
								<td><?php echo $data['libelle']; ?></td>
								<td></td>
							</tr>
							<?php $n++; 
								} 
							?>
						</tbody>
					</table>
	
				</div>
			</div>
			
		</body>
	</html>