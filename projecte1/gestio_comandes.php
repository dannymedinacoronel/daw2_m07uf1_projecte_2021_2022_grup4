<?php
	//POTS VEURE TOTES LES COMANDES QUE S'HAN FET, LES SEVES MODIFICACIONS I ENCARA QUE ESTIGUIN ELIMINADES
	//TAMBÉ ES POT VEURE TOTES LES COMANDES ACTIVES DE TOTS ELS USUARIS MITJANÇANT UN BUCLE DINS EL dircomandes, ON HI HAN LES COMANDES ACTIVES
	//PER ULTIM HI HA UN FORMULARI PER ELIMINAR UNA COMANDA. SELECCIONES UNA DE LES COMANDES QUE HAN SOLICITAT SER ELIMINADES, CRIDANT L'ARXIU eliminar_comanda.
	session_start();
	
?>
<html>
	<head>
		<title>
			GESTIO DE COMANDES
		</title>
		<link rel="stylesheet" type="text/css" href="estils.css"/>
		<script language="javascript" src="EsbCom.js"></script>
	</head>
		<body>
			<div class="inicis">
			<a class="inici" href="manteniment_cataleg.php">Manteniment del catàleg</a> 
			<a class="inici" href="gestio_comandes.php">Gestionar comandes</a> 
			<a class="inici" href="gestio_usuari.php">Gestionar usuaris</a>
			<a class="inici" href="logout.php">Tancar la sessio</a>
			</div>
			<h2 class="titol">GESTIONAR LES COMNADES</h2>
			
			<br><br>
			
			<div class="llista">
			<h3>TOTES LES COMANDES REALITZADES</h3>
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
				
			?>
			</table>
			</div>
			
			<br><br>
			
			<div class="llista">
			<h3>COMANDES ACTIVES</h3>
			<table>
				<tr id="cap">
					<td>ID DE LES COMANDES ACTIVES</td>

				</tr>
				<?php
					$comandes="/var/www/html/projecte1/dircomandes";
					$llista = scandir($comandes);
					foreach($llista as $comanda){
				?>
					<tr>
						<td><?php echo $comanda; ?></td>
					</tr>
						
				<?php
					}
				?>
			</table>
			</div>
			
			<br><br>
			
			<div class="llista">
			<h3>SOLICITUTS ELIMINAR COMANDES</h3>
			<fieldset>
				<legend>
					<h3>Petició d'anul·lació de comanda</h3>
				</legend>		
				<form id="frmEsbCom">
					<table>
						<tr>
							<td>Identificador de comanda:</td>
							<td><select name="nomCom" id="nomCom">
								<?php
									$fitxer_comandes="/var/www/html/projecte1/eliminar_comanda";
									$fp=fopen($fitxer_comandes,"r") or die ("No s'ha pogut validar l'usuari");
									if ($fp) {
										$mida_fitxer=filesize($fitxer_comandes);	
										$comandes = explode(PHP_EOL, fread($fp,$mida_fitxer));
									}
									foreach ($comandes as $comanda) {
								?>
									<option><?php echo $comanda; ?></option>
										
								<?php
									}
								?>
							</select></td>
						</tr>
					</table>
					<input type="button" name="bEsbCom" id="bEsbCom" value="Esborra Comanda" onclick="esbComanda();">
					<input type="button" name="bNet" id="bNet" value="Neteja formulari" onclick="netForm();">
				</form>
			</fieldset>
			<fieldset>
				<legend>
					<h3>Resposta a la petició</h3>
				</legend>
				<p id="resp"></p>
			</fieldset>	
			</div>
		
		</body>
</html>
