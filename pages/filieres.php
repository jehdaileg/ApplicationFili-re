<?php


//chargement de la connexion à la bdd et récupération des filières
require_once("identifier_session.php");
require_once("../base_de_donnees/connexion_bd.php");

$requete="SELECT * FROM filieres";
$resultatf=$pdo->query($requete);

/*Traitement de la recherche */

  /* Vérification de la condition normale
  if(isset($_GET['filiere']))
  {
  	$NomFil=$_GET['filiere'];
  }

  else
  {
  	$NomFil="";
  }   */

  //Condition ternaire
  $nomfil=isset($_GET['filiere'])?$_GET['filiere']:"";
  $niv=isset($_GET['niveau'])?$_GET['niveau']:"all";

  $size=isset($_GET['size'])?$_GET['size']:6;  //nbre maximal d'affichage des données

  $page=isset($_GET['page'])?$_GET['page']:1;

  $offset=($page-1)*$size; // selon le nombre des données à sauter pour l'affichage

   if($niv=="all")
   {

   	$requete="SELECT * FROM filieres WHERE nomFiliere LIKE '%$nomfil%' LIMIT $size offset $offset";
   	$requeteCount="SELECT count(*) countF FROM filieres WHERE nomFiliere LIKE '%$nomfil%'";

   }
   else
   {

   	$requete="SELECT * FROM filieres WHERE nomFiliere LIKE '%$nomfil%' AND niveau='$niv' LIMIT $size offset $offset";
   	$requeteCount="SELECT count(*) countF FROM filieres WHERE nomFiliere LIKE '%$nomfil%' AND niveau='$niv'";

   }

  $resultatf=$pdo->query($requete);

  /*Exécution et récupération du nombre des filières */
  $resultatCount=$pdo->query($requeteCount);
  $tabCount=$resultatCount->fetch();
  $nbreFil=$tabCount['countF'];
  $reste=$nbreFil % $size; //reste de la division des données par le nbre des pages

  if($reste==0)             //parité, on divise normalement
  	$nbrePages=$nbreFil/$size;
  else
  	$nbrePages=floor($nbreFil/$size)+1; //partie entière d'un décimal


?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
	 <title>Les Filières -Gestion des stagiaires</title>

	 <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="../css/glyphicon.css">

	 <link rel="stylesheet" type="text/css" href="../fonts/glyphicons-halflings-regular.eot">
	 <link rel="stylesheet" type="text/css" href="../fonts/ glyphicons-halflings-regular.woff">

	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<?php include("menu.php"); ?>


	<div class="container">

		<div class="panel panel-success margetop">
		<div class="panel-heading">Recherche des filières...</div>
		<div class="panel-body">
			<form method="get" action="filieres.php" class="form-inline">
				<div class="form-group">
					<input type="text" name="filiere" placeholder="Saisissez le nom de la filière" class="form-control" value="<?= $nomfil; ?>">
				</div>

				&nbsp; &nbsp;

				<label for="niveau">Niveau:</label>
				<select name="niveau"  class="form-control" onchange="this.form.submit();">
					<option value="all" <?php if($niv==="all") echo "selected" ?>>Tous les niveaux</option>
					<option value="m"   <?php if($niv==="m") echo "selected" ?>>Master</option>
					<option value="l"   <?php if($niv==="l") echo "selected" ?>>Licence</option>
					<option value="ts"  <?php if($niv==="ts") echo "selected"  ?>>Technicien Spécialisé</option>
					<option value="t"   <?php if($niv==="t") echo "selected" ?>>Technicien</option>
					<option value="q"   <?php if($niv==="q") echo "selected"; ?> >Qualification</option>
				</select>

				&nbsp; &nbsp;

				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span>Rechercher...</button>

				&nbsp; &nbsp;
				<!--Vérifiation du role de l'utilisateur pour l'activation du lien -->
				<?php if($_SESSION['user']['role']=='ADMIN') {   ?>

				<a href="nouvelleFiliere.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Ajouter une filière</a> <?php } ?>
			</form>
		</div>
	</div>
	    <div class="panel panel-primary margetop">
		<div class="panel-heading">Liste des filières...(<?= $nbreFil; ?>) Filières au Total</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Id Filière</th><th>Nom Filière</th><th>Niveau</th>

						<?php if($_SESSION['user']['role']=='ADMIN') { ?>
						<th>Actions</th>
					    <?php  } ?>
					</tr>
				</thead>

				<tbody>

						<?php while($filier=$resultatf->fetch()) { ?>
							<tr>
							     <td><?= $filier['idFiliere']; ?></td>
							     <td><?= $filier['nomFiliere']; ?></td>
							     <td><?= $filier['niveau'];?></td>
							     <?php if($_SESSION['user']['role']=='ADMIN') { ?>
							     	
							     <td>
							     	<a href="editerFiliere.php?IDfil=<?= $filier['idFiliere']; ?>"><span class="glyphicon glyphicon-edit"></span>Editer</a>
							     	&nbsp; &nbsp;
							     	<a href="supprimerFiliere.php?IDfil=<?= $filier['idFiliere']; ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer la filière?');"><span class="glyphicon glyphicon-trash"></span>Supprimer</a>
							     </td>
							     <?php }  ?>

							</tr>

						<?php }  ?>

				</tbody>
			</table>
			<div>
				<?php for($i=1; $i<=$nbrePages; $i++) {  ?>
					<ul class="pagination">
						<li class="<?php if($i==$page) echo 'active' ?>"><a href="filieres.php?page=<?= $i; ?>&nomF=<?= $nomfil; ?>&niveau=<?= $niv; ?>">
							<?= $i; ?></a></li>
					</ul>
					<?php } ?>
			</div>
		</div>
	</div>

	</div>



</body>
</html>
