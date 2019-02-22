<?php	
	require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');  
    
    $new_password = $_POST['new_pass'];
	$confirm_password = $_POST['confirm_pass'];

	if(empty($new_password))
	{
		
		echo('Le champs "Mot de passe" attend une valeur textuelle , et doit obligatoirement être renseigné. <br/><br/>
			<form name="frm" method="post" action="profil.php">
				<center>
					<input type="submit" id="submit_button" class="formbutton" value="RETOUR"/>
			</form><br/><br/>');
	}
	elseif(empty($confirm_password))
	{
		echo('Le champs "Confirmation" attend une valeur textuelle , et doit obligatoirement être renseigné.<br/><br/>
			<form name="frm" method="post" action="profil.php">
				<center>
					<input type="submit" id="submit_button" class="formbutton" value="RETOUR"/>
			</form><br/><br/>');
	}
	elseif($new_password != $confirm_password)
	{
	echo('Les mots de passe ne sont pas identiques.
		<form name="frm" method="post" action="profil.php">
			<center>
				<input type="submit" id="submit_button" class="formbutton" value="RETOUR"/>
		</form><br/><br/>');
	}

	else
	{
		echo('Votre Mot de Passe a bien été mis à jour !<br/><br/>
			<form name="frm" method="post" action="profil.php">
				<center>
					<input type="submit" id="submit_button" class="formbutton" value="RETOUR"/>
			</form><br/><br/>');

		$pass = password_hash($new_password, PASSWORD_DEFAULT);
		$sql = "UPDATE user
			SET mdp_user = '".$pass."'
			WHERE email_user = '".$_SESSION['email_user']."';";
		$exec = mysqli_query($dbc, $sql);
		
	}

?>
<div style="display: none">
<?php
    include('./include/cotedroit.php');
?>
</div>


<?php
  include('./include/footer.php');
?>
	
	