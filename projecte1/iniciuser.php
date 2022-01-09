<?php
	//INTENTA OBRIR L'ARXIU ON HI HA LA INFORMACIO DEL USUARI, SI HA POGUT I SON VALIDS USUARI I CONTRASENYA INICIA SESSIO
	//APAREIX UN MENU PER ANAR ALS DIFERENTS APARTATS DE LA PAGINA
	$fitxer_usuaris="/var/www/html/projecte1/dirusuaris/".$_POST['usuari'];
	$fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");
	if ($fp) {
		$mida_fitxer=filesize($fitxer_usuaris);	
		$usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
    }
   	foreach ($usuaris as $usuari) {
		$logpwd = explode(":",$usuari);
		if (($_POST['usuari'] == $logpwd[0]) && ($_POST['ctsnya'] == $logpwd[1])){
			fclose($fitxer_usuaris);
			session_start();
			$_SESSION['id']=$logpwd[7];
			$_SESSION['nom']=$_POST['usuari'];
			break;
		} 
		
	} 
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="estils.css"/>	
	</head>
	<body>
		<h2 id="benv">Benvingut a XXXXX, <?php echo $_SESSION['nom']."-". $_SESSION['id']; ?>, on vols anar?</h2><br>
		<div class="inicis">
		<a href="usuari.php" class="inici">El meu usuari</a> <br>
		<a href="cataleg.php" class="inici">El cataleg</a> <br>
		<a href="comandes.php" class="inici">Les meves comandes</a> <br>
		<a href="logout.php" class="inici">Tancar la sessio</a>
		</div>
	</body>
</html>
