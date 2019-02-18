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

	if(empty($prix_img))
	{
		echo('Une erreure est survenue.');
	}	

	else
	{
		$sql = "UPDATE user 
				SET credit_user = credit_user - $prix_img 
				WHERE email_user = '".$_SESSION['email_user']."';";
		$exec = mysqli_query($dbc, $sql);

		$rq = "UPDATE user
			SET credit_user = credit_user + ($prix_img * 50 )/ 100
			WHERE idUser = $idUser;";
		$exec = mysqli_query($dbc, $rq);

	$q = "DELETE FROM image
		WHERE lien_php = '".$lien_php."' ;";
	$exec = mysqli_query($dbc, $q);
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