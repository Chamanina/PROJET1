<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php'); 


	$titre = $_SESSION['prenom_user'].' '.$_SESSION['nom_user'];

	         // var_dump($_SESSION['prenom_user']);


	echo('<table>
		<tbody>
		<tr>
			<td class="titre" colspan="6">'.$titre.'</td>
		</tr>
		<tr>
			<td class="entete cell-25">PRENOM</td>
			<td class="entete cell-25">NOM</td>
			<td class="entete cell-20">MAIL</td>
			<td colspan="2" class="entete"> MODIFICATION DU MOT DE PASSE</td>
			<td class="entete"></td>
		<tr>
			<td class="bloquer">'.$_SESSION['prenom_user'].'</td>
			<td class="bloquer">'.$_SESSION['nom_user'].'</td>		
			<td class="bloquer">'.$_SESSION['email_user'].'</td>

			<form name="frm" method="post" action="./transfert_mdp.php">
				<td>
					<input id="new_pass" name="new_pass" type="password" class="form-control" placeholder="Mot de passe" autocomplete="off"/>
				</td>	
				<td>
					<input id="confirm_pass" name="confirm_pass" type="password" class="form-control" placeholder="Confirmation" autocomplete="off"/>
				</td>
				<td>
					<center>
						<input type="submit" id="submit_button" class="formbutton" value="MODIFIER"/>	
					</center>
				</td>
			</form>	
		</tr>

		</tbody>
		</table><br/><br/>');

		if (isset($_SESSION['email_user']) && ($_SESSION['type_user']) == 1)
		{
			echo('<h3> MES PHOTOS </h3>');
		
	 		$query = "SELECT nom_img, prix_img, lien_img, lien_php, description_img 
	 				FROM image, user
	 				WHERE user.idUser = image.idUser
	                AND actif_img = 1
	                AND email_user = '".$_SESSION['email_user']."';";
	      	$result = mysqli_query($dbc, $query);
	      	$i = 0;
	     	while($row = mysqli_fetch_assoc($result))
	      	{
	        	$i++;
	        	echo('
	         		<div class="container1">
	            		<img id="image'.$i.'" alt="" width="280" height="180" onclick="onClick(this, '.$i.')" class="modal-hover-opacity" style="max-width:100%;cursor:pointer"  src="'.$row['lien_img'].'"/>
	          		</div>
	          		<div id="modal'.$i.'" class="modal" onclick="this.style.display=\'none\'">
	            		<span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	            		<div class="modal-content">
	              			<img id="img'.$i.'" class="consult_img" style="max-width:100%">
	            		</div>
	            		<div id="caption">'.$row['nom_img'].' <br/><br/>
	              			<center>
	                			<a href="'.$row['lien_php'].'"><button class="formbutton">VOIR LA PAGE</button></a><br/>
	              			</center>
	            		</div>
	          		</div>');
      		}
      		echo ('<br/><br/>');
      	}



       echo('<h3>MES PHOTOS ACHETÉES</h3>');

       	$query = "SELECT nom_img, prix_img, lien_img, lien_php, description_img 
 				FROM image, user
 				WHERE user.idUser = image.idAcheteur
                AND idAcheteur = ".$_SESSION['idUser'].";";
      	$result = mysqli_query($dbc, $query);
      	$i = 0;
     	while($row = mysqli_fetch_assoc($result))
      	{
        	$i++;
        	echo('
         		<div class="container1">
            		<img id="image'.$i.'" alt="" width="280" height="180" onclick="onClick(this, '.$i.')" class="modal-hover-opacity" style="max-width:100%;cursor:pointer"  src="'.$row['lien_img'].'"/>
          		</div>
          		<div id="modal'.$i.'" class="modal" onclick="this.style.display=\'none\'">
            		<span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            		<div class="modal-content">
              			<img id="img'.$i.'" class="consult_img" style="max-width:100%">
            		</div>
            		<div id="caption">'.$row['nom_img'].' <br/><br/>
              			<center>
                			<a href="'.$row['lien_php'].'"><button class="formbutton">VOIR LA PAGE</button></a><br/>
              			</center>
            		</div>
          		</div>');
      	}

       echo('<h3>SUPPRESSION DU COMPTE</h3><br/><br/>
       		<center>
						<a href="./transfert_delete_compte.php?confirmation=false"> <input type="submit" id="submit_button" class="formbutton" value="SUPPRIMER LE COMPTE"/></a>
					</center>
			<br/><br>');
	
?>

<!-- Div permettant de cacher l'include(cotedroit.php) -->
<div style="display: none">
<?php
    include('./include/cotedroit.php');
?>
</div>


<?php
  include('./include/footer.php');
?>
<script src="./function/js/function_modal.js" type="text/javascript"></script>

