<?php
session_start();
$name_page = 'Area riservata';
require 'header.php';
#require_once 'gestione_carrello.php';

if (!isset($_SESSION['user'])) {
  header('location: login.php');  //redirct at form
  exit();
}
// $user_file = $_SESSION['user_file'].'prodotti.csv'; //il nome dell'user  file
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// $save_goods[] = $_POST['src'];//il percoso del imagine
// $save_goods[] = $_POST['pizza'];// il nome del pizza
// $save_goods[] = $_POST['price'];//il prezzo
//
// save_goods($user_file,$save_goods);
// header('location:home.php');
// }
//messaggio
/*
echo "<div class='text-center'>";
echo "<h2 >Benvenuto <mark> ".ucwords(strtolower($_SESSION['user']))." </mak>;) </h2>";
echo "<p  style='color:red;'> la costruzione della pagina home é in corso, scusa per il disagio </p>";

echo "<button class='btn   btn-outline-success'  style='margin:7px;'> <a href='logout.php'> logout </a> </button>";
echo "</div>";
*/
?>
<div class="container-fluid slid">
  <div class="slider ">
      <div id="my-slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#my-slider" data-slide-to="0" class="active"></li>
          <li data-target="#my-slider" data-slide-to="1"></li>
          <li data-target="#my-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active one">
            <img class="d-block w-100 img-fluid" src="../../layout/images/pizza_back.jpg" alt="First slide">
          </div>
          <div class="carousel-item two">
            <img class="d-block w-100 img-fluid" src="../../layout/images/pizza_3.jpg" alt="Second slide">
          </div>
          <div class="carousel-item three">
            <img class="d-block w-100 img-fluid" src="../../layout/images/pizza_4.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#my-slider" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#my-slider" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  </div>
</div>

<div class="container-fluid">
  <div class="container  text-center">
    <h2 class="heading">Le nostre pizze</h2>
    <div class="row">
      <div class="col-lg-3 col-md-4 col-10 mx-auto">
        <div class="card pizza">
          <img class="card-img-top img-fluid" src="../../layout/images/pizza_18.jpg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Prosciutto e funghi</h3>
            <!--  <p class="card-text">qua ci sara' il contenuto.</p> -->
            <p class="prezzo">6€</p>
            <form>
                <input type="hidden" name="src" value="../../layout/images/pizza_18.jpg"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="pizza" value="Prosciutto e funghi"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="price" value="6€"> <!-- per sapere quale pizza ha scelto l'utente -->
                 <button type="button"  class="btn btn-primary btn-block">Aggiungi al carrello</button>
             </form>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-10 mx-auto">
        <div class="card pizza">
          <img class="card-img-top img-fluid" src="../../layout/images/pizza_5.jpg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Gusto italiano</h3>
            <!-- <p class="card-text">qua ci sara' il contenuto.</p> -->
            <p class="prezzo">7€</p>
            <form>
                <input type="hidden" name="src" value="../../layout/images/pizza_5.jpg"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="pizza" value="Gusto italiano"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="price" value="7€"> <!-- per sapere quale pizza ha scelto l'utente -->
                 <button type="button"  class="btn btn-primary btn-block">Aggiungi al carrello</button>
             </form>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-10 mx-auto">
        <div class="card pizza">
          <img class="card-img-top img-fluid" src="../../layout/images/pizza_6.jpg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Capricciosa</h3>
            <!-- <p class="card-text">qua ci sara' il contenuto.</p> -->
            <p class="prezzo">7.50€</p>
            <form>
                <input type="hidden" name="src" value="../../layout/images/pizza_6.jpg"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="pizza" value="Capricciosa"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="price" value="7.50€"> <!-- per sapere quale pizza ha scelto l'utente -->
                 <button type="button"  class="btn btn-primary btn-block">Aggiungi al carrello</button>
             </form>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-10 mx-auto">
        <div class="card pizza">
          <img class="card-img-top img-fluid" src="../../layout/images/pizza_7.jpg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Crudo e rucola</h3>
            <!-- <p class="card-text">qua ci sara' il contenuto.</p> -->
            <p class="prezzo">6€</p>
            <form>
                <input type="hidden" name="src" value="../../layout/images/pizza_7.jpg"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="pizza" value="Crudo e rucola"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="price" value="6€"> <!-- per sapere quale pizza ha scelto l'utente -->
                 <button type="button"  class="btn btn-primary btn-block">Aggiungi al carrello</button>
             </form>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-10 mx-auto">
        <div class="card pizza">
          <img class="card-img-top img-fluid" src="../../layout/images/pizza_8.jpg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Cipolla e olive</h3>
            <!-- <p class="card-text">qua ci sara' il contenuto.</p> -->
            <p class="prezzo">6€</p>
            <form>
                <input type="hidden" name="src" value="../../layout/images/pizza_8.jpg"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="pizza" value="Cipolla e olive"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="price" value="6€"> <!-- per sapere quale pizza ha scelto l'utente -->
                 <button type="button"  class="btn btn-primary btn-block">Aggiungi al carrello</button>
             </form>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-10 mx-auto">
        <div class="card pizza">
          <img class="card-img-top img-fluid" src="../../layout/images/pizza_9.jpg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Wuster, olive e grana</h3>
            <!-- <p class="card-text">qua ci sara' il contenuto.</p> -->
            <p class="prezzo">7€</p>
            <form>
                <input type="hidden" name="src" value="../../layout/images/pizza_9.jpg"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="pizza" value="Wuster, olive e grana"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="price" value="7€"> <!-- per sapere quale pizza ha scelto l'utente -->
                 <button type="button"  class="btn btn-primary btn-block">Aggiungi al carrello</button>
             </form>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-10 mx-auto">
        <div class="card pizza">
          <img class="card-img-top img-fluid" src="../../layout/images/pizza_14.jpg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Rucola, olive e peperoni</h3>
            <!-- <p class="card-text">qua ci sara' il contenuto.</p> -->
            <p class="prezzo">7€</p>
            <form>
                <input type="hidden" name="src" value="../../layout/images/pizza_14.jpg"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="pizza" value="Rucola, olive e peperoni"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="price" value="7€"> <!-- per sapere quale pizza ha scelto l'utente -->
                 <button type="button"  class="btn btn-primary btn-block">Aggiungi al carrello</button>
             </form>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-10 mx-auto">
        <div class="card pizza">
          <img class="card-img-top img-fluid" src="../../layout/images/pizza_11.jpg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Salame piccante e olive</h3>
            <!-- <p class="card-text">qua ci sara' il contenuto.</p> -->
            <p class="prezzo">7€</p>
            <form>
                <input type="hidden" name="src" value="../../layout/images/pizza_11.jpg"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="pizza" value="name"> <!-- per sapere quale pizza ha scelto l'utente -->
                <input type="hidden" name="price" value="7€"> <!-- per sapere quale pizza ha scelto l'utente -->
                 <button type="button"  class="btn btn-primary btn-block">Aggiungi al carrello</button>
             </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--##########################################################################################################################################################  -->
  <!-- <form  action="<?php //echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <h2 class="text-center"> inserisci un prodotto </h2>
    <div class="form-group">
    <label for="product">Nome del prodotto</label>
    <input type="text" class="form-control"  id="product" name="name_product" placeholder=" il nome del prodotto" required />
  </div>
  <div class="form-group">
    <label for="scadenza">Data di scadenza</label>
    <input  type="date" class="form-control" id="scadenza" name="scadenza" onchange="control_date()"  required />
  </div>
    <button type="button" class="btn btn-primary btn-block"  name="button">invio</button>
  </form> -->
  <!--##########################################################################################################################################################  -->

</div>



<?php include 'footer.php'; ?>
