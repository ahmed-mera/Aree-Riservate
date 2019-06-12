<?php
session_start();
// $name_page = 'add';
// require 'header.php';
require 'gestione_carrello.php';
$user_file = $_SESSION['user_file'].'prodotti.csv'; //il nome dell'user  file
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$save_goods[] = $_POST['src'];//il percoso del imagine
$save_goods[] = $_POST['pizza'];// il nome del pizza
$save_goods[] = $_POST['price'];//il prezzo
// foreach ($save_goods as  $value) {
// echo $value;
// }
save_goods($user_file,$save_goods);
 $conta = elements($user_file);
 echo $conta ;
}
