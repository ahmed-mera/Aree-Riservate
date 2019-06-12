<?php
session_start();//ricomincia il session
$name_page = 'logout'; // il  nome della pagina

include 'header.php';//includo il header

if (!isset($_SESSION['user'])) {

  header('location:login.php');//redirct to page login if is not session
  exit();
}
include_once 'traccia.php';//concludo il file di traccia
$user = $_SESSION['user'];
$logout = 'logout';
traccia_login_logout($logout,$user);//stampo il logout
session_unset();//clear for il session (per togliere il session)

session_destroy();//destroy the session ( per destrogger il session )

header('location:login.php');//redirct to page login
