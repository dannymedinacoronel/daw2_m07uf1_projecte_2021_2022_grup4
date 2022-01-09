<?php

	//A PARTIR DEL FORMULARI REGISTRA UN NOU USUARI
	$id=rand(0,10000);
	$user=$_POST["usuari"];
	$paswd=$_POST["ctsnya"];
	$nom=$_POST["nom"];
	$carrer=$_POST["carrer"];
	$correu=$_POST["correu"];
	$telefon=$_POST["telefon"];
	$prestec=$_POST["prestec"];
	$dataprestec=$_POST["dataprestec"];
	$isbnprestec=$_POST["isbnprestec"];
	
	$filename="/var/www/html/projecte1/dirusuaris/".$user;		//guardar nom i lloc del fitxer
		
	//ESCRIU AL FITXER DE L'USUARI LA INFORMACIO
	$fitxer=fopen($filename,"w") or die ("No s'ha pogut crear el fitxer");		
	fwrite($fitxer,$id);														
	fwrite($fitxer,":");
	fwrite($fitxer,$nom);														
	fwrite($fitxer,":");
	fwrite($fitxer,$carrer);
	fwrite($fitxer,":");
	fwrite($fitxer,$correu);
	fwrite($fitxer,":");
	fwrite($fitxer,$telefon);
	fwrite($fitxer,":");
	fwrite($fitxer,$paswd);
	fwrite($fitxer,":");
	fwrite($fitxer,$user);
	fwrite($fitxer,":");
	fwrite($fitxer,$prestec);
	fwrite($fitxer,":");
	fwrite($fitxer,$dataprestec);
	fwrite($fitxer,":");
	fwrite($fitxer,$isbnprestec);
	fwrite($fitxer,"\n");
	fclose($fitxer);															//tanca fitxer

	$general="/var/www/html/projecte1/usuaris";
	$fp=fopen($general,"a") or die ("No s'ha pogut afegir al fitxer");		
	fwrite($fp,$id);
	fwrite($fp,":");
	fwrite($fp,$nom);														
	fwrite($fp,":");
	fwrite($fp,$carrer);
	fwrite($fp,":");
	fwrite($fp,$correu);
	fwrite($fp,":");
	fwrite($fp,$telefon);
	fwrite($fp,":");
	fwrite($fp,$paswd);
	fwrite($fp,":");
	fwrite($fp,$user);
	fwrite($fp,":");
	fwrite($fp,$prestec);
	fwrite($fp,":");
	fwrite($fp,$dataprestec);
	fwrite($fp,":");
	fwrite($fp,$isbnprestec);
	fwrite($fp,"\n");
	fclose($fp);
	header('Location: http://localhost/projecte1/gestio_usuari.php');
?>
