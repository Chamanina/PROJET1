<?php
	require('./include/mysql.inc.php');
	require('./include/config.inc.php');
	include('./include/head.php');
	include('./include/navigation.php');

	if(isset($_SESSION['email_user']))
	{
		$_SESSION = array(); // Détruire les variables.
		session_destroy(); // Détruire la session elle-même.
		header('Location:index.php');
	}	


	include('./include/cotedroit.php');
	include('./include/footer.php');
   
?> 