<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');

//Tableau de visualisation des utilisateurs par l'admin afin de procéder à une suppression si besoin
    $select_all_user= "SELECT idUser, prenom_user, nom_user, email_user, credit_user  
    				FROM user
    				WHERE idUser <> 1;";
    $result = mysqli_query($dbc, $select_all_user);

    echo('<table>
		<tbody>
		<tr>
			<td class="titre" colspan="6">TABLEAU DES UTILISATEURS</td>
		</tr>
		<tr>
			<td class="entete cell-10">ID</td>
			<td class="entete cell-20">PRENOM</td>
			<td class="entete cell-20">NOM</td>
			<td class="entete cell-20">MAIL</td>
			<td class="entete cell-10">CREDITS</td>
			<td class="entete"</td>
		</tr>');
    $i = 0;
	while($un_user = mysqli_fetch_assoc($result))
	{
	$i++;
	echo('
		<tr>
			<td class="tableau">'.$un_user['idUser'].'</td>
			<td class="tableau">'.$un_user['prenom_user'].'</td>
			<td class="tableau">'.$un_user['nom_user'].'</td>
			<td class="tableau">'.$un_user['email_user'].'</td>
			<td class="tableau">'.$un_user['credit_user'].'</td>
			<td>
			<center>
				<a href="./transfert_delete_compte.php?confirmation=no_delete&idUser='.$un_user['idUser'].'"> <input type="submit" id="submit_button" class="formbutton" value="SUPPRIMER"/></a>
			</center>
		</td>
		</tr>
		</tbody>');	
	}
	echo ('</table>');

?>