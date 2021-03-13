<?php 
 // session_start();
//require_once("identifier_session.php");

//<!-- <?php echo $_SESSION['user']['login']; 


?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Management Class</a>
    </div>
    <ul class="nav navbar-nav navbar-left">
      <li class="active"><a href="index.php">Gestion des stagiaires</a></li>
      <li><a href="stagiaires.php">Les Stagiaires</a></li>
      <li><a href="filieres.php">Les Filières</a></li>
      <li><a href="utilisateurs.php">Les Utilisateurs</a></li>
    </ul>
    
     <ul class="nav navbar-nav navbar-right">
     
      <li><a href="#">
        <?php  if(!isset($_SESSION['user'])) { ?>

        <i class="glyphicon glyphicon-user"></i>En Ligne</a></li>
      <?php } ?>

      <li><a href="sedeconnecter.php"><i class="glyphicon glyphicon-log-out"></i>Se Deconnecter</a></li>
    </ul>
    

  </div>
</nav>