<?php

if (isset($_SESSION['user'])) {//controllo se c'é session o no

//login
function traccia_login_logout($e,$user)
{
  $fp = fopen('files/login_and_logout.csv', 'a');
  $traccia [] = $user;//stampo chi é l'user
  $traccia [] = $e;//stampo cosa ha fatto login o logout
  $traccia [] = date('d/m/Y - H:i:s');//stampo l'ora e la data
  $traccia [] = $_SERVER['REMOTE_ADDR'];//stampo il suo ip
  fputcsv($fp, $traccia);
  fclose($fp);
}


//per tracciare il user
function traccia_user($user)
{
  $fp = fopen('files/traccia_user.csv', 'a');
  $traccia [] = $user;//stampo chi é l'user
  $traccia [] = $_SERVER['PHP_SELF'];//stampo qual'é la pagina che ha visitato
  $traccia [] = date('d/m/Y - H:i:s');//stampo l'ora e la data
  $traccia [] = $_SERVER['REMOTE_ADDR'];//stampo il suo ip
  fputcsv($fp, $traccia);
  fclose($fp);
}
}
