<?php
    require('include/config.inc.php');
    require('include/mysql.inc.php');
    include('include/head.php');
    include('include/navigation.php');

	if (isset($_POST['email']) && isset($_POST['pass'])) 
    {
        // unset($_SESSION['user']);
        
        $q = "SELECT idUser, email_user, prenom_user, nom_user, mdp_user, type_user FROM user WHERE email_user = '".$_POST['email']."';";
        $r = mysqli_query ($dbc, $q);


        list($idUser, $email, $prenom_user, $nom_user, $motdepasse, $type_user) = mysqli_fetch_array($r,MYSQLI_NUM);
        if (empty($email))
        {
            echo 'Votre E-mail n\'est pas indiqué ou n\'existe pas.';
            $var = '';
        } 
        else 
        {
        	$var = 'Le mot de passe est nécessaire afin de pouvoir se connecter.';
        	// echo $motdepasse;
        	$pass_correct = password_verify($_POST['pass'], $motdepasse);
            
            if($pass_correct)
            {

               session_start();
            
                include('./function/php/requete.php');
           
                $_SESSION['email_user'] = $email;
                $_SESSION['prenom_user'] = $prenom_user;
                $_SESSION['nom_user'] = $nom_user;
                $_SESSION['type_user'] = $type_user;
                $_SESSION['idUser'] = $idUser;
       
           
                header('Location: index.php');
                exit();
                  
            }
        }
        echo $var;
       ;
    } 
    else 
    {
?>

<form action="connexion.php" method="post" accept-charset="utf-8">
	<p>
		<label for="email"><strong>Adresse e-mail</strong></label><br>

		<input type="text" name="email" id="email"/><br>
		
		<label for="pass"><strong>Mot de passe</strong></label><br>
		<input type="password" name="pass" id="pass"/> 
    </p>
		
		<input id="submit_button" class="formbutton" type="submit" value="Se connecter">
        <br><br>
</form> 

<?php

    }
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


