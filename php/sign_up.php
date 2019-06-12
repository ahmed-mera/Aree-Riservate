<?php

$name_page = 'Sign Up';
include 'header.php';
#-----------------------------------------------
for ($i = 0; $i < 26 ; $i++) {//arary minuscola
  $lower_case [$i] = chr($i + 97);
}
#-------------------------------------------
for ($i = 0; $i < 26 ; $i++) {//arary maiuscola
  $uper_case [$i] = chr($i + 65);
}
#----------------------------------------------
for ($i = 0; $i < 10 ; $i++) {//arary numbers
  $numbers [$i] = chr($i + 48);
}
#--------------------------------------
//apro il file in  modalita' ( r )
$fp = fopen('files/dati.csv', 'r');

while (!feof($fp)) {

    $control_data[] = fgetcsv($fp);

}
fclose($fp);

//preparo i dati per il controllo
for ($i = 0; $i  < count($control_data) ; $i++) { //il primo array

  //array assositiv
  $ass_dati[$i]['fname'] = $control_data[$i][0];
  $ass_dati[$i]['lname'] = $control_data[$i][1];
  $ass_dati[$i]['email'] = $control_data[$i][2];
  $ass_dati[$i]['pass'] = $control_data[$i][3];

}
#-----------------------------------------------

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //prelevo i dati
$dati [] = strtoupper(htmlspecialchars($_POST['lname']));//il nome
$dati [] = strtoupper(htmlspecialchars($_POST['fname']));//il cognome
$dati [] = strtoupper(htmlspecialchars($_POST['email']));//l'email
$dati [] = htmlspecialchars($_POST['pass']);//password
#------------------------------------------
//contrplp se il user già esite o no
//preparo i dati per il controllo
for ($i = 0; $i  < count($ass_dati) ; $i++) {

//controllo se il user e nome e il cognome ci sono sul file o no
  if (in_array($dati[0], $ass_dati[$i]) && in_array($dati[1], $ass_dati[$i]) && in_array($dati[2], $ass_dati[$i])) {
  $errors[] = ' * utente già <b> rigestrato </b><br /> <a href="login.php">  vuoi fare il login ? </a>';
}
else{
  //controllo se  e nome e il cognome ci sono sul file o no
    if (in_array($dati[0], $ass_dati[$i]) && in_array($dati[1], $ass_dati[$i]) ) {
    $errors[] = ' * dati presenti nel sistema <b> nome e cognome ';
    }
    //controllo se il user c'é sul file o no
    if (in_array($dati[2], $ass_dati[$i])) {
    $errors[] = '* <b>Email</b> già esistente';
    }
  }
}
#-----------------------------------------------
//CONTROLLO LA password
if (strlen($dati[3]) < 8) {//la lunghezza della password
$errors[] = '* la password deve essere maggiore di <b>8 caratteri </b>';
}
$minuscola =  $maiuscola =  $number = $space = '';

for ($i=0; $i <strlen($dati[3]) ; $i++) {
  //controllo i requisiti
  if (in_array($dati[3][$i], $lower_case)) {//lettaera minuscoloa

    $minuscola = true;
  }

  if (in_array($dati[3][$i], $uper_case)) {//lettaera miauscoloa
    $maiuscola = true;
  }

  if (in_array($dati[3][$i], $numbers)) {//numero
    $number = true;
  }
  $spazio[] = chr(32); //il codice ascii per lo sapzio
  if (in_array($dati[3][$i],$spazio)) {//space
    $space = true;
  }
}
#--------------------------------------------------------------------
//riempo  l'array degli errori se i riquisiti non ci sono
if ( $minuscola != true) {
  $errors[] = ' * <b>la paswword </b> non contiene una lettera <b> minuscola </b> :( ';
}

if ($maiuscola != true) {
  $errors[] = '* <b>la paswword </b> non contiene una lettera <b> maiuscola </b> :( ';
}

if ($number != true) {
  $errors[] = '* <b>la paswword </b> non contiene un <b> numero </b> :( ';
}
if ($space == true) {
  $errors[] = '* <b>la paswword </b> non deve contienere uno <b> spazi </b> :( ';
}

#-----------------------------------------------
//CONTROLLO LA nome e cognome e email

$nome =  $cognome =  $email =  '';

  //controllo i requisiti
  if ($dati[0][0] == $dati[0][1] && $dati[0][1] == $dati[0][2]) {//user surname fake

    $cognome = true;//se ci sono errori
  }

  if ($dati[1][0] == $dati[1][1] && $dati[1][1] == $dati[1][2]) {//user name fake

    $nome = true;//se ci sono errori
  }

  $mail = strstr($dati[2], '@',TRUE);//prendo tutto ciò che prima della @
  if (strlen($mail) < 5) {
    $email = true;//ci sono errori
  }else {
     if ($dati[2][0] == $dati[2][1] && $dati[2][1] == $dati[2][2]) {//email fake
       $email = true;//ci sono errori
     }
  }



#--------------------------------------------------------------------
//riempo  l'array degli errori se i riquisiti non ci sono
if ( $cognome == true) {
  $errors[] = ' * <b> cognome </b> non é vero </b> :( ';
}

if ($nome == true) {
  $errors[] = '* <b> nome </b> non é vero </b> :( ';
}

if ($email == true) {
  $errors[] = '* <b>  Email </b> non é vera </b> :( ';
}

#------------------------------------------
//controllo se la password sono uguali o no
if ($_POST['pass'] != $_POST['conf-pass']) {
$err_conf_pass [] = 'error password';
}else{
if (empty($errors)) {

  #----------------------------------
  //scrivo sul file i dati
  $fp = fopen('files/dati.csv', 'a');
  fputcsv($fp, $dati);
  fclose($fp);



  #------------------------------------------
  //creo la sua cartella
  $file ='../users/';
  $file .=strtolower($dati[0].'_'.$dati[1]);
  if (!is_dir($file)) {
    //creazione cartella
    mkdir($file);
    chmod($file, 0777);
    //creo il suo file
     touch($file.'/'.'prodotti.csv');
    chmod($file.'/'.'prodotti.csv', 0777);


    // $fp = fopen($file.'/'.'prodotti.csv', 'w');
    // fclose($fp);
  }

  #------------------------------------------
  //azzero tutto
  $_POST['lname'] = $_POST['fname'] = $_POST['email'] =  '';
  #------------------------------------------
  $sucess = '<strong> Complimenti !</strong> lettura dati avvenuta con successo,<b> ora  </b> puoi fare il login :)';
header('REFRESH:3; url = login.php');//redirct al suo pagina}
}
}
}


?>


<!-- per cominciarre la rigestrazione -->
<div class="container">
  <!-- start message errors -->
  <?php if (!empty($errors)) { ?>
  <div class="alert alert-danger" role="alert">

    <?php
    foreach ($errors as  $err) {
      echo $err.'<br />';
    }
      ?>
  </div>
 <?php } ?>
 <!-- end message errors -->

 <!-- start message success -->
  <?php if (isset($sucess) && $sucess != '') { ?>
  <div class="alert alert-success" role="alert">

    <?php  echo $sucess; ?>
  </div>
 <?php } ?>
 <!-- end message succes -->
 <!-- start form -->

  <form  id="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >
    <h2 class="text-center"> Sign up </h2>
    <fieldset   <?php if (isset($sucess) && $sucess != '') { echo "disabled";} ?>>
    <div class="form-group">
      <input type="text" name="fname" placeholder="First Name"
       class="form-control fname  <?php if (isset($_POST['fname']) && $_POST['fname'] != '') { echo 'dati' ; } ?>"
        autocomplete="on"
       value="<?php if (isset($_POST['fname']) && $_POST['fname'] != '') { echo $_POST['fname']; } ?>"
        required/>
      <span class="ob <?php if (isset($_POST['fname']) && $_POST['fname'] != '') { echo 'dati1' ; } ?>" >*</span>
      <!-- start messagio di errore   -->
        <div class="alert alert-danger ">il nome deve contiere almeno  <strong> 3 caratrieri</strong> </div>
      <!-- end messagio di errore   -->
    </div>

    <div class="form-group">
      <input type="text" name="lname" placeholder=" Surname"
      class="form-control lname <?php if (isset($_POST['lname']) && $_POST['lname'] != '') { echo 'dati' ; } ?>" autocomplete="on"
      value="<?php if (isset($_POST['lname']) && $_POST['lname'] != '' ) { echo $_POST['lname']; } ?>"

       required/>
      <span class="ob <?php if (isset($_POST['lname']) && $_POST['lname'] != '') { echo 'dati1' ; } ?>" >*</span>
      <!-- start messagio di errore   -->
        <div class="alert alert-danger ">il cognome deve contiere almeno  <strong> 3 caratrieri</strong> </div>
      <!-- end messagio di errore   -->
    </div>

    <div class="form-group">
      <input   type="email" name="email" placeholder="email"
       class="form-control email <?php if (isset($_POST['email']) && $_POST['email'] != '') { echo 'dati' ; } ?>" autocomplete="on"
       value="<?php if (isset($_POST['email']) && $_POST['email'] != '') { echo $_POST['email']; } ?>"
            required/>
      <span class="ob <?php if (isset($_POST['email']) && $_POST['email'] != '') { echo 'dati1' ; } ?>" >*</span>
      <!-- start messagio di errore   -->
        <div class="alert alert-danger ">l' E-mail non va lasciata <strong> vuota </strong> </div>
        <!-- end messagio di errore   -->
    </div>

    <div class="form-group">
      <input type="password" name="pass" placeholder="password" class="form-control pass"  required/>
      <span class="ob" >*</span>
      <!-- start messagio di errore   -->
      <div class="alert alert-danger ">la password non va lasciata <strong>vuota  </strong> </div>
      <!-- end messagio di errore   -->
    </div>

    <div class="form-group">
      <input type="password" name="conf-pass" placeholder="conferma password" class="form-control conf-pass"   required/>
      <span class="ob" >*</span>
      <!-- start messagio di errore   -->
      <div class="alert alert-danger " <?php if (!empty($err_conf_pass)) { echo "style = 'display:block;'"; } ?>>
        la password   <strong> deve essere uguale </strong>
      </div>

      <!-- end messagio di errore   -->
    </div>


    <button type="submit" name="button" id="btn" class="btn btn-block btn-primary">Registra</button>
  </form>
</div>
</fieldset>
<?php include 'footer.php'; ?>
