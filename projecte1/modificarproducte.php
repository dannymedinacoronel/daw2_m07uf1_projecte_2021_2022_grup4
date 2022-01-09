<?php
	//PAGINA PER MODIFCAR EL PRODUCTE INDICAT PER FORMULARI
	$fitxer_producte="/var/www/html/projecte1/dirproductes/".$_POST['producte'];
	$id=$_POST["producte"];
	$prestec=$_POST["prestec"];
	$titol=$_POST["titol"];
	$autor=$_POST["autor"];
	$dataprestec=$_POST["dataprestec"];
	$isbnprestec=$_POST["isbnprestec"];

	//OBRE EL FITXER DEL PRODUCTE I REESCRIU LA INFORMACIO
	$fp=fopen($fitxer_producte,"w") or die ("No s'ha pogut validar el producte");
	fwrite($fp,$id);
	fwrite($fp,"-");
	fwrite($fp,$prestec);
	fwrite($fp,"-");
	fwrite($fp,$titol);
	fwrite($fp,"-");
	fwrite($fp,$autor);
	fwrite($fp,"-");
	fwrite($fp,$dataprestec);
	fwrite($fp,"-");
	fwrite($fp,$isbnprestec);
	fwrite($fp,"-");
	fclose($fitxer);
	
	//AFEGEIX AL ARXIU productes LA NOVA INFORMACIO DEL PRODUCTE
	$general="/var/www/html/projecte1/productes";
	$fo=fopen($general,"a") or die ("No s'ha pogut validar el producte");
	fwrite($fo,$id);
	fwrite($fo,"-");
	fwrite($fo,$prestec);
	fwrite($fo,"-");
	fwrite($fo,$titol);
	fwrite($fo,"-");
	fwrite($fo,$autor);
	fwrite($fo,"-");
	fwrite($fo,$dataprestec);
	fwrite($fo,"-");
	fwrite($fo,$isbnprestec);
	fwrite($fo,"-");
	fclose($fo);
	
	header('Location: http://localhost/projecte1/manteniment_cataleg.php');
?>
