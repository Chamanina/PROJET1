<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');
?>

<?php
	$prix_img = $_POST['prix_img'];
	$lien_php = $_POST['lien_php'];
	$idUser = $_POST['idUser'];

	if($_SESSION['credit_user'] < $prix_img)
	{
		echo('Vous n\'avez pas assez de crédits ...');
	}
	else
	{
		//Update à l'achat d'une photo (crédits clients et photographes et activité de l'image)
		$update_credit_client = "UPDATE user 
				SET credit_user = credit_user - $prix_img 
				WHERE email_user = '".$_SESSION['email_user']."';";
		$exec = mysqli_query($dbc, $update_credit_client);

		$select_credit ="SELECT credit_user
				FROM user
				WHERE email_user = '".$_SESSION['email_user']."';";
		$exec = mysqli_query($dbc, $select_credit);
		$result = mysqli_fetch_assoc($exec);
		$_SESSION['credit_user'] = $result['credit_user'];

		$update_credit_photographe = "UPDATE user
			SET credit_user = credit_user + ($prix_img * 50 )/ 100
			WHERE idUser = $idUser;";
		$exec = mysqli_query($dbc, $update_credit_photographe);


		$update_actif = "UPDATE image
			SET actif_img = 0, 
			idAcheteur = ".$_SESSION['idUser']." 
			WHERE lien_php = '".$lien_php."' ;";
		$exec = mysqli_query($dbc, $update_actif);
			echo('Nous vous remercions de votre achat ! :-) <br/><br/>');

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