<!DOCTYPE html>
	<html lang="fr">
		<head>
			<title>Addict Fashion</title>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="descripton" content="c'est une boutique de vente en ligne">
			<meta name="author" content="">
			<link rel="icon" href="../../../../favicon.ico">
			<link rel="stylesheet" href="css/bootstrap.css">
		</head>

		<body>
			<div class="container">
				<div class="row"><!--menu-->
					<nav class="navbar navbar-default" role="navigation">
						<div class="container-fluid">
							<a class="navbar-brand" href="#">Addict Fashion</a>
							<ul class="nav navbar-nav">
								<li class="active">
									<a href="#">Accueil</a>	
								</li>
								<li>
									<a href="#">Contact</a>
								</li>
								<li>
									<a href="admin.php">Admin</a>
								</li>
								
							</ul>
							
						</div>
					</nav>
					
				</div>

				<div class="row">
					<img src="img/img1.jpg" width="100%" height="400px">
					
				</div>

				<div class="row">
				
					<div class="col-md-8 col-xs-12 col-md-offset-2">
						<?php 
						$n=1;
						while ($n<5)
						{
							?>
						
						<div class="row"> <!--ligne d'article-->
							<div class="row">
								<div class="col-md-10 border"><h1>Sac</h1></div>
								<div class="col-md-2 border"><h4 style="color :red">prix <br>5000FCFA</h4></div>
							</div>
							<div class="row">
								<div class="col-md-10 border" ><b>Sac importé de qualité chinoise</b></div>
								<div class="col-md-2 border"><img src="img/img2.jpg" width="100%" height="100%"></div>
							</div>
							<div class="row">
								<div class="col-md-10 border"><h4 style="color :green">Stock:10</h4></div>
							</div>
							

						</div>
						<?php 
						$n++;
						}
						 ?>
						

					</div>
					
						
				</div>




					
				


				
			












			</div>		
		</body>-
	</html>