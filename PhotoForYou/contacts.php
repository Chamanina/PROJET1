<?php
  require('include/config.inc.php');
  require('include/mysql.inc.php');
  include('include/head.php');
  include('include/navigation.php');


?>
		<div id="content">
		<h3>Nous contacter</h3></br>
      <!-- Ceci est un commentaire HTML. Le code PHP devra remplacé cette ligne -->
      <form method="post" action="<?php echo strip_tags($_SERVER['REQUEST_URI']); ?>">
      <p>Nom et prénom :</br> <input type="text" name="nom" size="30" /></p>
      <p>Email :</br> <input type="text" name="email" size="30" /></p>
      <p>Message :</br></p>
      <textarea name="message" cols="60" rows="10"></textarea>
     
      <p><input type="submit" name="submit" value="Envoyer" /></p>
    </div>
        
<?php  
  include('./include/cotedroit.php');
  include('./include/footer.php');
?>
