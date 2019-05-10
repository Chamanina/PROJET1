<?php
// SELECTION DES CATEGORIES
	// Sélectionne toutes les catégories d'image de la base de données
	function select_all_categ($dbc)
	{
		$sql = "SELECT idCategorie, nom_categ
                FROM categorie
                WHERE idCategorie <> 0
                ORDER BY nom_categ;";
		return $rs = mysqli_query($dbc, $sql);
	}

	function select_nom_categ($idCategorie, $dbc)
	{
		$sql = "SELECT idCategorie, nom_categ
			FROM categorie
			WHERE idCategorie = $idCategorie ;";
		return $rs = mysqli_query($dbc, $sql);
	}

//SELECTION PHOTOS
	// Sélectionne toutes les photos du site
	function select_all_img($dbc)
	{
		$sql = "SELECT nom_img, prix_img, lien_img, lien_php, description_img 
			FROM image";
		return $rs = mysqli_query($dbc, $sql);
	}


	//Sélection des images par catégorie ou l'image est encore active ( n'a pas été acheté )
	function select_search_categ($idCategorie, $dbc)
	{
		$sql = "SELECT idCategorie, nom_categ, nom_img, prix_img, lien_img, lien_php, actif_img
			FROM categorie, image
			WHERE categorie.idCategorie = image.categ_img
			AND idCategorie <> 0
			AND actif_img = 1
			AND idCategorie = ".$idCategorie."
			ORDER BY nom_img;";
		return $rs = mysqli_query($dbc, $sql);
	}

// AJOUT PHOTO
	// Sélectionne l'id de l'user qui ajoute une image
	function select_id($email_user, $dbc)
	{
		$sql = "SELECT idUser, prenom_user, nom_user, type_user, email_user
			FROM user
			WHERE email_user = '".$email_user."';";
		return $rs = mysqli_query($dbc, $sql);
	}



