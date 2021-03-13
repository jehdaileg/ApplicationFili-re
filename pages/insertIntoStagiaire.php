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


$requete="INSERT INTO stagiaires(nom,prenom,civilite,photo,idFiliere) VALUES (?,?,?,?,?)";
$params=array($nom,$prenom,$civilite,$nomPhoto,$idFiliere);


$resultat=$pdo->prepare($requete);
$resultat->execute($params);

header('Location:stagiaires.php');




?>