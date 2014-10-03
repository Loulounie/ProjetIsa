<?php
include "BaseDonnee.php"

$Plats = RecupDonnees(0);
$Clients = RecupClients();
$NomClient = $_POST['QNom'];
foreach ($Plats as $NomDuPlat => $Taille) {
	foreach ($Taille as $Format => $Prix) {
		$Clients[$NomClient][$NomDuPlat][$Format] = $_POST["Q" . $NomDuPlat . $Format];
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
<p>Merci de votre inscription!</p>
</body>
</html>