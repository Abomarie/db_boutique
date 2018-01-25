<?php include('connexion.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		$sql= "INSERT INTO categories (libelle,description) VALUES ('".$_POST['libelle']."','".$_POST['description']."')";
		$result=mysqli_query($link	,$sql);
		if ($result) {
			$msg='Insertion reussie';
		}else{
			$msg=mysqli_error($link);
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

					<form action="" method="POST" role="form">
						<legend>Formulaire De Categories</legend>
						<span> <?php echo $msg; ?> </span>
					
						<div class="form-group">
							<label for="">Libelle</label>
							<input name="libelle" type="text" class="form-control" id="" placeholder="Entrer le libelle">
						</div>

						<div class="form-group">
							<label for="">Description</label>
							<input name="description" type="text" class="form-control" id="" placeholder="Description">
						</div>
						+<button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block">Valider</button>
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
							<th>Libelle</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT * FROM categories";
							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res)){
								
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['libelle']; ?></td>
							<td><?php echo $data['description']; ?></td>
							<td></td>
						</tr>
						<?php $n++;
						 } ?>
					</tbody>
				</table>

			</div>
			

		</div>
		<a href="articles.php">Voir article</a>

		<!-- jQuery -->
		<script src=""></script>
		<!-- Bootstrap JavaScript -->
		<script src=""></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>