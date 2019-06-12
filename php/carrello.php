<?php
session_start();
 $name_page = 'carrello';
 require 'header.php';
# require_once 'gestione_carrello.php';
//il controllo
 if(!isset($_SESSION['user'])){
   header('location:login.php');
   exit();
 }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//cancellazione
  if (isset($_POST['delete'])) {
  $ar = $_POST['del'];
  del($user_file,$ar);
}
//ordine fatto
if (isset($_POST['procedi'])) {
  $ar = $_POST['del'];
ordine($user_file,$ar);

  }
}

?>
  <!-- un controllo per la tabela  -->
  <div class="container-fluid">
    <?php
    if (isset($_GET['pay']) && $_GET['pay'] == 'paid') {?>
      <div class="alert alert-success mx-auto">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
      <?php   echo "<h4 class='text-center msg'> il tuo ordine e' andato a buon fine :)</h4>";

$c = elements($user_file);
if ($c == 0 && isset($_GET['pay']) && $_GET['pay'] == 'paid' ) {
 header('refresh:4;url=home.php'); 
}
?>

      </div>
  <?php }else{ ?>
  <div  <?php  $conta = elements($user_file);if ($conta == 0) { echo "style = 'display:block;'"; } ?>
     class="messaggio text-center" >
    carrello vuoto <span><i class="fas fa-sad-tear"></i></span>  prova ad aggiungere qualche prodotto .
  </div>
  <?php } ?>
    <div class="conatiner con_form_table  "
       <?php $conta = elements($user_file);if ($conta == 0) { echo "style = 'display:none;'"; } ?>
         >
         <form action="<?php echo $_SERVER['PHP_SELF']; ?> "  method="post" class="form_table" >
           <div class="conatiner table-responsive-sm mx-auto">
             <table  class="table "  onchange="check()"  >
                <thead class="thead-dark">
                <tr>
                  <th>prodotto</th>
                  <th>Prezzo</th>
                  <th>Scelta</th>
                  <!-- <th>giorni mancanti</th> -->
                  <!-- <th>stato</th> -->
                  <!-- <th>Delete</th> -->
                </tr>
            </thead>
    <?php show_goods($user_file); ?>
<tr>
  <td colspan="3" class="mx-auto">Totale :
  <span id="totale">  </span>
</td>
</tr>
  </table>
</div>
  <button type="submit" id="btn" class="btn btn-danger" name="delete" >Delete</button>
  <button type="submit" id="pro"  class="btn btn-primary" name="procedi">Procedi</button>
  </form>
</div>
</div>
<?php require 'footer.php'; ?>
