<?php
	//PAGINA PER MODIFCAR LA COMANDA INDICADA PER FORMULARI
	$fitxer_comanda="/var/www/html/projecte1/dircomandes/".$_POST['comanda'];
	$id=$_POST["comanda"];
	$producte=$_POST["producte"];
	$cantitat=$_POST["cantitat"];

	//OBRE EL FITXER DEL PRODUCTE I REESCRIU LA INFORMACIO
	$fp=fopen($fitxer_comanda,"w") or die ("No s'ha pogut validar el producte");
	fwrite($fp,$id);
	fwrite($fp,"-");
	fwrite($fp,$producte);
	fwrite($fp,"-");
	fwrite($fp,$cantitat);
	fwrite($fp,"\n");
	fclose($fitxer);
	
	//AFEGEIX AL ARXIU productes LA NOVA INFORMACIO DEL PRODUCTE
	$general="/var/www/html/projecte1/comandes";
	$fo=fopen($general,"a") or die ("No s'ha pogut validar el producte");
	fwrite($fo,$id);
	fwrite($fo,"-");
	fwrite($fo,$producte);
	fwrite($fo,"-");
	fwrite($fo,$cantitat);
	fwrite($fo,"\n");
	fclose($fo);
	
	header('Location: http://localhost/projecte1/comandes.php');
?>
