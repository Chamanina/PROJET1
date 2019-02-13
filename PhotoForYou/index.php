<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');
  
  	include('./function/php/requete.php');
 
  $sql = "SELECT * FROM image";
  $q = "SELECT nom_img FROM image";

?>

<!DOCTYPE html>
<html>
  <body>
    <h1>Bienvenue sur PhotoForYou</h1>
    <p>Créé en 2019, le site "PhotoForYou" a pour but la vente de photographie par des photographes amateurs ou professionnels.<br/>
      Les photographies sont exclusives et toutes classées selon la catégorie correspondante ce qui les rendent UNIQUES !</p>

  <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 5</div>
      <img class="image" src="./imageIndex/jungle.jpg" style="width:100%">
      <div class="text"></div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 5</div>
      <img class="image" src="./imageIndex/foret.jpg" style="width:100%">
      <div class="text"></div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 5</div>
      <img class="image" src="./imageIndex/mer.jpg" style="width:100%">
      <div class="text"></div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">4 / 5</div>
      <img class="image" src="./imageIndex/montagne.jpg" style="width:100%">
      <div class="text"></div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">5 / 5</div>
      <img class="image" src="./imageIndex/ville.jpg" style="width:100%">
      <div class="text"></div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
<br/>

    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
      <span class="dot" onclick="currentSlide(4)"></span> 
      <span class="dot" onclick="currentSlide(5)"></span> 
    </div>
  </body>
</html>

<?php 
 
  include('./include/cotedroit.php');
  include('./include/footer.php');
    
?>
  <script src="./function/js/function_index.js" type="text/javascript"></script>



