<?php
include "BaseDonnee.php";

$Plats = RecupDonnees(0);
$Clients = RecupClients();
$NomClient = $_GET['QNom'];
foreach ($Plats as $NomDuPlat => $Taille) {
	foreach ($Taille as $Format => $Prix) {
		$Clients[$NomClient][$NomDuPlat][$Format] = $_GET["Q" . $NomDuPlat . $Format];
	}
}
UploaderClient($Clients);
	?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>Vous avez bien commandé :</p>
<ul>
<?php
	foreach ($Clients[$NomClient] as $NomDuPlat => $Taille) {
		foreach ($Taille as $Format => $Quantité) {
				echo '<li>' . $Quantité . $NomDuPlat . $Format . '</li>';
		}
	}
?>
</ul>
</body>
</html>