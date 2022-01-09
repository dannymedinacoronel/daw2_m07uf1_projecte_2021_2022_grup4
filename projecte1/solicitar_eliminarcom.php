<?php
	//PAGINA PER SOLICITAR ELIMNAR COMANDA MITJANÇANT EL FORMULARI
	$fitxer_comandes="/var/www/html/projecte1/dircomandes/".$_POST['id'];
	$fp=fopen($fitxer_comandes,"r") or die ("No s'ha pogut validar l'usuari");
	if ($fp) {
			fclose($fp);
			$solicituts="/var/www/html/projecte1/eliminar_comanda";			//ESCRIU A eliminar_comanda EL ID DE LA COMANDA, I EL ADMINISTRADOR AL FORMULARI PER ELIMINAR COMANDES LI APAREIXERAN AQUESTES IDs
			$fo=fopen($solicituts,"a") or die ("No s'ha pogut validar");
			fwrite($fo,$_POST['id']);
			fwrite($fo,"\n");
			fclose($fo);	
		}
		
	
	header('Location: http://localhost/projecte1/comandes.php');

?>
