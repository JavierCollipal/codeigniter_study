<?php
defined('BASEPATH') or exit('No direct script access Allowed');
class CRUD extends CI_Controller{
	protected $array_posteos;
	protected $plantilla;
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();         
          //incluyo el modelo
        $this->load->model("Modelo_CRUD");
        //le doy valores a mi array de plantillas,la idea era tener todo a mano pero prefiero hacer funcionar las funciones mediante popup en el siguiente ejercicio.
        $posteos=$this->Modelo_CRUD->consultar_todo();
	    $this->array_posteos = array('todos_los_posts' => $posteos);
	    $this->plantilla["posteos"]= $this->load->view('plantilla_crud/select_all_plantilla',$this->array_posteos,TRUE);
	    $this->plantilla["insertar"]= $this->load->view('plantilla_crud/insertar_plantilla','',TRUE);
    }
	function index(){
       
	$this->load->view('vista_CRUD',$this->plantilla);
	}

	function insertar(){
   	//hora de reglas de validacion
    $this->form_validation->set_rules('TITULO_POST', 'titulo', 'required');
    $this->form_validation->set_rules('DESCRIPCION_POST', 'descripcion', 'required');
    $this->form_validation->set_rules('CONTENIDO_POST', 'contenido', 'required');
     if($this->form_validation->run()==false){
         $this->plantilla["validacion"] = 'es fundamental completar el formulario';
      $this->load->view('vista_CRUD',$this->plantilla);
     }else{
      $datos =$_POST;
    $validacion = $this->Modelo_CRUD->insertar($datos);
      if($validacion == true){
      echo 'datos insertados correctamente';
     redirect('CRUD');
    }else{
      $this->plantilla["errores"] = 'surgieron problemas tecnicos, no es posible enviar tu consulta';
      $this->load->view('vista_CRUD',$this->plantilla);
    }
     }
}

    function eliminar($id){
       $validacion = $this->Modelo_CRUD->eliminar($id);
      if($validacion == true){
      echo 'datos eliminados correctamente';
     redirect('CRUD');
    }else{
      $this->plantilla["errores"] = 'surgieron problemas tecnicos, no es posible enviar tu consulta';
      $this->load->view('vista_CRUD',$this->plantilla);
    }
	}
	function consultar(){

	}
  function vista_modificar($id){
     $consulta=$this->Modelo_CRUD->consultar('ID_POST',$id);
     $array_consulta = array('select_individual' => $consulta,
      'id_post' => $id);
     $this->load->view('plantilla_crud/modificar_plantilla',$array_consulta);
     $this->form_validation->set_rules('TITULO_POST', 'titulo', 'required');
     $this->form_validation->set_rules('DESCRIPCION_POST', 'descripcion', 'required');
     $this->form_validation->set_rules('CONTENIDO_POST', 'contenido', 'required');
  }
	function modificar($id){
     
     if(empty($_POST)){
     $mensaje['primero_completar'] = 'es necesario completar el formulario de moficacion';
     $this->load->view('plantilla_crud/modificar_plantilla',$mensaje);
     }else{
      $datos =$_POST;
     $validacion =$this->Modelo_CRUD->modificar($id,$datos);
      if($validacion == true){
      echo 'datos modificados correctamente';
     redirect('CRUD');
    }else{
     $error = 'surgieron erorres tecnicos, porfavor consultar con el tecnico';
      $this->load->view('plantilla_crud/modificar_plantilla',$error);
    }
     }
	}
 
}