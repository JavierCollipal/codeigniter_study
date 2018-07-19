<?php
//siempre incluir para evitar acceso al directorio
defined('BASEPATH') OR exit('No direct script acces allowed');
//clase con extends del CI_Controller
class Saludo extends CI_Controller{

	public function index(){
	$default_saludo =array('primer_parrafo'=> 'Hola',
	'segundo_parrafo'=>'Amigo');
    $this->load->view('mensaje_saludo',$default_saludo);
	}
    public function japones(){
    $japones_saludo =array('primer_parrafo'=> 'konnichiwa',
	'segundo_parrafo'=>'nakama');
    $this->load->view('mensaje_saludo',$japones_saludo);
    }
    public function coreano(){
   $coreano_saludo =array('primer_parrafo'=> 'Annyong',
	'segundo_parrafo'=>'chingu');
    $this->load->view('mensaje_saludo',$coreano_saludo);
    }
    public function chino(){
   $chino_saludo =array('primer_parrafo'=> 'nǐ hǎo',
	'segundo_parrafo'=>'pengyou');
    $this->load->view('mensaje_saludo',$chino_saludo);
  }
  //funcion de dos parametros
  //interaccion = paises/$pais/$capital
}
