<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class Modelo_Login extends CI_MODEL{
 protected $base_blog;
	function __construct(){
		parent::__construct();
		$this->base_blog = $this->load->database('blog', TRUE);
	}
	function Validacion($email,$password){
       //continuaremos usando query de codeigniter
	//en este caso emplearemos el llamado active records
		//condicional where de active records, llamar a la funcion varias veces hace que los valores hagan cadena	
		//es hora de ocupar nuestra segunda base de datos
		$query = $this->base_blog->where('CORREO',$email);
		$query = $this->base_blog->where('CONTRASENA',$password);
		//active records get hace referencia a la tabla a consultar, en este caso miembros_blog y ademas funciona como consulta select
		$query = $this->base_blog->get('miembros_blog');
       //como solo queremos una fila, procedemos a ocupar y devolver ->row
		return $query->row();
	}
}