<?php
defined('BASEPATH') or exit('No direct script access Allowed');
class CRUD extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();         
          //incluyo el modelo
        //le doy valores a mi array de plantillas,la idea era tener todo a mano pero prefiero hacer funcionar las funciones mediante popup en el siguiente ejercicio.
    }
	function index(){
   
	$this->load->view('vista_CRUD');
	}
 
}