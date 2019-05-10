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
      	<p> Choisissez le montant de crédit que vous souhaitez posseder. <br/>
        <strong>Aide :</strong><br/>
         	• Passez la souris sur les images ci-dessous.<br/>
         	• Cliquez sur le montant correspondant à votre choix.<br/>
        <strong> ATTENTION : Vous ne pourrez pas revenir arrière après le clique, alors choisissez bien! </strong></p>

      	<form action="./transfert_credit.php" method="post">
	        <div class="container_achat">
	          	<a href="./transfert_credit.php?nb_credit=5"  ><img src="imageIndex/jaune.jpg" class="image_achat" id="credit_user" name="credit_user">
	          		<div class="overlay_achat">
	            		<div class="text_achat">5 crédits</div>
	          		</div>
	          	</a>
	        </div>

	        <div class="container_achat">
	          	<a href="./transfert_credit.php?nb_credit=10"  ><img src="imageIndex/orange.jpg" class="image_achat" id="credit_user" name="credit_user">
	          		<div class="overlay_achat">
	            		<div class="text_achat">10 crédits</div>
	          		</div>
	          	</a>
	        </div>

	        <div class="container_achat">
	          	<a href="./transfert_credit.php?nb_credit=20"  ><img src="imageIndex/rouge.jpg" class="image_achat" id="credit_user" name="credit_user">
	          		<div class="overlay_achat">
	            		<div class="text_achat">20 crédits</div>
	          		</div>
	          	</a>
	        </div>
      </form>
      <br/><br/>
   </body>

   	<!--Div disparition cotedroit.php-->
 	<div style="display: none">
<?php
    	include('./include/cotedroit.php');
?>
	</div>
<?php
    	include('./include/footer.php');
?>
</html>