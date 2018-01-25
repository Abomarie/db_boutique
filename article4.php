<?php include('connexion.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
		if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])) {
			$sql= "INSERT INTO articles
			 (titre,prix,stock,image,description,id_categories)
			 VALUES ('".$_POST['titre']."',
			 		  '".$_POST['prix']."',
			 		  '".$_POST['stock']."',
			 		  '".$_FILES['image']['name']."',
			 		  '".$_POST['description']."',
			 		  '".$_POST['categories']."')";
			$result=mysqli_query($link	,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}
		}

	}
 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.css" >

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">

					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<legend>Formulaire Des Articles </legend>
						<span> <?php echo $msg; ?> </span>
					
						<div class="form-group">
							<label for="">Titre</label>
							<input name="titre" type="text" class="form-control" id="" placeholder="Entrer le titre">
						</div>

						<div class="form-group">
							<label for="">prix</label>
							<input name="prix" type="text" class="form-control" id="" placeholder="prix">
						</div>
						<div class="form-group">
							<label for="">stock</label>
							<input name="stock" type="text" class="form-control" id="" placeholder="stock">
						</div>
						<div class="form-group">
							<label for="">image</label>
							<input name="image" type="file" class="form-control" id="" placeholder="image">
						</div>
						<div class="form-group">
							<label for="">description</label>
							<input name="description" type="text" class="form-control" id="" placeholder="description">
						</div><div class="form-group">
							<label for="">Categories</label>
							<select name="categories" class="form-control">
					<?php
					//recupere toutes les categories dans la bd
					$sqlcategorie="SELECT * FROM categories";
					//execute la requete et on la stock dans $repcategorie
					$repcategorie=mysqli_query($link,$sqlcategorie);
					//mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
					// la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
					while ($datacat=mysqli_fetch_array($repcategorie)) {
						?>
						<option value="<?php echo $datacat['id'];?>">
						<?php echo $datacat['id'].'-'.$datacat['libelle'];?>
							
						</option>

						<?php
					}
					?>
								
							</select>
						</div>
						<button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block">Valider</button>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
<br>
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
							<th>Categories</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT 
										titre,
										prix,
										stock,
										image,
										articles.description,
										libelle
									FROM articles
									INNER JOIN categories
									ON categories.id = articles.id_categories";
							$res= mysqli_query($link,$list);
							while ($data = mysqli_fetch_array($res)){
								
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['titre']; ?></td>
							<td><?php echo $data['prix']; ?></td>
							<td><?php echo $data['stock']; ?></td>
							<td><img src="upload/<?php echo $data['image'];  ?>" width="30px" height="30px" alt=""></td>
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
		

		<!-- jQuery -->
		<script src=""></script>
		<!-- Bootstrap JavaScript -->
		<script src=""></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>