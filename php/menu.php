<?php #require 'gestione_carrello.php';
$user_file = $_SESSION['user_file'].'prodotti.csv'; //il nome dell'user  file

?>
<div>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark  bg-dark left">

  <div class="container">


    <!--start menu  -->
    <div class="col-xs-4 ">
      <div class=" icons open">
        <span></span>
        <span></span>
        <span></span>
      </div>

    </div>
    <!-- end menu -->
    <!-- start logo -->
    <div class="col-xs-4">
      <div class="navbar-brand text-center">
        <a href="home.php"> Ahmed <span  class="color-logo">Mera</span></a>
      </div>
    </div>
    <!--end logo  -->
    <!-- start carello -->
    <div class="col-xs-4 carrello ">
      <a href="carrello.php">
      <span class="number_prodocuts">
        <strong class="number">
         <?php $conta = elements($user_file); echo $conta ;  ?>
        </strong>
        </span>
      <i class="fas fa-shopping-cart"></i>
    </a>
    </div>
    <!-- end carello -->
  </div>

</nav>

<ul class=" navbar-nav nicescroll-box" id="navbar-nav">
  <span class="close" onclick="close()">&times;</span>
  <div class="user"> Benvenuto <?php echo ucwords(strtolower($_SESSION['user']));?></div>

  <li class="nav-item active"> <a class="nav-link" href="home.php"><i class="fas fa-home"></i> Home</a> </li>
  <div class="dropdown-divider"></div>
  <li class="nav-item">
     <a class="nav-link serivce" href="#"> Service <i class="fas fa-caret-down"></i> </a>
     <div class="dropdown-menu">
       <div class="dropdown-divider"></div>
        <a class="nav-link" href="#">Action</a>
        <!-- <div class="dropdown-divider"></div> -->
        <a class="nav-link" href="#">Another action</a>
        <!-- <div class="dropdown-divider"></div> -->
        <a class="nav-link" href="#">Something else here</a>
        <!-- <div class="dropdown-divider"></div> -->
        <a class="nav-link" href="#">Separated link</a>
    </div>
   </li>
  <div class="dropdown-divider"></div>
  <li class="nav-item "> <a class="nav-link settings" href="#">
     <i class="fas fa-user-cog"></i> Settings</a>
     <div class="dropdown-menu">
       <div class="dropdown-divider"></div>
        <a class="nav-link" href="#">Change Password</a>
        <!-- <div class="dropdown-divider"></div> -->
        <a class="nav-link" href="#">Change Name</a>
        <!-- <div class="dropdown-divider"></div> -->
        <a class="nav-link" href="#">Delete Acconut</a>
        <!-- <div class="dropdown-divider"></div> -->
        <a class="nav-link" href="#">Separated link</a>
    </div>
  </li>
  <div class="dropdown-divider"></div>
  <li class="nav-item">
    <a class="nav-link" href="logout.php">
       <i class="fas fa-sign-out-alt"></i> Logout</a>
      </li>
</ul>
</div>
