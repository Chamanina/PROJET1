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
    <p>Créé en 2019, le site "PhotoForYou" a pour but la vente de photographie par des photographes amateurs ou professionnels certifiés et autorisés à vendre leurs oeuvres.<br/>
      Les photographies sont exclusives et toutes classées selon la catégorie correspondante ce qui les rendent UNIQUES !<br/><br/>

      Novitates autem si spem adferunt, ut tamquam in herbis non fallacibus fructus appareat, non sunt illae quidem repudiandae, vetustas tamen suo loco conservanda; maxima est enim vis vetustatis et consuetudinis. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus, in quibus diutius commorati sumus.</p>

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
</html><br/><br/>

<div style="display: none">
<?php
    include('./include/cotedroit.php');
?>
</div>


<?php
  include('./include/footer.php');
?>

  <script src="./function/js/function_index.js" type="text/javascript"></script>



