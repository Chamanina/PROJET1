<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');
?>

<?php

	$credit_user = $_POST['credit_user'];
	
		$q = "SELECT prix_img FROM image 
			WHERE lien_php = '".$lien_php."'"; 
		
		$sql = "UPDATE user 
				SET credit_user = $credit_user - $q
				WHERE email_user = '".$_SESSION['email_user']."'
				AND credit_user = '".$_SESSION['email_user']."';";
		$exec = mysqli_query($dbc, $sql);
		echo('Nous vous remercions de votre achat ! :-) <br/><br/>');


	
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