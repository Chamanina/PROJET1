<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');


$sql = "UPDATE user 
				SET credit_user = credit_user + 10
	 			WHERE email_user = '".$_SESSION['email_user']."';";
		$exec = mysqli_query($dbc, $sql);

		echo('Nous vous remercions de votre achat d\'un montant de 10 crédits ! :-) <br/><br/>

			<form enctype="multipart/form-data" action="achatcredits.php" method="post">
         		<input type="submit" name="Envoie" value="ACHETER PLUS DE CREDITS" class="formbutton"/> <br/><br/>
         	</form> ');
?>
 <div style="display: none">
<?php
    include('./include/cotedroit.php');
?>
</div>


<?php
    include('./include/footer.php');
?>