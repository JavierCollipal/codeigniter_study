<?php
//la primera linea, previene que visitantes tengan acceso a este directorio
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
//CI_controller es la base funcional de nuestros controladores
//System es el directorio base de todos los CI
//extends nos ayuda a obtener todas las variables y funciones de la clase base, en este caso CI_Controller

	//ojo, la funcion index es la base para llevarnos a la url deseada por default con nuestro controlador
	public function index()
	{
		//load->view de nuestro CI hace referencia a nuestro archivo php 'welcome_message' localizado en el apartado de vistas
		//en este caso, nuestro controlador cumplio con rederizarnos una vista.
		//quiero que desde esta vista podamos navegar a otros controladores por lo tanto usare la capa de controlador para almacenar los distintos llamados de controladores
		
		$this->load->view('welcome_message');
	}
}
