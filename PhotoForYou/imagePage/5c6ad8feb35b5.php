<?php
							session_start(); 
							DEFINE('DB_USER','root'); 
							DEFINE('DB_PASSWORD',''); 
							DEFINE('DB_HOST','localhost'); 
							DEFINE('DB_NAME','PhotoForYou'); 
							$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); 
							mysqli_set_charset($dbc,'utf8'); 
							$prix_img = 10;
							$lien_php = "imagePage/5c6ad8feb35b5.php";
							$idUser = 10;
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
											OR idMenu= 8;';
										}
										elseif (isset($_SESSION['email_user']) && ($_SESSION['type_user']) == 2)
										{
					
											$q='SELECT * FROM Menu WHERE idMenu = 1
											OR idMenu= 2
											OR idMenu= 3
											OR idMenu= 7
											OR idMenu= 8;';
										
										}
										else
										{
												$q='SELECT * FROM Menu
												WHERE idMenu!=1
												AND idMenu!=6
												AND idMenu!=7
												AND idMenu!=8;';
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
											<h1 style="text-align: center; text-decoration: underline;">aaaa </h1><br/> 
											<img src="../image/dej.jpg"style="width:775px ; border-radius: 5px" /><br/><br/>
											<p><strong>Photographe :</strong> Caroline PONS </p>
											<p><strong>Catégorie :</strong> Animaux  </p> 
											<p>fedffdssfd</p> 
												<p><strong>LE PRIX :</strong> 10 </p> 
												<?php 
										if(empty($_SESSION['email_user']))
										{
											echo('<center>
													<input type="hidden" value="ACHETER LA PHOTO" name="submit_button" id="submit_button" class="formbutton" onclick=""/>
														<strong>Connectez-vous pour pouvoir acheter la photographie.</strong>
													<br/><br/>
												</center>
												');
										} 
										else 
										{
												echo('<form name="frm" id="form_doc" method="post" action="../transfert_achat.php">
													<center>
														<input type="hidden" value="10" name="idUser"/>
														<input type="hidden" value="10" name="prix_img"/>
														<input type="hidden" value="imagePage/5c6ad8feb35b5.php" name="lien_php"/>
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
				  