<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');
?>

<?php

	$credit_user = $_POST['credit_user'];

	 include('./function/php/requete.php');
	 $rs_select_id = select_id($_SESSION['email_user'], $dbc);
	
	if(empty($credit_user))
	{
		echo('Le champs "Nombre de crédit" attend une valeur numérique.');
	}
	if($credit_user <= 0)
	{
		echo ('Veuillez saisir un nombre de crédit supérieur à 0.');
	}
	
	else 
	{
		$q = mysqli_fetch_assoc($rs_select_id);
		$sql = "UPDATE user 
				SET credit_user = ".$credit_user."
				WHERE email_user = ".$q['idUser'].";";
		$exec = mysqli_query($dbc, $sql);
		echo('Nous vous remercions de votre achat ! :-) ');
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