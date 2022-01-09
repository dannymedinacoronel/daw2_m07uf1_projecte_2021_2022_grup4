<?php
	//ES POT VEURE ELS USUARIS ACTIUS, AMB UN BUCLE DINS EL DIRECTORI dirusuaris, ON HI HAN ELS ARXIUS ACTIUS
	//TAMBÉ HI HA UNA LLISTA DE TOTS ELS USUARIS CREATS, I TAMBÉ ELS CANVIS I ELS USUARIS ELIMINATS
	//PER ULTIM HI HA UN FORMULARI PER ELIMINAR UN USUARI. SELECCIONES UN DELS USUARIS QUE HAN SOLICITAT SER ELIMINATS, CRIDANT L'ARXIU eliminar_usuari.

	session_start();
	<form method="post">

<input type="submit" name="submit" value="visualitzar dades personals"><br>

<?php
 
 if(isset($_POST['submit']))

 {

    $archivo = fopen("usuarios.txt", "r") or die("Error - No fue poible abrir el archivo");

    $encontrado=false;

    while ($linea = fgets($archivo))
    {
      $partes = explode('|', trim($linea));

      if (($_SESSION['user'] == $partes[0]))
      {
        $encontrado=true;
        break;
      }
    }
 echo "Les teves dades personales son: ".$linea;
 
 fclose($archivo);
 }

 ?>
</form>
?>
<html>
	<head>
		<title>
			GESTIO USUARIS
		</title>
		<link rel="stylesheet" type="text/css" href="estils.css"/>
		<script language="javascript" src="EsbUsr.js"></script>
	</head>
		<body>
			<div class="inicis">
			<a class="inici" href="manteniment_cataleg.php">Manteniment del catàleg</a> 
			<a class="inici" href="gestio_comandes.php">DADES BIBLIOTECARI</a> 
			<a class="inici" href="gestio_usuari.php">Gestionar usuaris</a>
			<a class="inici" href="logout.php">Tancar la sessio</a>
			</div>
			
			<h2 class="titol">GESTIONAR USUARIS</h2>
			<h2 class="titol">REGISTRAR NOU USUARI</h2>
			<div class="llista">			
			<form action="http://localhost/projecte1/registrar.php" method="POST">
				Nom: <input type="text" name="nom"><br>
				Carrer: <input type="text" name="carrer"><br>
				Correu: <input type="email" name="correu"><br>
				Telefon: <input type="tel" name="telefon"><br>
				Nom d'usuari: <input type="text" name="usuari"><br>
				Contrassenya: <input type="password" name="ctsnya"><br>
				Llibre en prestec?: <input type="text" name="prestec"><br>
				Data inici prestec: <input type="text" name="dataprestec"><br>
				ISBN del llibre: <input type="text" name="isbnprestec"><br>
				<input type="submit" value="Envia"/>
			</form>
			</div>
			<div class="llista">
			<h3>TOTS ELS USUARIS CREATS I MODIFICACIONS</h3>
			<table>
				<tr id="cap">
					<td>ID</td>
					<td>NOM</td>
					<td>CARRER</td>
					<td>CORREU</td>
					<td>TELEFON</td>
					<td>CONTRASEÑA</td>
					<td>USUARI</td>
					<td>LLIBRE PRESTEC</td>
					<td>DATA PRESTEC</td>
					<td>ISBNB</td>

				</tr>
			<?php
				$fitxer_usuaris="/var/www/html/projecte1/usuaris";
				$fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");
				if ($fp) {
					$mida_fitxer=filesize($fitxer_usuaris);	
					$usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
				}
				foreach ($usuaris as $usuari) {
					$logpwd = explode(":",$usuari);
					$id = $logpwd[8];
					$nom = $logpwd[10];
					$carrer = $logpwd[4];
					$correu = $logpwd[6];
					$telefon = $logpwd[7];
					$ctsnya = $logpwd[11];
					$usuari = $logpwd[9];
					$prestec = $logpwd[5];
					$dataprestec = $logpwd[3];
					$isbnprestec = $logpwd[2];
					

			?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $nom; ?></td>
					<td><?php echo $carrer; ?></td>
					<td><?php echo $correu; ?></td>
					<td><?php echo $telefon; ?></td>
					<td><?php echo $ctsnya; ?></td>
					<td><?php echo $usuari; ?></td>
					<td><?php echo $prestec; ?></td>
					<td><?php echo $dataprestec; ?></td>
					<td><?php echo $isbnprestec; ?></td>

				</tr>
					
			<?php
				}
			?>
			</table>
			</div>
			
			<br><br>
			
			<div class="llista">
			<h3>USUARIS ACTUALS</h3>
			<table>
				<tr id="cap">
					<td>USUARI</td>

				</tr>
			<?php
				$usuaris="/var/www/html/projecte1/dirusuaris";
				$llista = scandir($usuaris);
				foreach($llista as $usuari){
	

			?>
				<tr>
					<td><?php echo $usuari; ?></td>


				</tr>
					
			<?php
				}
			?>
			</table>
			</div>
			
			<br><br>
			
			<div class="llista">
			<h3>SOLICITUTS ELIMINAR USUARI</h3>
			<fieldset>
				<legend>
					<h3>Petició d'anul·lació de usuari</h3>
				</legend>		
				<form id="frmEsbUsr">
					<table>
						<tr>
							<td>Usuari</td>
							<td><select name="nomUsr" id="nomUsr">
								<?php
									$fitxer_usuaris="/var/www/html/projecte1/eliminar_usuari";
									$fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");
									if ($fp) {
										$mida_fitxer=filesize($fitxer_usuaris);	
										$usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
									}
									foreach ($usuaris as $usuari) {
								?>
									<option><?php echo $usuari; ?></option>
										
								<?php
									}
								?>
							</select></td>
						</tr>
					</table>
					<input type="button" name="bEsbUsr" id="bEsbUsr" value="Esborra usuari" onclick="esbUsuari();">
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
