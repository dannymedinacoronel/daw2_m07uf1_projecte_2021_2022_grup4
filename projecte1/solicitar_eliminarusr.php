<?php
	//PAGINA PER SOLICITAR ELIMNAR COMANDA MITJANÇANT EL FORMULARI
	$fitxer_usuaris="/var/www/html/projecte1/dirusuaris/".$_POST['usuari'];
	$fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");
	if ($fp) {
		$mida_fitxer=filesize($fitxer_usuaris);	
		$usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
    }
   	foreach ($usuaris as $usuari) {
		$logpwd = explode(":",$usuari);
		if (($_POST['usuari'] == $logpwd[0]) && ($_POST['ctsnya'] == $logpwd[1])){		//COMPROVA QUE EL USUARI I CONTRASENYA SON VALIDS
			fclose($fp);
			$solicituts="/var/www/html/projecte1/eliminar_usuari";						//SI SON VALIDS ESCRIU A eliminar_usuari EL USUARI, 				
			$fo=fopen($solicituts,"a") or die ("No s'ha pogut validar");				//I EL ADMINISTRADOR AL FORMULARI PER ELIMINAR USUARI LI APAREIXERAN AQUESTS USUARIS
			fwrite($fo,$_POST['usuari']);
			fwrite($fo,"\n");
			fclose($fo);	
			break;
		}
		
	} 
	
	header('Location: http://localhost/projecte1/logout.php');

?>
