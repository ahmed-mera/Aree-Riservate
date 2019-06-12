<?php

function setScript($back){//per cambiare il background in ogni pagina
#----------------------- start of switch --------------------------#
switch ($back) {
  case 'login':
    echo "form_effects";
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


<!-- </div>--> <!--chiusursa del container-->

<!-- <canvas class="background"></canvas> -->
<!--START LINK SCRIPT -->
<script src="../../layout/js/jquery-3.3.1.min.js"></script> <!--jquery-->
<script src="../../layout/js/bootstrap.min.js"></script> <!--bootstrap-->
<script src="../../layout/js/jquery.nicescroll.min.js"></script> <!--nice scrolling-->
<!--<script src="../../layout/js/particles.min.js"></script>--> <!--background-->
<script src="../js/menu.js"></script> <!--menu js-->
<script src="../js/<?php if (isset($name_page)) {//controllo se c'é un script o no
  setScript($name_page);//qua se c'é
}else {
  echo "default"; //qua non c'é
}
  ?>.js"></script> <!--MY FILE JS-->
<!--END LINK SCRIPT-->
</body>
</html>
<?php ob_end_flush(); ?>
