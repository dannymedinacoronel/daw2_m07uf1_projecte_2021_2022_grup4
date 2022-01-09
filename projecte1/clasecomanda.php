<?php
	//CLASSE PER LA CREACIO DE LES COMANDES
	//ES CREA UN FITXER AMB EL ID COM A NOM I ES GUARDA A dircomandes, TAMBÉ S'AFAFEGEIX AL ARXIU comandes, ON HI HA EL REGISTRE DE TOTES LES COMANDES (ACTIVES, MODIFICADES O ELIMINADES)
	session_start();

class comanda{
	
	private $id;
	private $producte;
	private $cantitat;

	
	public function __construct($id,$producte,$cantitat){			//constructor
			$this->id = $id;
			$this->producte = $producte;
			$this->cantitat = $cantitat;
		}
			
	public function __get($prop){									//getter
			if(property_exists($this,$prop)){
				return $this->$prop;
			}
			else{
				return -1;
			}		
		}
		
	public function __set($prop,$valor){							//setter
			if(property_exists($this,$prop)){
				$this->$prop=$valor;
			}
		}
	
	public function escriu($arxiu,$text){							//funcio pública per escriure en un arxiu un text
		fwrite($arxiu,$text);
		fwrite($arxiu,"\n");
		fclose($arxiu);
	}
}	
$n_comanda=	rand(999,9999);
$data = date('dmYhis');
$id = $_SESSION['id'].".".$data.".".$n_comanda;
$producte=$_POST['producte'];
$cantitat=$_POST['cantitat'];


$compra=new comanda($id, $producte, $cantitat);							//creacio de comanda

$filename="/var/www/html/projecte1/comandes";							
$fitxer=fopen($filename,"a") or die ("No s'ha pogut afegir al fitxer");			//afegir al registre de comandes
$text=$compra->id."-".$compra->producte."-".$compra->cantitat;															
$compra->escriu($fitxer,$text);
fclose($filename);

$general="/var/www/html/projecte1/dircomandes/".$id;
$fitxer=fopen($general,"w") or die ("No s'ha pogut crear");						//afegir al directori dircomandes, on hi han les comandes actives
$texte=$compra->id."-".$compra->producte."-".$compra->cantitat;					//text generat a partir dels getters de les propietats
$compra->escriu($fitxer,$texte);
fclose($filename);



header('Location: http://localhost/projecte1/comandes.php');

	
?>

