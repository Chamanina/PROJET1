<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');

// $confirmation = $_GET['confirmation'];
$file_delete = $_GET['file_delete'];
//     if($confirmation == 'false'  && ($_SESSION['idUser']) == 1) 
// {
// 	echo ('<strong> ATTENTION : Vous êtes sur le point de supprime cette photographie ainsi que le contenu de sa page ! </strong><br/><br/>
// 	<center> Etes vous certain de vouloir faire ça ?<br/><br/>
// 		<form name="frm" method="post" action="./transfert_delete_img.php?confirmation=true">
// 			<input type="submit" id="submit_button" class="formbutton" value="OUI"/>
// 			<a href="./consulter.php"> <input type="button" id="submit_button" class="formbutton" value="NON"/></a>
// 		</form>
// 	</center><br/><br/>');

// }
// else
// {
	if ($_SESSION['idUser'] == 1)
	{
		if(isset($_GET['file_delete']))
		{
		        $q = "DELETE FROM image
				WHERE lien_php = '".$file_delete."';";
				$exec = mysqli_query($dbc, $q);

				echo ('La photographie  a bien été supprimée.');

			// header('Location : consulter.php');
	   	}
	}
// }