<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//en caso de librerias, no es recomendable cerrar el tag de php
//una libreria puede ser cualquier clase POO que tenga funcionaliades
class Ejemplo_Libreria{
    // public $mensaje_lorem;
   // public $fecha_hoy;
  //  public $suma;
   // public function __construct($mensaje_lorem, $fecha_hoy, $suma) {
     //  $this->mensaje_lorem = $mensaje_lorem;
      // $this->fecha_hoy = $fecha_hoy;
      // $this->suma = $suma;
	//Ojo, tambien es posible acceder a recursos mismos de codeigniter, declarando una variable con
	// $nombre =& get_instance();, la cual cumplira del mismo modo que la variable $this dentro de nuestro controladores
    //ejemplo de como deberia ser una libreria con constructor
 function LoremPost(){
 	 $mensaje_lorem = '<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>';
 	return $mensaje_lorem;
 }
 function HoyPost(){
 	$fecha_hoy =date('m/d/Y h:i:s a', time());
 	return $fecha_hoy;
 }
 function Suma(){
 	$a = 1000;
 	$b = 9000;
 	$c = $a +$b;
 	return $c;
 }
//es posible modificar una libreria base de codeigniter,siempre respetando su nombre base
 //es posible extender una libreria, recordar siempre cargarla con su nombre original. Toda clase a extender debe empezar con MY_
}