<?php
	//FITXER ON ES MOSTREN TOTS ELS PRODUCTES QUE S'HAN REGISTRAT (ENCARA QUE ES MODIFIQUIN O ELIMININ) DIVIDINT-SE PER SECCIONS, UTILITZANT EL ARXIU productes
	//TAMBÉ APAREIXEN ELS ID DELS PRODUCTES ACTUALS DISPONIBLES, UTILITZANT EL DIRECTORI dirproductes i el nom dels fitxers (son els id del productes)
	
	session_start();
	
?>
<html>
	<head>
		<title>
			CATALEG
		</title>
		<link rel="stylesheet" type="text/css" href="estils.css"/>
	</head>
		<body>
			<div class="inicis">
			<a class="inici" href="usuari.php">El meu usuari</a> 
			<a class="inici" href="cataleg.php">El cataleg</a> 
			<a class="inici" href="comandes.php">Les meves comandes</a>
			<a class="inici" href="logout.php">Tancar la sessio</a>
			</div>
			
			<h2 class="titol">CATALEG</h2>
			
			<div class="llista">			
			<h3>TOTS ELS COTXES QUE HEM REGISTRAT I INFORMACIO</h3>
			<p><u><b>Cotxes electrics</b></u></p>
			<table>
				<tr id="cap">
					<td>IDENTIFICADOR</td>
					<td>MARCA</td>
					<td>MODEL</td>
					<td>PREU</td>

				</tr>
			<?php
				$fitxer_productes="/var/www/html/projecte1/productes";
				$fp=fopen($fitxer_productes,"r") or die ("No s'ha pogut validar l'arxiu");
				if ($fp) {
					$mida_fitxer=filesize($fitxer_productes);	
					$productes = explode(PHP_EOL, fread($fp,$mida_fitxer));
				}
				foreach ($productes as $producte) {
				$separar = explode("-",$producte);
					if ($separar[1] == "electric"){					//si en la separacio 2 hi ha electric es mostrara les dades del cotxes
						$id = $separar[0];
						$marca = $separar[2];
						$model = $separar[3];
						$preu = $separar[4];

			?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $marca; ?></td>
					<td><?php echo $model; ?></td>
					<td><?php echo $preu; ?></td>

				</tr>
					
			<?php
					}
				}
			?>
			</table>
			<br><br><br>
			<p><u><b>Cotxes de gasolina</b></u></p>
			<table>
				<tr id="cap">
					<td>IDENTIFICADOR</td>
					<td>MARCA</td>
					<td>MODEL</td>
					<td>PREU</td>

				</tr>
			<?php
				$fitxer_productes="/var/www/html/projecte1/productes";
				$fp=fopen($fitxer_productes,"r") or die ("No s'ha pogut validar l'arxiu");
				if ($fp) {
					$mida_fitxer=filesize($fitxer_productes);	
					$productes = explode(PHP_EOL, fread($fp,$mida_fitxer));
				}
				foreach ($productes as $producte) {
				$separar = explode("-",$producte);
					if ($separar[1] == "gasolina"){
						$id = $separar[0];
						$marca = $separar[2];
						$model = $separar[3];
						$preu = $separar[4];

			?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $marca; ?></td>
					<td><?php echo $model; ?></td>
					<td><?php echo $preu; ?></td>

				</tr>
					
			<?php
					}
				}
			?>
			</table>
			<br><br><br>
			<p><u><b>Cotxes diesel</b></u></p>
			<table>
				<tr id="cap">
					<td>IDENTIFICADOR</td>
					<td>MARCA</td>
					<td>MODEL</td>
					<td>PREU</td>

				</tr>
			<?php
				$fitxer_productes="/var/www/html/projecte1/productes";
				$fp=fopen($fitxer_productes,"r") or die ("No s'ha pogut validar l'arxiu");
				if ($fp) {
					$mida_fitxer=filesize($fitxer_productes);	
					$productes = explode(PHP_EOL, fread($fp,$mida_fitxer));
				}
				foreach ($productes as $producte) {
				$separar = explode("-",$producte);
					if ($separar[1] == "diesel"){
						$id = $separar[0];
						$marca = $separar[2];
						$model = $separar[3];
						$preu = $separar[4];

			?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $marca; ?></td>
					<td><?php echo $model; ?></td>
					<td><?php echo $preu; ?></td>

				</tr>
					
			<?php
					}
				}
			?>
			</table>
			</div>
			
			<br><br>

			<div class="llista">			
			<h3>ELS MODELS QUE ACTUALMENT DISPONEM</h3>
			<table>
				<tr id="cap">
					<td>MODELS</td>

				</tr>
			<?php
				$productes="/var/www/html/projecte1/dirproductes";
				$llista = scandir($productes);
				foreach($llista as $producte){
	

			?>
				<tr>
					<td><?php echo $producte; ?></td>
				</tr>
					
			<?php
				}
			?>
			</table>
			</div>
		</body>
</html>
