<?php
//require_once("identifier_session.php");

$message=isset($_GET['message'])?$_GET['message']:"Erreur";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Altertes -Gestion des stagiaires</title>

	 <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="../css/style.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<?php include("menu.php");  ?>

	<div class="container">

		<div class="panel panel-danger margetop">
		<div class="panel-heading">Erreur !!!</div>
		<div class="panel panel-body">
      <h2><?= $message; ?></h2>
      <a href="<?= $_SERVER['HTTP_REFERER']; ?>">Retour <<<</a>
    </div>
	</div>

	</div>

</body>
</html>
