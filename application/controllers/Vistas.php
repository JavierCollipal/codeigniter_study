<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vistas Extends CI_Controller{
	public function index(){
	//con el tercer paramtro de view, el cual es un booleano al marcar true podemos almacenar una vista en variable
    //ocuparemos este array para rellenar nuestra plantilla de prueba
    //es posible cargar un modelo y asignarlo a la vista donde requiera su uso
    $plantilla["titulo"] = "la plantilla mas bonita";
    //es momento de mostrar un ejemplo basico de libreria en nuestra plantilla cuerpo
    $this->load->library('Ejemplo_libreria');
    //es posible crear una libreria y llenar los datos del constructor con un array
    // array $params = array('p1' => 'valor 1', 'p2' => 'valor 2');
    // $this->load->library('Miclase', $params);
    //en este caso esta libreria ya cuenta con constructor, pero sus valores estan definidos por funciones
    $lorem = $this->ejemplo_libreria->LoremPost();
    $fecha = $this->ejemplo_libreria->HoyPost();
    $suma = $this->ejemplo_libreria->Suma();
    $datos_libreria = array('lorem' => $lorem ,
    'fecha' => $fecha ,
    'suma' => $suma
     );
    $plantilla["body"] = $this->load->view('plantilla/cuerpo_plantilla',$datos_libreria, true);
    $plantilla["header"] = $this->load->view('plantilla/header_plantilla','', true);
    $plantilla["footer"] = $this->load->view('plantilla/footer_plantilla','', true); 
   $this->load->view('ejemplo_plantilla',$plantilla);

	}
}