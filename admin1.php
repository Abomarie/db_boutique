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
	<html lang="fr">
		<head>
			<title>Categories</title>
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
						<form action="" method="post" role="form">
							<legend><center>Formulaire De Categories</center></legend>
							<span><?php echo $msg; ?> </span>
							<div class="form-group">
								<label for="">Libelle:</label><br> 
								<input type="text" id="libelle" name="libelle" class="form-control" placeholder=" Entrer le libelle ici">
							</div><br>
							<div class="form-group">
								<label for="">Description: </label><br>
								<input type="text" name="description" class="form-control" placeholder="la description ici">
							</div><br>
								
							<button type="submit" class="form-control btn btn-success" name="btnValider">VALIDER</button>	
								
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
								$list="SELECT *FROM categories";
								$res=mysqli_query($link,$list);
								while ($data = mysqli_fetch_array($res)){ 
							 ?>
							<tr>
								<td> <?php echo $n; ?></td>
								<td><?php echo $data['libelle']; ?></td>
								<td><?php echo $data['description']; ?></td>
								<td></td>
							</tr>
							<?php $n++; } ?>
						</tbody>
					</table>
					
				</div>
			</div>
			<a href="article2.php">voir article</a>
			
			<!-- jQuery -->
			<script src=""></script>
			<!-- Bootstrap JavaScript -->
			<script src=""></script>
			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	 		<script src="Hello World"></script>

		</body>
	</html>
	