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
		</table><br/><br/>

			
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
