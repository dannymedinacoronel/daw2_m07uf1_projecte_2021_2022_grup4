<?php
	//ES PERMET CREAR COMANDES CRIDANT LA CLASSECOMANDA I AFEGINT ELS VALORS DE LES PROPIETATS AL FORMULARI
	//TAMBÉ PERMET VEURE TOTES LES COMANDES FETES, MODIFICADES I ELIMINADES DEL USUARI
	//POTS VEURE LES COMANDES ACTIVES DEL USUARI MITJANÇANT UN BUCLE DINS EL DIRECTORI dircomandes, on hi han les comandes actives
	//POTS ENVIAR UNA SOLICITUD PER ESBORRAR LES COMANDES, ON AFEGEIXES EL ID D'UNA COMANDA ACTIVA

	session_start();
	
?>
<html>
	<head>
		<title>
			COMANDES
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
			
			<h2 class="titol">LES MEVES COMANDES, <?php echo $_SESSION['nom']."-". $_SESSION['id']; ?></h2>

			<div class="llista">
			<h3>CREAR COMANDA</h3>
				<form action="http://localhost/projecte1/clasecomanda.php" method="POST">
				Codi del producte: <select name="producte">
					
					<?php
					$productes="/var/www/html/projecte1/dirproductes";			//Crea una comanda a partir dels productes disponibles (aquells que estan al directori dirproductes)
					$llista = scandir($productes);
					foreach($llista as $producte){
		

					?>
						<option><?php echo $producte; ?></option>					
					<?php
						}
					?>

					</select>
					Cantitat <input type="text" name="cantitat"><br>
					<input type="submit" value="Envia"/>
				</form>
			</div>
			
			<br><br>
			
			<div class="llista">
			<h3>LES MEVES COMANDES</h3>
				<table>
				<tr id="cap">
					<td>IDENTIFICADOR</td>
					<td>PRODUCTE</td>
					<td>CANTITAT</td>

				</tr>
			<?php
				$fitxer_comandes="/var/www/html/projecte1/comandes";
				$fp=fopen($fitxer_comandes,"r") or die ("No s'ha pogut validar l'usuari");
				if ($fp) {
					$mida_fitxer=filesize($fitxer_comandes);	
					$comandes = explode(PHP_EOL, fread($fp,$mida_fitxer));
				}
				foreach ($comandes as $comanda) {
				$separar = explode("-",$comanda);
				$ncomanda = explode(".",$comanda);

					if ($ncomanda[0] == $_SESSION['id']){				//busca les comandes que comencin per la id de la sessio del usuari.
						$id = $separar[0];
						$producte = $separar[1];
						$cantitat = $separar[2];

			?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $producte; ?></td>
					<td><?php echo $cantitat; ?></td>

				</tr>
					
			<?php
					}
				}
			?>
			</table>
			</div>
			
			<br><br>
			
			<div class="llista">
			<h3>COMANDES ACTIVES</h3>
				<table>
				<tr id="cap">
					<td>IDENTIFICADOR</td>

				</tr>
			<?php
				$comandes="/var/www/html/projecte1/dircomandes";
				$llista = scandir($comandes);
					foreach($llista as $comanda){
						if (substr($comanda,0,4) === $_SESSION['id']){				//busca al directori de les comandes els arxius que comencin amb la id de la sessio del usuari
			?>
				<tr>
					<td><?php echo $comanda; ?></td>
				</tr>
					
			<?php
					}
				}
			?>
			</table>
			</div>
			
			
			<br><br>	

			<div class="llista">			
			<h3>MODIFICAR COMANDA DISPONIBLE</h3>
			<form action="http://localhost/projecte1/modificarcomanda.php" method="POST">
				Comanda a modificar <select name="comanda">
				<?php
				$comandes="/var/www/html/projecte1/dircomandes";			//modifica una de les comandes que estan disponibles
				$llista = scandir($comandes);
				foreach($llista as $comanda){
					if (substr($comanda,0,4) === $_SESSION['id']){
	

				?>
					<option><?php echo $comanda; ?></option>					
				<?php
					}
				}
				?>
				</select>
				
				Codi del producte: <select name="producte">
					
					<?php
					$productes="/var/www/html/projecte1/dirproductes";			
					$llista = scandir($productes);
					foreach($llista as $producte){
		

					?>
						<option><?php echo $producte; ?></option>					
					<?php
						}
					?>

					</select>
					
					Cantitat <input type="text" name="cantitat"><br>
				<input type="submit" value="Envia"/>
			</form>
			</div>
			
			<br><br>
			
			<div class="llista">
			<h3>ELIMINAR COMANDA</h3>
			<form action="http://localhost/projecte1/solicitar_eliminarcom.php" method="POST">
				<p>Quina comanda vol eliminar</p>
				<select name="id">
					<?php
						$comandes="/var/www/html/projecte1/dircomandes";
						$llista = scandir($comandes);
							foreach($llista as $comanda){
								if (substr($comanda,0,4) === $_SESSION['id']){
					?>
							<option><?php echo $comanda; ?></option>
					<?php
							}
						}
					?>
				
				</select>
				<input type="submit" value="Envia"/>
			</form>
			
		</body>
</html>
