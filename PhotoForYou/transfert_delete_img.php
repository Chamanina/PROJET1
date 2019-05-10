<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');

	$file_delete = $_GET['file_delete'];
	//Si l'utilisateur est admin
	if ($_SESSION['idUser'] == 1)
	{
		if(isset($_GET['file_delete']))
		{
		        $q = "DELETE FROM image
				WHERE lien_php = '".$file_delete."';";
				$exec = mysqli_query($dbc, $q);

				echo ('La photographie  a bien été supprimée.');
	   	}
	}
