<?php
ob_start();
include 'traccia.php';//tracio il login
require 'gestione_carrello.php';
if (isset($_SESSION['user'])) { //controllo se c'é il session
  if ($name_page != 'login' && $name_page != 'logout') {//controllo se la pagina non é la pagina del home ne l'utima pagina
    traccia_user($_SESSION['user']);//chiamo una funziona che stampa sul un file se tutto é a posto
  }
}

function setStyle($style){//per cambiare il style in ogni pagina
#----------------------- start of switch --------------------------#
switch ($style) {
  case 'login':
    echo "login_spinner";
    break;
  case 'Sign Up':
  echo "sign_up";
    break;
  case 'Area riservata':
  echo "home";
    break;
  case 'carrello':
    echo "carrello";
      break;
  default:
    echo "default";
    break;
}
#---------------------- end of switch -----------------------------#

}

?>


<!DOCTYPE html>
<html>
  <head>
    <!--START LINK META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- per il risponsive -->
    <!--START LINK META -->
    <title> <?php if (isset($name_page)) { echo $name_page;}else { echo 'Home';} ?></title>
    <!--START LINK CSS -->
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet"><!-- font google -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">--><!-- font google -->
    <link rel="stylesheet" href="../../layout/css/bootstrap.min.css"> <!--bootstrap-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"><!--fontawesome-->
  <link rel="stylesheet" href="../css/menu.css"> <!--meun style -->
    <link rel="stylesheet" href="../css/<?php if (isset($name_page)) { setStyle($name_page); }else {echo "default";}?>.css"> <!--MY FILE CSS-->
    <!--START LINK CSS -->

  </head>
   <body>

     <!-- <div class="alert alert-info alert-dismissible fade show cookie" role="alert">
       <strong>questo sito usa i cookie!</strong> per migliorare il servizio .
        <button type="button" class="btn btn-success" name="button">Accetta</button> 
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div> -->
<?php
if (isset($_SESSION['user'])) { //controllo se c'é il session
  if ($name_page != 'login' && $name_page != 'logout' && $name_page != 'add') {//controllo se la pagina non é la pagina del home ne l'utima pagina
    if(!isset($no_menu)){
    require_once 'menu.php';//incoludo il menu
  }

  }
} ?>
