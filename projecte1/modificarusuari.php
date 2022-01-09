<?php
	session_start();
	
	//PAGINA PER MODIFICAR UN USUARI PER FORMULARI
	$fitxer_usuaris="/var/www/html/projecte1/dirusuaris/".$_SESSION['nom'];
	$paswd=$_POST["ctsnya"];
	$nom=$_POST["nom"];
	$carrer=$_POST["carrer"];
	$correu=$_POST["correu"];
	$telefon=$_POST["tel"];
	$visa=$_POST["visa"];
	
	//OBRE L'ARXIU DEL USUARI I REESCRIU LA INFORMACIO
	$fp=fopen($fitxer_usuaris,"w") or die ("No s'ha pogut validar l'usuari");
	fwrite($fp,$_SESSION['nom']);														//escriu en el fitxer $fitxer i escriu el text $texte
	fwrite($fp,":");
	fwrite($fp,$paswd);
	fwrite($fp,":");
	fwrite($fp,$nom);
	fwrite($fp,":");
	fwrite($fp,$carrer);
	fwrite($fp,":");
	fwrite($fp,$correu);
	fwrite($fp,":");
	fwrite($fp,$telefon);
	fwrite($fp,":");
	fwrite($fp,$visa);
	fwrite($fp,":");
	fwrite($fp,$_SESSION['id']);
	fwrite($fp,"\n");
	fclose($fp);
	
	//ESCRIU AL FITXER GENERAL usuaris LA INFORMACIO DEL USUARI
	$general="/var/www/html/projecte1/usuaris";
	$fo=fopen($general,"a") or die ("No s'ha pogut validar l'usuari");
	fwrite($fo,$_SESSION['nom']);														//escriu en el fitxer $fitxer i escriu el text $texte
	fwrite($fo,":");
	fwrite($fo,$paswd);
	fwrite($fo,":");
	fwrite($fo,$nom);
	fwrite($fo,":");
	fwrite($fo,$carrer);
	fwrite($fo,":");
	fwrite($fo,$correu);
	fwrite($fo,":");
	fwrite($fo,$telefon);
	fwrite($fo,":");
	fwrite($fo,$visa);
	fwrite($fo,":");
	fwrite($fo,$_SESSION['id']);
	fwrite($fo,"\n");
	fclose($fo);	
	
	header('Location: http://localhost/projecte1/usuari.php');
?>
