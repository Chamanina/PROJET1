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
	$actif_img = 1; 
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
	if(empty($prix_img OR $prix_img <= 21)) 
	{
		echo ('Un prix doit être rentré pour la vente.'
				);
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
				$sql = "INSERT INTO image (nom_img, prix_img, lien_img, lien_php, description_img, categ_img, idUser, actif_img)
							VALUES ('".$nom_img."', ".$prix_img.", '".$uploadfile."', '".$lien_php."', '".$description_img."', ".$categ_img." ,".$q['idUser'].", ".$actif_img.");";
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
							$prix_img = '.$prix_img.';
							$lien_php = "'.$lien_php.'";
							$lien_img = "'.$uploadfile.'";
							$idUser = '.$q['idUser'].';
							$actif_img = '.$actif_img.';
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
										if (isset($_SESSION[\'email_user\']) && ($_SESSION[\'type_user\']) == 1)
										{
											$q=\'SELECT * FROM Menu WHERE idMenu = 1
											OR idMenu= 2
											OR idMenu= 3
											OR idMenu= 6
											OR idMenu= 7
											OR idMenu= 8;\';
										}
										elseif (isset($_SESSION[\'email_user\']) && ($_SESSION[\'type_user\']) == 2)
										{
					
											$q=\'SELECT * FROM Menu WHERE idMenu = 1
											OR idMenu= 2
											OR idMenu= 3
											OR idMenu= 7
											OR idMenu= 8;\';
										
										}
										else
										{
												$q=\'SELECT * FROM Menu
												WHERE idMenu!=1
												AND idMenu!=6
												AND idMenu!=7
												AND idMenu!=8;\';
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
										<center>
											<h1 style="text-align: center; text-decoration: underline;">'.$nom_img.' </h1><br/> 
											<img src="../'.$uploadfile.'"style="width:775px ; border-radius: 5px" /><br/><br/>
										</center>
											<p><strong>Photographe :</strong> '.$q['prenom_user'].' '.$q['nom_user'].' </p>
											<p><strong>Catégorie :</strong> '.$rq['nom_categ'].'  </p> 
											<p>'.$description_img.'</p> 
												<p><strong>LE PRIX :</strong> '.$prix_img.' </p> 

										<?php 

										$select_acheteur_dl = "SELECT nom_img, prix_img, lien_img, lien_php, description_img, actif_img, idAcheteur, idUser
												FROM image
									 			WHERE lien_php = \''.$lien_php.'\';";
									      $exec_dl = mysqli_query($dbc, $select_acheteur_dl);
									      $result = mysqli_fetch_assoc($exec_dl);


										if(empty($_SESSION[\'email_user\']))
										{
											echo(\'<center>
													<input type="hidden" value="ACHETER LA PHOTO" name="submit_button" id="submit_button" class="formbutton" onclick=""/>
														<strong>Connectez-vous pour pouvoir acheter la photographie.</strong>
													<br/><br/>
												</center>
												\');
										} 


										elseif($_SESSION[\'idUser\'] == $result[\'idAcheteur\'])
										{
											echo(\'<form name="frm" id="form_doc" method="post" action="../transfert_dl.php">
												<center>
													<input type="submit" value="TELECHARGER" name="submit_button" id="submit_button" class="formbutton" onclick=""/>
													<br/><br/>
												</center>
												\');
										} 

										elseif($_SESSION[\'idUser\'] == $result[\'idUser\'])
										{
											echo(\'<center>
													<input type="hidden" value="CONNECTER" name="submit_button" id="submit_button" class="formbutton" onclick=""/>
													<br/><br/>
												</center>\');
										}  




										else 
										{
												echo(\'<form name="frm" id="form_doc" method="post" action="../transfert_achat.php">
													<center>
														<input type="hidden" value="'.$q['idUser'].'" name="idUser"/>
														<input type="hidden" value="'.$uploadfile.'" name="lien_img"/>
														<input type="hidden" value="'.$actif_img.'" name="actif_img"/>
														<input type="hidden" value="'.$prix_img.'" name="prix_img"/>
														<input type="hidden" value="'.$lien_php.'" name="lien_php"/>
													   <input type="submit" value="ACHETER LA PHOTO" name="submit_button" id="submit_button" class="formbutton"/><br/><br/>
													</center>
													</form>\');
										}
										?>
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