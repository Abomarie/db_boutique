<?php include('connexion.php');
	$msg="";
	if (isset($_POST['btnValider'])) {
	 	$sql="INSERT INTO categories(libelle,description) VALUES('".$_POST['libelle']."','".$_POST['description']."')";
	 	//die($sql);
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
						<form class="form-control" action="" method="post" role="form">
							<legend><center>Formulaire de categories</center></legend>
							<span><?php echo $msg ?></span>
							<div class="form-group">
								<label for="">libelle:</label> 
								<input type="text" id="libelle" name="libelle">
							</div>
							<div class="form-group">
								<label for="">description: </label>
								<input type="text" name="description">
							</div>
								
							<input type="submit" name="btnValider" value="enregistrer" id=btnvalider>
								
						</form>
					</div>
				</div><br><br><br><br><br><br><br><br>
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
			
		</body>
	</html>