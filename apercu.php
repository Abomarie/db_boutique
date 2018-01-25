<?php  
	if(!empty($_GET['id_img'])){

		try{
			$bdd = new PDO ('mysqli:host=localhost; dbname=test', 'root', '');
			} catch (Exception $e) {
				exit('Erreur :' .$e->getMessage());
			}
			id_Img = intval($GET['id_img']);
			$req= $bdd->prepare('SELECT extension, img FROM images WHERE id_img=?');
			$req->execute(array($id_imgImg));

			if($req->rowCount() !=1)
					echo'L\'image n\'existe pas !';
			else{$donnees = $req->fetch();
			header("Content-type: ".$donnees['extension']);
			echo $donnees['img'];
			}
			$req->closeCursor();
}else
	echo'Vous n avez pas sélectionné d image!'
?>