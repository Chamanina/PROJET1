<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');

$confirmation = $_GET['confirmation'];

if($confirmation == 'false')
{
	echo ('<strong> ATTENTION : Vous êtes sur le point de supprime votre compte ! </strong><br/><br/>
	<center> Etes vous certain de vouloir faire ça ?<br/><br/>
		<form name="frm" method="post" action="./transfert_delete_compte.php?confirmation=true">
			<input type="submit" id="submit_button" class="formbutton" value="OUI"/>
			<a href="./profil.php"> <input type="button" id="submit_button" class="formbutton" value="NON"/></a>
		</form>
	</center><br/><br/>');
}
else
{
	$q = "DELETE FROM image
		WHERE idUser = '".$_SESSION['idUser']."';";
	$exec = mysqli_query($dbc, $q);

	$sql = "DELETE FROM user
		WHERE email_user = '".$_SESSION['email_user']."';";
	$exec = mysqli_query($dbc, $sql);
	
	$_SESSION = array(); // Détruire les variables.
		session_destroy(); // Détruire la session elle-même.
		header('Location:index.php');
}


?>
<?php
	
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


