<?php
	$dirComandes = "/var/www/html/projecte1/dirusuaris/";
	if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
		$nomFitxer = $_REQUEST["q"];
		echo "<b>Usuari:</b> $nomFitxer<br>";
		$nomCompletFitxer = $dirComandes.$nomFitxer;
		if (file_exists($nomCompletFitxer)){
			if (unlink($nomCompletFitxer)){
				include("ok200.php");
			}else include("error403.php");
		}else include("error404.php");
	} else include("error405.php");
?>
