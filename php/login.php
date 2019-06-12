<?php
session_start();
$name_page = 'login';
include 'cookie.php' ; //conclusione del cookie
include 'header.php' ; //conclusione del header
//controllo se c'e' il sessione o no
if (isset($_SESSION['user'])) {
header('location: home.php');  //redirct al suo pagina
}

//apro il file in  modalita' ( r )
$fp = fopen('files/dati.csv', 'r');

while (!feof($fp)) {

    $dati[] = fgetcsv($fp);

}
fclose($fp);

//preparo i dati per il controllo
for ($i = 0; $i  < count($dati) ; $i++) { //il primo array

  //array assositiv
  $ass_dati[$i]['fname'] = $dati[$i][0];
  $ass_dati[$i]['lname'] = $dati[$i][1];
  $ass_dati[$i]['email'] = $dati[$i][2];
  $ass_dati[$i]['pass'] = $dati[$i][3];

}

$err_user  = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user = strtoupper(htmlspecialchars($_POST['username']));  // converto le letterre del user in maiuscolo
  $pass = htmlspecialchars($_POST['password']); //decifrare la password



for ($i=0; $i < count($ass_dati) ; $i++) {

    if ($ass_dati[$i]['email'] === $user && $ass_dati[$i]['pass'] === $pass ) { //controllo se i dati inseriti sono giusti
      $_SESSION['user'] = $ass_dati[$i]['lname'].' '.$ass_dati[$i]['fname'];
      $_SESSION['email'] = $ass_dati[$i]['email'];
      $_SESSION['pass'] = $ass_dati[$i]['pass'] ;
      //la posizione della cartella dell'utente ( per il carrello )
      $_SESSION['user_file'] = strtolower( '../users/'.$ass_dati[$i]['fname'].'_'.$ass_dati[$i]['lname'].'/');//il suo file
      $_SESSION['dir_user'] = strtolower( '../users/'.$ass_dati[$i]['fname'].'_'.$ass_dati[$i]['lname']);//la sua cartella

        include 'spinner.php';//un effetto di rloading
     header('REFRESH:5; url = home.php');//redirct al suo pagina
     include 'traccia.php';//traccio il login
     $login = 'login';
     $user_name = $ass_dati[$i]['lname'].' '.$ass_dati[$i]['fname'];;
     traccia_login_logout($login,$user_name);//scrivo su un file
      exit();//e poi esce

    }
     else  //controllo per gli errori
      {
        $err_user = '';
      $err_user  = 'password non é corretta o username non esistente <br />';


      }
}

}

?>


   <div class="alert alert-danger alert-dismissible fade show text-white   <?php if (empty($err_user) ) {echo 'no_err'; } ?>" role="alert">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
  <?php
  if (!empty($err_user)) {echo $err_user; $ere_user = '';}
    ?> <!-- stampo i messaggi di errorri -->
   </div>
     <!--START FORM -->
     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
       <h1 class="text-center"> Login </h1>
       <input class="form-control" type="email" name="username" autocomplete="on" placeholder="Username (E-mail)" required  />
       <input class="form-control" type="password" name="password" autocomplete="off" placeholder="password" required />
       <button type="submit" class="btn btn-primary btn-block">invio</button>

       <a href="sign_up.php">Non hai un account ?  </a>
       <a href="pass_forget.php">password dimenticata ? </a>
     </form>
     <!--END FORM -->


<?php include 'footer.php'; ?>
