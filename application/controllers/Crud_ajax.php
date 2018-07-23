<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class Crud_ajax extends CI_Controller{
	private $request;
	function __construct(){
		parent::__construct();
		$this->load->model("Modelo_CRUD");
		//la instancia de json_decode en request, es para convertir json en un objeto php y de esta manera poder tratar con post
		$this->request = json_decode(file_get_contents('php://input'));
	}
	function tabla_entera(){
		$tablas=$this->Modelo_CRUD->consultar_todo();
		echo json_encode($tablas);
	}

	function insertar_tabla(){
		//la magia del request nos sirve para intretar como php que nos trae json y poder escribirlo en nuestro array asociativo
    $this->Modelo_CRUD->insertar(array(
    'TITULO_POST' => $this->request->TITULO_POST,
    'DESCRIPCION_POST' => $this->request->DESCRIPCION_POST,
    'CONTENIDO_POST' => $this->request->CONTENIDO_POST
    ));
       }
    function borrar_posteo(){
        $this->Modelo_CRUD->eliminar(array(
        	'ID_POST' => $this->request->ID_POST
        ));
       }


	}
