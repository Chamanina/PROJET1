<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');
?>

<?php

	$nom_img = mysqli_escape_string($dbc, $_POST["nom_img"]);
	$prix_img = $_POST['prix_img'];
	$categ_img = $_POST['l_categ'];
	$description_img = $_POST['description_img'];
	// uniqid : Génère un identifiant unique, préfixé, basé sur la date et heure courante en microsecondes.
	$lien_php = 'imagePage/'.uniqid().'.php';

	$uploaddir = 'image/';
	$uploadfile = $uploaddir . basename($_FILES['lien_img']['name']);

	 include('./function/php/requete.php');
	 $rs_select_id = select_id($_SESSION['email_user'], $dbc);

	 
	 $rs_select_nom_categ = select_nom_categ($categ_img, $dbc);


	if($categ_img == 0) 
	{
		echo ('Une categ doit être rentré pour la vente.');
	}
	if(empty($uploadfile))
	{
		echo('un fichier est nécessaire.');
	}
	if(empty($nom_img))
	{
		echo ('Un titre est attendu.');
	}
	if(empty($prix_img)) 
	{
		echo ('Un prix doit être rentré pour la vente.');
	}
	if(empty($description_img)) 
	{
		echo ('Une description doit être rentrée pour la vente.');
	}
	
	$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
	//1. strrchr renvoie l'extension avec le point (« . »).
	//2. substr(chaine,1) ignore le premier caractère de chaine.
	//3. strtolower met l'extension en minuscules.
	$extension_upload = strtolower(  substr(  strrchr($uploadfile, '.')  ,1)  );
	if(!in_array($extension_upload,$extensions_valides))
	{
		echo ('Extension incorrecte');
	}

	else 
	{
		// echo '<pre>';
		if($categ_img <> 0) 
		{
			if(move_uploaded_file($_FILES['lien_img']['tmp_name'], $uploadfile)) 
			{
    			echo ('Le fichier est valide, et a été téléchargé avec succès.');
    			$rq= mysqli_fetch_assoc($rs_select_nom_categ);

    			$q = mysqli_fetch_assoc($rs_select_id);
				$sql = "INSERT INTO image (nom_img, prix_img, lien_img, lien_php, description_img, categ_img, idUser)
							VALUES ('".$nom_img."', ".$prix_img.", '".$uploadfile."', '".$lien_php."', '".$description_img."', ".$categ_img." ,".$q['idUser'].");";
					$exec = mysqli_query($dbc, $sql);
					echo('<form action="ajout.php" method="post" accept-charset="utf-8" style="padding-left:100px">
						<br/><br/>
						<input type="submit" name="submit_button" value="Ajouter une autre image" id="submit_button" class="formbutton"/>
						<br/><br/>
						');

					$file = $lien_php;

					$php  = '<?php
							session_start(); 
							DEFINE(\'DB_USER\',\'root\'); 
							DEFINE(\'DB_PASSWORD\',\'\'); 
							DEFINE(\'DB_HOST\',\'localhost\'); 
							DEFINE(\'DB_NAME\',\'PhotoForYou\'); 
							$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); 
							mysqli_set_charset($dbc,\'utf8\'); 
							?> 
							<!DOCTYPE html> <html lang="fr"> 
								<head> 
									<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
									<title>PhotoForYou</title> 
									<link rel="stylesheet" href="../css/styles.css" type="text/css" /> 
								</head>

								<body> 
									<div id="container"> 
										<div id="header"> 
											<div id="opacity"> 
												<h1>
													<a href="../index.php">PhotoForYou</a>
												</h1> 
											</div> 
										<div class="clear"></div>
									</div> 
									<div id="nav"> 
										<ul> 
											<div class="clear"></div>

									<?php 
										if (isset($_SESSION[\'email_user\'])) 
										{ 
											if ($_SESSION[\'type_user\']=1) 
											{ 
												$q=\'SELECT * FROM Menu WHERE idMenu = 1 OR idMenu= 2 OR idMenu= 3 OR idMenu= 6 OR idMenu= 7;\'; 
											} 
										} 
										else 
										{ 
											$q=\'SELECT * FROM Menu WHERE idMenu!=1 AND idMenu!=6 AND idMenu!=7;\'; 
										} 
										$r=mysqli_query($dbc,$q); 
										$pageactive=basename($_SERVER[\'PHP_SELF\']); 
										while(list($id,$nom,$url)=mysqli_fetch_array($r,MYSQLI_NUM)) 
										{ 
											echo \'<li \'; 
											if ($pageactive==$url)
											{ 
												echo \'class="selected"\'; 
											} 
											echo \'><a href="../\'.$url.\'">\'.$nom.\'</a></li>\'; 
										} 
									?> 
										</ul>
									</div> 
									<div id="body"> 
										<div id="content"></div> 
											<h1 style="text-align: center"> '.$nom_img.' </h1><br/> 
											<img src="../'.$uploadfile.'"" style="width:775px" />
											<p>Photographe : '.$q['prenom_user'].' '.$q['nom_user'].' </p>
											<p>Catégorie : '.$rq['nom_categ'].'  </p> 
											<p>'.$description_img.'</p> 
												<p> LE PRIX : '.$prix_img.' </p> 
												<center>
													<input type="submit" value="ACHETER LA PHOTO" name="submit_button" id="submit_button" class="formbutton" onclick=""/><br/><br/>
												</center>
										</div>

										<div id="footer">
			   								<div class="footer-content">
			       								<div class="clear"></div>
			    							</div>
			    						<?php
			        						if (isset($_SESSION[\'user\']))
			        						{
			        							echo "<a href=\'deconnexion.php\'> Deconnexion </a>";
			        						}
			    						?>

			    							<div class="footer-bottom"></div>
										</div>

									</div>
						
								</body>
							</html>
				  ';
					

					file_put_contents($file, $php, FILE_APPEND | LOCK_EX);


			}
		}
	}
		// echo 'Voici quelques informations de débogage :';
		// print_r($_FILES);
		// echo '</pre>';
?>
 <div style="display: none">
<?php
    include('./include/cotedroit.php');
?>
</div>


<?php
    include('./include/footer.php');
?>