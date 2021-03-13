<?php
//require_once("identifier_session.php");

require_once('../base_de_donnees/connexion_bd.php');
/*Question de Pagination */
$size=isset($_GET['size'])?$_GET['size']:6;
$page=isset($_GET['page'])?$_GET['page']:1;
$offset=($page-1)*$size;

/*Selection et récupération de toutes les filières provenant de la Base des données */

$all_filieres="SELECT * FROM filieres";
$resultats_filiere=$pdo->query($all_filieres);


/*Traitement de la recherche et l'affichage des stagiaires selon les critères */

//Récupération des éléments de recherche
$nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
$idfiliere=isset($_GET['idfiliere'])?$_GET['idfiliere']:0;

if($idfiliere==0)
{
	$requeteStg="SELECT idStagiaire,nom,prenom,nomFiliere,photo,civilite FROM filieres as f, stagiaires as s WHERE f.idFiliere=s.idFiliere and (nom LIKE'%$nomPrenom%' OR prenom LIKE '%$nomPrenom%') order by idStagiaire LIMIT $size offset $offset ";
	$requeteCountStg="SELECT count(*) countS FROM stagiaires WHERE nom LIKE '%$nomPrenom%' OR prenom LIKE '%$nomPrenom%'";

}
else
{
	$requeteStg="SELECT idStagiaire,nom,prenom,nomFiliere,photo,civilite FROM filieres as f, stagiaires as s WHERE f.idFiliere=s.idFiliere and (nom LIKE '%$nomPrenom%' OR '$nomPrenom') and f.idFiliere=$idfiliere order by idStagiaire LIMIT $size offset $offset";

	$requeteCountStg="SELECT count(*) countS FROM stagiaires WHERE (nom LIKE '%$nomPrenom%' OR prenom LIKE '%$nomPrenom%') and idFiliere=$idfiliere"; 

}

/*Exécution des Requêtes ci-haut */
$resultat_stagiaires=$pdo->query($requeteStg);

$resultat_count_stg=$pdo->query($requeteCountStg);
$tabCounter=$resultat_count_stg->fetch();
$nbreStagiaires=$tabCounter['countS'];

/*Finalisation de la pagination */
$reste=$nbreStagiaires%$size;

if($reste==0)
{
	$nbrePages=$nbreStagiaires/$size;

}
else
{
	$nbrePages=floor($nbreStagiaires/$size)+1;
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Les Stagiaires -Gestion des stagiaires</title>


	 <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="../css/glyphicon.css">

	 <link rel="stylesheet" type="text/css" href="../fonts/glyphicons-halflings-regular.eot">
	 <link rel="stylesheet" type="text/css" href="../fonts/ glyphicons-halflings-regular.woff">

	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<?php include("menu.php");  ?>

	<div class="container">

		<div class="panel panel-success margetop">
		<div class="panel-heading">Recherche des Stagiaires...</div>
		<div class="panel-body">
			<form  action="stagiaires.php" method="get" class="form-inline">
				<div class="form-group">
					<input type="text" name="nomPrenom" placeholder="Nom ou Prenom du Stagiaire" class="form-control">

					&nbsp; &nbsp;

					Filière:
					<select name="idfiliere" class="form-control" onchange="this.form.submit();">
						<option value=0>Toutes les Filières</option>
						<?php while($fil=$resultats_filiere->fetch()) {     ?>
							<option value="<?= $fil['idFiliere']; ?>"><?= $fil['nomFiliere']; ?></option>

						<?php } ?>
					</select>
					&nbsp;
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
				&nbsp; &nbsp;

				<a href="nouveauStagiaire.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Ajouter un Stagiaire</a>

			</form>

		</div>
	</div>
	    <div class="panel panel-primary margetop">
		<div class="panel-heading">Liste des Stagiaires (<?= $nbreStagiaires; ?>)...</div>
		<div class="panel-body">
			<table class="table table-bordered table striped">
				<thead>
					<tr>
						<th>idStagiaire</th><th>Nom</th><th>Prenom</th><th>Nom Filiere</th><th>Photo</th><th>Actions</th>
					</tr>
				</thead>

				<tbody>
					<?php while($stagiair=$resultat_stagiaires->fetch()) { ?>
						<tr>
							<td><?= $stagiair['idStagiaire'];?></td>
							<td><?= $stagiair['nom']; ?></td>
							<td><?= $stagiair['prenom'];  ?></td>
							<td><?= $stagiair['nomFiliere']   ?></td>
							<td><img src="../images/<?= $stagiair['photo']; ?>" width="50px" height="50px"></td>

							<td>
								<a href="editerStagiaire.php?idS=<?= $stagiair['idStagiaire']; ?>"><span class="glyphicon glyphicon-edit"></span>Editer</a>

								<a href="supprimerStagiaire.php?idS=<?= $stagiair['idStagiaire']; ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer le stagiaire selectionnné ?');"><span class="glyphicon glyphicon-trash"></span>Supprimer</a>
							</td>
						</tr>
						<?php } ?>


				</tbody>
			</table>

			<div>
				<?php for($i=1;$i<=$nbrePages;$i++) {  ?>
					<ul class="pagination">
						<li class="<?php if($i==$page) echo 'active'; ?>"><a href="stagiaires.php?page=<?= $i; ?>&nomS=<?= $nomPrenom; ?>&nomF=<?= $idfiliere; ?>"><?= $i; ?></a></li>

					</ul>
				<?php } ?>

			</div>
		</div>
	</div>

	</div>

</body>
</html>
