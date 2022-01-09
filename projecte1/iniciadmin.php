<?php
	//OBRE L'ARXIU ON HI HA L'USUARI I CONTRASENYA DEL ADMINISTRADOR, SI COINCIDEIXEN TAN USUARI COM CONTRASENYA INICIA SESSIÓ
	//APAREIX UN MENÚ PER PODER ANAR A LES DIFERENTS EINES
	$fitxer_usuaris="/var/www/html/projecte1/usuari";
	$fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");
	if ($fp) {
		$mida_fitxer=filesize($fitxer_usuaris);	
		$usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
    }
   	foreach ($usuaris as $usuari) {
		$logpwd = explode(":",$usuari);
		if (($_POST['usuari'] == $logpwd[0]) && ($_POST['ctsnya'] == $logpwd[1])){
			fclose($fitxer);
			session_start();
			break;
		} else {
			header('Location: http://localhost/projecte1/homepage.html');
		}
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="estils.css"/>
	</head>
	<body>
		<h2 id="benv">Benvingut admin, que vols fer?</h2> <br>
		<div class="inicis">
		<a href="manteniment_cataleg.php" class="inici">Manteniment del catàleg</a> 
		<a href="gestio_comandes.php" class="inici">Gestionar comandes</a> 
		<a href="gestio_usuari.php" class="inici">Gestionar usuaris</a> 
		<a href="logout.php" class="inici">Tancar la sessio</a>
		</div>
	</body>
</html>
