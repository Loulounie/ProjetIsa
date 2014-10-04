<!DOCTYPE html>
<html>
 <head>
     <title></title>
 </head>
 <body>
 
 <?php
    $Plats = RecupDonnees(0);
    $Clients = RecupClients();
    
    echo '<div>';
    echo '<TABLE BORDER="1"> ';
    echo '<CAPTION> Tableau des plats </CAPTION> ';
    echo '<TR> ';
    echo '<TH> Noms </TH> ';
    foreach ($Plats as $NomDuPlat => $Taille) {
        foreach ($Taille as $Format => $Prix) {
        echo '<TH>' . $NomDuPlat . ' ' . $Format . '</TH>';
        }
    }   
    echo    '</TR>';
    foreach ($Clients as $NomClient => $Plats) {
        echo PHP_EOL . '<TR>';
        foreach ($Plats as $NomDuPlat => $Taille) {
            foreach ($Taille as $Format => $Quantité) {
                    echo '<TD>' . $Quantité . '</TD>';
            }
        }
    echo '<TR>';
    }

?>

 </body>
 </html>