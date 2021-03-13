<?php 
//require_once("identifier_session.php");

require_once('../base_de_donnees/connexion_bd.php');


$idS=isset($_POST['idS'])?$_POST['idS']:0;
$nom=isset($_POST['nom'])?$_POST['nom']:"";
$prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
$civilite=isset($_POST['civilite'])?$_POST['civilite']:"";
$idFiliere=isset($_POST['filiere'])?$_POST['filiere']:1;
$nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";

/*traitement de la photo */
$img_tmp=$_FILES['photo']['tmp_name'];
//Envoie de l'image au dossier images 
move_uploaded_file($img_tmp, "../images/".$nomPhoto);

if(!empty($nomPhoto))
{
	$requete="UPDATE stagiaires SET nom=?, prenom=?, civilite=?, photo=?, idFiliere=? WHERE idStagiaire=?";
    $params=array($nom,$prenom,$civilite,$nomPhoto,$idFiliere,$idS);

}
else 
{
	$requete="UPDATE stagiaires SET nom=?, prenom=?, civilite=?, idFiliere=? WHERE idStagiaire=?";
    $params=array($nom,$prenom,$civilite,$idFiliere,$idS);
}

$resultat=$pdo->prepare($requete);
$resultat->execute($params);




?>