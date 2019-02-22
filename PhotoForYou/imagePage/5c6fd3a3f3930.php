<?php
							session_start(); 
							DEFINE('DB_USER','root'); 
							DEFINE('DB_PASSWORD',''); 
							DEFINE('DB_HOST','localhost'); 
							DEFINE('DB_NAME','PhotoForYou'); 
							$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); 
							mysqli_set_charset($dbc,'utf8'); 
							$prix_img = 20;
							$lien_php = "imagePage/5c6fd3a3f3930.php";
							$lien_img = "image/foret.jpg";
							$idUser = 2;
							$actif_img = 1;
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
										if (isset($_SESSION['email_user']) && ($_SESSION['type_user']) == 1)
										{
												$q='SELECT * FROM Menu WHERE idMenu = 1
												OR idMenu= 2
												OR idMenu= 3
												OR idMenu= 6
												OR idMenu= 7
												OR idMenu= 9;';
										}
										elseif (isset($_SESSION['email_user']) && ($_SESSION['type_user']) == 2)
										{
											
												$q='SELECT * FROM Menu WHERE idMenu = 1
												OR idMenu= 2
												OR idMenu= 3
												OR idMenu= 7
												OR idMenu= 9;';
											
										}

										elseif (isset($_SESSION['email_user']) && ($_SESSION['type_user']) == 3)
										{
											
												$q='SELECT * FROM Menu WHERE idMenu = 2
												OR idMenu= 8
												OR idMenu= 9;';
											
										}
											
										else
										{
												$q='SELECT * FROM Menu
												WHERE idMenu=2
												OR idMenu=3
												OR idMenu=4
												OR idMenu=5;';
										}
										$r=mysqli_query($dbc,$q); 
										$pageactive=basename($_SERVER['PHP_SELF']); 
										while(list($id,$nom,$url)=mysqli_fetch_array($r,MYSQLI_NUM)) 
										{ 
											echo '<li '; 
											if ($pageactive==$url)
											{ 
												echo 'class="selected"'; 
											} 
											echo '><a href="../'.$url.'">'.$nom.'</a></li>'; 
										} 
									?> 
										</ul>
									</div> 
									<div id="body"> 
										<div id="content"></div> 
										<center>
											<h1 style="text-align: center; text-decoration: underline;">Foret </h1><br/> 
											<img src="../image/foret.jpg"style="width:775px ; border-radius: 5px" /><br/><br/>
										</center>
											<p><strong>Photographe :</strong> Caroline PONS </p>
											<p><strong>Catégorie :</strong> Paysage  </p> 
											<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc laoreet lacinia velit, non ultricies ipsum pharetra ac. Pellentesque vehicula nibh ut diam sodales cursus. Mauris eu consequat dui, id varius dui. Donec condimentum luctus feugiat. Sed tincidunt quis ligula condimentum placerat. Nullam id velit dui. Nulla bibendum metus metus, id scelerisque est faucibus eu. Maecenas blandit molestie odio nec commodo. In interdum scelerisque arcu, et porta est mollis eu.

Nulla facilisi. Sed tincidunt sollicitudin elit, sed mollis mi tempus non. Nullam ex dui, consectetur vitae purus ut, tincidunt ullamcorper est. Nam sollicitudin fermentum est quis iaculis. Donec vitae tempor eros. Praesent nec lacus eu orci iaculis blandit. Nunc ut pretium arcu, sit amet ullamcorper mauris. Integer ac lorem a magna molestie condimentum. Maecenas erat felis, tincidunt in accumsan id, dictum sed nunc. Nunc nec risus vel eros vestibulum pretium. Aenean mattis semper ante, ac lacinia nisl dictum at. Duis auctor elementum orci, id tempor leo auctor quis.</p> 
												<p><strong>LE PRIX :</strong> 20 </p> 

										<?php 

										$select_acheteur_dl = "SELECT nom_img, prix_img, lien_img, lien_php, description_img, actif_img, idAcheteur, idUser, idAdmin
												FROM image
									 			WHERE lien_php = 'imagePage/5c6fd3a3f3930.php';";
									      $exec_dl = mysqli_query($dbc, $select_acheteur_dl);
									      $result = mysqli_fetch_assoc($exec_dl);


										if(empty($_SESSION['email_user']))
										{
											echo('<center>
													<input type="hidden" value="ACHETER LA PHOTO" name="submit_button" id="submit_button" class="formbutton" onclick=""/>
														<strong>Connectez-vous pour pouvoir acheter la photographie.</strong>
													<br/><br/>
												</center>
												');
										} 


										elseif($_SESSION['idUser'] == $result['idAcheteur'])
										{
											echo('
												<center>
												<a href="../transfert_dl.php?file=image/foret.jpg">
													<input type="submit" value="TELECHARGER" name="submit_button" id="submit_button" class="formbutton" onclick=""/>
													<br/><br/>
												</center>
												');
										} 

										elseif($_SESSION['idUser'] == $result['idUser'])
										{
											echo('<center>
													<input type="hidden" value="CONNECTER" name="submit_button" id="submit_button" class="formbutton" onclick=""/>
													<br/><br/>
												</center>');
										}  

										elseif($_SESSION['idUser'] == $result['idAdmin'])
										{
											echo('<center>
											<a href="../transfert_delete_img.php?file_delete=imagePage/5c6fd3a3f3930.php&amp;confirmation=false">
													<input type="submit" value="SUPPRIMER LA PHOTO" name="submit_button" id="submit_button" class="formbutton" onclick=""/>
													<br/><br/>
												</center>');
										}  




										else 
										{
												echo('<form name="frm" id="form_doc" method="post" action="../transfert_achat.php">
													<center>
														<input type="hidden" value="2" name="idUser"/>
														<input type="hidden" value="image/foret.jpg" name="lien_img"/>
														<input type="hidden" value="1" name="actif_img"/>
														<input type="hidden" value="20" name="prix_img"/>
														<input type="hidden" value="imagePage/5c6fd3a3f3930.php" name="lien_php"/>
													   <input type="submit" value="ACHETER LA PHOTO" name="submit_button" id="submit_button" class="formbutton"/><br/><br/>
													</center>
													</form>');
										}
										?>
										</div>

										<div id="footer">
			   								<div class="footer-content">
			       								<div class="clear"></div>
			    							</div>
			    						<?php
			        						if (isset($_SESSION['user']))
			        						{
			        							echo "<a href='deconnexion.php'> Deconnexion </a>";
			        						}
			    						?>

			    							<div class="footer-bottom"></div>
										</div>

									</div>
						
								</body>
							</html>
				  