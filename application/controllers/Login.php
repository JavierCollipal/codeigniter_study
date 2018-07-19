<?php 
defined('BASEPATH') or exit('No direct script acces allowed');

//dato importante, usaremos autoload para cargar las librerias database y form_validation de codeigniter
class Login Extends CI_Controller{
function index(){
	$this->load->view('ejemplo_login');
}	
function ingreso($idioma=null){
	//podemos setear el lenguaje a ejecutar en nuesta aplicacion
	//$this->config->set_item('language','spanish');
	//empezamos por lo basico,verificar si una variable esta definida
	if(!isset($_POST['maillogin'])){
	//si la variable no esta seteada, entonces cargamos la vista
	$this->load->view('ejemplo_login');
   }
 else{
 	//en este paso el usuario ya paso por la pantalla inicial y presiono el boton ingresar
 	//es momento de configurar las validaciones usando form_validation
 	//set_rules hace referencia a ('nombre del campo','un nombre comprensible para el usuario, en caso de error','regla de tipo_validacion|regla_validacion')
 	//es tiempo de usar nuestro cuarto valor de set rules, un array para personalizar nuestros mensajes de errores
 	$this->form_validation->set_rules('maillogin', 'email', 'required|valid_email',array('required' => 'Ingresa un correo valido por el amor de dios.',
 		'valid_email' => 'Escribe un email como la gente.'));
  $this->form_validation->set_rules('passwordlogin', 'password', 'required',array('required' => 'Ingresa una contraseña por el amor de dios.'));
   //es hora de verificar si el usuario paso la validacion
    if($this->form_validation->run()==FALSE){
    	//si no, volvemos a cargar la vista
    	$this->load->view('ejemplo_login');
      
 }else{
 	//es tiempo de cargar nuestro modelo para la validacion
 	$this->load->model('Modelo_Login');
 	//creamos la variable que usaremos como validador
 	$validador = $this->Modelo_Login->validacion($_POST['maillogin'],$_POST['passwordlogin']);
 	//hora de comparar si es true o false
 	if($validador){
      echo "Validacion Ok";
      redirect('CRUD');

 	}else{
 		//en caso de no lograr la validacion
 		$data['error']="Correo o contraseña incorrecta,por favor vuelva a intentar";
 		//volvemos a cargar la vista con nuestro array de error
 		$this->load->view('ejemplo_login',$data);
 	}
 }
    }


}
}