<?php
#---------------------------------------------------
//oridine fatto
function ordine($user_file,$ar)
{
  $file = fopen($user_file, 'r');
  while (!feof($file)) {
  $goods[] = fgetcsv($file);
  }
  fclose($file);
  //coppio gli elementi che sono selezionati
  foreach ($ar as  $value) {
     $goods[$value][] =  date('Y-m-d - h:i:s');//aggingo la data e l'ora del ordine
    $copy_elements [] = $goods[$value];
  }
  $file = fopen($_SESSION['user_file'].'ordine.csv', 'a');
  foreach ($copy_elements as  $value) {
  @fputcsv($file, $value);
}
  fclose($file);
  //elimino daal file del utente i prodotti
    foreach ($ar as  $value) {
       unset($goods[$value]);
    }
  //li scrio sul suo file
    $file = fopen($user_file, 'w');
    foreach ($goods as  $value) {
    @fputcsv($file, $value);
  }
    fclose($file);
   // del($user_file,$ar);
   header('location:?pay=paid');
}

#---------------------------------------------------
//vissulazzare i prodotti
function show_goods($user_file)
{
  $file = fopen($user_file, 'r');
  while (!feof($file)) {
  $goods[] = fgetcsv($file);
  }
  fclose($file);


 for ($i = 0; $i < count($goods) -1 ; $i++) {
  // $color =  control_date($goods[$i][2]);//il controllo per il date
  // $goods[$i][3] =  control_status($goods[$i][3] , $goods[$i][2]);//il controllo per il stato
  // $goods[$i][1] = date('d/m/Y ',$goods[$i][1]);//tarsferisco in data noemale
  // $goods[$i][2] = date('d/m/Y ',$goods[$i][2]);//tarsferisco in data noemale
    ?>

  <tr <?php  echo "id = ".$i; ?> >
    <td><?php echo '<img  width= "90px;" height="70px" src="'.$goods[$i][0].'" class="rounded float-left" alt="'.$goods[$i][1].'"> <span class = "name_pizza" >'. $goods[$i][1].'</span>'  ?></td>
    <td class="price_pizza"><?php echo $goods[$i][2] ?></td>
    <td>
      <!-- Material indeterminate -->
      <div class="custom-control custom-checkbox" value='hi' >
        <input type="checkbox" name="del[]" value="<?php echo $i;?>" class="custom-control-input" id="customCheck<?php echo $i;?>">
        <label class="custom-control-label" for="customCheck<?php echo $i;?>"></label>
      </div>
    </td>   <!-- <td class="del">&times;</td> -->
  </tr>
<?php  }
}

#------------------------------------------

//salvo sul file
function save_goods($user_file,$elements)
{
  $file = fopen($user_file, 'a');
  fputcsv($file, $elements)  ;
  fclose($file);
}
#----------------------------------------------

//contare quanti elementi ci sono nel carrello
function elements($user_file)
{
  $conta = 0;
  $file = fopen($user_file, 'r');
    while (fgetcsv($file)!= null) {
      $conta++;
    }
    fclose($file);
    return $conta;
}
#----------------------------------------------
//contare quanti elementi ci sono nel carrello
function del($user_file,$ar)
{
  $file = fopen($user_file, 'r');
  while (!feof($file)) {
  $goods[] = fgetcsv($file);
  }
  fclose($file);
  //coppio gli elementi che non vuole piu'
  $i = 0;
  foreach ($ar as  $value) {
    $goods[$value][] =  date('Y-m-d - h:i:s');//aggingo la data e l'ora del ordine
    $copy_elements [] = $goods[$value];
  }
//coppio i prodotti su un file che il utente non li vuole
  $file = fopen($_SESSION['user_file'].'del_prod.csv', 'a');
  foreach ($copy_elements as  $value) {
  @fputcsv($file, $value);
}
  fclose($file);
//elimino daal file del utente i prodotti
  foreach ($ar as  $value) {
     unset($goods[$value]);
  }
//li scrio sul suo file
  $file = fopen($user_file, 'w');
  foreach ($goods as  $value) {
  @fputcsv($file, $value);
}
  fclose($file);
  // elements($user_file);
  header('location:carrello.php');
}
#----------------------------------------------

/*
  function delete_element($i)
  {
  $i =  $i -1;

    //leggo dal file per il controllo
    $file = fopen($_SESSION['user_file'].'prodotti.csv', 'r');
    while (!feof($file)) {
    $goods[] = fgetcsv($file);
    }
    fclose($file);
    $goods[$i][5] = 'false';//tolgo l'elemento metto false cancellazione falsa

    // file_put_contents($file, $goods);

    $file = fopen($_SESSION['user_file'].'prodotti.csv', 'w');
    $f = 0;
    foreach ($goods as $value) {
      @fputcsv($file,$value);
    }
    fclose($file);
  // }
}

#-------------------------------------------------

//per il stato
 function control_status($stato,$time)
{
  $time = ceil( ($time - time() ) / ( 1 * 24 * 60 * 60 ) );

if ($time < 0) {
  $stato = 'é scaduto da <b>'.($time / -1).'</b> giorni fa.';
} elseif ($time == 0) {
  $stato = 'scade <b> oggi </b>';
} elseif ($time == 1) {
  $stato = 'scade <b> domani </b>';
}else {
  $stato = 'scaderà tra <b>'.$time.'</b> giorni.';

}
return $stato;

}

#----------------------------------------------

//per il tempo
 function control_date($time)
{
  $time = ceil( ($time - time() ) / ( 1 * 24 * 60 * 60 ) );

if ($time < 0) {
  $background = 'class = "alert-danger"';
} elseif ($time == 0 || $time == 1) {
  $background = 'class = "alert-warning "';
}else {
  $background = 'class = "alert-success "';

}
return $background ;

}
#------------------------------------------

*/
