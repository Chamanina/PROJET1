<div class="sidebar">
    
    <?php 
    if (isset($_SESSION['email_user']) && $_POST['type_user']=1) 
    {
      echo '
      <ul>	
         <li>
              <h3>Menu</h3>
              <ul class="blocklist">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="achatcredits.php">Achat des crédits</a></li>
                  <li><a href="achatimages.php">Voir les photos</a></li>
                  <li><a href="ajout.php">Ajouter des photos</a></li>
                  <li><a href="contacts.php">Nous contacter</a></li>
                  <li><a href="deconnexion.php">Deconnexion</a></li>
              </ul>
          </li>
        </ul>   ';  
    }  
    elseif (isset($_SESSION['email_user']) && $_POST['type_user']=2)
    {
       echo '
      <ul>  
         <li>
              <h3>Menu</h3>
              <ul class="blocklist">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="achatcredits.php">Achat des crédits</a></li>
                  <li><a href="achatimages.php">Voir les photos</a></li>
                  <li><a href="contacts.php">Nous contacter</a></li>
                  <li><a href="deconnexion.php">Deconnexion</a></li>
              </ul>
          </li>
        </ul>   ';
    }
    else
    {
        echo '
        <form action="connexion.php" method="post" accept-charset="utf-8">
        <p>
            <label for="email">
                   <strong>Adresse e-mail</strong></label>
                    <br />
            <input type="text" name="email" id="email" />
            <br />
            <label for="pass">
                <strong>Mot de passe</strong>
            </label>
            <br />
            <input type="password" name="pass" id="pass" /> 
            <input type="submit" value="Login &rarr;"></p>
    </form> ';
    } 
     ?>         
        </div>
<div class="clear"></div>
    </div>