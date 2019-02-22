<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');
?>

<?php

	// $credit_user = $_POST['credit_user'];

	//  include('./function/php/requete.php');
	
	
	// if(empty($credit_user))
	// {
	// 	echo('• Le champs "Nombre de crédit" attend une valeur numérique.<br/>');
	// }
	// if($credit_user <= 4)
	// {
	// 	echo ('• Veuillez saisir un nombre de crédit d\'au moins 5. <br/> <br/>');
	// }
	
	// else 
	// {
		
	// 	$sql = "UPDATE user 
	// 			SET credit_user = credit_user + $credit_user
	// 			WHERE email_user = '".$_SESSION['email_user']."';";
	// 	$exec = mysqli_query($dbc, $sql);
	// 	echo('Nous vous remercions de votre achat ! :-) <br/><br/>

	// 		<form enctype="multipart/form-data" action="achatcredits.php" method="post">
 //         		<input type="submit" name="Envoie" value="ACHETER PLUS DE CREDITS" class="formbutton"/> <br/><br/>
 //         	</form> ');


	// }
		// echo 'Voici quelques informations de débogage :';
		// print_r($_FILES);
		// echo '</pre>';


$nb_credit = $_GET['nb_credit'];

	if($nb_credit == 5 )
	{
		$update_credit5 = "UPDATE user 
				SET credit_user = credit_user + 5
	 			WHERE email_user = '".$_SESSION['email_user']."';";
		$exec = mysqli_query($dbc, $update_credit5);

		$select_credit ="SELECT credit_user
				FROM user
				WHERE email_user = '".$_SESSION['email_user']."';";
		$exec = mysqli_query($dbc, $select_credit);
		$result = mysqli_fetch_assoc($exec);
		$_SESSION['credit_user'] = $result['credit_user'];


		echo('Nous vous remercions de votre achat d\'un montant de 5 crédits ! :-) <br/><br/>

			<form enctype="multipart/form-data" action="achatcredits.php" method="post">
         		<input type="submit" name="Envoie" value="ACHETER PLUS DE CREDITS" class="formbutton"/> <br/><br/>
         	</form> ');

	}
	if($nb_credit == 10)
	{
		$update_credit10 = "UPDATE user 
				SET credit_user = credit_user + 10
	 			WHERE email_user = '".$_SESSION['email_user']."';";
		$exec = mysqli_query($dbc, $update_credit10);

		$select_credit ="SELECT credit_user
				FROM user
				WHERE email_user = '".$_SESSION['email_user']."';";
		$exec = mysqli_query($dbc, $select_credit);
		$result = mysqli_fetch_assoc($exec);
		$_SESSION['credit_user'] = $result['credit_user'];

		echo('Nous vous remercions de votre achat d\'un montant de 10 crédits ! :-) <br/><br/>

			<form enctype="multipart/form-data" action="achatcredits.php" method="post">
         		<input type="submit" name="Envoie" value="ACHETER PLUS DE CREDITS" class="formbutton"/> <br/><br/>
         	</form> ');
	}
	if ($nb_credit == 20) 
	{
	$sql = "UPDATE user 
				SET credit_user = credit_user + 20
	 			WHERE email_user = '".$_SESSION['email_user']."';";
		$exec = mysqli_query($dbc, $sql);

		$sql1 ="SELECT credit_user
				FROM user
				WHERE email_user = '".$_SESSION['email_user']."';";
		$exec1 = mysqli_query($dbc, $sql1);
		$result = mysqli_fetch_assoc($exec1);
		$_SESSION['credit_user'] = $result['credit_user'];

		echo('Nous vous remercions de votre achat d\'un montant de 20 crédits ! :-) <br/><br/>

			<form enctype="multipart/form-data" action="achatcredits.php" method="post">
         		<input type="submit" name="Envoie" value="ACHETER PLUS DE CREDITS" class="formbutton"/> <br/><br/>
         	</form> ');
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