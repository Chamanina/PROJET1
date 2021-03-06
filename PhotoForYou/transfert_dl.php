<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');

	if ($_SESSION['idUser'])
	{
		if(!empty($_GET['file']))
		{
		    $fileName = basename($_GET['file']);
		    $filePath = 'image/'.$fileName;
		    if(!empty($fileName) && file_exists($filePath))
		    {
		        // Definie les headers avec le nom du dossier des images téléchargeables ...
		        header("Cache-Control: public");
		        header("Content-Description: File Transfer");
		        header("Content-Disposition: attachment; filename=$fileName");
		        header("Content-Type: application/zip");
		        header("Content-Transfer-Encoding: binary");
		        ob_clean();
				flush();
	        	//Lecture des headers
	        	readfile($filePath);
	        	exit;
	    	}
	    	else
	    	{
	        	echo 'The file does not exist.';
	    	}
		}

	}
?>

