<?php
//require_once("identifier_session.php");

require_once('../base_de_donnees/connexion_bd.php');

$nomfil=isset($_POST['filiere'])?$_POST['filiere']:"";
$niveau=isset($_POST['niveau'])?$_POST['niveau']:"";

$insertFilier="INSERT INTO filieres(nomFiliere,niveau) VALUES(?,?)";
$params=array($nomfil, $niveau);
$resultat=$pdo->prepare($insertFilier);
$resultat->execute($params);

header('Location:filieres.php');



?>
