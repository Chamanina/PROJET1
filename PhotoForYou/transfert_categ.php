<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');
	    
    include('./function/php/requete.php');
	  $rs_categ = select_all_categ($dbc);
    $rs_all_img = select_all_img($dbc);

    $l_categ = $_POST['l_categ'];
    $rs_select_search_categ = select_search_categ($l_categ, $dbc);

	 echo('<form name="frm" id="form_doc" method="post" action="transfert_categ.php">
    <center>
      <select id="l_categ" name="l_categ" class="form-control">
        <option value="0">Sélectionner une catégorie</option>');
        while($une_categ = mysqli_fetch_assoc($rs_categ))
        {
        echo('<option value="'.$une_categ['idCategorie'].'">'.$une_categ['nom_categ'].'</option>');
        } 
        echo('</select>
          <input type="submit" value="RECHERCHER" name="submit_button" id="submit_button" class="formbutton" onclick=""/>
            <br/></center>
      </form> <br/><br/>');
     $i = 0;
	   while($row=mysqli_fetch_array($rs_select_search_categ))
	   {

	  	 	$i++;
        echo('
          <div class="container1">
            <img id="image'.$i.'" alt="'.$row['nom_img'].'" width="255" height="180" onclick="onClick(this, '.$i.')" class="modal-hover-opacity" style="max-width:100%;cursor:pointer"  src="'.$row['lien_img'].'"/>
          </div>
          <div id="modal'.$i.'" class="modal" onclick="this.style.display=\'none\'">
            <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="modal-content">
              <img id="img'.$i.'" class="consult_img" style="max-width:100%">
            </div>
            <div id="caption"> <br/><br/>
              <center>
                <a href="'.$row['lien_php'].'"><button class="formbutton">ACHETER LA PHOTO</button></a><br/>
              </center>
            </div>
          </div>
        ');

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



<script src="function/js/function_modal.js" type="text/javascript"></script>
  
   