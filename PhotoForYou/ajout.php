<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');

    include('./function/php/requete.php');
    $rs_categ = select_all_categ($dbc);

?>

<html>
   	<head>
      	<title>Stock d'images</title>
   	</head>
   	<body>
      	<h3>Ajout d'une image</h3>
      	<!--Formulaire ajout -->
      	<form enctype="multipart/form-data" action="./transfert.php" method="post">
         	<input type="file" id="lien_img" name="lien_img"/><br/><br/>
         	<p><label for="nom_img"><strong>TITRE DE L'IMAGE : </strong></label><br/>
         	<input type="text" id="nom_img" name="nom_img" placeholder="Nom de l'image" /></p>
         	<p><label for="prix_img"><strong>PRIX : </strong></label><br/>
         	<input type="text" id="prix_img" name="prix_img" placeholder="Prix de l'image" /></p>
         	<p><label for="description_img"><strong>DESCRIPTION : </strong></label><br/>
         	<textarea rows="10" cols="70" name="description_img" id="description_img"></textarea>
         	</p>
        <?php
        //Liste categories
        echo('<select id="l_categ" name="l_categ" class="form-control">
            <option value="0">Sélectionner une catégorie</option>');
            while($une_categ = mysqli_fetch_assoc($rs_categ))
            {
            echo('<option value="'.$une_categ['idCategorie'].'">'.$une_categ['nom_categ'].'</option>');
            } 
            echo('</select>')
        ?> 
        	<br/><br/> 
         	<input type="submit" name="Envoie" value="Envoyer l'image" class="formbutton"/>
         	<br/><br/>
      	</form>
   	</body>
</html>

	<!--Disparition cotedroit.php-->
	<div style="display: none">
<?php
    	include('./include/cotedroit.php');
?>
	</div>
<?php
    	include('./include/footer.php');


