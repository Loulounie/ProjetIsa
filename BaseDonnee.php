<?php

	//La forme de la base de donnée des plats sera de : $Plat[$Nomduplat][$Format] = $prix
	
	function RecupDonnees($B)
	{
		$Plats = array();
		if($B == 0)
		{
			$F = file_get_contents("BaseDonnee.txt");
		}
		else
		{
			$F = file_get_contents("BaseDonneeDesac.txt");
		}
		$TabLignes = explode(PHP_EOL , $F);
		foreach ($TabLignes as $Ligne) {
			$Valeur = explode(";", $Ligne);
			$NomDuPlat = $Valeur[0];
			unset($Valeur[0]);
			foreach ($Valeur as $FormatP) {
				$FP = explode(":", $FormatP);
				$Plats[$NomDuPlat][$FP[0]] = $FP[1];
			}
		}
		return $Plats;
	}

	function UploaderDonnees($Plats, $B)
	{

		if($B == 0)
		{
			$F = fopen("BaseDonnee.txt", 'w+');
		}
		else
		{
			$F = fopen("BaseDonneeDesac.txt", 'w+');
		}
		
		foreach ($Plats as $NomDuPlat => $Taille) 
		{
			fputs($F, $Nomduplat . ";");
			foreach ($Taille as $Format => $Prix) {
				fputs($F, $Format . ":" . $Prix . ";");
			}
		}
		fclose($F);
	}

	//les données des clients serons: $Client[$Nom][$NomDuPlat][$Format] = $Quantite

	function RecupClients()
	{
		$Plats = RecupDonnees();
		$Clients = array();
		$F= file_get_contents("DonnesClients");
		$TabLignes = explode(PHP_EOL, $F);
		foreach ($TabLignes as $Ligne) {
			$Valeur = explode(";", $Ligne);
			$NomClient = $Valeur[0];
			unset($Valeur[0]);
			$i = 0;
			foreach ($Plats as $NomDuPlat => $Taille ) {
				$Formats = explode( ":", $Valeur[i]);
				$j = 0; 
				foreach ($Taille as $Format => $Prix) {
					$Client[$NomClient][$NomDuPlat][$Format] = $Formats[$j];
					$j++;
				}
				$i++;
			}
		}
		return $Clients;
	}

	function UploaderClient($Clients)
	{
		$F = fopen("DonneesClientsTemp.txt", "w+");
		foreach ($Clients as $NomClient => $InfClient) {
			fputs($F, $NomClient);
			foreach ($InfClient as $NomDuPlat => $Taille) {
				fputs($F, ";" );
				foreach ($Taille as $Format => $Quantite) {
					fputs($F, ":");
					fputs($F, $Quantite);
				}
			}
		}


		fclose($F);
	}
?>