<!DOCTYPE html>
<html>
<head>
	<title>Inscription (Version Beta) </title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> 
	<script type="text/javascript">
		function AfficherPrix()
		{
			PrixTotal = 0;
			<?php
				include "Basedonnee.php";
				$Plats = RecupDonnees(0);
				UploaderClient($PLats);

				foreach ($Plats as $NomDuPlat => $Taille) {
					foreach ($Taille as $Format => $Prix) {
						echo 'PrixTotal = PrixTotal + document.getElementById("Sel' . $NomDuPlat . $Format . '").value *' . $Prix . ";" . PHP_EOL;
					}
				}
			?>
			document.getElementById("Total").innerHTML = "Le total est de " + PrixTotal + " $";
		}
	</script>
</head>
<body>
<h1>Inscription</h1>

<form type="POST" action="Enreg.php">
	<input type="text" id="Nom" name="QNom" value=""> 
	<p>(^Je peu mettre ici une liste déroulante si tu le souhaite, ou même ajouter la possibilité de se connecter)</p>
	<?php

		foreach ($Plats as $NomDuPlat => $Taille) {
			echo "<br><p> Pour le " . $NomDuPlat . ", combien voulez vous de: </p>" . PHP_EOL;
			foreach ($Taille as $Format => $Prix) {
				echo '<p>' . $Format . ' à ' . $Prix . ' $?' . PHP_EOL;
				echo '<SELECT id="Sel' . $NomDuPlat . $Format . '" Name="Q' . $NomDuPlat . $Format . '" onchange="AfficherPrix();" >' . PHP_EOL;
				echo '<OPTION value = "0"></option>' . PHP_EOL;
		        for($i = 1 ; $i < 6 ; $i++)
		        {
		            echo '<OPTION value="' . $i . '" >' . $i . '</option>' . PHP_EOL;
		        }
		        echo '</SELECT></p>' . PHP_EOL;
			}
		}
	?>

	<p id="Total" >Le total est de 0 $</p>
	<input type="Submit" value="Ok">
</form>
</body>
</html>