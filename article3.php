<?php include('connexion.php');
$msg="";
    if(isset($_POST['btnValider'])) {
        /*echo '<pre>';
        print_r ($_FILES['image']);
        die();*/
        if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])){
            $sql= "INSERT INTO articles 
            (titre, prix, stock, image, description, id_categories) 
            VALUES ('".$_POST['titre']."',
                    '".$_POST['prix']."',
                    '".$_POST['stock']."',
                    '".$_FILES['image']['name']."',
                    '".$_POST['description']."',
                    '".$_POST['categories']."')";
        $result=mysqli_query($link,$sql);
        if($result) {
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
        <title>Articles</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container" style="padding: 25px 20px 30px; background-color: #f6f4f4;">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

            	<form action="" method="post" role="form" enctype="multipart/form-data">
                    <legend>Formulaire Des articles</legend>
                    <span> <?php echo $msg; ?> </span>

                        <div class="form-group">
                            <label for="">Titre</label>
                            <input id="" type="text" name="titre" class="form-control" placeholder="Entrer le titre"><br>
                        </div>

                        <div class="form-group">
                            <label for="">Prix</label>
                            <br><input name="prix" class="form-control" placeholder="Entrer le prix"></input><br>
                        </div><br>

                        <div class="form-group">
                            <label for="">Stock</label>
                            <br><input name="stock" class="form-control" placeholder="Entrer le stock"></input><br>
                        </div><br>
                        
                        <div class="form-group">
                            <label for="">Image</label>
                            <br><input name="image" type="file" class="form-control" placeholder="Entrer une image"></input><br>
                        </div><br>

                        <div class="form-group">
                            <label for="">Description</label>
                            <br><textarea name="description" class="form-control" placeholder="Entrer la description"></textarea><br>
                        </div><br>
                        <div class="form-group">
                            <label for="">Categories</label>
                            <select name="categories" class="form-control">
                                <?php
                                //recuperation de toutes les categories dans la bd
                                $sqlcategorie="SELECT * FROM categories";
                                //execute la requête et on la stocke dans $repcategorie
                                $repcategorie=mysqli_query($link,$sqlcategorie);
                                //mysqli_fetch_array = permet de transformer le resultat $repcategorie en variable de type tableau $ datacat
                                //la boucle while nous permet de parcourir le tableau $datacat et de recupere les valeurs de chaques elements du tableau $datacat
                                while ($datacat=mysqli_fetch_array($repcategorie)){

                                 ?>
                                <option value="<?php echo $datacat['id'];?>">
                                <?php echo $datacat['id'].'-'.$datacat['libelle'];?>
    
                                <?php
                                 } 
                                 ?>
                            </select>


                        </div><br>

                </div>

                        <button name="btnValider" type="submit" class="btn-primary btn-lg btn-block">Valider</button>

                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    <br>
        <div class="row">
            <table class="table" style="margin-left: 20px">
                <thead>
                    <tr>
                        <th>numero</th>
                        <th>titre</th>
                        <th>prix</th>
                        <th>stock</th>
                        <th>image</th>
                        <th>description</th>
                        <th>categories</th>
                        
                    </tr>
                    <!-- <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>            
                        <a href="?id="8">Modifier</a>                
                        <a href="?sup="8">Supprimer</td> 
                    </tr> -->

                        
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
                                    libelle,
                                    id_categories 
                                FROM articles
                                INNER JOIN categories
                                ON categories.id = articles.id_categories";
                                //die($list);
                        $res= mysqli_query($link,$list);
    while ($data = mysqli_fetch_array($res)){


                        ?>
                        <tr>
                            <td><?php echo $n; ?></td>  
                            <td><?php echo $data['titre'] ?></td> 
                            <td><?php echo $data['prix'] ?></td> 
                            <td><?php echo $data['stock'] ?></td>
                            <td><img src="upload/<?php echo $data['image']; ?>" width="30px"; height="30px"; alt=""></td> 
                            <td><?php echo $data['description'] ?></td>
                            <td><?php echo $data['libelle'] ?></td> 
                            <td>
                                <!-- <a href="?id="<?php echo $data['id']; ?>">Modifier</a>
                                <a href="?sup="<?php echo $data['id']; ?>">Supprimer</td> -->
                            </td> 
                        </tr>
                    <?php $n++;
            }
        ?> 
                </tbody>           
            </table>
            
        </div>
    </div>

    <!-- <?php
        $n=1;
        $requet="SELECT * FROM codeuses";
        $result=mysqli_query($link,$requet);
        while ($data=mysqli_fetch_array($result)) {
    ?>

        <tr>
            <td><?php echo $n; ?></td> 
            <td><?php echo $data['nom'] ?></td> 
            <td><?php echo $data['prenom'] ?></td> 
            <td><?php echo $data['adresse'] ?></td> 
            <td><?php echo $data['tel'] ?></td> 
            <td><?php echo $data['description'] ?></td> 
            <td>
                <a href="?id="<?php echo $data['id']; ?>">Modifier</a>
                
                <a href="?sup="<?php echo $data['id']; ?>">Supprimer</td> 
    </tr>
<?php
    $n++;
    }
?> -->


    <!-- <?php
    if(isset($_POST["submit"])) {
    	if (isset($_GET['id'])) {
            $sql="UPDATE codeuses SET
            nom='".$_POST["nom"]."',
            prenom='".$_POST["prenom"]."',
            tel='".$_POST["tel"]."',
            adresse='".$_POST["adresse"]."',

            description='".$_POST["description"]."' WHERE id=".$_GET['id'];
            //die($sql);

        }else{
            $sql="INSERT INTO codeuses (nom,prenom,tel,adresse,description) 
        VALUES('".$_POST["nom"]."',
        '".$_POST["prenom"]."',
        '".$_POST["tel"]."',
        '".$_POST["adresse"]."',
        '".$_POST["description"]."')";//die($sql);
        }
    	$result=mysqli_query($link,$sql);
    	if ($result) {
    		echo "insertion reussie";
    	}else{
    		echo mysqli_error($link);
    		die();
    	}
    }
    ?> -->

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/controle.js"></script>
</body>
</html>