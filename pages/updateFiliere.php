<?php
//require_once("identifier_session.php");

require_once('../base_de_donnees/connexion_bd.php');

$IDfil=isset($_POST['IDfil'])?$_POST['IDfil']:0;
$nomfil=isset($_POST['filiere'])?$_POST['filiere']:"";
$niveau=isset($_POST['niveau'])?strtolower($_POST['niveau']):"";

$updateFilier="UPDATE filieres SET nomFiliere=? , niveau=? WHERE idFiliere=?";
$params=array($nomfil, $niveau, $IDfil);
$resultat=$pdo->prepare($updateFilier);
$resultat->execute($params);

header('Location:filieres.php');



?>
