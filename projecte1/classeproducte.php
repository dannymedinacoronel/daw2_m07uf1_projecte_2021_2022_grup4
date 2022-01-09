<?php
	//CLASSE PER LA CREACIO DE PRODUCTES
	//ES CREA UN FITXER AMB EL ID COM A NOM I ES GUARDA A dircomandes, TAMBÉ S'AFAFEGEIX AL ARXIU comandes, ON HI HA EL REGISTRE DE TOTES LES COMANDES (ACTIVES, MODIFICADES O ELIMINADES)
class producte{
	
	private $id;
	private $prestec;
	private $titol;
	private $autor;
	private $dataprestec;
	private $isbnprestec;
	
	public function __construct($id,$prestec,$titol,$autor,$dataprestec,$isbnprestec){			//constructor
			$this->id = $id;
			$this->prestec = $prestec;
			$this->titol = $titol;
			$this->autor = $autor;
			$this->dataprestec = $dataprestec;
			$this->isbnprestec = $isbnprestec;
		}
		
	public function __get($prop){											//getter
			if(property_exists($this,$prop)){
				return $this->$prop;
			}
			else{
				return -1;
			}		
		}
		
	public function __set($prop,$valor){									//setter
			if(property_exists($this,$prop)){
				$this->$prop=$valor;
			}
		}
	
	public function escriu($arxiu,$text){									//funcio pública per escriure a fitxers un text
		fwrite($arxiu,$text);
		fwrite($arxiu,"\n");
		fclose($arxiu);
	}
}	

$identificador=$_POST['id'];
$prestec=$_POST['prestec'];
$titol=$_POST['titol'];
$autor=$_POST['autor'];
$dataprestec=$_POST['dataprestec'];
$isbnprestec=$_POST['isbnprestec'];

$llibre=new producte($identificador, $prestec, $titol, $autor, $dataprestec, $isbnprestec);		//Creacio del producte a partir del constructor

$general="/var/www/html/projecte1/productes";								//afegir al registre de productes el producte no									
$fp=fopen($general,"a") or die ("No s'ha pogut afegir al fitxer");
$text=$llibre->id."-".$llibre->prestec."-".$llibre->titol."-".$llibre->autor."-".$llibre->dataprestec."-".$llibre->isbnprestec;															
$llibre->escriu($fp,$text);
fclose($fp);


$filename="/var/www/html/projecte1/dirproductes/".$identificador;			//afegir al directori dirproductes un arxiu amb aquest producte i id com a nom
$fitxer=fopen($filename,"w") or die ("No s'ha pogut crear");
$texte=$llibre->id."-".$llibre->prestec."-".$llibre->titol."-".$llibre->autor."-".$llibre->dataprestec."-".$llibre->isbnprestec;		//text generat a partir dels getters de les propietats
$llibre->escriu($fitxer,$texte);
fclose($filename);


header('Location: http://localhost/projecte1/manteniment_cataleg.php');

	
?>
