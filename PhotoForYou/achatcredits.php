<?php
	 require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');
?>

    <html>
   <head>
      <title>Stock d'images</title>
   </head>
   <body>
      <h3>"Simulation" d'achat de crédits</h3>
      <p> Veuillez saisir le nombre de crédit que vous souhaitez afin de pouvoir procéder à l'achat de futurs photographies via l'onglet <strong>"VOIR LES PHOTOS" </strong> dans le menu .</p>
      <form enctype="multipart/form-data" action="./transfert_credit.php" method="post">
         <p><label for="credit_user"><strong>NOMBRE DE CREDITS : </strong></label><br/>
         <input type="text" id="credit_user" name="credit_user" placeholder="50" /></p>

         <br/>  <br/> 
         <input type="submit" name="Envoie" value="ACHETER LES CREDITS" class="formbutton"/>
         <br/><br/>
         
      </form>
   </body>
</html>


 	 <div style="display: none">
<?php
    include('./include/cotedroit.php');
?>
</div>
<?php
    include('./include/footer.php');
?>